<?php
/**
 * Form for translators to register contact methods
 *
 * @file
 * @author Niklas Laxström
 * @author Amir E. Aharoni
 * @author Santhosh Thottingal
 * @author Siebrand Mazeland
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

	public function doesWrites() {
		return true;
	}

	protected function getGroupName() {
		return 'login';
	}

	public function execute( $parameters ) {
		global $wgTranslationNotificationsSignupLegalMessage;
		if ( !$this->getUser()->isLoggedIn() ) {
			throw new PermissionsError( 'read' );
		}
		$this->checkReadOnly();
		$this->setHeaders();
		$this->outputHeader();

		$context = $this->getContext();
		$htmlForm = new HTMLForm( $this->getDataModel(), $context, 'translationnotifications' );
		$htmlForm->setId( 'translationnotifications-form' );
		$htmlForm->setSubmitText( $context->msg( 'translationnotifications-submit' )->text() );
		$htmlForm->setSubmitID( 'translationnotifications-submit' );
		$htmlForm->setSubmitCallback( [ $this, 'formSubmit' ] );

		$out = $this->getOutput();

		$signUpResult = $this->getRequest()->getText( 'signupresult' );
		if ( $signUpResult === 'submitted' ) {
			$out->wrapWikiMsg(
				"<div class=\"successbox\">\n$1\n</div>",
				'translationnotifications-signup-success'
			);
		}

		$htmlForm->show();

		$out->addModules( 'ext.translationnotifications.translatorsignup' );
		// Show the legal text regarding the notifications.
		// Do not show if value is empty or false.
		if ( $wgTranslationNotificationsSignupLegalMessage ) {
			$legalText = Html::RawElement(
				'div',
				[ 'class' => 'mw-infobox' ],
				$this->msg( $wgTranslationNotificationsSignupLegalMessage )->parseAsBlock()
			);
			$this->getOutput()->addHTML( $legalText );
		}
	}

	public function getDataModel() {
		global $wgTranslationNotificationsContactMethods;

		$m['username'] = [
			'type' => 'info',
			'label-message' => 'translationnotifications-username',
			'default' => $this->getUser()->getName(),
			'section' => 'info',
		];

		$user = $this->getUser();
		if ( $user->isEmailConfirmed() ) {
			if ( $user->getOption( 'disablemail' ) ) {
				$status = $this->msg( 'translationnotifications-email-disablemail' )->parse();
			} else {
				$status = $this->msg( 'translationnotifications-email-confirmed' )->parse();
			}
		} elseif ( trim( $user->getEmail() ) !== '' ) {
			$submit = Xml::submitButton(
				$this->msg( 'confirmemail_send' )->text(),
				[ 'name' => 'x' ]
			);
			$status = $this->msg( 'translationnotifications-email-unconfirmed' )
				->rawParams( $submit )->parse();
		} else {
			$status = $this->msg( 'translationnotifications-email-notset' )->parse();
		}

		$m['emailstatus'] = [
			'type' => 'info',
			'label-message' => 'translationnotifications-emailstatus',
			'default' => $status,
			'section' => 'info',
			'raw' => true,
		];

		$languages = Language::fetchLanguageNames();
		ksort( $languages );

		$options = [];
		foreach ( $languages as $code => $name ) {
			$display = wfBCP47( $code ) . ' - ' . $name;
			$options[$display] = $code;
		}

		$options =
			[ wfMessage( 'translationnotifications-nolang' )->plain() => '' ] + $options;

		for ( $i = 1; $i < 4; $i++ ) {
			$formatted = $this->getLanguage()->formatNum( $i );
			$m["lang-$i"] = [
				'type' => 'select',
				'label-message' => [ 'translationnotifications-lang', $formatted ],
				'section' => 'languages',
				'options' => $options,
				'default' => $user->getOption( "translationnotifications-lang-$i" ),
			];

			if ( $i === 1 ) {
				$m["lang-$i"]['default'] = $user->getOption(
					"translationnotifications-lang-$i",
					$this->getLanguage()->getCode()
				);
				$m["lang-$i"]['required'] = true;
			}
		}

		foreach ( $wgTranslationNotificationsContactMethods as $method => $value ) {
			if ( $value === false ) {
				continue;
			}

			// Give grep a chance to find the usages:
			// translationnotifications-cmethod-email, translationnotifications-cmethod-talkpage,
			// translationnotifications-cmethod-talkpage-elsewhere,
			// translationnotifications-cmethod-feed
			$m["cmethod-$method"] = [
				'type' => 'check',
				'label-message' => "translationnotifications-cmethod-$method",
				'default' => $user->getOption( "translationnotifications-cmethod-$method" ),
				'section' => 'contact',
			];

			if ( $method === 'email' ) {
				$m["cmethod-$method"]['disabled'] = !$user->canReceiveEmail();
			}

			global $wgLocalInterwikis;
			if ( $method === 'talkpage-elsewhere' && count( $wgLocalInterwikis ) ) {
				$m['cmethod-talkpage-elsewhere-loc'] = [
					'type' => 'select',
					'default' => $user->getOption( 'translationnotifications-cmethod-talkpage-elsewhere-loc' ),
					'section' => 'contact',
					'options' => $this->getOtherWikis(),
				];
			}
		}

		$m['freq'] = [
			'type' => 'radio',
			'default' => $user->getOption( 'translationnotifications-freq', 'always' ),
			'section' => 'frequency',
			'options' => [
				$this->msg( 'translationnotifications-freq-always' )->text() => 'always',
				$this->msg( 'translationnotifications-freq-week' )->text() => 'week',
				$this->msg( 'translationnotifications-freq-month' )->text() => 'month',
				$this->msg( 'translationnotifications-freq-weekly' )->text() => 'weekly',
				$this->msg( 'translationnotifications-freq-monthly' )->text() => 'monthly',
			],
		];

		return $m;
	}

	/**
	 * @param array $formData
	 * @param HTMLForm $form
	 * @see HTMLForm::setSubmitCallback
	 */
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

		$url = $form->getTitle()->getFullURL( [ 'signupresult' => 'submitted' ] );
		$form->getContext()->getOutput()->redirect( $url );
	}

	protected function getOtherWikis() {
		global $wgConf;
		if ( !class_exists( 'CentralAuthUser' ) ) {
			return [];
		}
		$globalUser = CentralAuthUser::getInstance( $this->getUser() );
		if ( !$globalUser->exists() ) {
			return [];
		}

		$matrix = new SiteMatrix();
		$wikis = [];
		foreach ( $globalUser->listAttached() as $dbname ) {
			// Skip inactive and special wikis
			list( $site, $lang ) = $wgConf->siteFromDB( $dbname );
			if ( $matrix->isClosed( $lang, $site )
				|| $matrix->isPrivate( $dbname )
				|| $matrix->isFishbowl( $dbname )
			) {
				continue;
			}

			$wikis[WikiMap::getWikiName( $dbname )] = $dbname;
		}

		return $wikis;
	}
}
