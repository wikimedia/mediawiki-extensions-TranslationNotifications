<?php

namespace MediaWiki\Extension\Notifications\Formatters;

use MediaWiki\Extension\Notifications\Model\Event;
use MediaWiki\Language\MessageLocalizer;
use MediaWiki\Message\Message;

/** Stub of Echo's EchoEventPresentationModel class for phan */
abstract class EchoEventPresentationModel implements MessageLocalizer {
	public Event $event;

	/** @inheritDoc */
	public function msg( $key, ...$params ): Message {
		return new Message( $key, $params );
	}

	public function isBundled(): bool {
		return false;
	}

	public function getBundleCount(): int {
		return 5;
	}

	/** @return string */
	public function getCompactHeaderMessageKey() {
		return "notification-compact-header-stub";
	}

	/** @return Message */
	public function getCompactHeaderMessage() {
	}

	/** @return string */
	abstract public function getIconType();

	/** @return string */
	protected function getHeaderMessageKey() {
	}

	/** @return bool|Message */
	public function getBodyMessage() {
	}

	/** @return array|false */
	abstract public function getPrimaryLink();
}
