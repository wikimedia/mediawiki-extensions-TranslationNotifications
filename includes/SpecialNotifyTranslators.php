<?php
/**
 * Form for translation managers to send a notification
 * to registered translators.
 *
 * @file
 * @author Amir E. Aharoni
 * @author Santhosh Thottingal
 * @author Niklas Laxström
 * @author Siebrand Mazeland
 * @copyright Copyright © 2012, Amir E. Aharoni, Santhosh Thottingal
 * @license GPL-2.0-or-later
 */

/**
 * Form for translation managers to send a notification
 * to registered translators.
 *
 * @ingroup SpecialPage TranslateSpecialPage
 */
class SpecialNotifyTranslators extends FormSpecialPage {
	public static $right = 'translate-manage';
	private $notificationText = '';
	/**
	 * @var Title
	 */
	private $translatablePageTitle;
	private $deadlineDate = '';
	private $priority = '';
	private $sourceLanguageCode = '';

	public function __construct() {
		parent::__construct( 'NotifyTranslators', self::$right );
	}

	public function doesWrites() {
		return true;
	}

	protected function getGroupName() {
		return 'users';
	}

	protected function getMessagePrefix() {
		return 'translationnotifications';
	}

	protected function alterForm( HTMLForm $form ) {
		$form->setId( 'notifytranslators-form' );
		$form->setSubmitID( 'translationnotifications-send-notification-button' );
		$form->setSubmitTextMsg( 'translationnotifications-send-notification-button' );
		$form->setWrapperLegend( false );
	}

	/**
	 * Get the form fields for use by the HTMLForm.
	 * We also set up the JavaScript needed on the form here.
	 *
	 * @return array
	 * @throws ErrorPageError if there is no translatable page on this wiki
	 */
	protected function getFormFields() {
		global $wgContLang;
		$this->getOutput()->addModules( 'ext.translationnotifications.notifytranslators' );

		$formFields = [];

		$pages = $this->getTranslatablePages();
		if ( count( $pages ) === 0 ) {
			throw new ErrorPageError( 'notifytranslators',
				'translationnotifications-error-no-translatable-pages' );
		}

		$formFields['TranslatablePage'] = [
			'name' => 'tpage',
			'type' => 'select',
			'label-message' => [ 'translationnotifications-translatablepage-title' ],
			'options' => $pages,
		];

		// Dummy dropdown, will be invisible. Used as data source for language name autocompletion.
		// @todo Implement a proper field with everything needed for this and make this less hackish
		$languageSelector = Xml::languageSelector(
			$wgContLang->getCode(),
			false,
			$this->getLanguage()->getCode(),
			[ 'style' => 'display: none;' ]
		);
		$formFields['LanguagesList'] = [
			'type' => 'info',
			'raw' => true,
			'default' => $languageSelector[1],
		];
		// Languages to notify input box
		$formFields['LanguagesToNotify'] = [
			'type' => 'text',
			'rows' => 20,
			'cols' => 80,
			'label-message' => 'translationnotifications-languages-to-notify-label',
			'help-message' => 'translationnotifications-languages-to-notify-label-help-message',
		];

		// Priority dropdown
		$priorityOptions = [];
		$priorities = [ 'unset', 'high', 'medium', 'low' ];

		foreach ( $priorities as $priority ) {
			$priorityMessage =
				self::getPriorityMessage( $priority )->setContext( $this->getContext() )->text();
			$priorityOptions[$priorityMessage] = $priority;
		}

		$formFields['Priority'] = [
			'type' => 'select',
			'label-message' => [ 'translationnotifications-priority' ],
			'options' => $priorityOptions,
			'default' => 'unset',
		];

		// Deadline date input box with datepicker
		$formFields['DeadlineDate'] = [
			'type' => 'text',
			'size' => 20,
			'label-message' => 'translationnotifications-deadline-label',
		];

		// Custom text
		$formFields['NotificationText'] = [
			'type' => 'textarea',
			'rows' => 20,
			'cols' => 80,
			'label-message' => 'emailmessage',
		];

		return $formFields;
	}

