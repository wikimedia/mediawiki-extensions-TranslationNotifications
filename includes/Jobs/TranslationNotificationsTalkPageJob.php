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
class TranslationNotificationsTalkPageJob extends GenericTranslationNotificationsJob {
	public function __construct( $title, $params ) {
		parent::__construct( 'TranslationNotificationsTalkPageJob', $title, $params );
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

		if ( $centralId ) {
			$translator = CentralIdLookup::factory()->localUserFromCentralId( $centralId );
			if ( !$translator ) {
				$this->setLastError( "Translator not found with the central ID $centralId" );
				$this->logError( $this->error );
				return true;
			}
		} elseif ( $localId ) {
			$translator = User::newFromId( $localId );
		} else {
			throw new InvalidArgumentException( 'Neither central nor local ID given' );
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
