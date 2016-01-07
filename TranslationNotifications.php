<?php

if ( function_exists( 'wfLoadExtension' ) ) {
	wfLoadExtension( 'TranslationNotifications' );
	// Keep i18n globals so mergeMessageFileList.php doesn't break
	$wgMessagesDirs['TranslationNotifications'] = __DIR__ . '/i18n';
	$wgExtensionMessagesFiles['TranslationNotificationsAlias'] =
		__DIR__ . '/TranslationNotifications.alias.php';

	return true;
} else {
	die( 'This version of TranslationNotifications requires MediaWiki 1.25+' );
}
