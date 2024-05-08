<?php
/**
 * Script to send email notification to translators on regular intervals.
 *
 * @author Santhosh Thottingal
 * @copyright Copyright © 2012 Santhosh Thottingal
 * @license GPL-2.0-or-later
 * @file
 */

namespace MediaWiki\Extension\TranslationNotifications\Scripts;

// Standard boilerplate to define $IP
if ( getenv( 'MW_INSTALL_PATH' ) !== false ) {
	$IP = getenv( 'MW_INSTALL_PATH' );
} else {
	$IP = __DIR__ . "/../../..";
}
require_once "$IP/maintenance/Maintenance.php";

use DatabaseLogEntry;
use Maintenance;
use MediaWiki\Extension\Translate\PageTranslation\TranslatablePage;
use MediaWiki\Extension\TranslationNotifications\Jobs\TranslationNotificationsEmailJob;
use MediaWiki\MediaWikiServices;
use MediaWiki\SpecialPage\SpecialPage;
use MediaWiki\Title\Title;
use MediaWiki\User\User;

class DigestEmailer extends Maintenance {
	public function __construct() {
		parent::__construct();
		$this->addDescription( 'Send email notification to translators on regular intervals.' );
		$this->requireExtension( 'TranslationNotifications' );
	}

	public function execute(): void {
		$this->lock();

		// Get the Translators with weekly or monthly notification preferences.
		$translators = $this->getTranslators();
		if ( count( $translators ) === 0 ) {
			$this->output( "No translators with digest email option found\n" );
			// release the lock.
			$this->unlock();
			exit( 0 );
		}
		// Get the Notification from last 1 month.
		$notifications = $this->getNotifications();
		// Send the mails
		$this->sendEmails( $translators, $notifications );
		// unlock the process
		$this->unlock();
	}

