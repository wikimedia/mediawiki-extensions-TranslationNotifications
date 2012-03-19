<?php
/**
 * Some hooks for TranslationNotifications extension.
 *
 * @file
 * @author Amir E. Aharoni
 * @copyright Copyright © 2012, Amir E. Aharoni
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

/**
 * Some hooks for TranslationNotifications extension.
 */
class TranslationNotificationsHooks {
	public static function formatTranslationNotificationLogEntry( $type, $action, $title, $forUI, $params ) {
		global $wgLang, $wgContLang;

		$language = $forUI === null ? $wgContLang : $wgLang;

		$notifiedLanguages = $params[0];
		$sentSuccess = $params[1];
		$sentFail = $params[2];

		$link = $forUI ?
			Linker::link( $title, null, array(), array( 'oldid' => $params[0] ) ) :
			$title->getPrefixedText();
		return wfMessage( 'logentry-translationnotifications-sent' )->params(
			'', // User link in the new system
			'#', // User name for gender in the new system
			Message::rawParam( $link ),
			$notifiedLanguages,
			SpecialNotifyTranslators::$deadlineDate,
			SpecialNotifyTranslators::$priority,
			$sentSuccess,
			$sentFail
		)->inLanguage( $language )->text();
	}
}
