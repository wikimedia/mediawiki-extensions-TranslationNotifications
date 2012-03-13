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
	protected static $right = 'translate-manage';

	public function __construct() {
		parent::__construct( 'NotifyTranslators' );
	}

	public function execute( $parameters ) {
		global $wgUser, $wgOut;
		$this->setHeaders();

		if ( !$wgUser->isallowed( self::$right ) ) {
			throw new PermissionsError( self::$right );
		}

		$htmlFormDataModel = $this->getDataModel();

		if ( !is_array( $htmlFormDataModel ) ) {
			$wgOut->addWikiMsg( $htmlFormDataModel );
			return;
		}

		$context = $this->getContext();
		$htmlForm = new HtmlForm( $this->getDataModel(), $context, 'translationnotifications' );
		$htmlForm->setId( 'notifytranslators-form' );
		$htmlForm->setSubmitText( $context->msg( 'translationnotifications-send-notification-button' )->text() );
		$htmlForm->setSubmitID( 'translationnotifications-send-notification-button' );
		$htmlForm->setSubmitCallback( array( $this, 'formSubmit' ) );
		$htmlForm->show();

		$wgOut->addModules( 'ext.translationnotifications.notifytranslators' );
	}

	/**
	 * Builds the form fields
	 *
	 * @return array or string with an error message key in case of error
	 */
	private function getDataModel() {

		// Translatable pages dropdown
		$translatablePagesIDs = TranslatablePage::getTranslatablePages();
		if ( !count ( $translatablePagesIDs ) ) {
			return 'translationnotifications-error-no-translatable-pages';
		}

		$translatablePagesOptions = array();
		foreach ( $translatablePagesIDs as $translatablePagesID ) {
			$translatablePagesOptions[Title::newFromID( $translatablePagesID )->getText()] = $translatablePagesID;
		}

		$m['TranslatablePage'] = array(
			'type' => 'select',
			'label-message' => array( 'translationnotifications-translatablepage-title' ),
			'options' => $translatablePagesOptions,
			'default' => 'unset',
		);

		// Languages to notify input box
		$m['LanguagesToNotify'] = array(
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

		$m['Priority'] = array(
			'type' => 'select',
			'label-message' => array( 'translationnotifications-priority' ),
			'options' => $priorityOptions,
			'default' => 'unset',
		);

		// Deadline date input box with datepicker
		$m['DeadlineDate'] = array(
			'type' => 'text',
			'size' => 20,
			'label-message' => 'translationnotifications-deadline-label',
		);

		// Custom text
		$m['NotificationText'] = array(
			'type' => 'textarea',
			'rows' => 20,
			'cols' => 80,
			'label-message' => 'emailmessage',
		);

		return $m;
	}
}