	public function sendEmails( array $translators, array $notifications ): array {
		$config = $this->getConfig();
		// Initialize early to avoid calling these repeatedly within the loop
		$noReplyAddress = $config->get( 'NoReplyAddress' );
		$urlType = $config->get( 'TranslationNotificationsAlwaysHttpsInEmail' ) === false
			? PROTO_CANONICAL
			: PROTO_HTTPS;

		$mailstatus = [];
		$services = MediaWikiServices::getInstance();
		$userOptionsManager = $services->getUserOptionsManager();
		$jobQueueGroup = $services->getJobQueueGroup();
		$languageNameUtils = $services->getLanguageNameUtils();
		foreach ( $translators as $translator ) {
			$notificationText = "";
			$count = 0;
			$mailstatus[$translator] = $count;
			$user = User::newFromId( $translator );
			$notificationFreq = $userOptionsManager->getOption( $user, 'translationnotifications-freq' );

			if ( $notificationFreq === null ) {
				continue;
			}

			$userName = $user->getName();
			$this->output( "Sending digest to: $userName\n\t" .
				"Frequency preference: $notificationFreq\n" );

			if ( !$user->canReceiveEmail() ) {
				$this->output( "\tEmail cannot be sent to this user. Skipping...\n" );
				continue;
			}

			$signedUpLangCodes = [];
			foreach ( range( 1, 3 ) as $langNum ) {
				$langCode = $userOptionsManager->getOption( $user, "translationnotifications-lang-$langNum" );
				if ( $langCode ) {
					$signedUpLangCodes[] =
						$userOptionsManager->getOption( $user, "translationnotifications-lang-$langNum" );
				}
			}
			$firstLangCode = $userOptionsManager->getOption( $user, 'translationnotifications-lang-1' );
			$firstLang = $languageNameUtils->getLanguageName( $signedUpLangCodes[0], $firstLangCode );
			$this->output( "\tSigned up for: " . implode( ', ', $signedUpLangCodes ) . "\n" );

			// Draft the mail for this user
			$digestMailSubject = wfMessage( 'translationnotifications-digestemail-subject' )
				->text();

			$offset = '';

			if ( $notificationFreq === 'weekly' ) {
				$offset = '-1 week';
			}

			if ( $notificationFreq === 'monthly' ) {
				$offset = '-1 month';
			}

			$startTimeStamp = strtotime( $offset );
			$lastSuccessfulrun = $userOptionsManager->getOption( $user, 'translationnotifications-last-digest' );
			if ( $lastSuccessfulrun > $startTimeStamp ) {
				$this->output( "\tNot sending notifications, Last notification time: " .
					date( 'D M j G:i:s T Y', $lastSuccessfulrun ) . " \n" );
				continue;
			}
			$this->output( "\tSending notification since " .
				date( 'D M j G:i:s T Y', $startTimeStamp ) . " \n" );

			foreach ( $notifications as $notification ) {
				$announcedate = strtotime( $notification['announcedate'] );

				if ( $announcedate < $startTimeStamp ) {
					// Older than last successful run.
					continue;
				}
				$deadline = strtotime( $notification['deadline'] );
				if ( $deadline && $deadline < time() ) {
					// Deadline expired
					continue;
				}
				// Send the notification only if the languages to notify match with
				// translators language preference.
				if ( $notification['languages'] !== '' ) {
					$languagesToNotify = explode( ',', $notification['languages'] );
					$languagesToNotify = array_flip( array_filter( array_map( 'trim', $languagesToNotify ) ) );
					if ( !( isset( $languagesToNotify[$signedUpLangCodes[0]] )
						|| ( isset( $signedUpLangCodes[1] ) && isset( $languagesToNotify[$signedUpLangCodes[1]] ) )
						|| ( isset( $signedUpLangCodes[2] ) && isset( $languagesToNotify[$signedUpLangCodes[2]] ) ) )
					) {
						continue;
					}
				}

				$page = TranslatablePage::newFromTitle( $notification['translatablepage'] );
				$translationURL = SpecialPage::getTitleFor( 'Translate' )->getFullURL(
					[
						'group' => $page->getMessageGroupId(),
						'language' => $firstLangCode,
						'action' => 'page'
					],
					false,
					$urlType
				);

				$notificationText .= wfMessage(
					'translationnotifications-digestemail-notification-line',
					date( "Y-m-d", $announcedate ),
					$notification['announcer'],
					$notification['translatablepage'],
					$translationURL
				)->inLanguage( $firstLangCode )->text() . "\n";

				if ( $notification['priority'] !== 'unset' ) {
					$notificationText .= wfMessage(
						'translationnotifications-email-priority',
						$notification['priority']
					)->text() . "\n";
				}

				if ( $notification['deadline'] !== '' ) {
					$notificationText .= wfMessage(
						'translationnotifications-email-deadline',
						$notification['deadline']
					)->text() . "\n";
				}

				$notificationText .= "---------\n";
				$count++;
			}

			$this->output( "\t$count notifications to send.\n" );
			$mailstatus[$translator] = $count;

			if ( $count === 0 ) {
				// No notifications to send.
				continue;
			}

			$signupURL = SpecialPage::getTitleFor( 'TranslatorSignup' )->getFullURL(
				'',
				false,
				$urlType
			);

			$digestMailBody = wfMessage( 'translationnotifications-digestemail-body',
				$userName,
				$firstLang,
				$count,
				$notificationText,
				$signupURL
			)->inLanguage( $firstLangCode )->text();

			$job = $this->getEmailJob( $user, $noReplyAddress, $digestMailBody, $digestMailSubject );
			$jobQueueGroup->push( $job );

			$userOptionsManager->setOption( $user, 'translationnotifications-last-digest', wfTimestamp() );
			$userOptionsManager->saveOptions( $user );
		}

		return $mailstatus;
	}

	protected function sort( array $notifications ): array {
		$prioritySet = [
			'unset' => 0,
			'low' => 1,
			'medium' => 2,
			'high' => 3
		];
		foreach ( $notifications as $key => $row ) {
			$priority[$key] = $prioritySet[$row['priority']];
			$announcedate[$key] = $row['announcedate'];
		}
		if ( count( $notifications ) > 0 ) {
			array_multisort( $priority, SORT_DESC, $announcedate, SORT_DESC, $notifications );
		}

		return $notifications;
	}

