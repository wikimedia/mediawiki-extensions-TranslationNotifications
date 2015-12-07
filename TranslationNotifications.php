<?php

/**
 * An extension to keep in touch with translators
 *
 * @file
 * @ingroup Extensions
 *
 * @author Niklas Laxström
 * @author Amir E. Aharoni
 * @author Santhosh Thottingal
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

/**
 * Extension credits properties.
 */
$wgExtensionCredits['specialpage'][] = array(
	'path' => __FILE__,
	'name' => 'TranslationNotifications',
	'version' => '2015-12-04',
	'author' => array(
		'Niklas Laxström',
		'Amir E. Aharoni',
		'Santhosh Thottingal',
		'Siebrand Mazeland',
		'Jon Harald Søby',
	),
	'descriptionmsg' => 'translationnotifications-desc',
	'url' => 'https://www.mediawiki.org/wiki/Extension:TranslationNotifications',
	'license-name' => 'GPL-2.0+',
);

$dir = __DIR__;
$wgSpecialPages['TranslatorSignup'] = 'SpecialTranslatorSignup';
$wgSpecialPages['NotifyTranslators'] = 'SpecialNotifyTranslators';
$wgMessagesDirs['TranslationNotifications'] = __DIR__ . '/i18n';
$wgExtensionMessagesFiles['TranslationNotificationsAlias'] =
	"$dir/TranslationNotifications.alias.php";
$wgAutoloadClasses['SpecialTranslatorSignup'] = "$dir/SpecialTranslatorSignup.php";
$wgAutoloadClasses['SpecialNotifyTranslators'] = "$dir/SpecialNotifyTranslators.php";
$wgAutoloadClasses['TranslationNotificationsHooks'] = "$dir/TranslationNotificationsHooks.php";
$wgAutoloadClasses['TranslationNotificationJob'] = "$dir/TranslationNotificationJob.php";
$wgAutoloadClasses['DigestEmailer'] = "$dir/scripts/DigestEmailer.php";
$wgAutoloadClasses['TranslationNotificationsLogFormatter'] =
	"$dir/TranslationNotificationsLogFormatter.php";
$wgJobClasses['translationNotificationJob'] = 'TranslationNotificationJob';

$resourcePaths = array(
	'localBasePath' => __DIR__,
	'remoteExtPath' => 'TranslationNotifications'
);

$wgResourceModules['ext.translationnotifications.notifytranslators'] = array(
	'scripts' => 'resources/ext.translationnotifications.notifytranslators.js',
	'dependencies' => array(
		'mediawiki.jqueryMsg',
		'mediawiki.Uri',
		'mediawiki.api',
		'mediawiki.api.parse',
		'mediawiki.user',
		'jquery.ui.datepicker',
		'ext.translate.multiselectautocomplete',
	),
	'messages' => array(
		'translationnotifications-preview-notification-button',
		'translationnotifications-talkpage-body',
		'translationnotifications-generic-languages',
		'translationnotifications-email-priority',
		'translationnotifications-email-deadline',
	),
) + $resourcePaths;

$wgTranslationNotificationsContactMethods = array(
	'email' => true,
	'talkpage' => true,
	'talkpage-elsewhere' => false,
	'feed' => false,
);

$wgLogTypes[] = 'notifytranslators';
$wgLogActionsHandlers['notifytranslators/sent'] = 'TranslationNotificationsLogFormatter';

$wgNotificationUsername = false;
$wgNotificationUserPassword = false;

// Message key of the legal text for Special:TranslatorSignup page.
$wgTranslationNotificationsSignupLegalMessage = 'translationnotifications-signup-legal';

/**
 * Whether to always use https links for translation notification emails.
 * Only works and relevant if $wgServer is protocol relative.
 */
$wgTranslationNotificationsAlwaysHttpsInEmail = false;

// Give the language options default empty values, so that they
// won't be saved as empty strings. (Bug 37165)
foreach ( range( 1, 3 ) as $langNum ) {
	$wgDefaultUserOptions["translationnotifications-lang-$langNum"] = '';
}

$wgHooks['GetPreferences'][] = 'TranslationNotificationsHooks::onGetPreferences';
