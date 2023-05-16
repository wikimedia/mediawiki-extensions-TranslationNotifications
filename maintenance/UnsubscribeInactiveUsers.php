<?php
declare( strict_types = 1 );

namespace MediaWiki\Extension\TranslationNotifications;

use Maintenance;
use MediaWiki\Extension\CentralAuth\User\CentralAuthUser;
use MediaWiki\Extension\Notifications\Model\Event as EchoEvent;
use MediaWiki\Language\RawMessage;
use MediaWiki\MediaWikiServices;
use MediaWiki\User\UserIdentity;

$env = getenv( 'MW_INSTALL_PATH' );
$IP = $env !== false ? $env : __DIR__ . '/../../..';
require_once "$IP/maintenance/Maintenance.php";

/**
 * This script unsubscribes translators who've been inactive or blocked for a certain duration of time.
 * A user is considered blocked if all the following conditions are met:
 *   ** The block is site wide
 *   ** Has the user been blocked for 31 days
 *   ** Is the user permanently blocked OR will the user be blocked even after a certain duration
 * Inactivity for a user is checked across wikis that they have accounts on.
 *
 * @author Eugene Wang'ombe
 * @author Abijeet Patro
 * @copyright Copyright © 2023
 * @license GPL-2.0-or-later
 */
class UnsubscribeInactiveUsers extends Maintenance {
	private const ACTIVITY_CHECKS = [
		'archive' => 'ar',
		'image' => 'img',
		'oldimage' => 'oi',
		'filearchive' => 'fa',
		'revision' => 'rev'
	];

	public function __construct() {
		parent::__construct();
		$this->addOption(
			'days',
			'Number of days without activity for a translator to be considered inactive.',
			true,
			true
		);
		$this->addOption(
			'really',
			'Actually cancel subscriptions.'
		);
		$this->addOption(
			'verbose',
			'Show verbose output'
		);
		$this->addDescription(
			"This script unsubscribes translators who've been inactive or blocked for a certain duration of time."
		);

		$this->requireExtension( 'TranslationNotifications' );
		$this->requireExtension( 'Echo' );
		$this->requireExtension( 'CentralAuth' );
	}

	public function execute() {
		$inactiveSubscribers = [];
		$blockedSubscribers = [];
		$userOptionManager = MediaWikiServices::getInstance()->getUserOptionsManager();

		$inactiveDays = (int)$this->getOption( 'days' );
		$isDryRun = !$this->hasOption( 'really' );

		// Fetch all the translation notification subscribers
		[ $subscriberCount, $subscribers ] = $this->getSubscribers();
		$this->printInformationMessage( "Found $1 subscriber{{PLURAL:$1||s}}.\n", $subscriberCount );

		$inactiveTs = wfTimestamp( TS_MW, time() - $inactiveDays * 24 * 3600 );
		$inactiveTsToPrint = wfTimestamp( TS_ISO_8601, $inactiveTs );
		$this->output( "Checking for subscribers who are blocked or inactive since $inactiveTsToPrint\n" );
		$currentSubscriber = 0;

		$this->output( "\n" );

		// Identify inactive or blocked subscribers
		foreach ( $subscribers as $subscribedUser ) {
			++$currentSubscriber;
			$this->logVerbose( "... $currentSubscriber / $subscriberCount\n" );

			// Check if the subscription has been updated after inactivity cutoff time. It means that the user has
			// made some changes to their translator signup configuration recently.
			$lastActivityTs = $userOptionManager->getOption(
				$subscribedUser, 'translationnotifications-lastactivity'
			);
			// Last activity was not tracked originally, so it might be missing.
			if ( $lastActivityTs && $lastActivityTs > $inactiveTs ) {
				continue;
			}

			if ( $this->isSubscriberBlocked( $subscribedUser, $inactiveDays ) ) {
				$blockedSubscribers[] = $subscribedUser;
			} elseif ( $this->isSubscriberInactive( $subscribedUser, $inactiveTs ) ) {
				$inactiveSubscribers[] = $subscribedUser;
			}
			$this->logVerbose( "\n" );
		}

		$this->printInformationMessage(
			"Found $1 inactive subscriber{{PLURAL:$1||s}}.\n", count( $inactiveSubscribers )
		);
		$this->listUsers( $inactiveSubscribers );
		$this->output( "\n" );
		$this->printInformationMessage(
			"Found $1 blocked subscriber{{PLURAL:$1||s}}.\n", count( $blockedSubscribers )
		);
		$this->listUsers( $blockedSubscribers );
		$this->output( "\n" );

		if ( $isDryRun ) {
			$this->output( "Running in dry-run mode. Exiting...\n" );
			return true;
		}

		$subscribersToRemove = array_merge( $inactiveSubscribers, $blockedSubscribers );

		if ( $subscribersToRemove ) {
			$this->printInformationMessage(
				"Removing subscriber{{PLURAL:$1||s}}...\n", count( $subscribersToRemove )
			);

			$failedRecords = [];
			// Unsubscribe subscribers
			foreach ( $subscribersToRemove as $subscriber ) {
				if ( !$this->removeSubscriber( $subscriber ) ) {
					$failedRecords[] = $subscriber;
				}
			}

			if ( $failedRecords ) {
				$this->printInformationMessage(
					"Failed to remove $1 subscriber{{PLURAL:$1||s}}\n", count( $failedRecords )
				);
				$this->listUsers( $failedRecords );
			}

			$this->output( "Done\n" );
		} else {
			$this->output( "No inactive or blocked subscribers found.\n" );
		}

		return true;
	}

