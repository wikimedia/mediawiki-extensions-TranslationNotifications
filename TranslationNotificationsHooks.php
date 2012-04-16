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
		$deadlineDate = $params[1];
		if ( strlen( $deadlineDate ) === 0 ) {
			$deadlineDate = wfMessage( 'translationnotifications-nodeadline' )->text();
		}
		$priority = $params[2];
		$sentSuccess = $params[3];
		$sentFail = $params[4];
		$tooEarly = $params[5];

		$link = $forUI ?
			Linker::link( $title, null, array(), array( 'oldid' => $params[0] ) ) :
			$title->getPrefixedText();
		return wfMessage( 'logentry-translationnotifications-sent' )->params(
			'', // User link in the new system
			'#', // User name for gender in the new system
			Message::rawParam( $link ),
			$notifiedLanguages,
			$deadlineDate,
			$priority,
			$sentSuccess,
			$sentFail,
			$tooEarly
		)->inLanguage( $language )->text();
	}
}
