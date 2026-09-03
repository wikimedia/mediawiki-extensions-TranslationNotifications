<?php
declare( strict_types = 1 );

namespace MediaWiki\Extension\TranslationNotifications;

use MediaWiki\Extension\Notifications\Formatters\EchoEventPresentationModel;
use MediaWiki\SpecialPage\SpecialPage;

/**
 * Presentation model for the translation notification unsubscribed event
 * @author Abijeet Patro
 * @copyright Copyright © 2023
 * @license GPL-2.0-or-later
 */
class UnsubscribeInactiveUsersPresentationModel extends EchoEventPresentationModel {
	/** @inheritDoc */
	public function getIconType() {
		return 'placeholder';
	}

	/** @inheritDoc */
	public function getHeaderMessageKey() {
		return 'translationnotifications-echo-unsubscribe-header';
	}

	/** @inheritDoc */
	public function getBodyMessage() {
		return $this->msg( 'translationnotifications-echo-unsubscribe-body' );
	}

	/** @inheritDoc */
	public function getPrimaryLink() {
		return [
			'url' => SpecialPage::getTitleFor( 'TranslatorSignup' )->getFullURL(),
			'label' => $this->msg( 'translationnotifications-echo-unsubscribe-primary-label' )->plain()
		];
	}
}