	private function getSubscribers(): array {
		$mwServices = MediaWikiServices::getInstance();
		$dbr = $mwServices->getDBLoadBalancer()->getConnection( DB_REPLICA );
		$queryBuilder = $mwServices->getUserIdentityLookup()->newSelectQueryBuilder();

		$queryBuilder
			->join( 'user_properties', 'up', [ 'actor_user = up.up_user' ] )
			->where( [
				'up.up_property ' . $dbr->buildLike( 'translationnotifications-lang-', $dbr->anyString() )
			] )
			->caller( __METHOD__ )
			->distinct();

		$countQueryBuilder = clone $queryBuilder;
		return [
			// Not using fetchRowCount() as it returns incorrect value with DISTINCT. See: T333065
			count(
				$countQueryBuilder
					->fields( 'actor_user' )
					->fetchFieldValues()
			),
			$queryBuilder->fetchUserIdentities()
		];
	}

	private function isSubscriberInactive( UserIdentity $subscriber, string $inactiveTs ): bool {
		$centralUser = CentralAuthUser::getInstance( $subscriber );
		$attachedAccounts = $centralUser->queryAttached();
		$mwServices = MediaWikiServices::getInstance();

		if ( !$attachedAccounts ) {
			$this->logVerbose( "No central account attached to user: {$subscriber->getName()}\n" );
			return false;
		} else {
			$this->logVerbose( count( $attachedAccounts ) . " accounts found for user: {$subscriber->getName()}\n" );
		}

		// Sort the accounts based on edit counts. More edits, more chances of the user being active on the wiki.
		usort( $attachedAccounts, static function ( $accountA, $accountB ) {
			return $accountB[ 'editCount' ] <=> $accountA[ 'editCount' ];
		} );

		foreach ( $attachedAccounts as $accountInfo ) {
			$isUserInactive = $this->isSubscriberInactiveOnSite(
				$mwServices,
				$subscriber,
				$accountInfo['wiki'],
				$inactiveTs
			);
			if ( !$isUserInactive ) {
				return false;
			}
		}

		return true;
	}