	protected function lock(): void {
		// Lock this process to avoid multiple instances running and duplicate mails being sent.
		$cache = MediaWikiServices::getInstance()->getObjectCacheFactory()->getInstance( CACHE_ANYTHING );
		$lockKey = $cache->makeKey( 'translationnotifications-digestemailer-lock' );
		if ( $cache->get( $lockKey ) == true ) {
			$this->output( "Another process is running. Please try later\n" );
			exit( 1 );
		}
		$cache->set( $lockKey, true, 3600 ); // Expires in 1 hour.
	}

	protected function unlock(): void {
		$cache = MediaWikiServices::getInstance()->getObjectCacheFactory()->getInstance( CACHE_ANYTHING );
		$lockKey = $cache->makeKey( 'translationnotifications-digestemailer-lock' );
		// release the lock.
		$cache->delete( $lockKey );
	}

	protected function getTranslators(): array {
		$dbr = MediaWikiServices::getInstance()->getConnectionProvider()->getReplicaDatabase();
		return $dbr->newSelectQueryBuilder()
			->select( 'up_user' )
			->distinct()
			->from( 'user_properties' )
			->where( [
				'up_property' => 'translationnotifications-freq',
				'up_value' => [ 'weekly', 'monthly' ],
			] )
			->caller( __METHOD__ )
			->fetchFieldValues();
	}

	/**
	 * Get the notifications from last one month (monthly is the largest digest frequency)
	 * Sort the notification in the descending order of announcement date, and remove
	 * the older announcements about the pages. Also remove notifications with expired
	 * deadline.
	 * @return array of notifications
	 */
	private function getNotifications(): array {
		$dbr = MediaWikiServices::getInstance()->getConnectionProvider()->getReplicaDatabase();
		$logEntrySelectQuery = DatabaseLogEntry::newSelectQueryBuilder( $dbr );
		$lastMonthTimeStamp = $dbr->timestamp( strtotime( '-1 month' ) );

		$logs = $logEntrySelectQuery
			->where( [ 'log_type' => 'notifytranslators' ] )
			->andWhere( $dbr->expr( 'log_timestamp', '>', $lastMonthTimeStamp ) )
			->orderBy( 'log_timestamp DESC' )
			->caller( __METHOD__ )
			->fetchResultSet();

		$notifications = [];
		foreach ( $logs as $row ) {
			$logEntry = DatabaseLogEntry::newFromRow( $row );
			// Refer to TranslationNotificationsSubmitJob for parameter names.
			// Old log entries used to have numeric keys, but since we only look back one month,
			// we do not need to be able to handle them.
			$logParams = $logEntry->getParameters();
			if ( $logParams['5::deadlineDate'] && strtotime( $logParams['5::deadlineDate'] ) < time() ) {
				// Deadline already expired
				continue;
			}
			$translatablePage = $logEntry->getTarget()->getPrefixedText();
			if ( isset( $notifications[$translatablePage] ) ) {
				// An older notification about the same page.
				continue;
			}

			$notifications[$translatablePage] = [
				'languages' => $logParams['4::languagesForLog'],
				'deadline' => $logParams['5::deadlineDate'],
				'priority' => $logParams['6::priority'],
				'announcedate' => wfTimestamp( TS_RFC2822, $logEntry->getTimestamp() ),
				'announcer' => $logEntry->getPerformerIdentity(),
				'translatablepage' => $logEntry->getTarget()
			];
		}

		return $this->sort( $notifications );
	}

	private function getEmailJob(
		User $translator,
		string $noReplyAddress,
		string $emailBody,
		string $emailSubject
	): TranslationNotificationsEmailJob {
		$emailFrom = TranslationNotificationsEmailJob::buildAddress( $noReplyAddress, 'NoReply', '' );
		return new TranslationNotificationsEmailJob(
			Title::newMainPage(),
			[
				'to' => TranslationNotificationsEmailJob::addressFromUser( $translator ),
				'from' => $emailFrom,
				'body' => $emailBody,
				'subject' => $emailSubject,
				'replyTo' => $emailFrom,
			]
		);
	}
}

$maintClass = DigestEmailer::class;
require_once RUN_MAINTENANCE_IF_MAIN;
