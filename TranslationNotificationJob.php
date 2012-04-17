<?php
/**
 * Update the User talk pages of translators with notification about new page translations.
 * @file
 * @ingroup JobQueue
 */
class TranslationNotificationJob extends Job {
	public function __construct( $title, $params ) {
		parent::__construct( 'translationNotificationJob', $title, $params );
	}

	/**
	 * Execute the job
	 *
	 * @return bool
	 */
	public function run() {
		$talkPage = new Article( $this->title, 0 );
		$text =  $this->params['text'];
		$flags = $talkPage->checkFlags( 0 );
		if ( $flags & EDIT_UPDATE ) {
			$text = $talkPage->getRawText() . "\n" . $text;
		}
		$editor = User::newFromID( $this->params['editor'] );
		$status = $talkPage->doEdit( $text, $this->params['editSummary'], $flags, false, $editor );
		return $status->isGood();
	}

}