	private function isSubscriberInactiveOnSite(
		MediaWikiServices $mwServices,
		UserIdentity $user,
		string $siteId,
		string $inactiveTs
	): bool {
		$dbr = $mwServices->getDBLoadBalancerFactory()
			->getMainLB( $siteId )
			->getConnection( DB_REPLICA, [], $siteId );
		$actorStore = $mwServices->getActorStoreFactory()->getActorStore( $siteId );

		$actorId = $actorStore->findActorId( $user, $dbr );
		if ( $actorId === null ) {
			return true;
		}

		// Check if the user has made any contributions
		foreach ( self::ACTIVITY_CHECKS as $table => $prefix ) {
			$prefixedActorColumn = "{$prefix}_actor";
			$prefixedTimestampColumn = "{$prefix}_timestamp";

			$contributionCount = $dbr->newSelectQueryBuilder()
				->from( $table )
				->where( [ $prefixedActorColumn => $actorId ] )
				->andWhere( "$prefixedTimestampColumn > " . $dbr->addQuotes( $inactiveTs ) )
				->limit( 1 )
				->fetchRowCount();

			if ( $contributionCount ) {
				return false;
			}
		}

		return true;
	}

	private function isSubscriberBlocked( UserIdentity $subscriber, int $inactiveDays ): bool {
		$mwServices = MediaWikiServices::getInstance();
		$blockManager = $mwServices->getBlockManager();

		$userBlock = $blockManager->getUserBlock( $subscriber, null, true );
		if ( !$userBlock ) {
			return false;
		}

		// Check the following:
		// 1. Is the block site-wide
		// 2. Has the user been blocked for 31 days
		// 3. Is the user permanently blocked OR will the user be blocked even after a certain duration
		return $userBlock->isSitewide() &&
			$userBlock->getTimestamp() < wfTimestamp( TS_MW, time() - ( 31 * 24 * 60 ) ) &&
			(
				$userBlock->getExpiry() === 'infinity' ||
				$userBlock->getExpiry() > wfTimestamp( TS_MW, time() + $inactiveDays * 24 * 60 )
			);
	}

	private function removeSubscriber( UserIdentity $subscriber ): bool {
		$userOptionsManager = MediaWikiServices::getInstance()->getUserOptionsManager();
		$subscriberOptions = $userOptionsManager->loadUserOptions( $subscriber );

		$optionsUpdated = [];
		foreach ( array_keys( $subscriberOptions ) as $optionKey ) {
			if ( str_starts_with( $optionKey, 'translationnotifications-' ) ) {
				$userOptionsManager->setOption( $subscriber, $optionKey, null );
				$optionsUpdated[] = $optionKey;
			}
		}

		if ( $optionsUpdated ) {
			$event = $this->triggerEchoNotification( $subscriber->getId() );
			if ( $event === false ) {
				// If sending of Echo notification fails, do not remove the subscriber
				$userOptionsManager->clearUserOptionsCache( $subscriber );
				return false;
			} else {
				$userOptionsManager->saveOptions( $subscriber );
			}
		}

		return true;
	}

	/**
	 * @param int $subscriberId
	 * @return bool|EchoEvent
	 */
	private function triggerEchoNotification( int $subscriberId ) {
		return EchoEvent::create( [
			'type' => 'translationnotifications-unsubscribed',
			'extra' => [
				'userId' => $subscriberId
			]
		] );
	}

	private function listUsers( array $subscribers ): void {
		if ( $subscribers ) {
			$this->output( "\n" );
		}
		$count = 1;
		foreach ( $subscribers as $subscriber ) {
			$this->output( " $count. Id: {$subscriber->getId()}; Name: {$subscriber->getName()} \n" );
			$count++;
		}
	}

	private function printInformationMessage( string $message, int ...$messageArgs ): void {
		$msg = ( new RawMessage( $message ) )
			->numParams( $messageArgs )
			->inLanguage( 'en' )
			->text();
		$this->output( $msg );
	}

	private function logVerbose( string $log ): void {
		if ( $this->hasOption( 'verbose' ) ) {
			$this->output( $log );
		}
	}
}

$maintClass = UnsubscribeInactiveUsers::class;
require_once RUN_MAINTENANCE_IF_MAIN;
