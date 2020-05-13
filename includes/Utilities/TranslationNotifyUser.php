<?php
/*
* @file
* @license GPL-2.0-or-later
*/

use MediaWiki\MediaWikiServices;

/**
 * Encapsulates the logic needed to create a notification to be sent to Users based on the
 * type of notification they want. Creates the necessary job classes that are then used to
 * actually deliver the notification.
 * @since 2019.10
 */
class TranslationNotifyUser {
	/**
	 * @var Title
	 */
	private $translatablePageTitle;

	/**
	 * @var User
	 */
	private $notifier;

	/**
	 * @var string
	 */
	private $noReplyAddress;

	/**
	 * @var string[]
	 */
	private $localInterwikis;

	/**
	 * @var boolean
	 */
	private $httpsInEmail;

	private $sourceLanguageCode;

	// Request information
	private $priority;
	private $deadline;
	private $notificationText;

	/**
	 * A list of languages for which the translators are to be notified. Empty for all languages.
	 * @var string[]
	 */
	private $languagesToNotify;

	/**
	 * @param Title $translatablePageTitle
	 * @param User $notifier
	 * @param string[] $localInterwikis
	 * @param string $noReplyAddress
	 * @param bool $httpsInEmail
	 * @param string $sourceLanguageCode
	 * @param array $requestData
	 */
	public function __construct(
		Title $translatablePageTitle, User $notifier, $localInterwikis, $noReplyAddress,
		$httpsInEmail, $sourceLanguageCode, $requestData
	) {
		$this->notifier = $notifier;
		$this->translatablePageTitle = $translatablePageTitle;
		$this->sourceLanguageCode = $sourceLanguageCode;

		$this->noReplyAddress = $noReplyAddress;
		$this->localInterwikis = $localInterwikis;
		$this->httpsInEmail = $httpsInEmail;

		$this->notificationText = $requestData['text'];
		$this->languagesToNotify = $requestData['languagesToNotify'];
		$this->priority = $requestData['priority'] ?? '';
		$this->deadline = $requestData['deadline'] ?? '';
	}

	/**
	 * Leave a message on the user's talk page.
	 * @param User $translator To whom the message to be sent
	 * @param string $destination Whether to send it to a talk page on this wiki
	 * ('talkpageHere', default) or another one ('talkpageInOtherWiki').
	 * @return TranslationNotificationsTalkPageJob
	 */
	public function leaveUserMessage(
		User $translator, $destination = 'talkpageHere'
	) {
		$relevantLanguages = $this->getRelevantLanguages( $translator, $this->languagesToNotify );
		$userFirstLanguageCode = $this->getUserFirstLanguage( $translator );
		$userFirstLanguage = Language::factory( $userFirstLanguageCode );

		$text = wfMessage(
			'translationnotifications-talkpage-body',
			$translator->getName(),
			NotificationMessageBuilder::getUserName( $translator ),
			$userFirstLanguage->listToText( array_values( $relevantLanguages ) ),
			NotificationMessageBuilder::getMessageTitle(
				$this->translatablePageTitle, $destination, $this->localInterwikis
			),
			NotificationMessageBuilder::getTranslationURLs(
				$this->translatablePageTitle, $relevantLanguages, 'talkpage',
				$userFirstLanguage, $this->getUrlProtocol()
			),
			NotificationMessageBuilder::getPriorityClause( $userFirstLanguage, $this->priority ),
			NotificationMessageBuilder::getDeadlineClause( $userFirstLanguage, $this->deadline ),
			NotificationMessageBuilder::getNotificationMessage(
				MediaWikiServices::getInstance()->getContentLanguage(),
				$this->notificationText
			)
		)->numParams( count( $relevantLanguages ) ) // $9
			->params( NotificationMessageBuilder::getSignupURL( $this->getUrlProtocol() ) ) // $10
			->inLanguage( $userFirstLanguage )
			->text();

		// Bidi-isolation of site name from date
		$text .= $userFirstLanguage->getDirMarkEntity() .
			', ~~~~~'; // Date and time

		$editSummary = wfMessage(
			'translationnotifications-edit-summary',
			$this->translatablePageTitle
		)->inLanguage( $userFirstLanguage )->text();

		$params = [
			'text' => $text,
			'editSummary' => $editSummary,
		];

		list( $translatorId, $type ) = $this->getUserId(
			$translator, $destination === 'talkpageInOtherWiki'
		);

		if ( $type === 'central' ) {
			if ( $translatorId === 0 ) {
				throw new RuntimeException(
					"Destination is external wiki, but no central Id found for user - {$translator->getId()}"
				);
			}
			$params['centralUserId'] = $translatorId;
		} else {
			$params['localUserId'] = $translatorId;
		}

		// Create a dummy title to be used as parameter.
		$title = Title::makeTitle( NS_SPECIAL, 'Blankpage' );
		return new TranslationNotificationsTalkPageJob( $title, $params );
	}

