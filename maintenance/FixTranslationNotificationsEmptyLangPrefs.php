<?php

/**
 * This script removes the empty translationnotifications-lang-* properties.
 * They became default and should not be stored.
 *
 * @author Amir E. Aharoni
 * based on Narayam/maintenance/FixNarayamDisablePref.php
 *
 * @copyright Copyright © 2012
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 * @file
 */

// Standard boilerplate to define $IP
if ( getenv( 'MW_INSTALL_PATH' ) !== false ) {
        $IP = getenv( 'MW_INSTALL_PATH' );
} else {
        $dir = dirname( __FILE__ ); $IP = "$dir/../../..";
}
require_once( "$IP/maintenance/Maintenance.php" );

class FixTranslationNotificationsEmptyLangPrefs extends Maintenance {
	function execute() {
		$dbw = wfGetDB( DB_MASTER );

		$langPropertyPrefix = 'translationnotifications-lang-';
		$this->output( "Deleting empty {$langPropertyPrefix}* property values\n" );

		$propertyLikePattern = $dbw->buildLike( $langPropertyPrefix, $dbw->anyString() );

		$dbw->delete(
			'user_properties',
			array(
				"up_property $propertyLikePattern",
				'up_value' => '',
			),
			__METHOD__
		);
	}
}

$maintClass = 'FixTranslationNotificationsEmptyLangPrefs';
require_once( RUN_MAINTENANCE_IF_MAIN );