	/**
	 * @return array
	 */
	protected function getTranslatablePages() {
		$translatablePages = MessageGroups::getGroupsByType( 'WikiPageMessageGroup' );
		usort( $translatablePages, [ 'MessageGroups', 'groupLabelSort' ] );

		$titles = [];
		// Retrieving article id requires doing DB queries.
		// Make it more efficient by batching into one query.
		$lb = new LinkBatch();
		/**
		 * @var WikiPageMessageGroup $page
		 */
		foreach ( $translatablePages as $page ) {
			if ( MessageGroups::getPriority( $page ) === 'discouraged' ) {
				continue;
			}
			'@phan-var WikiPageMessageGroup $page';
			$title = $page->getTitle();
			$lb->addObj( $title );
			$titles[] = $title;
		}
		$lb->execute();

		$translatablePagesOptions = [];
		foreach ( $titles as $title ) {
			$translatablePagesOptions[$title->getPrefixedText()] = $title->getArticleID();
		}

		return $translatablePagesOptions;
	}

	private function getSourceLanguage() {
		if ( $this->sourceLanguageCode === '' ) {
			$translatablePage = TranslatablePage::newFromTitle( $this->translatablePageTitle );
			$this->sourceLanguageCode = $translatablePage->getMessageGroup()->getSourceLanguage();
		}

		return $this->sourceLanguageCode;
	}

	/**
	 * Callback for the submit button.
	 *
	 * @param array $formData
	 * @return true
	 * @todo Document
	 */
	public function onSubmit( array $formData ) {
		$this->translatablePageTitle = Title::newFromID( $formData['TranslatablePage'] );
		$this->notificationText = $formData['NotificationText'];
		$this->priority = $formData['Priority'];
		$this->deadlineDate = $formData['DeadlineDate'];
		$languagesToNotify = explode( ',', $formData['LanguagesToNotify'] );
		$languagesToNotify = array_filter( array_map( 'trim', $languagesToNotify ) );

		$langPropertyPrefix = 'translationnotifications-lang-';

		$dbr = wfGetDB( DB_REPLICA );
		$propertyLikePattern = $dbr->buildLike( $langPropertyPrefix, $dbr->anyString() );
		$translatorsConds = [
			"up_property $propertyLikePattern",
		];

		$pageSourceLangCode = $this->getSourceLanguage();

		// The default is not to specify any languages and to send
		// the notification to speakers of all the languages except
		// the source language. When no languages are specified,
		// an empty string will be sent here and an appropriate
		// message will be shown in the log.
		$languagesForLog = '';
		if ( count( $languagesToNotify ) ) {
			// Filter out the source language
			$translatorsConds['up_value'] = [];

			foreach ( $languagesToNotify as $langCode ) {
				if ( $langCode !== $pageSourceLangCode ) {
					$translatorsConds['up_value'][] = $langCode;
				}
			}

			$languagesToNotify = $translatorsConds['up_value'];

			if ( count( $languagesToNotify ) === 0 ) {
				return Status::newFatal( 'translationnotifications-sourcelang-only' );
			}

			$languagesForLog = $this->getLanguage()->commaList( $languagesToNotify );
		} else {
			// All languages except the source language
			$translatorsConds[] = "up_value <> '$pageSourceLangCode'";
		}

		$translators = $dbr->select(
			'user_properties',
			'up_user',
			$translatorsConds,
			__METHOD__,
			'DISTINCT'
		);

		$frequencies = [
			'always' => 0,
			'week' => 604800, // seconds in week
			'month' => 2678400, // seconds in month
			'weekly' => 604800, // seconds in week
			'monthly' => 2678400, // seconds in month
		];
		$currentUnixTime = wfTimestamp();
		$currentDBTime = $dbr->timestamp( $currentUnixTime );

		$count = 0;
		$tooEarly = 0;
		$timestampOptionName = 'translationnotifications-timestamp';
		$jobs = [];
		foreach ( $translators as $row ) {
			$user = User::newFromID( $row->up_user );

			$userTimestamp = $user->getOption( $timestampOptionName, null );
			$userUnixTimestamp = ( $userTimestamp == null ) ?
				wfTimestamp( TS_UNIX, '20120101000000' ) : // An old timestamp
				wfTimestamp( TS_UNIX, $userTimestamp );

			$timeSinceNotification = $currentUnixTime - $userUnixTimestamp;
			$userTranslationFrequency =
				$frequencies[$user->getOption( 'translationnotifications-freq' )];

			if ( $timeSinceNotification > $userTranslationFrequency ) {
				if ( $user->getOption( 'translationnotifications-cmethod-email' ) ) {
					if ( $user->getOption( 'disablemail' ) ) {
						// For some reason the user signed up to receive
						// Translation Notifications emails, but receiving
						// email is disabled in the user's preferences.
						// To be on the safe side, disable the email
						// contact method.
						$user->setOption( 'translationnotifications-cmethod-email', false );
					} elseif ( $user->getOption( 'translationnotifications-freq' ) === 'always' ) {
						$jobs[] = $this->sendTranslationNotificationEmail( $user );
					}
				}
				if ( $user->getOption( 'translationnotifications-cmethod-talkpage' ) ) {
					$jobs[] = $this->leaveUserMessage(
						$user,
						$languagesToNotify,
						'talkpageHere'
					);
				}
				if ( $user->getOption( 'translationnotifications-cmethod-talkpage-elsewhere' ) ) {
					$jobs[] = $this->leaveUserMessage(
						$user,
						$languagesToNotify,
						'talkpageInOtherWiki'
					);
				}

				$user->setOption( $timestampOptionName, $currentDBTime );
				$user->saveSettings();
			} else {
				$tooEarly++;
			}
		}

		if ( $jobs ) {
			$count = count( $jobs );
			JobQueueGroup::singleton()->push( $jobs );
		}

		$logEntry = new ManualLogEntry( 'notifytranslators', 'sent' );
		$logEntry->setPerformer( $this->getUser() );
		$logEntry->setTarget( $this->translatablePageTitle );
		$logEntry->setParameters( [
			'4::languagesForLog' => $languagesForLog,
			'5::deadlineDate' => $this->deadlineDate,
			'6::priority' => $this->priority,
			'7::sentSuccess' => $count,
			'8::sentFail' => 0,
			'9::tooEarly' => $tooEarly,
		] );

		$logid = $logEntry->insert();
		$logEntry->publish( $logid );

		return true;
	}

