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
