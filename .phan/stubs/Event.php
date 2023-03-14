<?php

namespace MediaWiki\Extension\Notifications\Model;

/** Stub of Echo's Event class for phan */
class Event {
	/**
	 * @param array $eventDetails
	 * @return self|false
	 */
	public static function create( array $eventDetails ) {
		return false;
	}

	public function getExtra(): array {
		return [];
	}
}
