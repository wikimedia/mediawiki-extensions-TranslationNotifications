<?php
declare( strict_types=1 );

namespace MediaWiki\Extension\TranslationNotifications\Utilities;

use MediaWiki\Extension\Translate\PageTranslation\TranslatablePage;
use MediaWiki\Html\Html;
use MediaWiki\Language\Language;
use MediaWiki\Message\Message;
use MediaWiki\SpecialPage\SpecialPage;
use MediaWiki\Title\Title;
use MediaWiki\User\User;

/**
 * A class that helps build the notification message to be sent to users
 * @license GPL-2.0-or-later
 */
class NotificationMessageBuilder {
	/**
	 * Returns the message title to be embedded into the message
	 * @param Title $title
	 * @param string $destination
	 * @param string[] $localInterwikis
	 * @return Title|string
	 */
	public static function getMessageTitle( Title $title, string $destination, array $localInterwikis ) {
		$titleForMessage = $title;

		if ( $destination === 'talkpageInOtherWiki' && count( $localInterwikis ) ) {
			$titleForMessage = ":$localInterwikis[0]:$titleForMessage|$titleForMessage";
		}

		return $titleForMessage;
	}

	/**
	 * Returns the message priority clause to be embedded into the message
	 * @param Language $userFirstLanguage Language object set as first preference
	 * @param string $priority
	 * @return string
	 */
	public static function getPriorityClause( Language $userFirstLanguage, string $priority ): string {
		if ( $priority === 'unset' ) {
			return '';
		}

		return wfMessage(
			'translationnotifications-email-priority',
			self::getPriorityMessage(
				$priority
			)->inLanguage( $userFirstLanguage )->text()
		)->inLanguage( $userFirstLanguage )->text();
	}

	/** Return the deadline clause */
	public static function getDeadlineClause( Language $userFirstLanguage, string $deadlineDate ): string {
		if ( $deadlineDate === '' ) {
			return '';
		}

		return wfMessage(
			'translationnotifications-email-deadline',
			$deadlineDate
		)->inLanguage( $userFirstLanguage )->text();
	}

	/** Wrap the text in a div based on the language */
	public static function getNotificationMessage( Language $contLang, string $notificationContent ): string {
		// Assume that the message is in the content language
		// of the originating wiki.
		$dir = $contLang->getDir();
		// Possible classes:
		// mw-content-ltr, mw-content-rtl
		return Html::element( 'div',
			[
				'lang' => $contLang->getCode(),
				'class' => "mw-content-$dir"
			],
			$notificationContent
		);
	}

	/**
	 * Returns a list of URLs for page translation in every language.
	 * @param Title $translatableTitle Title of the page being translated
	 * @param string[] $languages A list of language codes and language names.
	 * @param string $contactMethod The contact method - 'talkpage' or 'email'.
	 * @param string|Language $inLanguage Language code or Language object.
	 * @param string|int $urlProtocol
	 * @return string
	 */
	public static function getTranslationURLs(
		Title $translatableTitle,
		array $languages,
		string $contactMethod,
		$inLanguage,
		$urlProtocol
	): string {
		$translationURLsItems = [];

		foreach ( $languages as $code => $langName ) {
			$translationURL = self::getTranslationURL( $translatableTitle, $code, $urlProtocol );

			$translationMsg = wfMessage(
				'translationnotifications-notification-url-listitem',
				$langName
			)->inLanguage( $inLanguage )->text();

			switch ( $contactMethod ) {
				case 'talkpage':
					$translationURLsItems[] = "* [$translationURL $translationMsg]";
					break;
				case 'email':
					$translationURLsItems[] = "* $translationMsg: <$translationURL>";
					break;
				default:
					return '';
			}
		}

		return implode( "\n", $translationURLsItems );
	}

	/**
	 * Returns URL to signup and change notification preferences
	 * @param string|int $urlProtocol
	 * @return string Signup URL
	 */
	public static function getSignupURL( $urlProtocol ): string {
		return SpecialPage::getTitleFor( 'TranslatorSignup' )->getFullURL(
			'',
			false,
			$urlProtocol
		);
	}

	/** Returns the user name to be used in the notification */
	public static function getUserName( User $user ): string {
		$name = $user->getRealName();
		if ( $name === '' ) {
			$name = $user->getName();
		}

		return $name;
	}

	/**
	 * Returns the subject of the notification
	 * @param Title $title
	 * @param string|Language $userFirstLanguage
	 */
	public static function getNotificationSubject( Title $title, $userFirstLanguage ): string {
		return wfMessage(
			'translationnotifications-email-subject',
			$title->getText()
		)->inLanguage( $userFirstLanguage )->text();
	}

	public static function getPriorityMessage( string $priority ): Message {
		// possible messages here:
		// 'translationnotifications-priority-high'
		// 'translationnotifications-priority-medium'
		// 'translationnotifications-priority-low'
		// 'translationnotifications-priority-unset'
		return wfMessage( "translationnotifications-priority-$priority" );
	}

	/**
	 * @param Title $translatablePageTitle
	 * @param string $languageCode
	 * @param string|int $urlProtocol
	 * @return string Translation URL
	 */
	private static function getTranslationURL(
		Title $translatablePageTitle, string $languageCode, $urlProtocol
	): string {
		$page = TranslatablePage::newFromTitle( $translatablePageTitle );
		return SpecialPage::getTitleFor( 'Translate' )->getFullURL(
			[
				'group' => $page->getMessageGroupId(),
				'language' => $languageCode,
				'action' => 'page',
				'action_source' => 'translation_notification',
			],
			false,
			$urlProtocol
		);
	}
}
