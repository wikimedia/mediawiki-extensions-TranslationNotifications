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
		if ( !$wgUser->isallowed( self::$right ) ) {
			throw new PermissionsError( self::$right );
		}

		$wgOut->addModules( 'ext.translationnotifications.notifytranslators' );

		$context = $this->getContext();
		$htmlForm = new HtmlForm( $this->getDataModel(), $context, 'translationnotifications' );
		$htmlForm->setId( 'notifytranslators-form' );
		$htmlForm->setSubmitText( $context->msg( 'translationnotifications-send-notification-button' )->text() );
		$htmlForm->setSubmitID( 'translationnotifications-send-notification-button' );
		$htmlForm->setSubmitCallback( array( $this, 'formSubmit' ) );
		$htmlForm->show();

		$this->setHeaders();
	}

	public function getDataModel() {
		$m['LanguagesToNotify'] = array(
			'type' => 'text',
			'rows' => 20,
			'cols' => 80,
			'label-message' => 'translationnotifications-languages-to-notify-label',
		);

		$m['NotificationText'] = array(
			'type' => 'textarea',
			'rows' => 20,
			'cols' => 80,
			'label-message' => 'emailmessage',
		);

		$m['DeadlineDate'] = array(
			'type' => 'text',
			'size' => 20,
			'label-message' => 'translationnotifications-deadline-label',
		);

		return $m;
	}
}
