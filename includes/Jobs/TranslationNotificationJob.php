<?php
/*
* @file
* @license GPL-2.0-or-later
*/

/**
 * Runs on the target wiki and creates the necessary MassMessageJob that leaves a message
 * about new translations on the user's talk page.
 * @ingroup JobQueue
 */
class TranslationNotificationJob extends GenericTranslationNotificationJob {
	public function __construct( $title, $params, $id = 0 ) {
		parent::__construct( 'TranslationNotificationJob', $title, $params, $id );
	}

	/**
	 * Execute the job
	 * @return bool
	 */
	public function run() {
		$this->logDebug( 'Starting execution...' );

		// Get the values from the params
		$message = $this->params['text'];
		$subject = $this->params['editSummary'];
		$centralId = $this->params['centralUserId'] ?? null;
		$localId = $this->params['localUserId'] ?? null;

		if ( $centralId !== null ) {
			$centralIdLookup = CentralIdLookup::factory();
			$translator = $centralIdLookup->localUserFromCentralId( $centralId );
		} elseif ( $localId !== null ) {
			$translator = User::newFromId( $localId );
		}

		if ( !isset( $translator ) ) {
			$msg = "Translator not found with the central ID - $centralId and local ID - $localId";
			$this->logError( $msg );
			$this->setLastError( $msg );
			return true;
		}

		$title = $translator->getTalkPage();

		$params = [
			'comment' => '',
			'message' => $message,
			'subject' => $subject,
			'title' => $title->getPrefixedText(),
			'namespace' => $title->getNamespace()
		];

		$job = Job::factory( 'MassMessageJob', $params );
		JobQueueGroup::singleton()->push( $job );

		$this->logInfo(
			'Created a MassMessageJob to drop message on talk page for user - {userId}.',
			[ 'userId' => $translator->getId() ]
		);

		return true;
	}
}
