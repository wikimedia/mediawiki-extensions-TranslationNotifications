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

		// $params[3] is $languagesForLog,
		// $params[4] is $deadlineDate,
		// $params[9] is $languageCount
		// If no specific languages are defined, set languageForLog to 'all languages'.
		if ( $params[3] === '' ) {
			$params[3] = $this->msg( 'translationnotifications-log-alllanguages' )->text();
			// Set language count to arbitrary high number for 'all languages'.
			$params[9] = 999;
		} else {
			// If specific languages are defined, show them.
			$params[9] = count( explode( ',', $params[3] ) );
		}

		if ( $params[4] === '' ) {
			// If deadline is not set, deadlineDate is set to 'none'.
			$params[4] = $this->msg( 'translationnotifications-nodeadline' )->text();
		}

		return $params;
	}
}

