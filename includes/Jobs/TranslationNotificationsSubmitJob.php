<?php
declare( strict_types = 1 );

namespace MediaWiki\Extension\TranslationNotifications\Jobs;

use Exception;
use IJobSpecification;
use JobSpecification;
use ManualLogEntry;
use MediaWiki\Config\Config;
use MediaWiki\Extension\Translate\PageTranslation\TranslatablePage;
use MediaWiki\Extension\TranslationNotifications\Utilities\LanguageSet;
use MediaWiki\Extension\TranslationNotifications\Utilities\TranslationNotifyUser;
use MediaWiki\JobQueue\JobQueueGroupFactory;
use MediaWiki\Languages\LanguageFactory;
use MediaWiki\Languages\LanguageNameUtils;
use MediaWiki\Title\Title;
use MediaWiki\User\Options\UserOptionsManager;
use MediaWiki\User\User;
use MediaWiki\User\UserFactory;
use MediaWiki\WikiMap\WikiMap;
use Wikimedia\Rdbms\IConnectionProvider;
use Wikimedia\Rdbms\IExpression;
use Wikimedia\Rdbms\IResultWrapper;
use Wikimedia\Rdbms\LikeValue;

/**
 * Handles a notification request. Uses the TranslationNotifyUsers to create the necessary jobs
 * to deliver users messages based on their preferences.
 * @ingroup JobQueue
 * @license GPL-2.0-or-later
 */
class TranslationNotificationsSubmitJob extends GenericTranslationNotificationsJob {

	/** Id of the current wiki */
	private string $currentWikiId;
	private UserOptionsManager $userOptionsManager;
	private JobQueueGroupFactory $jobQueueGroupFactory;
	private LanguageNameUtils $languageNameUtils;
	private LanguageFactory $languageFactory;
	private UserFactory $userFactory;
	private IConnectionProvider $connectionProvider;
	private Config $mainConfig;
	private const JOB_NAME = 'TranslationNotificationsSubmitJob';

	/** Returns an instance of the TranslationNotificationsSubmitJob */
	public static function newJob(
		Title $title, array $requestData, int $notifierId, string $translatorLang
	): IJobSpecification {
		return new JobSpecification(
			self::JOB_NAME,
			[
				'requestData' => $requestData,
				'notifierId' => $notifierId,
				'translatorLanguage' => $translatorLang
			],
			[],
			$title
		);
	}

	public function __construct(
		Title $title,
		array $params,
		UserOptionsManager $userOptionsManager,
		JobQueueGroupFactory $jobQueueGroupFactory,
		LanguageNameUtils $languageNameUtils,
		LanguageFactory $languageFactory,
		UserFactory $userFactory,
		IConnectionProvider $connectionProvider,
		Config $mainConfig
	) {
		$this->userOptionsManager = $userOptionsManager;
		$this->jobQueueGroupFactory = $jobQueueGroupFactory;
		$this->languageNameUtils = $languageNameUtils;
		$this->languageFactory = $languageFactory;
		$this->userFactory = $userFactory;
		$this->connectionProvider = $connectionProvider;
		$this->mainConfig = $mainConfig;
		parent::__construct( self::JOB_NAME, $title, $params );
		$this->currentWikiId = WikiMap::getCurrentWikiDbDomain()->getId();
	}

