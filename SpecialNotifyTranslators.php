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
	public static $notificationText = '';
	public static $translatablePageTitle = '';
	public static $deadlineDate = '';
	public static $priority = '';

	public function __construct() {
		parent::__construct( 'NotifyTranslators' );
	}

	public function execute( $parameters ) {
		global $wgUser, $wgOut;
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
			'required' => true,
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
		global $wgUser;

		self::$translatablePageTitle = Title::newFromID( $formData['TranslatablePage'] )->getText();
		self::$notificationText = $formData['NotificationText'];
		self::$priority = $formData['Priority'];
		self::$deadlineDate = $formData['DeadlineDate'];

		$languagesToNotify = explode( ',', $formData['LanguagesToNotify'] );
		$langPropertyPrefix = 'translationnotifications-lang-';

		$dbr = wfGetDB( DB_SLAVE );
		$propertyLikePattern = $dbr->buildLike( $langPropertyPrefix, $dbr->anyString() );
		$translators = $dbr->select(
			'user_properties',
			'up_user',
			array(
				"up_property $propertyLikePattern",
				'up_value' => $languagesToNotify,
			),
			__METHOD__,
			'DISTINCT'
		);

		$sentSuccess = 0;
		$sentFail = 0;
		foreach ( $translators as $row ) {
			$status = $this->sendTranslationNotificationEmail( $row->up_user );
			if ( $status->isGood() ) {
				$sentSuccess++;
			} else {
				$sentFail++;
			}
		}

		$logger = new LogPage( 'notifytranslators' );
		$logParams = array(
			$formData['LanguagesToNotify'],
			$sentSuccess,
			$sentFail,
		);
		$logger->addEntry(
			'sent',
			Title::newFromText( self::$translatablePageTitle ),
			'', // No comments
			$logParams,
			$wgUser
		);

		self::$translatablePageTitle = '';
		self::$notificationText = '';
		self::$deadlineDate = '';
		self::$priority = '';
	}

	private function sendTranslationNotificationEmail( $userID ) {
		$user = User::newFromID( $userID );

		$dbr = wfGetDB( DB_SLAVE );
		$userFirstLanguageRow = $dbr->select(
			'user_properties',
			'up_value',
			array(
				'up_user' => $userID,
				'up_property' => 'translationnotifications-lang-1'
			),
			__METHOD__
		)->fetchRow();
		$languageCode = $userFirstLanguageRow['up_value'];
		$userFirstLanguage = Language::factory( $languageCode );

		$emailSubject = wfMessage(
			'translationnotifications-email-subject',
			self::$translatablePageTitle
		)->inLanguage( $userFirstLanguage )->text();

		$userName = $user->getRealName();
		if ( $userName === '' ) {
			$userName = $user->getName();
		}
		$languageName = $userFirstLanguage->fetchLanguageName( $languageCode );
		$priorityClause = ( self::$priority === 'unset' )
			? ''
			: wfMessage( 'translationnotifications-email-priority', self::$priority );
		$deadlineClause = ( self::$deadlineDate === '' )
			? ''
			: wfMessage( 'translationnotifications-email-deadline', self::$deadlineDate );
		// XXX
		$translationURL = 'title=Special:Translate&taction=translate&group=page-' . self::$translatablePageTitle
			. '&language=' . $languageCode
			. '&task=view';

		$emailBody = wfMessage(
			'translationnotifications-email-body',
			$userName,
			$languageName,
			self::$translatablePageTitle,
			$translationURL,
			$priorityClause,
			$deadlineClause,
			self::$notificationText
		)->inLanguage( $userFirstLanguage )->text();

		global $wgUser;
		$emailFrom = new MailAddress( $wgUser );
		$emailTo = new MailAddress( $user );

		return UserMailer::send( $emailTo, $emailFrom, $emailSubject, $emailBody );
	}
}

