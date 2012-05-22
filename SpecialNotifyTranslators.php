<?php
/**
 * Form for translation managers to send a notification
 * to registered translators.
 *
 * @file
 * @author Amir E. Aharoni
 * @author Santhosh Thottingal
 * @copyright Copyright © 2012, Amir E. Aharoni, Santhosh Thottingal
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

/**
 * Form for translation managers to send a notification
 * to registered translators.
 *
 * @ingroup SpecialPage TranslateSpecialPage
 */

class SpecialNotifyTranslators extends SpecialPage {
	public static $right = 'translate-manage';
	private $notificationText = '';
	private $translatablePageTitle = '';
	private $deadlineDate = '';
	private $priority = '';

	public function __construct() {
		parent::__construct( 'NotifyTranslators' );
	}

	public function execute( $parameters ) {
		global $wgUser, $wgContLang, $wgLang;
		$this->setHeaders();

		if ( !$wgUser->isallowed( self::$right ) ) {
			throw new PermissionsError( self::$right );
		}

		$htmlFormDataModel = $this->getFormFields();
		$output = $this->getOutput();

		if ( !is_array( $htmlFormDataModel ) ) {
			$output->addWikiMsg( $htmlFormDataModel );
			return;
		}

		$context = $this->getContext();
		$htmlForm = new HtmlForm( $htmlFormDataModel, $context, 'translationnotifications' );
		$htmlForm->setId( 'notifytranslators-form' );
		$htmlForm->setSubmitText( $context->msg( 'translationnotifications-send-notification-button' )->text() );
		$htmlForm->setSubmitID( 'translationnotifications-send-notification-button' );
		$htmlForm->setSubmitCallback( array( $this, 'submitNotifyTranslatorsForm' ) );
		$htmlForm->prepareForm();
		$result = $htmlForm->tryAuthorizedSubmit();
		if ( $result === true || ( $result instanceof Status && $result->isGood() ) ) {
			$output->addWikiMsg( 'translationnotifications-submit-ok' );
		} else {
			$htmlForm->displayForm( $result );
		}

		// Dummy dropdown, will be invisible. Used as data source for language name autocompletion.
		$languageSelector = Xml::languageSelector( $wgContLang->getCode(), false, $wgLang->getCode() );
		$output->addHtml( $languageSelector[1] );

		$output->addModules( 'ext.translationnotifications.notifytranslators' );
	}

	/**
	 * Builds the form fields
	 *
	 * @return array or string with an error message key in case of error
	 */
	private function getFormFields() {

		// Translatable pages dropdown
		$translatablePages = MessageGroups::getGroupsByType( 'WikiPageMessageGroup' );

		$translatablePagesOptions = array();
		foreach ( $translatablePages as $page ) {
			if ( MessageGroups::getPriority( $page ) === 'discouraged' ) {
				continue;
			}
			$title = $page->getTitle();
			$translatablePagesOptions[$title->getPrefixedText()] = $title->getArticleID();
		}

		if ( !count( $translatablePagesOptions ) ) {
			return 'translationnotifications-error-no-translatable-pages';
		}

		$formFields = array();

		$formFields['TranslatablePage'] = array(
			'type' => 'select',
			'label-message' => array( 'translationnotifications-translatablepage-title' ),
			'options' => $translatablePagesOptions,
			'default' => 'unset',
		);

		// Languages to notify input box
		$formFields['LanguagesToNotify'] = array(
			'type' => 'text',
			'rows' => 20,
			'cols' => 80,
			'label-message' => 'translationnotifications-languages-to-notify-label',
			'help-message' => 'translationnotifications-languages-to-notify-label-help-message',
		);

		// Priotity dropdown
		$priorityOptions = array();
		$priorities = array( 'unset', 'high', 'medium', 'low' );

		foreach ( $priorities as $priority ) {
			$priorityMessage = wfMessage( "translationnotifications-priority-$priority" )->plain();
			$priorityOptions[$priorityMessage] = $priority;
		}

		$formFields['Priority'] = array(
			'type' => 'select',
			'label-message' => array( 'translationnotifications-priority' ),
			'options' => $priorityOptions,
			'default' => 'unset',
		);

		// Deadline date input box with datepicker
		$formFields['DeadlineDate'] = array(
			'type' => 'text',
			'size' => 20,
			'label-message' => 'translationnotifications-deadline-label',
		);

		// Custom text
		$formFields['NotificationText'] = array(
			'type' => 'textarea',
			'rows' => 20,
			'cols' => 80,
			'label-message' => 'emailmessage',
		);

		return $formFields;
	}

