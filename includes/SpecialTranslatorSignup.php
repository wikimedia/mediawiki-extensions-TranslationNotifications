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
 * @license GPL-2.0-or-later
 */

namespace MediaWiki\Extension\TranslationNotifications;

use ExtensionRegistry;
use LanguageCode;
use MediaWiki\Extension\CentralAuth\User\CentralAuthUser;
use MediaWiki\Extension\SiteMatrix\SiteMatrix;
use MediaWiki\Html\Html;
use MediaWiki\HTMLForm\HTMLForm;
use MediaWiki\Languages\LanguageNameUtils;
use MediaWiki\SpecialPage\FormSpecialPage;
use MediaWiki\SpecialPage\SpecialPage;
use MediaWiki\User\Options\UserOptionsManager;
use MediaWiki\WikiMap\WikiMap;

/**
 * Form for translators to register contact methods
 *
 * @ingroup SpecialPage TranslateSpecialPage
 */

class SpecialTranslatorSignup extends FormSpecialPage {
	/** @var UserOptionsManager */
	private $userOptionsManager;

	/** @var LanguageNameUtils */
	private $languageNameUtils;

	public function __construct(
		UserOptionsManager $userOptionsManager,
		LanguageNameUtils $languageNameUtils
	) {
		parent::__construct( 'TranslatorSignup' );
		$this->userOptionsManager = $userOptionsManager;
		$this->languageNameUtils = $languageNameUtils;
	}

	public function doesWrites() {
		return true;
	}

	protected function getGroupName(): string {
		return 'translation';
	}

	/** @inheritDoc */
	public function execute( $par ) {
		$this->requireNamedUser();
		parent::execute( $par );
	}

	protected function getMessagePrefix(): string {
		return 'translationnotifications';
	}

	protected function alterForm( HTMLForm $form ): void {
		$form->setWrapperLegend( false );
		$form->setId( 'translationnotifications-form' );
		$form->setSubmitID( 'translationnotifications-submit' );
		$form->setSubmitTextMsg( 'translationnotifications-submit' );

		$form->addButton( [
			'name' => 'translationnotifications-unsubscribe',
			'value' => 'unsubscribe',
			'label-message' => 'translationnotifications-unsubscribe',
			'attribs' => [ 'disabled' => $this->isUserUnsubscribed() ],
			'flags' => 'destructive',
		] );
		// Without the following code the translationnotifications-text appears on this page. See: T334371
		$form->setHeaderHtml( '' );
	}

	protected function postHtml() {
		$legalMsg = $this->getConfig()->get( 'TranslationNotificationsSignupLegalMessage' );
		if ( $legalMsg ) {
			// Show the legal text regarding the notifications.
			// Do not show if value is empty or false.
			return Html::warningBox( $this->msg( $legalMsg )->parseAsBlock() );
		}
		return '';
	}

