<?php
/**
 * Update the User talk pages of translators with notification about new page translations.
 * @file
 * @ingroup JobQueue
 */
class TranslationNotificationJob extends GenericTranslationNotificationJob {
	public function __construct( $title, $params, $id = 0 ) {
		parent::__construct( 'translationNotificationJob', $title, $params, $id );
	}

	/**
	 * Execute the job
	 *
	 * @return bool
	 */
	public function run() {
		$status = $this->publishInWiki();

		if ( $status !== true ) {
			$this->setLastError( $status );

			return false;
		}

		return true;
	}

	private function textDiv() {
		$dir = Language::factory( $this->params['languageCode'] )->getDir();

		// Possible classes:
		// mw-content-ltr, mw-content-rtl
		return Html::rawElement(
			'div',
			[
				'lang' => $this->params['languageCode'],
				'class' => "mw-content-$dir"
			],
			$this->params['text']
		);
	}

	private function publishInWiki() {
		global $wgNotificationUsername, $wgNotificationUserPassword;

		if ( isset( $this->params['otherwiki'] ) ) {
			$wiki = WikiMap::getWiki( $this->params['otherwiki'] );
			$baseUrl = $wiki->getCanonicalServer() . wfScript( 'api' );
		} else {
			$baseUrl = wfExpandUrl( wfScript( 'api' ), PROTO_CANONICAL );
		}

		$this->logInfo( 'Started Translation Notification Job.', [ 'baseUrl' => $baseUrl ] );

		// API: Get login token
		$tokenUrl = wfAppendQuery( $baseUrl, [
			'action' => 'query',
			'format' => 'json',
		] );
		$getLoginTokenRequest = MWHttpRequest::factory(
			$tokenUrl,
			[
				'method' => 'POST',
				'postData' => [
					'meta' => 'tokens',
					'type' => 'login',
				]
			]
		);
		$getLoginTokenRequest->execute();
		$json = $getLoginTokenRequest->getContent();
		$cookieJar = $getLoginTokenRequest->getCookieJar();

		$response = FormatJson::decode( $json, true );

		$loginToken = $response['query']['tokens']['logintoken'];
		if ( strlen( $loginToken ) < 4 ) {
			$msg = 'Error: Login token too short';
			$this->logError( $msg, [ 'Response' => $response ] );
			return $msg;
		}

		$this->logInfo( 'Retrieved login token.' );

		// API: Do the login
		$loginUrl = wfAppendQuery( $baseUrl, [
			'action' => 'login',
			'format' => 'json',
		] );
		$loginRequest = MWHttpRequest::factory(
			$loginUrl,
			[
				'method' => 'POST',
				'postData' => [
					'lgname' => $wgNotificationUsername,
					'lgpassword' => $wgNotificationUserPassword,
					'lgtoken' => $loginToken,
				]
			]
		);
		$loginRequest->setCookieJar( $cookieJar );
		$loginRequest->execute();
		$json = $loginRequest->getContent();

		$response = FormatJson::decode( $json, true );

		// TODO: Is this really the best way to test success?
		if ( $response['login']['result'] !== 'Success' ) {
			$msg = 'Error: Unable to log in';
			$this->logError( $msg, [ 'Response' => $response ] );
			return $msg;
		}

		$this->logInfo( 'Finished login.' );

		// API: Get an edit token
		$userTalkPage = $this->title->getFullText();
		$getEditTokenRequest = MWHttpRequest::factory(
			$tokenUrl,
			[
				'method' => 'POST',
				'postData' => [
					'meta' => 'tokens',
				]
			]
		);
		$getEditTokenRequest->setCookieJar( $cookieJar );
		$getEditTokenRequest->execute();
		$json = $getEditTokenRequest->getContent();

		$response = FormatJson::decode( $json, true );

		$editToken = $response['query']['tokens']['csrftoken'];
		// TODO: Is this really the best way to test success?
		if ( strlen( $editToken ) < 4 ) {
			$msg = 'Edit token too short';
			$this->logError( $msg, [ 'Response' => $response ] );
			return $msg;
		}

		$this->logInfo( 'Fetched edit token.' );

		// API: Edit the talk page
		$editUrl = wfAppendQuery( $baseUrl, [
			'action' => 'edit',
			'format' => 'json',
		] );
		$editRequest = MWHttpRequest::factory(
			$editUrl,
			[
				'method' => 'POST',
				'postData' => [
					'title' => $userTalkPage,
					'section' => 'new',
					'text' => $this->textDiv(),
					'token' => $editToken,
					'summary' => $this->params['editSummary'],
					'sectiontitle' => $this->params['subject'],
					// To write to redirected pages. It's especially relevant
					// in this case, because sometimes people redirect a Latin
					// username to a username in their script.
					'redirect' => '',
					'bot' => '1', // Ignored if the user doesn't have the "bot" userright
				]
			]
		);
		$editRequest->setCookieJar( $cookieJar );
		$editRequest->execute();
		$json = $editRequest->getContent();
		$response = FormatJson::decode( $json, true );

		// TODO: Is this really the best way to test success?
		if ( $response['edit']['result'] !== 'Success' ) {
			$msg = 'Error editing the page';
			$this->logError( $msg, [ 'Response' => $response ] );
			return $msg;
		}

		return true;
	}
}
