<?php
/*
* @file
* @license GPL-2.0-or-later
*/

namespace MediaWiki\Extension\TranslationNotifications\Jobs;

use Exception;
use ManualLogEntry;
use MediaWiki\Extension\Translate\PageTranslation\TranslatablePage;
use MediaWiki\Extension\TranslationNotifications\Utilities\LanguageSet;
use MediaWiki\Extension\TranslationNotifications\Utilities\TranslationNotifyUser;
use MediaWiki\JobQueue\JobQueueGroupFactory;
use MediaWiki\Languages\LanguageFactory;
use MediaWiki\Languages\LanguageNameUtils;
use MediaWiki\MediaWikiServices;
use MediaWiki\Title\Title;
use MediaWiki\User\UserOptionsManager;
use MediaWiki\WikiMap\WikiMap;
use User;
use Wikimedia\Rdbms\IResultWrapper;

/**
 * Handles a notification request. Uses the TranslationNotifyUsers to create the necessary jobs
 * to deliver users messages based on their preferences.
 * @since 2019.11
 * @ingroup JobQueue
 */
class TranslationNotificationsSubmitJob extends GenericTranslationNotificationsJob {

	/**
	 * Id of the current wiki
	 * @var string
	 */
	private $currentWikiId;

	/**
	 * @var UserOptionsManager
	 */
	private $userOptionsManager;

	/**
	 * @var JobQueueGroupFactory
	 */
	private $jobQueueGroupFactory;

	/** @var LanguageNameUtils */
	private $languageNameUtils;

	/** @var LanguageFactory */
	private $languageFactory;

	/**
	 * Returns an instance of the TranslationNotificationsSubmitJob
	 * @param Title $title
	 * @param array $requestData
	 * @param int $notifierId
	 * @param string $translatorLang
	 * @return self
	 */
	public static function newJob(
		Title $title, $requestData, $notifierId, $translatorLang
	) {
		return new TranslationNotificationsSubmitJob(
			$title,
			[
				'requestData' => $requestData,
				'notifierId' => $notifierId,
				'translatorLanguage' => $translatorLang
			]
		);
	}

	public function __construct( $title, $params ) {
		$services = MediaWikiServices::getInstance();
		$this->userOptionsManager = $services->getUserOptionsManager();
		$this->jobQueueGroupFactory = $services->getJobQueueGroupFactory();
		$this->languageNameUtils = $services->getLanguageNameUtils();
		$this->languageFactory = $services->getLanguageFactory();
		parent::__construct( 'TranslationNotificationsSubmitJob', $title, $params );
		$this->currentWikiId = WikiMap::getCurrentWikiDbDomain()->getId();
	}

	/**
	 * Execute the job
	 * @return bool
	 */
	public function run() {
		$this->logInfo( 'Processing translation notification submit request.' );

		$params = $this->params;
		$translatableTitle = $this->title;
		$notifier = User::newFromId( $params['notifierId'] );
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
			'week' => 604800,  // seconds in week
			'month' => 2678400, // seconds in month
			'weekly' => 604800, // seconds in week
			'monthly' => 2678400, // seconds in month
		];
		$currentUnixTime = wfTimestamp();
		$currentDBTime = wfGetDB( DB_REPLICA )->timestamp( $currentUnixTime );

		$timestampOptionName = 'translationnotifications-timestamp';

