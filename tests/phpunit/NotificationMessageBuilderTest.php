<?php

declare( strict_types=1 );

use MediaWiki\Extension\TranslationNotifications\Utilities\NotificationMessageBuilder;
use MediaWiki\MainConfigNames;

/**
 * @license GPL-2.0-or-later
 * @covers \MediaWiki\Extension\TranslationNotifications\Utilities\NotificationMessageBuilder
 */
class NotificationMessageBuilderTest extends MediaWikiIntegrationTestCase {
	protected function setUp(): void {
		parent::setUp();
		// The clause must follow the recipient's language, not the content
		// or interface language of whoever sends the notification.
		$this->overrideConfigValue( MainConfigNames::LanguageCode, 'fr' );
		$this->setUserLang( 'fr' );
	}

	/** @dataProvider provideGetDeadlineClause */
	public function testGetDeadlineClause(
		string $languageCode, string $deadline, string $expected
	): void {
		$language = $this->getServiceContainer()->getLanguageFactory()->getLanguage( $languageCode );
		$this->assertSame(
			$expected,
			NotificationMessageBuilder::getDeadlineClause( $language, $deadline )
		);
	}

	public static function provideGetDeadlineClause() {
		yield 'English' => [
			'en', '2026-12-24', 'The deadline for translating this page is 24 December 2026.'
		];
		yield 'German' => [
			'de', '2026-12-24', 'Frist zur Übersetzung der Seite: 24. Dezember 2026.'
		];
		yield 'No deadline' => [ 'de', '', '' ];
	}
}