	/**
	 * Callback for the submit button.
	 *
	 * TODO: document
	 */
	public function submitNotifyTranslatorsForm( $formData, $form ) {
		global $wgUser, $wgLang;

		$this->translatablePageTitle = Title::newFromID( $formData['TranslatablePage'] );
		$this->notificationText = $formData['NotificationText'];
		$this->priority = $formData['Priority'];
		$this->deadlineDate = $formData['DeadlineDate'];
		$languagesToNotify = explode( ',', $formData['LanguagesToNotify'] );
		$languagesToNotify = array_filter( array_map( 'trim', $languagesToNotify ) );

		$langPropertyPrefix = 'translationnotifications-lang-';

		$dbr = wfGetDB( DB_SLAVE );
		$propertyLikePattern = $dbr->buildLike( $langPropertyPrefix, $dbr->anyString() );
		$translatorsConds = array(
			"up_property $propertyLikePattern",
		);

		// An empty string will be sent for all languages and the appropriate message
		// will be shown in the log.
		$languagesForLog = '';
		if ( count( $languagesToNotify ) ) {
			$translatorsConds['up_value'] = $languagesToNotify;
			$languagesForLog = $wgLang->commaList( $languagesToNotify );
		}

		$translators = $dbr->select(
			'user_properties',
			'up_user',
			$translatorsConds,
			__METHOD__,
			'DISTINCT'
		);

		$frequencies = array(
			'always' => 0,
			'week' => 604800, // seconds in week
			'month' => 2678400, // seconds in month
			'weekly' => 604800, // TODO, digest not implemented yet
			'monthly' => 2678400, // TODO, digest not implemented yet
		);
		$currentUnixTime = wfTimestamp();
		$currentDBTime = $dbr->timestamp( $currentUnixTime );

		$sentSuccess = 0;
		$sentFail = 0;
		$tooEarly = 0;
		$timestampOptionName = 'translationnotifications-timestamp';
		foreach ( $translators as $row ) {
			$user = User::newFromID( $row->up_user );
			$userTimestamp = $user->getOption( $timestampOptionName, null );
			$userUnixTimestamp = ( $userTimestamp == null )
				? wfTimestamp( TS_UNIX, '20120101000000' ) // An old timestamp
				: wfTimestamp( TS_UNIX, $userTimestamp );

			$timeSinceNotification = $currentUnixTime - $userUnixTimestamp;
			$userTranslationFrequency = $frequencies[$user->getOption( 'translationnotifications-freq' )];

			if ( $timeSinceNotification > $userTranslationFrequency ) {
				$status = true;
				if ( $user->getOption( 'translationnotifications-cmethod-email' ) ) {
					if ( $user->getOption( 'disablemail' ) ) {
						// For some reason the user signed up to receive
						// Translation Notifications emails, but receiving
						// email is disabled in the user's preferences.
						// To be on the safe side, disable the email
						// contact method.
						$user->setOption( 'translationnotifications-cmethod-email', false );
					} elseif ( $user->getOption( 'translationnotifications-freq' ) === 'always' ) {
						$status &= $this->sendTranslationNotificationEmail( $user );
					}
				}
				if ( $user->getOption( 'translationnotifications-cmethod-talkpage' ) ) {
					$status &= $this->leaveUserMessage( $user );
				}
				if ( $user->getOption( 'translationnotifications-cmethod-talkpage-elsewhere' ) ) {
					$status &= $this->leaveUserMessageInOtherWiki( $user );
				}

				if ( $status ) {
					$sentSuccess++;
					$user->setOption( $timestampOptionName, $currentDBTime );
				} else {
					$sentFail++;
				}

				$user->saveSettings();
			} else {
				$tooEarly++;
			}
		}

		$logger = new LogPage( 'notifytranslators' );
		$logParams = array(
			$languagesForLog,
			$this->deadlineDate,
			$this->priority,
			$sentSuccess,
			$sentFail,
			$tooEarly,
		);
		$logger->addEntry(
			'sent',
			$this->translatablePageTitle,
			'', // No comments
			$logParams,
			$wgUser
		);

		return true;
	}

