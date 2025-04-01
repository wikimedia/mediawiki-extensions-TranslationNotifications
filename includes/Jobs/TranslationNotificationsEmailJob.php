<?php
declare( strict_types = 1 );

namespace MediaWiki\Extension\TranslationNotifications\Jobs;

use InvalidArgumentException;
use MailAddress;
use MediaWiki\Context\RequestContext;
use MediaWiki\MediaWikiServices;
use MediaWiki\Title\Title;
use MediaWiki\User\User;
use UserMailer;

/**
 * Uses UserMailer to send out emails.
 *
 * @ingroup JobQueue
 * @license GPL-2.0-or-later
 */
class TranslationNotificationsEmailJob extends GenericTranslationNotificationsJob {
	public function __construct( Title $title, array $params ) {
		parent::__construct( 'TranslationNotificationsEmailJob', $title, $params );
		$this->validateParams( $params );
	}

	/** Execute the job */
	public function run(): bool {
		$this->logDebug( 'Starting execution...' );
		$to = $this->getMailAddress( $this->params['to'] );
		$from = $this->getMailAddress( $this->params['from'] );
		$replyTo = $this->getMailAddress( $this->params['replyTo'] );
		$subject = $this->params['subject'];

		$status = UserMailer::send(
			$to,
			$from,
			$subject,
			$this->params['body'] ?? '',
			[ 'replyTo' => $replyTo ]
		);

		if ( !$status->isOK() ) {
			$formatterFactory = MediaWikiServices::getInstance()->getFormatterFactory();
			$errorMsg = $formatterFactory
				->getStatusFormatter( RequestContext::getMain() )
				->getMessage( $status )
				->text();
			$this->logError( $errorMsg );
			$this->setLastError( $errorMsg );
			return false;
		}

		$this->logInfo( 'Sent email to user regarding: ' . $subject );
		return true;
	}

	public static function addressFromUser( User $user ): array {
		return [
			'email' => $user->getEmail(),
			'name' => $user->getName(),
			'fullName' => $user->getRealName()
		];
	}

	public static function buildAddress( string $email, string $name, ?string $fullName ): array {
		return [
			'email' => $email,
			'name' => $name,
			'fullName' => $fullName ?? ''
		];
	}

	private function getMailAddress( array $address ): MailAddress {
		return new MailAddress(
			$address['email'],
			$address['name'],
			$address['fullName']
		);
	}

	private function validateParams( array $params ): void {
		$from = $params[ 'from' ] ?? [];
		$to = $params[ 'to' ] ?? [];
		$replyTo = $params['replyTo'] ?? [];
		$subject = $params['subject'] ?? false;

		$this->validateEmail( $from, 'from' );
		$this->validateEmail( $to, 'to' );
		$this->validateEmail( $replyTo, 'replyTo' );

		if ( !is_string( $subject ) || $subject === '' ) {
			throw new InvalidArgumentException( 'Parameter "subject" must be a non-empty string.' );
		}
	}

	private function validateEmail( array $address, string $propName ): void {
		$requiredProps = [ 'email', 'name' ];
		foreach ( $requiredProps as $prop ) {
			$propVal = $address[ $prop ] ?? false;
			if ( !is_string( $propVal ) || $propVal === '' ) {
				throw new InvalidArgumentException(
					"Parameter: $propName must contain " . implode( ', ', $requiredProps )
				);
			}
		}
	}
}