	public function onSuccess() {
		$this->getOutput()->addWikiMsg( 'translationnotifications-submit-ok' );
	}

	protected function getNotificationSubject( $userFirstLanguage ) {
		return $this->msg(
			'translationnotifications-email-subject',
			$this->translatablePageTitle->getText()
		)->inLanguage( $userFirstLanguage )->text();
	}

	/**
	 * Returns a language that a user signed up for in
	 * Special:TranslatorSignup.
	 * @param User $user
	 * @param int $langNum Number of language.
	 * @return string Language code, or null if it wasn't defined.
	 */
	protected function getUserLanguageOption( $user, $langNum ) {
		return $user->getOption( "translationnotifications-lang-$langNum" );
	}

	/**
	 * Returns the code of the first language to which a user signed up in
	 * Special:TranslatorSignup.
	 * @param User $user
	 * @return string Language code.
	 */
	protected function getUserFirstLanguage( $user ) {
		return $this->getUserLanguageOption( $user, 1 );
	}

	/**
	 * Returns an array of all language codes to which a user signed up in
	 * Special:TranslatorSignup.
	 * @param User $user
	 * @return array of language codes.
	 */
	protected function getUserLanguages( $user ) {
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
	 * @param User $user
	 * @return string
	 */
	protected function getUserName( $user ) {
		$name = $user->getRealName();
		if ( $name === '' ) {
			$name = $user->getName();
		}

		return $name;
	}

	/**
	 * @param string $priority
	 * @return Message
	 */
	public static function getPriorityMessage( $priority ) {
		// possible messages here:
		// 'translationnotifications-priority-high'
		// 'translationnotifications-priority-medium'
		// 'translationnotifications-priority-low'
		// 'translationnotifications-priority-unset'
		return wfMessage( "translationnotifications-priority-$priority" );
	}

	/**
	 * @param Language $userFirstLanguage Language object set as first preference
	 * @return string
	 */
	protected function getPriorityClause( $userFirstLanguage ) {
		if ( $this->priority === 'unset' ) {
			return '';
		}

		return $this->msg(
			'translationnotifications-email-priority',
			self::getPriorityMessage(
				$this->priority
			)->inLanguage( $userFirstLanguage )->text()
		)->inLanguage( $userFirstLanguage )->text();
	}

	/**
	 * Returns URL to signup and change notification preferences
	 * @return string Sinup URL
	 */
	protected function getSignupURL() {
		$signupURL = SpecialPage::getTitleFor( 'TranslatorSignup' )->getFullURL(
			'',
			false,
			$this->getUrlProtocol()
		);

		return $signupURL;
	}

	/**
	 * @return string
	 */
	protected function getUrlProtocol() {
		return $this->getConfig()->get( 'TranslationNotificationsAlwaysHttpsInEmail' ) === false
			? PROTO_CANONICAL
			: PROTO_HTTPS;
	}

	/**
	 * @param string $languageCode
	 * @return string Translation URL
	 */
	protected function getTranslationURL( $languageCode ) {
		$page = TranslatablePage::newFromTitle( $this->translatablePageTitle );
		$translationURL = SpecialPage::getTitleFor( 'Translate' )->getFullURL(
			[
				'group' => $page->getMessageGroupId(),
				'language' => $languageCode,
				'action' => 'page'
			],
			false,
			$this->getUrlProtocol()
		);

		return $translationURL;
	}

	/**
	 * Returns a list of URLs for page translation in every language.
	 * @param string[] $languages A list of language codes and language names.
	 * @param string $contactMethod The contact method - 'talkpage' or 'email'.
	 * @param string|Language $inLanguage Language code or Language object.
	 * @return string
	 */
	protected function getTranslationURLs( $languages, $contactMethod, $inLanguage ) {
		$translationURLsItems = [];

		foreach ( $languages as $code => $langName ) {
			$translationURL = $this->getTranslationURL( $code );

			$translationMsg = $this->msg(
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
	 * @param Language $userFirstLanguage
	 * @return string
	 */
	protected function getDeadlineClause( $userFirstLanguage ) {
		if ( $this->deadlineDate === '' ) {
			return '';
		}

		return $this->msg(
			'translationnotifications-email-deadline',
			$this->deadlineDate
		)->inLanguage( $userFirstLanguage )->text();
	}

	/**
	 * Returns a list of language codes and names for the current
	 * notification to the user.
	 * @param User $user User to whom the email is being sent
	 * @param string[] $languagesToNotify A list of languages that are notified.
	 * Empty for all languages.
	 * @return string[] Array of language codes
	 */
	protected function getRelevantLanguages( $user, $languagesToNotify ) {
		$userLanguages = $this->getUserLanguages( $user );
		$userFirstLanguageCode = $userLanguages[0];
		$limitLanguages = count( $languagesToNotify );
		$userLanguageNames = [];

		foreach ( $userLanguages as $langCode ) {
			// Don't add this language if particular languages were
			// specified and this language was not one of them
			// or if this is the source language.
			if ( ( $langCode === $this->getSourceLanguage() )
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
	 * Notify a user by email.
	 * @param User $user User to whom the email is being sent
	 * @param array $languagesToNotify A list of languages that are notified.
	 * Empty for all languages.
	 * @return EmaillingJob
	 */
	protected function sendTranslationNotificationEmail( User $user,
		$languagesToNotify = []
	) {
		$relevantLanguages = $this->getRelevantLanguages( $user, $languagesToNotify );
		$userFirstLanguage = Language::factory( $this->getUserFirstLanguage( $user ) );
		$emailSubject = self::getNotificationSubject( $userFirstLanguage );

		$translationUrls = $this->getTranslationURLs(
			$relevantLanguages,
			'email',
			$userFirstLanguage
		);

		$emailBody = $this->msg(
			'translationnotifications-email-body',
			$this->getUserName( $user ),
			$userFirstLanguage->listToText( array_values( $relevantLanguages ) ),
			$this->translatablePageTitle,
			$translationUrls,
			$this->getPriorityClause( $userFirstLanguage ),
			$this->getDeadlineClause( $userFirstLanguage ),
			$this->notificationText,
			$this->getSignupURL()
		)
			->numParams( count( $relevantLanguages ) ) // $9
			->params( $user->getName() ) // $10
			->inLanguage( $userFirstLanguage )->text();

		$sender = $this->getUser();

		// Do not publish the sender's email, but include his/her name
		$emailFrom = new MailAddress(
			$this->getConfig()->get( 'NoReplyAddress' ),
			$sender->getName(),
			$sender->getRealName()
		);
		$emailTo = MailAddress::newFromUser( $user );
		$params = [
			'to' => $emailTo,
			'from' => $emailFrom,
			'body' => $emailBody,
			'subj' => $emailSubject,
			'replyto' => $emailFrom,
		];
		return new EmaillingJob( $this->translatablePageTitle, $params );
	}

	/**
	 * Leave a message on the user's talk page.
	 * @param User $user To whom the message to be sent
	 * @param string[] $languagesToNotify A list of languages that are notified.
	 * Empty for all languages.
	 * @param string $destination Whether to send it to a talk page on this wiki
	 * ('talkpageHere', default) or another one ('talkpageInOtherWiki').
	 * @return TranslationNotificationJob
	 */
	public function leaveUserMessage( User $user, $languagesToNotify = [],
		$destination = 'talkpageHere'
	) {
		$relevantLanguages = $this->getRelevantLanguages( $user, $languagesToNotify );
		$userFirstLanguageCode = $this->getUserFirstLanguage( $user );
		$userFirstLanguage = Language::factory( $userFirstLanguageCode );

		// Assume that the message is in the content language
		// of the originating wiki.
		global $wgContLang;
		$dir = $wgContLang->getDir();
		// Possible classes:
		// mw-content-ltr, mw-content-rtl
		$notificationText = Html::element( 'div',
			[
				'lang' => $wgContLang->getCode(),
				'class' => "mw-content-$dir"
			],
			$this->notificationText
		);

		$titleForMessage = $this->translatablePageTitle;

		$localInterwikis = $this->getConfig()->get( 'LocalInterwikis' );
		if ( $destination === 'talkpageInOtherWiki' && count( $localInterwikis ) ) {
			$titleForMessage = ":$localInterwikis[0]:$titleForMessage|$titleForMessage";
		}

		$text = $this->msg(
			'translationnotifications-talkpage-body',
			$user->getName(),
			$this->getUserName( $user ),
			$userFirstLanguage->listToText( array_values( $relevantLanguages ) ),
			$titleForMessage,
			$this->getTranslationURLs( $relevantLanguages, 'talkpage', $userFirstLanguage ),
			$this->getPriorityClause( $userFirstLanguage ),
			$this->getDeadlineClause( $userFirstLanguage ),
			$notificationText
		)->numParams( count( $relevantLanguages ) ) // $9
			->params( $this->getSignupURL() ) // $10
			->inLanguage( $userFirstLanguage )
			->text();
		// Bidi-isolation of site name from date
		$text .= $userFirstLanguage->getDirMarkEntity() .
			', ~~~~~'; // Date and time

		$editSummary = $this->msg(
			'translationnotifications-edit-summary',
			$this->translatablePageTitle
		)->inLanguage( $userFirstLanguage )->text();
		$params = [
			'text' => $text,
			'editSummary' => $editSummary,
			'editor' => $this->getUser()->getId(),
			'languageCode' => $userFirstLanguageCode,
		];

		if ( $destination === 'talkpageInOtherWiki' ) {
			$params['otherwiki'] =
				$user->getOption( 'translationnotifications-cmethod-talkpage-elsewhere-loc' );
		}

		return new TranslationNotificationJob( $user->getTalkPage(), $params );
	}
}