	protected function getNotificationSubject( $userFirstLanguage ) {
		return wfMessage(
			'translationnotifications-email-subject',
			$this->translatablePageTitle->getText()
		)->inLanguage( $userFirstLanguage )->text();
	}

	protected function getUserFirstLanguage( $user ) {
		$languageCode = $user->getOption( 'translationnotifications-lang-1' );
		return $languageCode;
	}

	protected function getUserName( $user ) {
		$name = $user->getRealName();
		if ( $name  === '' ) {
			$name = $user->getName();
		}
		return $name;
	}

	protected function getPriorityClause() {
		if ( $this->priority === 'unset' ) {
			return '';
		}
		return wfMessage( 'translationnotifications-email-priority', $this->priority );
	}

	protected function getTranslationURL( $languageCode ) {
		$page = TranslatablePage::newFromTitle( $this->translatablePageTitle );
		$translationURL = SpecialPage::getTitleFor( 'Translate' )->getCanonicalUrl(
			array( 'group' => $page->getMessageGroupId(),
				'language' => $languageCode ) );
		return $translationURL;
	}

	protected function getDeadlineClause() {
		if ( $this->deadlineDate === '' ) {
			return '';
		}
		return wfMessage( 'translationnotifications-email-deadline',  $this->deadlineDate );
	}

	/**
	 * Notify a user by email.
	 * @param User to whom the mail to be sent
	 * @return boolean true if it was successful
	 */
	protected function sendTranslationNotificationEmail( User $user ) {
		global $wgUser, $wgNoReplyAddress;
		$languageCode = self::getUserFirstLanguage( $user );
		$userFirstLanguage = Language::factory( $languageCode );
		$languageName = $userFirstLanguage->fetchLanguageName( $languageCode );
		$emailSubject = self::getNotificationSubject( $userFirstLanguage );
		$emailBody = wfMessage(
			'translationnotifications-email-body',
			$this->getUserName( $user ),
			$languageName,
			$this->translatablePageTitle,
			$this->getTranslationURL( $languageCode ),
			$this->getPriorityClause(),
			$this->getDeadlineClause(),
			$this->notificationText
		)->inLanguage( $userFirstLanguage )->text();

		// Do not publish the sender's email, but include his/her name
		$emailFrom = new MailAddress( $wgNoReplyAddress, $wgUser->getName(), $wgUser->getRealName() );
		$emailTo = new MailAddress( $user );
		$params = array(
			'to' => $emailTo,
			'from' => $emailFrom,
			'body' =>  $emailBody,
			'subj' => $emailSubject,
			'replyto' => $emailFrom,
		);
		$job = new EmaillingJob( $this->translatablePageTitle, $params );
		return $job->insert();
	}

	/**
	 * A readable shortcut for $this->leaveUserMessage( $user, true ).
	 * @param User To whom the message to be sent
	 * @return boolean true if it was successful
	 */
	public function leaveUserMessageInOtherWiki( User $user ) {
		return $this->leaveUserMessage( $user, true );
	}

	/**
	 * Leave a message on the user's talk page.
	 * @param User To whom the message to be sent
	 * @param boolean Whether to send it to a talk page on this wiki or on another one.
	 * @return boolean true if it was successful
	 */
	public function leaveUserMessage( User $user, $inOtherWiki = false ) {
		global $wgUser;
		$targetUsername = $this->getUserName( $user );

		$languageCode = self::getUserFirstLanguage( $user );
		$userFirstLanguage = Language::factory( $languageCode );
		$languageName = $userFirstLanguage->fetchLanguageName( $languageCode );

		$text = wfMessage(
			'translationnotifications-talkpage-body',
			null, // $1 was used in the past and then removed.
			$targetUsername,
			$languageName,
			$this->translatablePageTitle,
			$this->getTranslationURL( $languageCode ),
			$this->getPriorityClause(),
			$this->getDeadlineClause(),
			$this->notificationText
		)->inLanguage( $userFirstLanguage )->text() . ', ~~~~~';

		$editSummary = wfMsgForContent( 'translationnotifications-edit-summary' );
		$params = array(
			'text' => $text,
			'editSummary' => $editSummary,
			'editor' => $wgUser->getId(),
		);

		if ( $inOtherWiki ) {
			$params['otherwiki'] = $user->getOption( 'translationnotifications-cmethod-talkpage-elsewhere-loc' );
		}

		$job = new TranslationNotificationJob( $user->getTalkPage(), $params );
		return $job->insert();
	}
}
