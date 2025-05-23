<?php
declare( strict_types = 1 );

namespace MediaWiki\Extension\TranslationNotifications;

use MediaWiki\Preferences\Hook\GetPreferencesHook;

/**
 * Some hooks for TranslationNotifications extension.
 *
 * @author Amir E. Aharoni
 * @author Santhosh Thottingal
 * @copyright Copyright © 2012, Amir E. Aharoni
 * @license GPL-2.0-or-later
 */
class Hooks implements GetPreferencesHook {
	/** @inheritDoc */
	public function onGetPreferences( $user, &$preferences ): void {
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
}
