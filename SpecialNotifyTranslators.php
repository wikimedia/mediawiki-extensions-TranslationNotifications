<?php
/**
 * Form for translation managers to send a notification
 * to registered translators.
 *
 * @file
 * @author Amir E. Aharoni
 * @copyright Copyright © 2012, Amir E. Aharoni
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
		global $wgUser, $wgOut, $wgContLang, $wgLang;
		$this->setHeaders();

		if ( !$wgUser->isallowed( self::$right ) ) {
			throw new PermissionsError( self::$right );
		}

		$htmlFormDataModel = $this->getFormFields();

		if ( !is_array( $htmlFormDataModel ) ) {
			$wgOut->addWikiMsg( $htmlFormDataModel );
			return;
		}

		$context = $this->getContext();
		$htmlForm = new HtmlForm( $this->getFormFields(), $context, 'translationnotifications' );
		$htmlForm->setId( 'notifytranslators-form' );
		$htmlForm->setSubmitText( $context->msg( 'translationnotifications-send-notification-button' )->text() );
		$htmlForm->setSubmitID( 'translationnotifications-send-notification-button' );
		$htmlForm->setSubmitCallback( array( $this, 'submitNotifyTranslatorsForm' ) );
		$htmlForm->show();

		// Dummy dropdown, will be invisible. Used as data source for language name autocompletion.
		$languageSelector = Xml::languageSelector( $wgContLang->getCode(), false, $wgLang->getCode() );
		$wgOut->addHtml( $languageSelector[1] );

		$wgOut->addModules( 'ext.translationnotifications.notifytranslators' );
	}

	/**
	 * Builds the form fields
	 *
	 * @return array or string with an error message key in case of error
	 */
	private function getFormFields() {

		// Translatable pages dropdown
		$translatablePagesIDs = TranslatablePage::getTranslatablePages();
		if ( !count ( $translatablePagesIDs ) ) {
			return 'translationnotifications-error-no-translatable-pages';
		}

		$translatablePagesOptions = array();
		foreach ( $translatablePagesIDs as $translatablePagesID ) {
			$translatablePagesOptions[Title::newFromID( $translatablePagesID )->getText()] = $translatablePagesID;
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
		$languagesForLog = '';
		if ( count( $languagesToNotify ) ) {
			$translatorsConds += array( 'up_value' => $languagesToNotify );
			$languagesForLog = $wgLang->commaList( $languagesToNotify );
		} else {
			$languagesForLog = wfMessage( 'translationnotifications-log-alllanguages' )->text();
		}

		$translators = $dbr->select(
			'user_properties',
			'up_user',
			$translatorsConds,
			__METHOD__,
			'DISTINCT'
		);

		$sentSuccess = 0;
		$sentFail = 0;
		foreach ( $translators as $row ) {
			$user = User::newFromID( $row->up_user );
			$status = true;
			if ( $user->getOption( 'translationnotifications-cmethod-email' ) ) {
				$status &= self::sendTranslationNotificationEmail( $user );
			}
			if ( $user->getOption( 'translationnotifications-cmethod-talkpage' ) ) {
				$status &= self::leaveUserMessage( $user );
			}
			if ( $status ) {
				$sentSuccess++;
			} else {
				$sentFail++;
			}
		}

		$logger = new LogPage( 'notifytranslators' );
		$logParams = array(
			$languagesForLog,
			$this->deadlineDate,
			$this->priority,
			$sentSuccess,
			$sentFail,
		);
		$logger->addEntry(
			'sent',
			$this->translatablePageTitle,
			'', // No comments
			$logParams,
			$wgUser
		);

	}

	protected function getNotificationSubject( $userFirstLanguage ) {
		return wfMessage(
			'translationnotifications-email-subject',
			$this->translatablePageTitle->getText()
		)->inLanguage( $userFirstLanguage )->text();
	}

	protected function getUserFirstLanguage( $user ) {
		$dbr = wfGetDB( DB_SLAVE );
		$userFirstLanguageRow = $dbr->select(
			'user_properties',
			'up_value',
			array(
				'up_user' => $user->getId(),
				'up_property' => 'translationnotifications-lang-1'
			),
			__METHOD__
		)->fetchRow();
		$languageCode = $userFirstLanguageRow['up_value'];
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
		global $wgUser;
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

		$emailFrom = new MailAddress( $wgUser );
		$emailTo = new MailAddress( $user );

		$status = UserMailer::send( $emailTo, $emailFrom, $emailSubject, $emailBody );
		return $status->isGood();
	}

	/**
	 * Leave a user a message
	 * @return boolean true if it was successful
	 */
	public function leaveUserMessage( User $user ) {
		$talk = $user->getTalkPage();
		$talkPage = new Article( $talk, 0 );
		$languageCode = self::getUserFirstLanguage( $user );
		$userFirstLanguage = Language::factory( $languageCode );
		$languageName = $userFirstLanguage->fetchLanguageName( $languageCode );
		$text = wfMessage(
			'translationnotifications-talkpage-body',
			$this->getNotificationSubject( $userFirstLanguage ),
			$this->getUserName( $user ),
			$languageName,
			$this->translatablePageTitle,
			$this->getTranslationURL( $languageCode ),
			$this->getPriorityClause(),
			$this->getDeadlineClause(),
			$this->notificationText
		)->inLanguage( $userFirstLanguage )->text();

		$editSummary = wfMsgForContent( 'translationnotifications-edit-summary' );
		$params = array(
			'text' => $text,
			'editSummary' => $editSummary,
			);

		$job = new TranslationNotificationJob( $talkPage->getTitle(), $params );
		return $job->insert();
	}
}

