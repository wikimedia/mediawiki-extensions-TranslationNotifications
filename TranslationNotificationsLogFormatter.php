<?php
/**
 * Class for formatting TranslationNotifications logs.
 *
 * @file
 * @author Sucheta Ghoshal
 * @copyright Copyright © 2013, Sucheta Ghoshal
 * @license GPL-2.0+
 */

/**
 * Class for formatting TranslationNotifications logs.
 */
class TranslationNotificationsLogFormatter extends LogFormatter {
	public function getMessageParameters() {

		$params = parent::getMessageParameters();

		// If specific languages were defined, show them.
		// If no specific languages were defined (empty string), show the "all languages"
		// in the user's language.
		if ( $params[3] === '' ) {
			$params[3] = $this->msg( 'translationnotifications-log-alllanguages' )->text();
			$params[9] = 999;
		} else {
			$params[9] = count( explode( ',', $params[3] ) );
		}

		if ( $params[4] === '' ) {
			$params[4] = $this->msg( 'translationnotifications-nodeadline' )->text();
		}

		return $params;
	}
}