	protected function getFormFields(): array {
		$this->getOutput()->addModules( 'ext.translationnotifications.translatorsignup' );
		$user = $this->getUser();

		$m = [
			'username' => [
				'type' => 'info',
				'label-message' => 'translationnotifications-username',
				'default' => $user->getName(),
				'section' => 'info',
			],
		];

		if ( $user->isEmailConfirmed() ) {
			if ( $this->userOptionsManager->getOption( $user, 'disablemail' ) ) {
				$status = $this->msg( 'translationnotifications-email-disablemail' )->parse();
			} else {
				$status = $this->msg( 'translationnotifications-email-confirmed' )->parse();
			}
		} elseif ( trim( $user->getEmail() ) !== '' ) {
			$confirmMail = $this->getLinkRenderer()->makeKnownLink(
				SpecialPage::getTitleFor( 'Confirmemail' ),
				$this->msg( 'emailconfirmlink' )->text()
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

		$languages = $this->languageNameUtils->getLanguageNames();
		ksort( $languages );

		$options = [];
		foreach ( $languages as $code => $name ) {
			$display = LanguageCode::bcp47( $code ) . ' - ' . $name;
			$options[$display] = $code;
		}

		$options =
			[ $this->msg( 'translationnotifications-nolang' )->plain() => '' ] + $options;

		for ( $i = 1; $i < 4; $i++ ) {
			$formatted = $this->getLanguage()->formatNum( $i );
			$m["lang-$i"] = [
				'type' => 'select',
				'label-message' => [ 'translationnotifications-lang', $formatted ],
				'section' => 'languages',
				'options' => $options,
				'default' => $this->userOptionsManager->getOption(
					$user,
					"translationnotifications-lang-$i"
				),
			];

			if ( $i === 1 ) {
				$m["lang-$i"]['default'] = $this->userOptionsManager->getOption(
					$user,
					"translationnotifications-lang-$i",
					$this->getLanguage()->getCode()
				);
				$m["lang-$i"]['required'] = true;
			}
		}

		$config = $this->getConfig();
		$contactMethods = $config->get( 'TranslationNotificationsContactMethods' );
		foreach ( $contactMethods as $method => $value ) {
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
				'default' => $this->userOptionsManager->getOption(
					$user,
					"translationnotifications-cmethod-$method"
				),
				'section' => 'contact',
			];

			if ( $method === 'email' ) {
				$m["cmethod-$method"]['disabled'] = !$user->canReceiveEmail();
			}

			$localInterwikis = $config->get( 'LocalInterwikis' );
			if ( $method === 'talkpage-elsewhere' && count( $localInterwikis ) ) {
				$m['cmethod-talkpage-elsewhere-loc'] = [
					'type' => 'select',
					'default' => $this->userOptionsManager->getOption(
						$user,
						'translationnotifications-cmethod-talkpage-elsewhere-loc'
					),
					'section' => 'contact',
					'options' => $this->getOtherWikis(),
				];
			}
		}

		$m['freq'] = [
			'type' => 'radio',
			'default' => $this->userOptionsManager->getOption(
				$user,
				'translationnotifications-freq',
				'always'
			),
			'section' => 'frequency',
			'options' => [
				$this->msg( 'translationnotifications-freq-always' )->escaped() => 'always',
				$this->msg( 'translationnotifications-freq-week' )->escaped() => 'week',
				$this->msg( 'translationnotifications-freq-month' )->escaped() => 'month',
				$this->msg( 'translationnotifications-freq-weekly' )->escaped() => 'weekly',
				$this->msg( 'translationnotifications-freq-monthly' )->escaped() => 'monthly',
				$this->msg( 'translationnotifications-freq-none' )->escaped() => 'none',
			],
		];

		return $m;
	}

	/**
	 * @param array $formData
	 * @return true
	 */
	public function onSubmit( array $formData ) {
		$user = $this->getUser()->getInstanceForUpdate();

		if ( $this->getRequest()->getVal( 'translationnotifications-unsubscribe' ) !== null ) {
			$this->userOptionsManager->setOption( $user, 'translationnotifications-freq', 'none' );

			$user->saveSettings();
			return true;
		}

		$this->userOptionsManager->setOption( $user, 'translationnotifications-lastactivity', wfTimestampNow() );
		// @todo Needs input validation
		foreach ( $formData as $key => $value ) {
			$this->userOptionsManager->setOption( $user, "translationnotifications-$key", $value );
		}
		$user->saveSettings();
		return true;
	}

	public function onSuccess() {
		$out = $this->getOutput();
		$out->addHTML(
			Html::successBox(
				$out->msg( 'translationnotifications-signup-success' )->parse()
			)
		);
	}

	/** @return array<string,string> */
	protected function getOtherWikis(): array {
		global $wgConf;
		if ( !ExtensionRegistry::getInstance()->isLoaded( 'CentralAuth' ) ) {
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
			[ $site, $lang ] = $wgConf->siteFromDB( $dbname );
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

	protected function getDisplayFormat(): string {
		return 'ooui';
	}

	private function isUserUnsubscribed(): bool {
		$contactMethods = $this->getConfig()->get( 'TranslationNotificationsContactMethods' );
		foreach ( $contactMethods as $method => $value ) {
			if (
				$this->userOptionsManager->getOption(
					$this->getUser(),
					"translationnotifications-cmethod-$method" )
				) {
				return false;
			}
		}

		return true;
	}
}
