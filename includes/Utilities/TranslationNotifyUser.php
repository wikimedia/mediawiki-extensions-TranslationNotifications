<?php
declare( strict_types = 1 );

namespace MediaWiki\Extension\TranslationNotifications\Utilities;

use MediaWiki\Extension\TranslationNotifications\Jobs\TranslationNotificationsEmailJob;
use MediaWiki\MassMessage\Job\MassMessageJob;
use MediaWiki\MediaWikiServices;
use MediaWiki\Message\Message;
use MediaWiki\SpecialPage\SpecialPage;
use MediaWiki\Title\Title;
use MediaWiki\User\User;
use MediaWiki\User\UserIdentity;
use MediaWiki\WikiMap\WikiMap;

/**
 * Encapsulates the logic needed to create a notification to be sent to Users based on the
 * type of notification they want. Creates the necessary job classes that are then used to
 * actually deliver the notification.
 * @license GPL-2.0-or-later
 */
class TranslationNotifyUser {
	private Title $translatablePageTitle;
	private User $notifier;
	private string $noReplyAddress;
	/** @var string[] */
	private array $localInterwikis;
	private bool $httpsInEmail;

	// Request information
	/** Request priority: `unset`, `high`, `medium` or `low` */
	private string $priority;
	private string $deadline;
	private string $notificationText;
	/**
	 * A list of languages for which the translators are to be notified. Empty for all languages.
	 * @var string[]
	 */
	private array $languagesToNotify;

	/**
	 * @param Title $translatablePageTitle
	 * @param User $notifier
	 * @param string[] $localInterwikis
	 * @param string $noReplyAddress
	 * @param bool $httpsInEmail
	 * @param array $requestData
	 */
	public function __construct(
		Title $translatablePageTitle,
		User $notifier,
		array $localInterwikis,
		string $noReplyAddress,
		bool $httpsInEmail,
		array $requestData
	) {
		$this->notifier = $notifier;
		$this->translatablePageTitle = $translatablePageTitle;

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
	 * @return MassMessageJob
	 */
	public function leaveUserMessage(
		User $translator,
		string $destination = 'talkpageHere'
	): MassMessageJob {
		$relevantLanguages = $this->getRelevantLanguages( $translator, $this->languagesToNotify );
		$userFirstLanguageCode = $this->getUserFirstLanguage( $translator );
		$userFirstLanguage = MediaWikiServices::getInstance()->getLanguageFactory()
			->getLanguage( $userFirstLanguageCode );

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
		)->numParams( count( $relevantLanguages ) )
			->params( NotificationMessageBuilder::getSignupURL( $this->getUrlProtocol() ) )
			->inLanguage( $userFirstLanguage )
			->text();

		// Bidi-isolation of site name from date
		$text .= $userFirstLanguage->getDirMark() .
			// Date and time
			', ~~~~~';

		// Note: Maybe this was originally meant for edit summary, but it's actually used as subject
		$subject = wfMessage(
			'translationnotifications-edit-summary',
			$this->translatablePageTitle
		)->inLanguage( $userFirstLanguage )->text();

		$listUrl = SpecialPage::getTitleFor( 'NotifyTranslators' )->getCanonicalURL();

		$params = [
			// This is not the edit summary, but rather hidden comment left after the message
			'comment' => [
				$this->notifier->getName(),
				WikiMap::getCurrentWikiId(),
				$listUrl
			],
			'message' => $text,
			'subject' => $subject,
			// Use canonical version of the namespace that works in all wikis and assume that
			// user names are global across wikis
			'title' => 'User_talk:' . $translator->getName(),
		];

		// Ignored, the page to deliver to is read from $params['title']
		$jobTitle = $translator->getTalkPage();

		return new MassMessageJob( $jobTitle, $params );
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
		$userFirstLanguage = MediaWikiServices::getInstance()->getLanguageFactory()
			->getLanguage( $this->getUserFirstLanguage( $translator ) );
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

		$emailBody = wfMessage( 'translationnotifications-email-body' )
			->params(
				NotificationMessageBuilder::getUserName( $translator ),
				$userFirstLanguage->listToText( array_values( $relevantLanguages ) ),
				$this->translatablePageTitle,
				$translationUrls,
				NotificationMessageBuilder::getPriorityClause( $userFirstLanguage, $this->priority ),
				NotificationMessageBuilder::getDeadlineClause( $userFirstLanguage, $this->deadline ),
				$this->notificationText,
				NotificationMessageBuilder::getSignupURL( $this->getUrlProtocol() ),
				Message::numParam( count( $relevantLanguages ) ),
				$translator->getName()
			)->inLanguage( $userFirstLanguage )->text();

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
	private function getRelevantLanguages( User $user, array $languagesToNotify ): array {
		$userLanguages = $this->getUserLanguages( $user );
		$userFirstLanguageCode = $userLanguages[0];
		$limitLanguages = count( $languagesToNotify );
		$userLanguageNames = [];

		$languageNameUtils = MediaWikiServices::getInstance()->getLanguageNameUtils();
		foreach ( $userLanguages as $langCode ) {
			// Don't add this language if particular languages were
			// specified and this language was not one of them.
			if ( ( $limitLanguages && !in_array( $langCode, $languagesToNotify ) ) ) {
				continue;
			}

			$userLanguageNames[$langCode] = $languageNameUtils->getLanguageName(
				$langCode,
				$userFirstLanguageCode
			);
		}

		return $userLanguageNames;
	}

	/**
	 * Returns a language that a user signed up for in
	 * Special:TranslatorSignup.
	 * @param UserIdentity $user
	 * @param int $langNum Number of language.
	 * @return string Language code, or null if it wasn't defined.
	 */
	private function getUserLanguageOption( UserIdentity $user, int $langNum ): string {
		return MediaWikiServices::getInstance()
			->getUserOptionsLookup()
			->getOption( $user, "translationnotifications-lang-$langNum" );
	}

	/**
	 * Returns the code of the first language to which a user signed up in
	 * Special:TranslatorSignup.
	 * @return string Language code.
	 */
	private function getUserFirstLanguage( User $user ): string {
		return $this->getUserLanguageOption( $user, 1 );
	}

	/**
	 * Returns an array of all language codes to which a user signed up in
	 * Special:TranslatorSignup.
	 * @return array of language codes.
	 */
	private function getUserLanguages( User $user ): array {
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
	private function getUrlProtocol() {
		return !$this->httpsInEmail
			? PROTO_CANONICAL
			: PROTO_HTTPS;
	}
}
