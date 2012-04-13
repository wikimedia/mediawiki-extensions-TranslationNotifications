<?php
/**
 * Script to send email notification to translators on regular intervals.
 *
 * @author Santhosh Thottingal
 * @copyright Copyright © 2012 Santhosh Thottingal
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 * @file
 */

// Standard boilerplate to define $IP
if ( getenv( 'MW_INSTALL_PATH' ) !== false ) {
	$IP = getenv( 'MW_INSTALL_PATH' );
} else {
	$dir = dirname( __FILE__ );
	$IP = "$dir/../../..";
}
require_once( "$IP/maintenance/Maintenance.php" );

class DigestEmailer extends Maintenance {
	public function __construct() {
		parent::__construct();
		$this->mDescription = 'Send email notification to translators on regular intervals.';
	}

	public function execute() {
		global  $wgNoReplyAddress;
		$this->lock();

		// Get the Translators with Weekly or Monthly notificaiton preferences.
		$translators = $this->getTranslators();
		if ( count( $translators ) === 0 ) {
			$this->output( "No translators with digest email option found\n" );
			// release the lock.
			$this->unlock();
			exit( 0 );
		}

		// Get the Notification from last 1 month.
		$notifications = $this->getNotifications();

		foreach ( $translators as $translator ) {
			$notificationText = "";
			$count = 0;
			$user = User::newFromID( $translator->up_user );
			$notificationFreq = $user->getOption( 'translationnotifications-freq' );

			$this->output( "Sending digest to: $user\n\tFrequency preference: $notificationFreq\n" );

			$firstLangCode = $user->getOption( 'translationnotifications-lang-1' );
			$firstLang = Language::factory( $firstLangCode )->fetchLanguageName( $firstLangCode );
			$this->output( "\tFirst language: " . $firstLangCode . " \n" );

			// Draft the mail for this user
			$digestMailSubject = wfMessage( 'translationnotifications-digestemail-subject' )->text();

			$offset = '';
			if ( $notificationFreq === 'weekly' ) {
				$offset = '-1 week';
			}
			if ( $notificationFreq === 'monthly' ) {
				$offset = '-1 month';
			}

			$startTimeStamp = strtotime( $offset );
			$lastSuccessfulrun = $user->getOption( 'translationnotifications-last-digest' );
			if ( $lastSuccessfulrun > $startTimeStamp ) {
				$startTimeStamp = $lastSuccessfulrun;
			}
			$this->output( "\tSending notification since " . date( 'D M j G:i:s T Y', $startTimeStamp ) . " \n" );
			foreach ( $notifications as $notification ) {
				$announcedate = strtotime( $notification['announcedate'] );

				if ( $announcedate < $startTimeStamp ) {
					// Older than last successful run.
					continue;
				}
				$page = TranslatablePage::newFromTitle( $notification['translatablepage'] );
				$translationURL = SpecialPage::getTitleFor( 'Translate' )->getCanonicalUrl(
					array( 'group' => $page->getMessageGroupId(),
						'language' => $firstLangCode ) );

				$notificationText .= wfMessage( 'translationnotifications-digestemail-notification-line',
							date( "Y-m-d", $announcedate ),
							$notification['announcer'],
							$notification['translatablepage'],
							$translationURL
							)->inLanguage( $firstLangCode ) ->text() . "\n";
				if ( $notification['priority'] !== 'unset' ) {
					$notificationText .= wfMessage( 'translationnotifications-email-priority', $notification['priority'] )->text() . "\n";
				}
				if ( $notification['deadline'] !== '' ) {
					$notificationText .= wfMessage( 'translationnotifications-email-deadline', $notification['deadline'] )->text() . "\n";
				}
				$notificationText .= "---------\n";
				$count++;
			}
			$this->output( "\t$count notifications to send.\n" );
			if ( $count === 0 ) {
				continue;
			}

			$signupURL = SpecialPage::getTitleFor( 'TranslatorSignup' )->getCanonicalUrl();
			$digestMailBody = wfMessage( 'translationnotifications-digestemail-body',
					$user,
					$firstLang,
					$count,
					$notificationText,
					$signupURL
					)->inLanguage( $firstLangCode )->text();

			$emailFrom = new MailAddress( $wgNoReplyAddress );
			$emailTo = new MailAddress( $user );
			$params = array(
				'to' => $emailTo,
				'from' => $emailFrom,
				'body' => $digestMailBody,
				'subj' => $digestMailSubject,
				'replyto' => $emailFrom,
			);
			$job = new EmaillingJob( null, $params );
			$job->insert();

			$user->setOption( 'translationnotifications-last-digest', wfTimestamp() );
			$user->saveSettings();
		}

		$this->unlock();
	}

