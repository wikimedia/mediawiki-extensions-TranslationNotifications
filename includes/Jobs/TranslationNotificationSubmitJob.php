<?php
/*
* @file
* @license GPL-2.0-or-later
*/

use MediaWiki\MediaWikiServices;

/**
 * Handles a notification request. Uses the TranslationNotifyUsers to create the necessary jobs
 * to deliver users messages based on their preferences.
 * @since 2019.11
 * @ingroup JobQueue
 */
class TranslationNotificationSubmitJob extends GenericTranslationNotificationJob {

	/**
	 * Id of the current wiki
	 * @var string
	 */
	private $currentWikiId;

	/**
	 * Returns an instance of the TranslationNotificationSubmitJob
	 * @param Title $title
	 * @param array $requestData
	 * @param string $notifierId
	 * @param string $translatorLang
	 * @return self
	 */
	public static function newJob(
		Title $title, $requestData, $notifierId, $translatorLang
	) {
		// TODO: Check if we should pass only the configuration options needed instead.
		return new TranslationNotificationSubmitJob(
			$title,
			[
				'requestData' => $requestData,
				'notifierId' => $notifierId,
				'translatorLanguage' => $translatorLang
			]
		);
	}

	public function __construct( $title, $params ) {
		parent::__construct( __CLASS__, $title, $params );

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
		$languagesToNotify = $params['requestData']['languagesToNotify'];
		$deadlineDate = $params['requestData']['deadlineDate'];

		$translatorsToNotify = $this->fetchTranslators( $languagesToNotify, $sourceLanguage );

		$this->logInfo(
			'Found ' . $translatorsToNotify->numRows() .
			' translators to notify with the given conditions.',
			[
				'languagesToNotify' => $languagesToNotify
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

		$count = 0;
		$tooEarly = 0;
		$sentFailed = 0;
		$timestampOptionName = 'translationnotifications-timestamp';
		$jobsByTarget = [];

		// Set the jobs array for this wiki
		$jobsByTarget[$this->currentWikiId] = [];

		$config = MediaWikiServices::getInstance()->getMainConfig();

		$notifyUser = new TranslationNotifyUser(
			$translatableTitle,
			$notifier,
			$config->get( 'LocalInterwikis' ),
			$config->get( 'NoReplyAddress' ),
			$config->get( 'TranslationNotificationsAlwaysHttpsInEmail' ),
			$sourceLanguage,
			[
				'text' => $notificationText,
				'priority' => $priority,
				'deadline' => $deadlineDate,
				'languagesToNotify' => $languagesToNotify
			]
		);

		$this->logInfo( 'Starting notification job creation for translators...' );

		foreach ( $translatorsToNotify as $translator ) {
			$user = User::newFromID( $translator->up_user )->getInstanceForUpdate();

			$userTimestamp = $user->getOption( $timestampOptionName, null );
			$userUnixTimestamp = ( $userTimestamp == null ) ?
				wfTimestamp( TS_UNIX, '20120101000000' ) : // An old timestamp
				wfTimestamp( TS_UNIX, $userTimestamp );

			$timeSinceNotification = $currentUnixTime - $userUnixTimestamp;
			$userTranslationFrequency =
				$frequencies[$user->getOption( 'translationnotifications-freq' )];

			if ( $timeSinceNotification > $userTranslationFrequency ) {
				$this->logDebug( "Deciding notification to be sent to user: {$user->getId()}" );

				try {
					$this->addJobsBasedOnUserPref( $user, $notifyUser, $jobsByTarget );
					$user->setOption( $timestampOptionName, $currentDBTime );
					$user->saveSettings();
					++$count;
				} catch ( Exception $e ) {
					++$sentFailed;
					$this->logError(
						"Error while generating notification for user - {$user->getId()}.\n Exception: {$e}."
					);
				}
			} else {
				$this->logDebug( "Skipping sending of notification to user: {$user->getId()}" );
				$tooEarly++;
			}

			$this->logDebug( "Finished processing user: {$user->getId()}." );
		}

		foreach ( $jobsByTarget as $wiki => $jobs ) {
			$this->logInfo( "Wiki: $wiki, Jobs: " . count( $jobs ) );
			JobQueueGroup::singleton( $wiki )->push( $jobs );
		}

		// Add a log entry
		$languagesForLog = '';
		if ( count( $languagesToNotify ) ) {
			$languagesForLog = Language::factory( $translatorLangCode )->commaList( $languagesToNotify );
		}

		$logEntry = new ManualLogEntry( 'notifytranslators', 'sent' );
		$logEntry->setPerformer( $notifier );
		$logEntry->setTarget( $translatableTitle );
		$logEntry->setParameters( [
			'4::languagesForLog' => $languagesForLog,
			'5::deadlineDate' => $deadlineDate,
			'6::priority' => $priority,
			'7::sentSuccess' => $count,
			'8::sentFail' => $sentFailed,
			'9::tooEarly' => $tooEarly,
		] );

		$logId = $logEntry->insert();
		$logEntry->publish( $logId );

		$this->logInfo( 'Finished translation notification submit request processing.' );
		return true;
	}

	private function getSourceLanguage( Title $translatablePageTitle ) {
		$translatablePage = TranslatablePage::newFromTitle( $translatablePageTitle );
		return $translatablePage->getMessageGroup()->getSourceLanguage();
	}

	/**
	 * Returns translators who match the given language criteria.
	 * @param array $languagesToNotify
	 * @param string $sourceLanguage
	 * @return Wikimedia\Rdbms\IResultWrapper
	 */
	private function fetchTranslators( $languagesToNotify, $sourceLanguage ) {
		$langPropertyPrefix = 'translationnotifications-lang-';

		$dbr = wfGetDB( DB_REPLICA );
		$propertyLikePattern = $dbr->buildLike( $langPropertyPrefix, $dbr->anyString() );
		$translatorsConditions = [
			"up_property $propertyLikePattern",
		];

		if ( count( $languagesToNotify ) ) {
			$translatorsConditions['up_value'] = $languagesToNotify;
		} else {
			$translatorsConditions[] = "up_value <> '$sourceLanguage'";
		}

		$dbr = wfGetDB( DB_REPLICA );
		$translatorsToNotify = $dbr->select(
			'user_properties',
			'up_user',
			$translatorsConditions,
			__METHOD__,
			'DISTINCT'
		);

		return $translatorsToNotify;
	}

	/**
	 * Adds jobs to passed array based on the user's preference
	 * @param User $user
	 * @param TranslationNotifyUser $notifyUser
	 * @param array $jobsByTarget
	 */
	private function addJobsBasedOnUserPref(
		User $user, TranslationNotifyUser $notifyUser, array &$jobsByTarget
	) {
		// Email notification
		if ( $user->getOption( 'translationnotifications-cmethod-email' ) ) {
			if ( $user->getOption( 'disablemail' ) ) {
				// For some reason the user signed up to receive Translation Notifications emails,
				// but receiving email is disabled in the user's preferences.
				// To be on the safe side, disable the email contact method.
				$user->setOption( 'translationnotifications-cmethod-email', false );
			} elseif ( $user->getOption( 'translationnotifications-freq' ) === 'always' ) {
				$jobsByTarget[$this->currentWikiId][] =
					$notifyUser->sendTranslationNotificationEmail( $user );
			}
		}

		// Talk page in current wiki
		if ( $user->getOption( 'translationnotifications-cmethod-talkpage' ) ) {
			$jobsByTarget[$this->currentWikiId][] = $notifyUser->leaveUserMessage(
				$user,
				'talkpageHere'
			);
		}

		// Talk page in another wiki
		if ( $user->getOption( 'translationnotifications-cmethod-talkpage-elsewhere' ) ) {
			$wiki =
				$user->getOption( 'translationnotifications-cmethod-talkpage-elsewhere-loc' );
			if ( !isset( $jobsByTarget[$wiki] ) ) {
				$jobsByTarget[$wiki] = [];
			}

			$jobsByTarget[$wiki][] = $notifyUser->leaveUserMessage(
				$user,
				'talkpageInOtherWiki'
			);
		}
	}
}
