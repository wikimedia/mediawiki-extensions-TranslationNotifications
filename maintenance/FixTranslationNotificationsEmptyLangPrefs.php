<?php

/**
 * This script removes the empty translationnotifications-lang-* properties.
 * They became default and should not be stored.
 *
 * @author Amir E. Aharoni
 * based on Narayam/maintenance/FixNarayamDisablePref.php
 *
 * @copyright Copyright © 2012
 * @license GPL-2.0-or-later
 * @file
 */

namespace MediaWiki\Extension\TranslationNotifications;

// Standard boilerplate to define $IP
use MediaWiki\Maintenance\Maintenance;
use Wikimedia\Rdbms\IExpression;
use Wikimedia\Rdbms\LikeValue;

if ( getenv( 'MW_INSTALL_PATH' ) !== false ) {
	$IP = getenv( 'MW_INSTALL_PATH' );
} else {
	$IP = __DIR__ . "/../../..";
}
require_once "$IP/maintenance/Maintenance.php";

class FixTranslationNotificationsEmptyLangPrefs extends Maintenance {

	public function __construct() {
		parent::__construct();

		$this->requireExtension( 'TranslationNotifications' );
	}

	public function execute() {
		$dbw = $this->getPrimaryDB();

		$langPropertyPrefix = 'translationnotifications-lang-';
		$this->output( "Deleting empty {$langPropertyPrefix}* property values\n" );

		$dbw->newDeleteQueryBuilder()
			->deleteFrom( 'user_properties' )
			->where(
				$dbw->expr(
					'up_property',
					IExpression::LIKE,
					new LikeValue( $langPropertyPrefix, $dbw->anyString() )
				)
			)
			->andWhere( $dbw->expr( 'up_value', '=', '' ) )
			->caller( __METHOD__ )
			->execute();
	}
}

$maintClass = FixTranslationNotificationsEmptyLangPrefs::class;
require_once RUN_MAINTENANCE_IF_MAIN;
