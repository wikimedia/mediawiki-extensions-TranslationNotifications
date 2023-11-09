<?php
/**
 * Some hooks for TranslationNotifications extension.
 *
 * @file
 * @author Amir E. Aharoni
 * @author Santhosh Thottingal
 * @copyright Copyright © 2012, Amir E. Aharoni
 * @license GPL-2.0-or-later
 */

namespace MediaWiki\Extension\TranslationNotifications;

use MediaWiki\Preferences\Hook\GetPreferencesHook;

/**
 * Some hooks for TranslationNotifications extension.
 */
class Hooks implements GetPreferencesHook {
	/** @inheritDoc */
	public function onGetPreferences( $user, &$preferences ) {
		foreach (
			[
				'translationnotifications-lang-1',
				'translationnotifications-lang-2',
				'translationnotifications-lang-3',
				'translationnotifications-cmethod-email',
				'translationnotifications-cmethod-talkpage',
				'translationnotifications-cmethod-talkpage-elsewhere-loc',
				'translationnotifications-freq',
			] as $preference
		) {
			$preferences[$preference] = [
				'type' => 'api',
			];
		}
	}

	/**
	 * Hook: BeforeCreateEchoEvent
	 * @param array[] &$notifications
	 * @param array[] &$notificationCategories
	 * @param array[] &$icons
	 */
	public static function onBeforeCreateEchoEvent(
		&$notifications,
		&$notificationCategories,
		&$icons
	) {
		$notificationCategories[ 'translationnotifications' ] = [
			'tooltip' => 'echo-pref-tooltip-inactive-unsubscribe',
		];

		$notifications[ 'translationnotifications-unsubscribed' ] = [
			'category' => 'translationnotifications',
			'group' => 'neutral',
			'section' => 'alert',
			'presentation-model' => UnsubscribeInactiveUsersPresentationModel::class,
			'user-locators' => [
				[ UnsubscribeInactiveUsersPresentationModel::class . '::locateUsers' ]
			]
		];
	}
}