	protected function sort( $notifications ) {
		foreach ( $notifications as $key => $row ) {
			$priority[$key] = $row['priority'];
			$announcedate[$key] = $row['announcedate'];
		}
		array_multisort( $priority, SORT_DESC, $announcedate, SORT_DESC, $notifications );
		return $notifications;
	}

	protected function lock() {
		// Lock this process to avoid multiple instances running and duplicate mails being sent.
		$cache = wfGetCache( CACHE_ANYTHING );
		$lockKey = wfMemcKey( 'translationnotifications-digestemailer-lock' );
		if ( $cache->get( $lockKey ) == true ) {
			$this->output( "Another process is running. Please try later\n" );
			exit( 1 );
		}
		$cache->set( $lockKey, true, 3600 ); // Expires in 1 hour.
	}

	protected function unlock() {
		$cache = wfGetCache( CACHE_ANYTHING );
		$lockKey = wfMemcKey( 'translationnotifications-digestemailer-lock' );
		// release the lock.
		$cache->delete( $lockKey );
	}

	protected function getTranslators() {
		$dbr = wfGetDB( DB_SLAVE );
		$translatorsConds = array( 'up_property' => 'translationnotifications-freq' );
		$translatorsConds += array( 'up_value' => 'weekly' );
		$translatorsConds += array( 'up_value' => 'monthly' );
		$translators = $dbr->select(
					'user_properties',
					'up_user',
					$translatorsConds,
					__METHOD__,
					'DISTINCT'
				);
		return $translators;
	}

	protected function getNotifications() {
		$dbr = wfGetDB( DB_SLAVE );
		$logEntrySelectQuery = DatabaseLogEntry::getSelectQueryData();
		$logFilter = array( 'log_type' => 'notifytranslators' );
		$lastMonthTimeStamp = $dbr->timestamp( strtotime( '-1 month' ) );
		$logFilter += array(
				"log_timestamp > $lastMonthTimeStamp",
			);
		$logEntrySelectQuery['conds'] = $logFilter;
		$logs = $dbr->select(
			$logEntrySelectQuery['tables'],
			$logEntrySelectQuery['fields'],
			$logEntrySelectQuery['conds'],
			__METHOD__,
			'DISTINCT',
			$logEntrySelectQuery['join_conds']
			);

		$notifications = array();
		foreach ( $logs as $row ) {
			$logEntry = DatabaseLogEntry::newFromRow( $row );
			$logParams = $logEntry->getParameters();
			if ( strtotime( $logParams[1] ) < time() ) {
				// Deadline already expired
				continue;
			}
			$notifications[] = array(
				'languages' => $logParams[0],
				'deadline' => $logParams[1],
				'priority' => $logParams[2],
				'announcedate' => wfTimestamp( TS_RFC2822, $logEntry->getTimestamp() ),
				'announcer' => $logEntry->getPerformer(),
				'translatablepage' => $logEntry->getTarget()
				);
		}
		return $this->sort( $notifications );
	}
}

$maintClass = 'DigestEmailer';
require_once( RUN_MAINTENANCE_IF_MAIN );
