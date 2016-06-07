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

class SpecialTranslatorSignup extends FormSpecialPage {
	public function __construct() {
		parent::__construct( 'TranslatorSignup' );
	}

	public function doesWrites() {
		return true;
	}

	protected function getGroupName() {
		return 'login';
	}

	public function execute( $par ) {
		$this->requireLogin();
		parent::execute( $par );
	}

	protected function getMessagePrefix() {
		return 'translationnotifications';
	}

	protected function alterForm( HTMLForm $form ) {
		global $wgTranslationNotificationsSignupLegalMessage;

		$form->setWrapperLegend( false );
		$form->setId( 'translationnotifications-form' );
		$form->setSubmitID( 'translationnotifications-submit' );
		$form->setSubmitTextMsg( 'translationnotifications-submit' );
		// Override FormSpecialPage. Otherwise 'translationnotifications-text'
		// shown on Special:NotifyTranslators is shown here
		$form->setHeaderText( $this->msg( 'translatorsignup-summary' )->parseAsBlock() );

		if ( $wgTranslationNotificationsSignupLegalMessage ) {
			// Show the legal text regarding the notifications.
			// Do not show if value is empty or false.
			$legalText = Html::rawElement(
				'div',
				[ 'class' => 'mw-infobox' ],
				$this->msg( $wgTranslationNotificationsSignupLegalMessage )->parseAsBlock()
			);
			$form->addPostText( $legalText );
		}
	}

	protected function getFormFields() {
		global $wgTranslationNotificationsContactMethods;
		$this->getOutput()->addModules( 'ext.translationnotifications.translatorsignup' );
		$user = $this->getUser();

		$m['username'] = [
			'type' => 'info',
			'label-message' => 'translationnotifications-username',
			'default' => $user->getName(),
			'section' => 'info',
		];

		if ( $user->isEmailConfirmed() ) {
			if ( $user->getOption( 'disablemail' ) ) {
				$status = $this->msg( 'translationnotifications-email-disablemail' )->parse();
			} else {
				$status = $this->msg( 'translationnotifications-email-confirmed' )->parse();
			}
		} elseif ( trim( $user->getEmail() ) !== '' ) {
			$confirmMail = Linker::linkKnown(
				SpecialPage::getTitleFor( 'Confirmemail' ),
				$this->msg( 'emailconfirmlink' )->escaped()
			);
			$status = $this->msg( 'translationnotifications-email-unconfirmed' )
				->rawParams( $confirmMail )->parse();

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
	 */
	public function onSubmit( array $formData ) {
		$user = $this->getUser();

		foreach ( $formData as $key => $value ) {
			$user->setOption( "translationnotifications-$key", $value );
		}
		$user->saveSettings();

		return true;
	}

	public function onSuccess() {
		$this->getOutput()->wrapWikiMsg(
			"<div class=\"successbox\">\n$1\n</div>",
			'translationnotifications-signup-success'
		);
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
