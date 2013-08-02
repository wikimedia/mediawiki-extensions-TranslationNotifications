<?php
/**
 * Some hooks for TranslationNotifications extension.
 *
 * @file
 * @author Amir E. Aharoni
 * @author Santhosh Thottingal
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
	public static function formatTranslationNotificationLogEntry( $type, $action, $title,
		$forUI, $params
	) {
		global $wgLang, $wgContLang;

		$language = $forUI === null ? $wgContLang : $wgLang;

		// If specific languages were defined, show them.
		// If no specific languages were defined (empty string), show the "all languages"
		// in the user's language.
		$notifiedLanguages = $params[0] ?
			$params[0] :
			wfMessage( 'translationnotifications-log-alllanguages' )->text();
		$deadlineDate = $params[1];
		if ( strlen( $deadlineDate ) === 0 ) {
			$deadlineDate = wfMessage( 'translationnotifications-nodeadline' )->text();
		}
		$priority = $params[2];
		$sentSuccess = $params[3];
		$sentFail = $params[4];
		$tooEarly = $params[5];
		// Set language count to a high number when "all".
		$languageCount = $params[0] ? count( explode( ',', $notifiedLanguages ) ) : 999;

		// possible messages here:
		// 'translationnotifications-priority-high'
		// 'translationnotifications-priority-medium'
		// 'translationnotifications-priority-low'
		// 'translationnotifications-priority-unset'
		$priorityText = wfMessage(
			"translationnotifications-priority-$priority"
		)->inLanguage( $language )->text();

		$link = $forUI ?
			Linker::link( $title, null, array(), array( 'oldid' => $params[0] ) ) :
			$title->getPrefixedText();

		return wfMessage( 'logentry-translationnotifications-sent' )->params(
			'', // User link in the new system
			'#', // User name for gender in the new system
			Message::rawParam( $link ),
			$notifiedLanguages, // $4
			$deadlineDate, // $5
			$priorityText, // $6
			$sentSuccess, // $7
			$sentFail, // $8
			$tooEarly, // $9
			$languageCount // $10
		)->inLanguage( $language )->text();
	}

	public static function onGetPreferences( $user, &$preferences ) {
		foreach (
			array(
				'translationnotifications-lang-1',
				'translationnotifications-lang-2',
				'translationnotifications-lang-3',
				'translationnotifications-cmethod-email',
				'translationnotifications-cmethod-talkpage',
				'translationnotifications-cmethod-talkpage-elsewhere-loc',
				'translationnotifications-freq',
			) as $preference
		) {
			$preferences[$preference] = array(
				'type' => 'api',
			);
		}

		return true;
	}
}