	/** Execute the job */
	public function run(): bool {
		$this->logInfo( 'Processing translation notification submit request.' );

		$params = $this->params;
		$translatableTitle = $this->title;
		$notifier = $this->userFactory->newFromId( $params['notifierId'] );
		$sourceLanguage = $this->getSourceLanguage( $translatableTitle );
		$translatorLangCode = $params['translatorLanguage'];

		// Request information
		$notificationText = $params['requestData']['notificationText'];
		$priority = $params['requestData']['priority'];
		$selectedLanguages = $params['requestData']['selectedLanguages'];
		$deadlineDate = $params['requestData']['deadlineDate'];
		$languageSet = $params['requestData']['languageSet'];

		if ( !$languageSet instanceof LanguageSet ) {
			$languageSet = LanguageSet::fromArray( $languageSet );
		}

		$translatorsToNotify = $this->fetchTranslators( $selectedLanguages, $sourceLanguage, $languageSet );

		$this->logInfo(
			'Found ' . $translatorsToNotify->numRows() .
			' translators to notify with the given conditions.',
			[
				'selectedLanguages' => $selectedLanguages
			]
		);

		$frequencies = [
			'always' => 0,
			'week' => 604800, // seconds in week
			'month' => 2678400, // seconds in month
			'weekly' => 604800, // seconds in week
			'monthly' => 2678400, // seconds in month
			'none' => null
		];
		$currentUnixTime = wfTimestamp();
		$currentDBTime = $this->connectionProvider
			->getReplicaDatabase()
			->timestamp( $currentUnixTime );

		$timestampOptionName = 'translationnotifications-timestamp';

		$allLanguages = array_keys( $this->languageNameUtils->getLanguageNames() );
		$languagesToNotify = [];

		switch ( $languageSet->getOption() ) {
			case LanguageSet::ALL:
				$languagesToNotify = array_diff( $allLanguages, [ $sourceLanguage ] );
				break;
			case LanguageSet::SOME:
				$languagesToNotify = $selectedLanguages;
				break;
			case LanguageSet::ALL_EXCEPT_SOME:
				$languagesToNotify = array_diff( $allLanguages, array_merge(
					$selectedLanguages, [ $sourceLanguage ]
				) );
				break;
		}

		$notifyUser = new TranslationNotifyUser(
			$translatableTitle,
			$notifier,
			$this->mainConfig->get( 'LocalInterwikis' ),
			$this->mainConfig->get( 'NoReplyAddress' ),
			$this->mainConfig->get( 'TranslationNotificationsAlwaysHttpsInEmail' ),
			[
				'text' => $notificationText,
				'priority' => $priority,
				'deadline' => $deadlineDate,
				'languagesToNotify' => $languagesToNotify
			]
		);

		$this->logInfo( 'Starting notification job creation for translators...' );

		$jobsByTarget = [];
		$stats = [
			'jobNoPref' => 0,
			'jobEmail' => 0,
			'jobEmailDisabled' => 0,
			'jobTalkPage' => 0,
			'jobTalkPageOther' => 0,
			'tooEarly' => 0,
			'sendingFailed' => 0,
			'processedUsers' => 0,
			'unsubscribed' => 0
		];

		$usersWithEmptyWikiId = [];
		foreach ( $translatorsToNotify as $translator ) {
			$user = $this->userFactory->newFromId( (int)$translator->up_user )->getInstanceForUpdate();

			$userTranslationFrequency =
				$frequencies[$this->userOptionsManager->getOption( $user, 'translationnotifications-freq' )];

			if ( $userTranslationFrequency === null ) {
				$stats['processedUsers']++;
				$stats['unsubscribed']++;
				continue;
			}

			$userTimestamp = $this->userOptionsManager->getOption( $user, $timestampOptionName );
			$userUnixTimestamp = ( $userTimestamp == null ) ?
				wfTimestamp( TS_UNIX, '20120101000000' ) : // An old timestamp
				wfTimestamp( TS_UNIX, $userTimestamp );

			$timeSinceNotification = (int)$currentUnixTime - (int)$userUnixTimestamp;

			if ( $timeSinceNotification > $userTranslationFrequency ) {
				$this->logDebug( "Deciding notification to be sent to user: {$user->getId()}" );

				try {
					$userJobs = $this->getJobsForUser(
						$user,
						$notifyUser,
						$this->currentWikiId,
						$usersWithEmptyWikiId
					);
					$this->addUserJobsToList( $userJobs, $jobsByTarget, $stats );

					$this->userOptionsManager->setOption( $user, $timestampOptionName, $currentDBTime );
					$user->saveSettings();

					$stats['processedUsers']++;
				} catch ( Exception $e ) {
					$stats['sendingFailed']++;
					$this->logError(
						"Error while generating notification for user - {$user->getId()}.\n Exception: {$e}."
					);
				}
			} else {
				$this->logDebug( "Skipping sending of notification to user: {$user->getId()}" );
				$stats['tooEarly']++;
			}

			$this->logDebug( "Finished processing user: {$user->getId()}." );
		}

		foreach ( $jobsByTarget as $wiki => $jobs ) {
			$this->logInfo( "Wiki: $wiki, Jobs: " . count( $jobs ) );
			$this->jobQueueGroupFactory->makeJobQueueGroup( $wiki )->push( $jobs );
		}

		if ( $usersWithEmptyWikiId ) {
			// Empty wiki ID found for some jobs. Log this information. See: T342903
			$this->logWarn(
				'Following notification jobs had an empty target wiki id: {param}',
				[ 'param' => implode( ', ', $usersWithEmptyWikiId ) ]
			);
		}

		// Add a log entry
		$languagesForLog = '';
		if ( count( $selectedLanguages ) ) {
			$languagesForLog = $this->languageFactory->getLanguage( $translatorLangCode )
				->commaList( $selectedLanguages );
		}

		$logEntry = new ManualLogEntry( 'notifytranslators', 'sent' );
		$logEntry->setPerformer( $notifier );
		$logEntry->setTarget( $translatableTitle );
		$logEntry->setParameters( [
			'4::languagesForLog' => $languagesForLog,
			'5::deadlineDate' => $deadlineDate,
			'6::priority' => $priority,
			'7::sentSuccess' => $stats['processedUsers'],
			'8::sentFail' => $stats['sendingFailed'],
			'9::tooEarly' => $stats['tooEarly'],
			'11:plain' => $languageSet->getOptionName(),
		] );

		$logId = $logEntry->insert();
		$logEntry->publish( $logId );

		// Log the stats
		$stats[ 'jobTotal' ] = $this->getCurrentTotalJobs( $stats );
		$stats[ 'jobTotalWithSkipped' ] = $this->getCurrentTotalJobs( $stats, true );
		$this->logInfo(
			"Finished processing. Overall info: " .
			"Too early: {tooEarly}, Sending failed: {sendingFailed}, Users processed: {processedUsers}. " .
			"Jobs info: " .
			"Total: {jobTotal}, Total with skipped & unsubscribed: {jobTotalWithSkipped}, " .
			"Email: {jobEmail}, Email disabled: {jobEmailDisabled}, Talk page: {jobTalkPage}, " .
			"Talk page other wiki: {jobTalkPageOther}, No preference: {jobNoPref}.",
			$stats
		);

		return true;
	}

