<?php
/**
 * Form for translators to register contact methods
 *
 * @file
 * @author Niklas Laxström
 * @copyright Copyright © 2012, Niklas Laxström
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

/**
 * Form for translators to register contact methods
 *
 * @ingroup SpecialPage TranslateSpecialPage
 */

class SpecialTranslatorSignup extends SpecialPage {
	public function __construct() {
		parent::__construct( 'TranslatorSignup' );
	}

	public function execute( $parameters ) {
		global $wgTranslationNotificationsSignupLegalMessage;
		if ( !$this->getUser()->isLoggedIn() ) {
			throw new PermissionsError( 'read' );
		}

		$this->setHeaders();
		$this->outputHeader();

		$context = $this->getContext();
		$htmlForm = new HtmlForm( $this->getDataModel(), $context, 'translationnotifications' );
		$htmlForm->setId( 'translationnotifications-form' );
		$htmlForm->setSubmitText( $context->msg( 'translationnotifications-submit' )->text() );
		$htmlForm->setSubmitID( 'translationnotifications-submit' );
		$htmlForm->setSubmitCallback( array( $this, 'formSubmit' ) );

		$out = $this->getOutput();

		$signUpResult = $this->getRequest()->getText( 'signupresult' );
		if ( $signUpResult === 'submitted' ) {
			$out->wrapWikiMsg(
				"<div class=\"successbox\">\n$1\n</div>",
				'translationnotifications-signup-success'
			);
		}

		$htmlForm->show();

		$out->addInlineScript(
<<<JAVASCRIPT
jQuery( function ( $ ) {
	var toggle = function () {
		$( '#mw-input-wpcmethod-talkpage-elsewhere-loc' ).toggle( $( '#mw-input-wpcmethod-talkpage-elsewhere' ).prop( 'checked' ) );
	};
	toggle();
	$( '#mw-input-wpcmethod-talkpage-elsewhere' ).change( toggle );
} );
JAVASCRIPT
		);
		// Show the legal text regarding the notifications.
		if( $wgTranslationNotificationsSignupLegalMessage ) { // Do not show if value is empty or false.
			$legalText = Html::RawElement( 'div', array( 'class' => 'mw-infobox' ), $this->msg( $wgTranslationNotificationsSignupLegalMessage )->parseAsBlock() );
			$this->getOutput()->addHTML( $legalText );
		}
	}

	public function getDataModel() {
		global $wgTranslationNotificationsContactMethods;

		$m['username'] = array(
			'type' => 'info',
			'label-message' => 'translationnotifications-username',
			'default' => $this->getUser()->getName(),
			'section' => 'info',
		);

		$user = $this->getUser();
		if ( $user->isEmailConfirmed() ) {
			if ( $user->getOption( 'disablemail' ) ) {
				$status = $this->msg( 'translationnotifications-email-disablemail' )->parse();
			} else {
				$status = $this->msg( 'translationnotifications-email-confirmed' )->parse();
			}
		} elseif ( trim( $user->getEmail() ) !== '' )  {
			$submit = Xml::submitButton( $this->msg( 'confirmemail_send' )->text(), array( 'name' => 'x' ) );
			$status = $this->msg( 'translationnotifications-email-unconfirmed' )->rawParams( $submit )->parse();
		} else {
			$status = $this->msg( 'translationnotifications-email-notset' )->parse();
		}

		$m['emailstatus'] = array(
			'type' => 'info',
			'label-message' => 'translationnotifications-emailstatus',
			'default' => $status,
			'section' => 'info',
			'raw' => true,
		);

		$languages = Language::fetchLanguageNames();
		ksort( $languages );

		$options = array();
		foreach ( $languages as $code => $name ) {
			$display = wfBCP47( $code ) . ' - ' . $name;
			$options[$display] = $code;
		}

		$options = array( wfMessage( 'translationnotifications-nolang' )->plain() => '' ) + $options;

		for ( $i = 1; $i < 4; $i++ ) {
			$m["lang-$i"] = array(
				'type' => 'select',
				'label-message' => array( "translationnotifications-lang", $this->getLanguage()->formatNum( $i ) ),
				'section' => 'languages',
				'options' => $options,
				'default' => $user->getOption( "translationnotifications-lang-$i" ),
			);

			if ( $i === 1 ) {
				$m["lang-$i"]['default'] = $user->getOption( "translationnotifications-lang-$i", $this->getLanguage()->getCode() );
				$m["lang-$i"]['required'] = true;
			}
		}

		foreach ( $wgTranslationNotificationsContactMethods as $method => $value ) {
			if ( $value === false ) {
				continue;
			}

			$m["cmethod-$method"] = array(
				'type' => 'check',
				'label-message' => "translationnotifications-cmethod-$method",
				'default' => $user->getOption( "translationnotifications-cmethod-$method" ),
				'section' => 'contact',
			);

			if ( $method === 'email' ) {
				$m["cmethod-$method"]['disabled'] = !$user->canReceiveEmail();
			}

			if ( $method === 'talkpage-elsewhere' ) {
				$m['cmethod-talkpage-elsewhere-loc'] = array(
					'type' => 'select',
					'default' => $user->getOption( 'translationnotifications-cmethod-talkpage-elsewhere-loc' ),
					'section' => 'contact',
					'options' => $this->getOtherWikis(),
				);
			}
		}

		$m['freq'] = array(
			'type' => 'radio',
			'default' => $user->getOption( 'translationnotifications-freq', 'always' ),
			'section' => 'frequency',
			'options' => array(
				$this->msg( 'translationnotifications-freq-always' )->text()  => 'always',
				$this->msg( 'translationnotifications-freq-week' )->text()    => 'week',
				$this->msg( 'translationnotifications-freq-month' )->text()   => 'month',
				$this->msg( 'translationnotifications-freq-weekly' )->text()  => 'weekly',
				$this->msg( 'translationnotifications-freq-monthly' )->text() => 'monthly',
			),
		);

		return $m;
	}

	public function formSubmit( $formData, $form ) {
		$user = $this->getUser();

		if ( $this->getRequest()->getVal( 'x' ) === $this->msg( 'confirmemail_send' )->text() ) {
			$user->sendConfirmationMail( 'set' );
			return;
		}

		foreach ( $formData as $key => $value ) {
			$user->setOption( "translationnotifications-$key", $value );
		}
		$user->saveSettings();

		$url = $form->getTitle()->getFullURL( array( 'signupresult' => 'submitted' ) );
		$form->getContext()->getOutput()->redirect( $url );
	}

	protected function getOtherWikis() {
		global $wgConf, $wgDBname;
		if ( !class_exists( 'CentralAuthUser' ) ) {
			return array();
		}
		$globalUser = new CentralAuthUser( $this->getUser()->getName() );
		if ( !$globalUser->exists() ) {
			return array();
		}

		$matrix = new SiteMatrix();
		$wikis = array();
		foreach ( $globalUser->queryAttached() as $dbname => $value ) {
			// Skip inactive and special wikis
			list( $site, $lang ) = $wgConf->siteFromDB( $wgDBname );
			if ( $matrix->isClosed( $lang, $site )
			  || $matrix->isPrivate( $lang, $site )
			  || $matrix->isFishbowl( $lang, $site ) )
			{
				continue;
			}

			$wikis[WikiMap::getWikiName( $dbname )] = $dbname;
		}

		return $wikis;
	}
}
