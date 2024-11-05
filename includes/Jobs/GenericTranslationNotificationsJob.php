<?php
declare( strict_types = 1 );

namespace MediaWiki\Extension\TranslationNotifications\Jobs;

use Job;
use MediaWiki\Logger\LoggerFactory;
use Psr\Log\LoggerInterface;

/**
 * Generic Job class extended by other jobs. Provides logging functionality.
 * @author Abijeet Patro
 * @license GPL-2.0-or-later
 */
abstract class GenericTranslationNotificationsJob extends Job {
	protected LoggerInterface $logger;

	/**
	 * Channel name to be used during logging
	 * @var string
	 */
	private const CHANNEL_NAME = 'TranslationNotifications.Jobs';

	abstract public function run();

	/**
	 * Returns a logger instance with the channel name. Can have only a single
	 * channel per job, so once instantiated, the same instance is returned.
	 */
	protected function getLogger(): LoggerInterface {
		if ( $this->logger ) {
			return $this->logger;
		}

		$this->logger = LoggerFactory::getInstance( self::CHANNEL_NAME );
		return $this->logger;
	}

	protected function getLogPrefix(): string {
		return '[Job: ' . $this->getType() . '][Request ID: ' . $this->getRequestId() .
			'][Title: ' . $this->title->getPrefixedText() . '] ';
	}

	protected function logInfo( string $msg, array $context = [] ): void {
		$this->getLogger()->info( $this->getLogPrefix() . $msg, $context );
	}

	protected function logDebug( string $msg, array $context = [] ): void {
		$this->getLogger()->debug( $this->getLogPrefix() . $msg, $context );
	}

	protected function logError( string $msg, array $context = [] ): void {
		$this->getLogger()->error( $this->getLogPrefix() . $msg, $context );
	}

	protected function logWarn( string $msg, array $context = [] ): void {
		$this->getLogger()->warning( $this->getLogPrefix() . $msg, $context );
	}
}