	private function getSourceLanguage( Title $translatablePageTitle ): string {
		$translatablePage = TranslatablePage::newFromTitle( $translatablePageTitle );
		return $translatablePage->getMessageGroup()->getSourceLanguage();
	}

	/** Returns translators who match the given language criteria. */
	private function fetchTranslators(
		array $selectedLanguages,
		string $sourceLanguage,
		LanguageSet $languageSet
	): IResultWrapper {
		$dbr = $this->connectionProvider->getReplicaDatabase();
		$queryBuilder = $dbr->newSelectQueryBuilder()
			->select( 'up_user' )
			->from( 'user_properties' )
			->where( $dbr->expr( 'up_property', IExpression::LIKE,
				new LikeValue( 'translationnotifications-lang-', $dbr->anyString() )
			) )
			->caller( __METHOD__ )
			->distinct();
		switch ( $languageSet->getOption() ) {
			case LanguageSet::ALL:
				$queryBuilder->andWhere( $dbr->expr( 'up_value', '!=', $sourceLanguage ) );
				break;
			case LanguageSet::SOME:
				$queryBuilder->andWhere( $dbr->expr( 'up_value', '=', $selectedLanguages ) );
				break;
			case LanguageSet::ALL_EXCEPT_SOME:
				$selectedLanguages[] = $sourceLanguage;
				$queryBuilder->andWhere( $dbr->expr( 'up_value', '!=', $selectedLanguages ) );
				break;
		}
		return $queryBuilder->fetchResultSet();
	}

	/** Return jobs for a user based on the user's preferences. */
	private function getJobsForUser(
		User $user,
		TranslationNotifyUser $notifyUser,
		string $currentWikiId,
		array &$usersWithEmptyWikiId
	): array {
		$jobs = [];

		// Email notification
		if ( $this->userOptionsManager->getOption( $user, 'translationnotifications-cmethod-email' ) ) {
			if ( $this->userOptionsManager->getOption( $user, 'disablemail' ) ) {
				// For some reason the user signed up to receive Translation Notifications emails,
				// but receiving email is disabled in the user's preferences.
				// To be on the safe side, disable the email contact method.
				$this->userOptionsManager->setOption( $user, 'translationnotifications-cmethod-email', false );
				$jobs[] = [ $currentWikiId, 'jobEmailDisabled', null ];
			} elseif ( $this->userOptionsManager->getOption( $user, 'translationnotifications-freq' ) === 'always' ) {
				// Check if user has email. Don't bother sending email if they don't have it configured
				if ( $user->canReceiveEmail() ) {
					$jobs[] = [
						$currentWikiId, 'jobEmail', $notifyUser->sendTranslationNotificationEmail( $user )
					];
				}
			}
		}

		// Talk page in current wiki
		if ( $this->userOptionsManager->getOption( $user, 'translationnotifications-cmethod-talkpage' ) ) {
			$jobs[] = [
				$currentWikiId,
				'jobTalkPage',
				$notifyUser->leaveUserMessage( $user, 'talkpageHere' )
			];
		}

		// Talk page in another wiki
		if ( $this->userOptionsManager->getOption( $user, 'translationnotifications-cmethod-talkpage-elsewhere' ) ) {
			$wiki = $this->userOptionsManager->getOption(
				$user,
				'translationnotifications-cmethod-talkpage-elsewhere-loc'
			) ?? '';

			// T342903: WikiId is sometimes empty for some users. Don't create jobs for these users.
			if ( $wiki === '' ) {
				$usersWithEmptyWikiId[] = $user->getId();
			} else {
				$jobs[] = [
					$wiki,
					'jobTalkPageOther',
					$notifyUser->leaveUserMessage( $user, 'talkpageInOtherWiki' )
				];
			}
		}

		return $jobs;
	}

	/** Add jobs for a user to the list of all jobs, also updates the stats. */
	private function addUserJobsToList( array $userJobs, array &$jobList, array &$stats ): void {
		if ( !count( $userJobs ) ) {
			$stats[ 'jobNoPref' ]++;
		}

		foreach ( $userJobs as $userJob ) {
			[ $wikiId, $jobType, $job ] = $userJob;
			$stats[ $jobType ]++;
			if ( $job === null ) {
				continue;
			}

			$jobList[ $wikiId ] ??= [];
			$jobList[ $wikiId ][] = $job;
		}
	}

	private function getCurrentTotalJobs( array $stats, bool $withSkipped = false ): int {
		$total = $stats[ 'jobTalkPageOther' ] + $stats[ 'jobTalkPage' ]
			+ $stats[ 'jobEmail' ];

		if ( $withSkipped ) {
			$total += $stats[ 'jobEmailDisabled' ] + $stats[ 'jobNoPref' ];
			$total += $stats[ 'unsubscribed' ];
		}

		return $total;
	}
}
