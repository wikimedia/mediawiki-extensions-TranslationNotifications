<?php
/**
 * Update the User talk pages of translators with notification about new page translations.
 * @file
 * @ingroup JobQueue
 */
class TranslationNotificationJob extends Job {
	public function __construct( $title, $params, $id = 0 ) {
		parent::__construct( 'translationNotificationJob', $title, $params, $id );
	}

	/**
	 * Execute the job
	 *
	 * @return bool
	 */
	public function run() {
		if ( isset( $this->params['otherwiki'] ) ) {
			$status = $this->publishInOtherWiki();
		} else {
			$status = $this->publishHere();
		}

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
			array(
				'lang' => $this->params['languageCode'],
				'class' => "mw-content-$dir"
			),
			$this->params['text']
		);
	}

	private function publishHere() {
		$text = '== ' . $this->params['editSummary'] . " ==\n\n" . $this->textDiv();

		$talkPage = WikiPage::factory( $this->title );
		$flags = $talkPage->checkFlags( 0 );
		if ( $flags & EDIT_UPDATE ) {
			$content = $talkPage->getContent( Revision::RAW );
			if ( $content instanceof TextContent ) {
				$textContent = $content->getNativeData();
			} else {
				// Cannot do anything with non-TextContent pages. Shouldn't happen.
				return true;
			}

			$text = $textContent . "\n" . $text;
		}
		$editor = User::newFromID( $this->params['editor'] );
		$status = $talkPage->doEditContent(
			ContentHandler::makeContent( $text, $this->title ),
			$this->params['editSummary'],
			$flags,
			false,
			$editor
		);

		return $status->isGood();
	}

	private function publishInOtherWiki() {
		global $wgNotificationUsername, $wgNotificationUserPassword;

		$wiki = WikiMap::getWiki( $this->params['otherwiki'] );
		$otherWikiBaseUrl = 'http://' . $wiki->getHostname() . wfScript( 'api' );

		// API: Get login token

		wfDebug( "publishInOtherWiki API: Get login token\n" );

		$loginUrl = wfAppendQuery( $otherWikiBaseUrl, array(
				'action' => 'login',
				'format' => 'json',
		) );
		$getLoginTokenRequest = MWHttpRequest::factory(
			$loginUrl,
			array(
				'method' => 'POST',
				'postData' => array(
					'lgname' => $wgNotificationUsername,
					'lgpassword' => $wgNotificationUserPassword,
				)
			)
		);
		$getLoginTokenRequest->execute();
		$json = $getLoginTokenRequest->getContent();
		$cookieJar = $getLoginTokenRequest->getCookieJar();

		$response = FormatJson::decode( $json, true );

		// TODO: Is this really the best way to test success?
		if ( $response['login']['result'] !== 'NeedToken' ) {
			return "Error getting a login token";
		}

		$loginToken = $response['login']['token'];
		if ( strlen( $loginToken ) < 4 ) {
			return "Error: Login token too short";
		}

		// API: Do the login

		wfDebug( "publishInOtherWiki API: Do the login\n" );

		$loginRequest = MWHttpRequest::factory(
			$loginUrl,
			array(
				'method' => 'POST',
				'postData' => array(
					'lgname' => $wgNotificationUsername,
					'lgpassword' => $wgNotificationUserPassword,
					'lgtoken' => $loginToken,
				)
			)
		);
		$loginRequest->setCookieJar( $cookieJar );
		$loginRequest->execute();
		$json = $loginRequest->getContent();

		$response = FormatJson::decode( $json, true );

		// TODO: Is this really the best way to test success?
		if ( $response['login']['result'] !== 'Success' ) {
			return "Error logging in";
		}

		// API: Get an edit token

		wfDebug( "publishInOtherWiki API: Get an edit token\n" );

		$userTalkPage = $this->title->getFullText();
		$editTokenUrl = wfAppendQuery( $otherWikiBaseUrl, array(
			'action' => 'query',
			'format' => 'json',
		) );
		$getEditTokenRequest = MWHttpRequest::factory(
			$editTokenUrl,
			array(
				'method' => 'POST',
				'postData' => array(
					'prop' => 'info',
					'intoken' => 'edit',
					'titles' => $userTalkPage,
				)
			)
		);
		$getEditTokenRequest->setCookieJar( $cookieJar );
		$getEditTokenRequest->execute();
		$json = $getEditTokenRequest->getContent();

		$response = FormatJson::decode( $json, true );

		$editTokenData = array_shift( $response['query']['pages'] );
		$editToken = $editTokenData['edittoken'];

		// TODO: Is this really the best way to test success?
		if ( strlen( $editToken ) < 4 ) {
			return "Edit token too short";
		}

		// API: Edit the talk page

		wfDebug( "publishInOtherWiki API: Edit the talk page\n" );

		$editUrl = wfAppendQuery( $otherWikiBaseUrl, array(
			'action' => 'edit',
			'format' => 'json',
		) );
		$editRequest = MWHttpRequest::factory(
			$editUrl,
			array(
				'method' => 'POST',
				'postData' => array(
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
				)
			)
		);
		$editRequest->setCookieJar( $cookieJar );
		$editRequest->execute();
		$json = $editRequest->getContent();
		$response = FormatJson::decode( $json, true );

		// TODO: Is this really the best way to test success?
		if ( $response['edit']['result'] !== 'Success' ) {
			return "Error editing the page";
		}

		return true;
	}
}