		$config = MediaWikiServices::getInstance()->getMainConfig();

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
			$config->get( 'LocalInterwikis' ),
			$config->get( 'NoReplyAddress' ),
			$config->get( 'TranslationNotificationsAlwaysHttpsInEmail' ),
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
			'processedUsers' => 0
		];

		$usersWithEmptyWikiId = [];
		foreach ( $translatorsToNotify as $translator ) {
			$user = User::newFromID( $translator->up_user )->getInstanceForUpdate();

			$userTimestamp = $this->userOptionsManager->getOption(
				$user,
				$timestampOptionName,
				null
			);
			$userUnixTimestamp = ( $userTimestamp == null ) ?
				wfTimestamp( TS_UNIX, '20120101000000' ) : // An old timestamp
				wfTimestamp( TS_UNIX, $userTimestamp );

			$timeSinceNotification = (int)$currentUnixTime - (int)$userUnixTimestamp;
			$userTranslationFrequency =
				$frequencies[$this->userOptionsManager->getOption( $user, 'translationnotifications-freq' )];

			if ( $timeSinceNotification > $userTranslationFrequency ) {
				$this->logDebug( "Deciding notification to be sent to user: {$user->getId()}" );

				try {
					$userJobs = $this->getJobsForUser( $user, $notifyUser, $this->currentWikiId );
					$this->addUserJobsToList(
						$user, $userJobs, $jobsByTarget, $stats, $usersWithEmptyWikiId
					);

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
			$logParam = '';
			foreach ( $usersWithEmptyWikiId as $userId => $jobType ) {
				$logParam .= "$userId: $jobType;";
			}

			$this->logWarn(
				'Following notification jobs had an empty target wiki id: {param}',
				[ 'param' => $logParam ]
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
			'11:plain' => $languageSet->getOptionName()
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
			"Total: {jobTotal}, Total with skipped: {jobTotalWithSkipped}, Email: {jobEmail}, " .
			"Email disabled: {jobEmailDisabled}, Talk page: {jobTalkPage}, " .
			"Talk page other wiki: {jobTalkPageOther}, No preference: {jobNoPref}.",
			$stats
		);

		return true;
	}

	private function getSourceLanguage( Title $translatablePageTitle ) {
		$translatablePage = TranslatablePage::newFromTitle( $translatablePageTitle );
		return $translatablePage->getMessageGroup()->getSourceLanguage();
	}

	/**
	 * Returns translators who match the given language criteria.
	 * @param array $selectedLanguages
	 * @param string $sourceLanguage
	 * @param LanguageSet $languageSet
	 * @return IResultWrapper
	 */
	private function fetchTranslators( $selectedLanguages, $sourceLanguage, $languageSet ) {
		$langPropertyPrefix = 'translationnotifications-lang-';
		$dbr = MediaWikiServices::getInstance()->getDBLoadBalancer()->getConnection( DB_REPLICA );
		$propertyLikePattern = $dbr->buildLike( $langPropertyPrefix, $dbr->anyString() );
		$translatorsConditions = [
			"up_property $propertyLikePattern",
		];
		switch ( $languageSet->getOption() ) {
			case LanguageSet::ALL:
				$translatorsConditions[] = 'up_value <> ' . $dbr->addQuotes( $sourceLanguage );
				break;
			case LanguageSet::SOME:
				$translatorsConditions['up_value'] = $selectedLanguages;
				break;
			case LanguageSet::ALL_EXCEPT_SOME:
				$selectedLanguages[] = $sourceLanguage;
				$translatorsConditions[] = 'up_value NOT IN (' . $dbr->makeList( $selectedLanguages ) . ')';
				break;
		}
		return $dbr->newSelectQueryBuilder()
			->select( 'up_user' )
			->from( 'user_properties' )
			->where( $translatorsConditions )
			->caller( __METHOD__ )
			->distinct()
			->fetchResultSet();
	}

	/**
	 * Return jobs for a user based on the user's preferences.
	 * @param User $user
	 * @param TranslationNotifyUser $notifyUser
	 * @param string $currentWikiId
	 * @return array
	 */
	private function getJobsForUser(
		User $user, TranslationNotifyUser $notifyUser, string $currentWikiId
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
			);
			$jobs[] = [
				$wiki,
				'jobTalkPageOther',
				$notifyUser->leaveUserMessage( $user, 'talkpageInOtherWiki' )
			];
		}

		return $jobs;
	}

	/**
	 * Add jobs for a user to the list of all jobs, also updates the stats.
	 * @param User $user
	 * @param array $userJobs
	 * @param array &$jobList
	 * @param array &$stats
	 * @param array &$usersWithEmptyWikiId
	 * @return void
	 */
	private function addUserJobsToList(
		User $user,
		array $userJobs,
		array &$jobList,
		array &$stats,
		array &$usersWithEmptyWikiId
	): void {
		if ( !count( $userJobs ) ) {
			$stats[ 'jobNoPref' ]++;
		}

		foreach ( $userJobs as $userJob ) {
			[ $wikiId, $jobType, $job ] = $userJob;
			$stats[ $jobType ]++;
			if ( $job === null ) {
				continue;
			}

			if ( !isset( $jobList[ $wikiId ] ) ) {
				// T342903: WikiId is sometimes empty. Don't add them to the job queue.
				if ( $wikiId === '' ) {
					$usersWithEmptyWikiId[ $user->getId() ] = $jobType;
					continue;
				}
				$jobList[ $wikiId ] = [];
			}

			$jobList[ $wikiId ][] = $job;
		}
	}

	private function getCurrentTotalJobs( array $stats, bool $withSkipped = false ): int {
		$total = $stats[ 'jobTalkPageOther' ] + $stats[ 'jobTalkPage' ]
			+ $stats[ 'jobEmail' ];

		if ( $withSkipped ) {
			$total += $stats[ 'jobEmailDisabled' ] + $stats[ 'jobNoPref' ];
		}

		return $total;
	}
}
