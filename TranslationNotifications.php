<?php
if ( !defined( 'MEDIAWIKI' ) ) die();
/**
 * An extension to keep in touch with translators
 *
 * @file
 * @ingroup Extensions
 *
 * @author Niklas Laxström
 * @copyright Copyright © 2012, Niklas Laxström
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

/**
 * Extension credits properties.
 */
$wgExtensionCredits['specialpage'][] = array(
	'path'           => __FILE__,
	'name'           => 'TranslationNotifications',
	'version'        => '2012-03-02',
	'author'         => array( 'Niklas Laxström' ),
	'descriptionmsg' => 'translationnotifications-desc',
	#'url'            => 'https://www.mediawiki.org/wiki/Extension:TranslationNotifications',
);

$dir = dirname( __FILE__ );
$wgSpecialPages['TranslatorSignup'] = 'SpecialTranslatorSignup';
$wgSpecialPageGroups['TranslatorSignup'] = 'login';
$wgExtensionMessagesFiles['TranslationNotifications'] = "$dir/TranslationNotifications.i18n.php";
$wgExtensionMessagesFiles['TranslationNotificationsAlias'] = "$dir/TranslationNotifications.alias.php";
$wgAutoloadClasses['SpecialTranslatorSignup'] = "$dir/SpecialTranslatorSignup.php";

$wgTranslationNotificationsContactMethods = array(
	'email' => true,
	'talkpage' => true,
	'talkpage-elsewhere' => false,
	'feed' => false,
	'no' => true,
);
