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

	/**
	 * @param $type
	 * @param $action
	 * @param $title Title
	 * @param $forUI bool
	 * @param $params array
	 * @return String
	 */
	public static function formatTranslationNotificationLogEntry( $type, $action, $title, $forUI, $params ) {
		global $wgLang, $wgContLang;

		$language = $forUI === null ? $wgContLang : $wgLang;

		// If specific languages were defined, show them.
		// If no specific languages were defined (empty string), show the "all languages"
		// in the user's language.
		$notifiedLanguages = $params[0]
			? $params[0]
			: wfMessage( 'translationnotifications-log-alllanguages' )->text();
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