	/**
	 * Notify a user by email.
	 * @param User $translator User to whom the email is being sent
	 * @return TranslationNotificationsEmailJob
	 */
	public function sendTranslationNotificationEmail(
		User $translator
	): TranslationNotificationsEmailJob {
		$relevantLanguages = $this->getRelevantLanguages( $translator, $this->languagesToNotify );
		$userFirstLanguage = Language::factory( $this->getUserFirstLanguage( $translator ) );
		$emailSubject = NotificationMessageBuilder::getNotificationSubject(
			$this->translatablePageTitle, $userFirstLanguage
		);

		$translationUrls = NotificationMessageBuilder::getTranslationURLs(
			$this->translatablePageTitle,
			$relevantLanguages,
			'email',
			$userFirstLanguage,
			$this->getUrlProtocol()
		);

		$emailBody = wfMessage(
			'translationnotifications-email-body',
			NotificationMessageBuilder::getUserName( $translator ),
			$userFirstLanguage->listToText( array_values( $relevantLanguages ) ),
			$this->translatablePageTitle,
			$translationUrls,
			NotificationMessageBuilder::getPriorityClause( $userFirstLanguage, $this->priority ),
			NotificationMessageBuilder::getDeadlineClause( $userFirstLanguage, $this->deadline ),
			NotificationMessageBuilder::getNotificationMessage(
				MediaWikiServices::getInstance()->getContentLanguage(),
				$this->notificationText
			),
			NotificationMessageBuilder::getSignupURL( $this->getUrlProtocol() )
		)
			->numParams( count( $relevantLanguages ) ) // $9
			->params( $translator->getName() ) // $10
			->inLanguage( $userFirstLanguage )->text();

		$sender = $this->notifier;

		// Do not publish the sender's email, but include his/her name
		$emailFrom = TranslationNotificationsEmailJob::buildAddress(
			$this->noReplyAddress,
			$sender->getName(),
			$sender->getRealName()
		);

		$params = [
			'to' => TranslationNotificationsEmailJob::addressFromUser( $translator ),
			'from' => $emailFrom,
			'body' => $emailBody,
			'subject' => $emailSubject,
			'replyTo' => $emailFrom,
		];

		return new TranslationNotificationsEmailJob( $this->translatablePageTitle, $params );
	}

	/**
	 * Returns a list of language codes and names for the current
	 * notification to the user.
	 * @param User $user User to whom the email is being sent
	 * @param string[] $languagesToNotify A list of languages that are notified.
	 * Empty for all languages.
	 * @return string[] Array of language codes
	 */
	protected function getRelevantLanguages( User $user, $languagesToNotify ) {
		$userLanguages = $this->getUserLanguages( $user );
		$userFirstLanguageCode = $userLanguages[0];
		$limitLanguages = count( $languagesToNotify );
		$userLanguageNames = [];

		foreach ( $userLanguages as $langCode ) {
			// Don't add this language if particular languages were
			// specified and this language was not one of them
			// or if this is the source language.
			if ( ( $langCode === $this->sourceLanguageCode )
				|| ( $limitLanguages
					&& !in_array( $langCode, $languagesToNotify ) )
			) {
				continue;
			}

			$userLanguageNames[$langCode] = Language::fetchLanguageName(
				$langCode,
				$userFirstLanguageCode
			);
		}

		return $userLanguageNames;
	}

	/**
	 * Returns a language that a user signed up for in
	 * Special:TranslatorSignup.
	 * @param User $user
	 * @param int $langNum Number of language.
	 * @return string Language code, or null if it wasn't defined.
	 */
	protected function getUserLanguageOption( User $user, $langNum ) {
		return $user->getOption( "translationnotifications-lang-$langNum" );
	}

	/**
	 * Returns the code of the first language to which a user signed up in
	 * Special:TranslatorSignup.
	 * @param User $user
	 * @return string Language code.
	 */
	protected function getUserFirstLanguage( User $user ) {
		return $this->getUserLanguageOption( $user, 1 );
	}

	/**
	 * Returns an array of all language codes to which a user signed up in
	 * Special:TranslatorSignup.
	 * @param User $user
	 * @return array of language codes.
	 */
	protected function getUserLanguages( User $user ) {
		$userLanguages = [];

		foreach ( range( 1, 3 ) as $langNum ) {
			$nextLanguage = $this->getUserLanguageOption( $user, $langNum );
			if ( $nextLanguage !== '' ) {
				$userLanguages[] = $nextLanguage;
			}
		}

		return $userLanguages;
	}

	/**
	 * Returns the URL protocol to be used based on configuration
	 * @return string|int a PROTO_* constant
	 */
	protected function getUrlProtocol() {
		return $this->httpsInEmail === false
			? PROTO_CANONICAL
			: PROTO_HTTPS;
	}

	/**
	 * Checks and returns either the central user id or the local user id incase the
	 * central user id is not found and the message has to be left on the local wiki
	 * itself.
	 * @param User $user
	 * @param bool $isOtherWiki
	 * @return array First item contains the Id, second tells the type - central
	 * or local
	 * @phan-return array{int,'central'|'local'}
	 */
	protected function getUserId( User $user, $isOtherWiki ) {
		$lookup = CentralIdLookup::factory();
		$centralId = $lookup->centralIdFromLocalUser( $user, CentralIdLookup::AUDIENCE_RAW );

		if ( $centralId !== 0 ) {
			return [ $centralId, 'central' ];
		}

		if ( $isOtherWiki ) {
			// other wiki, but no central id for the user.
			return [ 0, 'central' ];
		}

		return [ $user->getId(), 'local' ];
	}
}
