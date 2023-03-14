<?php

namespace MediaWiki\Extension\Notifications\Formatters;

use Message;
use MessageLocalizer;

/** Stub of Echo's EchoEventPresentationModel class for phan */
class EchoEventPresentationModel implements MessageLocalizer {
	/** @inheritDoc */
	public function msg( $key, ...$params ): Message {
		return new Message( $key, $params );
	}
}
