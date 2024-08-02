<?php
/**
 * Unit tests.
 *
 * @file
 * @author Santhosh Thottingal
 * @copyright Copyright © 2012, Santhosh Thottingal
 * @license GPL-2.0-or-later
 */

use MediaWiki\Extension\TranslationNotifications\Scripts\DigestEmailer;
use MediaWiki\MainConfigNames;
use MediaWiki\Title\Title;
use MediaWiki\User\User;

/**
 * Unit tests for DigestEmailer class.
 * @covers \MediaWiki\Extension\TranslationNotifications\Scripts\DigestEmailer
 * @group Database
 */
class DigestEmailTest extends MediaWikiIntegrationTestCase {
	/**
	 * @var DigestEmailer
	 */
	private $emailer;

	/**
	 * @var array
	 */
	private $translators_conf;

	public function setUp(): void {
		parent::setUp();
		$this->translators_conf = parse_ini_file( "translators.ini", true );
		$this->emailer = new DigestEmailer();
		$this->overrideConfigValue( MainConfigNames::EmailAuthentication, false );
	}

	public function tearDown(): void {
		unset( $this->emailer );
		parent::tearDown();
	}

	/** @dataProvider providePeriodicEmailSending */
	public function testPeriodicEmailSending( string $timePeriod, string $translatorName ) {
		$translators = $this->getTranslators( $timePeriod );
		$notifications = $this->getNotifications();
		$mailStatus = $this->emailer->sendEmails( [ $translators[ $translatorName ] ], $notifications );
		$this->validateEmailSentStatus( $mailStatus, $translators[ $translatorName ] );
	}

	public static function providePeriodicEmailSending() {
		yield 'Translator1 should receive monthly email' => [ 'monthly', 'Translator1' ];
		yield 'Translator2 should receive weekly email' => [ 'weekly', 'Translator2' ];
		yield 'Translator3 without email should not receive email' => [ 'monthly', 'Translator3' ];
	}

	public function testSendEmailWeeklyInvalidLang() {
		$translators = $this->getTranslators( 'weekly' );
		$notifications = $this->getNotificationsForInvalidLangs();
		$mailStatus = $this->emailer->sendEmails( $translators, $notifications );
		$this->expectOutputRegex( '/0 notifications to send/' );
		foreach ( $translators as $translator ) {
			$this->assertSame(
				0,
				$mailStatus[$translator],
				User::newFromId( $translator ) . " should not get a mail. " .
					"Notification is not for this translator"
			);
		}
	}

	public function testSendEmailWeeklyExpired() {
		$translators = $this->getTranslators( 'weekly' );
		$notifications = $this->getExpiredNotifications();
		$mailStatus = $this->emailer->sendEmails( $translators, $notifications );
		$this->expectOutputRegex( '/0 notifications to send/' );

		foreach ( $translators as $translator ) {
			$this->assertSame(
				0,
				$mailStatus[$translator],
				User::newFromId( $translator ) . " should not get a mail. Notifications are expired"
			);
		}
	}

	public function testSendEmailWeeklyRepeated() {
		$translators = $this->getTranslators( 'weekly' );
		$notifications = $this->getNotifications();
		$this->emailer->sendEmails( $translators, $notifications );

		$mailStatus = $this->emailer->sendEmails( $translators, $notifications );
		$this->expectOutputRegex( '/Not sending notifications/' );

		foreach ( $translators as $translator ) {
			$this->assertSame(
				0,
				$mailStatus[$translator],
				User::newFromId( $translator ) . " should not get a mail, this is a repeat"
			);
		}
	}

	private function getNotifications() {
		$notifications = [];
		$notifications[] = [
			'languages' => '', // all languages
			'deadline' => '+1 month',
			'priority' => 'medium',
			'announcedate' => '-1 day',
			'announcer' => 'me',
			'translatablepage' => Title::newFromText( 'TestTitle' ),
		];

		return $notifications;
	}

	private function getNotificationsForInvalidLangs() {
		$notifications = [];
		$notifications[] = [
			'languages' => 'invalid',
			'deadline' => '+1 month',
			'priority' => 'medium',
			'announcedate' => '-1 day',
			'announcer' => 'me',
			'translatablepage' => Title::newFromText( 'TestTitle' ),
		];

		return $notifications;
	}

	private function getExpiredNotifications() {
		$notifications = [];
		$notifications[] = [
			'languages' => '', // all languages
			'deadline' => '-1 month',
			'priority' => 'medium',
			'announcedate' => '-1 day',
			'announcer' => 'me',
			'translatablepage' => Title::newFromText( 'TestTitle' ),
		];

		return $notifications;
	}

	private function getTranslators( $freq ) {
		$translators = [];
		foreach ( $this->translators_conf as $translator_conf ) {
			if ( $translator_conf['digest_frequency'] === $freq ) {
				$translators[ $translator_conf[ 'username' ] ] = $this->getTranslator( $translator_conf );
			}
		}

		return $translators;
	}

	private function getTranslator( $translator_conf ) {
		$user = User::newFromName( $translator_conf['username'] );
		if ( $user->getID() === 0 ) {
			$user->addToDatabase();
		}

		$user->setEmail( $translator_conf['email'] ?? '' );
		$userOptionsManager = $this->getServiceContainer()->getUserOptionsManager();
		$userOptionsManager->setOption(
			$user,
			'translationnotifications-lang-1',
			$translator_conf['language']
		);
		// set it a time long time back
		$userOptionsManager->setOption(
			$user,
			'translationnotifications-last-digest',
			strtotime( '-2 month' )
		);
		$userOptionsManager->setOption(
			$user,
			'translationnotifications-freq',
			$translator_conf['digest_frequency']
		);
		$userOptionsManager->setOption( $user, 'disablemail', false );
		$user->saveSettings();

		return $user->getId();
	}

	private function validateEmailSentStatus( array $mailStatus, string $translator ): void {
		$userFactory = $this->getServiceContainer()->getUserFactory();
		$translatorUser = $userFactory->newFromId( $translator );
		// Only validate if an email is set
		if ( $translatorUser->getEmail() ) {
			$this->expectOutputRegex( '/1 notifications to send/' );
			$this->assertSame(
				1,
				$mailStatus[$translator],
				$translatorUser . " should get a mail"
			);
		} else {
			$this->expectOutputRegex( '/Email cannot be sent to this user/' );
			$this->assertSame(
				0,
				$mailStatus[$translator] ?? null,
				$translatorUser . ' no email sent since they do not have an email'
			);
		}
	}
}
