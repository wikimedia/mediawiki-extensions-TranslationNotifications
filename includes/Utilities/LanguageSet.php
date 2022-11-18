<?php
declare( strict_types=1 );

namespace MediaWiki\Extension\TranslationNotifications\Utilities;

use InvalidArgumentException;
use JsonSerializable;

/**
 * Stores and validates possible options for a group of languages
 * to which users should be notified.
 *
 * @author Eugene Wang'ombe
 * @license GPL-2.0-or-later
 * @since 2022.10
 */
class LanguageSet implements JsonSerializable {
	public const ALL = 1;
	public const SOME = 2;
	public const ALL_EXCEPT_SOME = 3;

	private int $option;
	private string $optionName;

	public function __construct( int $option ) {
		$this->option = $option;

		switch ( $option ) {
			case self::ALL:
				$this->optionName = 'ALL';
				break;
			case self::SOME:
				$this->optionName = 'SOME';
				break;
			case self::ALL_EXCEPT_SOME:
				$this->optionName = 'ALL EXCEPT SOME';
				break;
			default:
				throw new InvalidArgumentException( "Invalid option: $option" );
		}
	}

	public function jsonSerialize(): array {
		return [
			'option' => $this->option,
			'optionName' => $this->optionName
		];
	}

	public function getOption(): int {
		return $this->option;
	}

	public function getOptionName(): string {
		return $this->optionName;
	}
}
