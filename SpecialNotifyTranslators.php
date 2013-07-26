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
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

/**
 * Form for translation managers to send a notification
 * to registered translators.
 *
 * @ingroup SpecialPage TranslateSpecialPage
 */

class SpecialNotifyTranslators extends SpecialPage {
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

	public function execute( $parameters ) {
		global $wgContLang;
		$this->setHeaders();

		$this->checkPermissions();

		$htmlFormDataModel = $this->getFormFields();
		$output = $this->getOutput();

		if ( !is_array( $htmlFormDataModel ) ) {
			$output->addWikiMsg( $htmlFormDataModel );

			return;
		}

		$context = $this->getContext();
		$htmlForm = new HtmlForm( $htmlFormDataModel, $context, 'translationnotifications' );
		$htmlForm->setId( 'notifytranslators-form' );
		$htmlForm->setSubmitText(
			$context->msg( 'translationnotifications-send-notification-button' )->text()
		);
		$htmlForm->setSubmitID( 'translationnotifications-send-notification-button' );
		$htmlForm->setSubmitCallback( array( $this, 'submitNotifyTranslatorsForm' ) );
		$htmlForm->prepareForm();
		$result = $htmlForm->tryAuthorizedSubmit();
		if ( $result === true || ( $result instanceof Status && $result->isGood() ) ) {
			$output->addWikiMsg( 'translationnotifications-submit-ok' );
		} else {
			$htmlForm->displayForm( $result );
		}

		// Dummy dropdown, will be invisible. Used as data source for language name autocompletion.
		$languageSelector = Xml::languageSelector(
			$wgContLang->getCode(),
			false,
			$this->getLanguage()->getCode()
		);
		$output->addHtml( $languageSelector[1] );

		$output->addModules( 'ext.translationnotifications.notifytranslators' );
	}

	/**
	 * Builds the form fields
	 *
	 * @return array or string with an error message key in case of error
	 */
	private function getFormFields() {
		// Translatable pages dropdown
		$translatablePages = MessageGroups::getGroupsByType( 'WikiPageMessageGroup' );

		$translatablePagesOptions = array();
		/**
		 * @var WikiPageMessageGroup $page
		 */
		foreach ( $translatablePages as $page ) {
			if ( MessageGroups::getPriority( $page ) === 'discouraged' ) {
				continue;
			}
			$title = $page->getTitle();
			$translatablePagesOptions[$title->getPrefixedText()] = $title->getArticleID();
		}

		if ( !count( $translatablePagesOptions ) ) {
			return 'translationnotifications-error-no-translatable-pages';
		}

		$formFields = array();

		$formFields['TranslatablePage'] = array(
			'type' => 'select',
			'label-message' => array( 'translationnotifications-translatablepage-title' ),
			'options' => $translatablePagesOptions,
			'default' => 'unset',
		);

		// Languages to notify input box
		$formFields['LanguagesToNotify'] = array(
			'type' => 'text',
			'rows' => 20,
			'cols' => 80,
			'label-message' => 'translationnotifications-languages-to-notify-label',
			'help-message' => 'translationnotifications-languages-to-notify-label-help-message',
		);

		// Priority dropdown
		$priorityOptions = array();
		$priorities = array( 'unset', 'high', 'medium', 'low' );

		foreach ( $priorities as $priority ) {
			$priorityMessage = $this->getPriorityMessage( $priority )->plain();
			$priorityOptions[$priorityMessage] = $priority;
		}

		$formFields['Priority'] = array(
			'type' => 'select',
			'label-message' => array( 'translationnotifications-priority' ),
			'options' => $priorityOptions,
			'default' => 'unset',
		);

		// Deadline date input box with datepicker
		$formFields['DeadlineDate'] = array(
			'type' => 'text',
			'size' => 20,
			'label-message' => 'translationnotifications-deadline-label',
		);

		// Custom text
		$formFields['NotificationText'] = array(
			'type' => 'textarea',
			'rows' => 20,
			'cols' => 80,
			'label-message' => 'emailmessage',
		);

		return $formFields;
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
	 * @todo Document
	 */
	public function submitNotifyTranslatorsForm( $formData, $form ) {
		$this->translatablePageTitle = Title::newFromID( $formData['TranslatablePage'] );
		$this->notificationText = $formData['NotificationText'];
		$this->priority = $formData['Priority'];
		$this->deadlineDate = $formData['DeadlineDate'];
		$languagesToNotify = explode( ',', $formData['LanguagesToNotify'] );
		$languagesToNotify = array_filter( array_map( 'trim', $languagesToNotify ) );

		$langPropertyPrefix = 'translationnotifications-lang-';

		$dbr = wfGetDB( DB_SLAVE );
		$propertyLikePattern = $dbr->buildLike( $langPropertyPrefix, $dbr->anyString() );
		$translatorsConds = array(
			"up_property $propertyLikePattern",
		);

		$pageSourceLangCode = $this->getSourceLanguage();

		// The default is not to specify any languages and to send
		// the notification to speakers of all the languages except
		// the source language. When no languages are specified,
		// an empty string will be sent here and an appropriate
		// message will be shown in the log.
		$languagesForLog = '';
		if ( count( $languagesToNotify ) ) {
			// Filter out the source language
			$translatorsConds['up_value'] = array();

			foreach ( $languagesToNotify as $langCode ) {
				if ( $langCode !== $pageSourceLangCode ) {
					$translatorsConds['up_value'][] = $langCode;
				}
			}

			$languagesToNotify = $translatorsConds['up_value'];

			if ( count( $languagesToNotify ) === 0 ) {
				throw new MWException( "A notification must not be sent only to " .
					"translators to the source language." );
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

		$frequencies = array(
			'always' => 0,
			'week' => 604800, // seconds in week
			'month' => 2678400, // seconds in month
			'weekly' => 604800, // seconds in week
			'monthly' => 2678400, // seconds in month
		);
		$currentUnixTime = wfTimestamp();
		$currentDBTime = $dbr->timestamp( $currentUnixTime );

		$sentSuccess = 0;
		$sentFail = 0;
		$tooEarly = 0;
		$timestampOptionName = 'translationnotifications-timestamp';
		foreach ( $translators as $row ) {
			$user = User::newFromID( $row->up_user );

			$userTimestamp = $user->getOption( $timestampOptionName, null );
			$userUnixTimestamp = ( $userTimestamp == null )
				? wfTimestamp( TS_UNIX, '20120101000000' ) // An old timestamp
				: wfTimestamp( TS_UNIX, $userTimestamp );

			$timeSinceNotification = $currentUnixTime - $userUnixTimestamp;
			$userTranslationFrequency =
				$frequencies[$user->getOption( 'translationnotifications-freq' )];

			if ( $timeSinceNotification > $userTranslationFrequency ) {
				$status = true;
				if ( $user->getOption( 'translationnotifications-cmethod-email' ) ) {
					if ( $user->getOption( 'disablemail' ) ) {
						// For some reason the user signed up to receive
						// Translation Notifications emails, but receiving
						// email is disabled in the user's preferences.
						// To be on the safe side, disable the email
						// contact method.
						$user->setOption( 'translationnotifications-cmethod-email', false );
					} elseif ( $user->getOption( 'translationnotifications-freq' ) === 'always' ) {
						$status &= $this->sendTranslationNotificationEmail( $user );
					}
				}
				if ( $user->getOption( 'translationnotifications-cmethod-talkpage' ) ) {
					$status &= $this->leaveUserMessage(
						$user,
						$languagesToNotify,
						'talkpageHere'
					);
				}
				if ( $user->getOption( 'translationnotifications-cmethod-talkpage-elsewhere' ) ) {
					$status &= $this->leaveUserMessage(
						$user,
						$languagesToNotify,
						'talkpageInOtherWiki'
					);
				}

				if ( $status ) {
					$sentSuccess++;
					$user->setOption( $timestampOptionName, $currentDBTime );
				} else {
					$sentFail++;
				}

				$user->saveSettings();
			} else {
				$tooEarly++;
			}
		}

		$logger = new LogPage( 'notifytranslators' );
		$logParams = array(
			$languagesForLog,
			$this->deadlineDate,
			$this->priority,
			$sentSuccess,
			$sentFail,
			$tooEarly,
		);
		$logger->addEntry(
			'sent',
			$this->translatablePageTitle,
			'', // No comments
			$logParams,
			$this->getUser()
		);

		return true;
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
	 * @param int Number of language.
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
		$userLanguages = array();

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
	protected function getPriorityMessage( $priority ) {
		// possible messages here:
		// 'translationnotifications-priority-high'
		// 'translationnotifications-priority-medium'
		// 'translationnotifications-priority-low'
		// 'translationnotifications-priority-unset'
		return $this->msg( "translationnotifications-priority-$priority" );
	}

	/**
	 * @param string $userFirstLanguage Language code set as first preference
	 * @return string
	 */
	protected function getPriorityClause( $userFirstLanguage ) {
		if ( $this->priority === 'unset' ) {
			return '';
		}

		return $this->msg(
			'translationnotifications-email-priority',
			$this->getPriorityMessage(
				$this->priority
			)->inLanguage( $userFirstLanguage )->text()
		)->inLanguage( $userFirstLanguage )->text();
	}

	/**
	 * @param string $languageCode
	 * @return string Translation URL
	 */
	protected function getTranslationURL( $languageCode ) {
		$page = TranslatablePage::newFromTitle( $this->translatablePageTitle );
		$translationURL = SpecialPage::getTitleFor( 'Translate' )->getCanonicalUrl(
			array( 'group' => $page->getMessageGroupId(),
				'language' => $languageCode ) );

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
		$translationURLsItems = array();

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
	 * @param string $userFirstLanguage Language code
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
		$userLanguageNames = array();

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
	 * @param $user User to whom the email is being sent
	 * @param $languagesToNotify Array A list of languages that are notified.
	 * Empty for all languages.
	 * @return boolean true if it was successful
	 */
	protected function sendTranslationNotificationEmail( User $user,
		$languagesToNotify = array()
	) {
		$relevantLanguages = $this->getRelevantLanguages( $user, $languagesToNotify );
		$userFirstLanguage = Language::factory( $this->getUserFirstLanguage( $user ) );

		$emailSubject = self::getNotificationSubject( $userFirstLanguage );
		$signupURL = SpecialPage::getTitleFor( 'TranslatorSignup' )->getCanonicalUrl();
		$emailBody = $this->msg(
			'translationnotifications-email-body',
			$this->getUserName( $user ),
			$userFirstLanguage->listToText( array_values( $relevantLanguages ) ),
			$this->translatablePageTitle,
			$this->getTranslationURLs( $relevantLanguages, 'email', $userFirstLanguage ),
			$this->getPriorityClause( $userFirstLanguage ),
			$this->getDeadlineClause( $userFirstLanguage ),
			$this->notificationText,
			$signupURL )
			->numParams( count( $relevantLanguages ) ) // $9
			->params( $user->getName() ) // $10
			->inLanguage( $userFirstLanguage )->text();

		global $wgNoReplyAddress;
		$sender = $this->getUser();

		// Do not publish the sender's email, but include his/her name
		$emailFrom = new MailAddress(
			$wgNoReplyAddress,
			$sender->getName(),
			$sender->getRealName()
		);
		$emailTo = new MailAddress( $user );
		$params = array(
			'to' => $emailTo,
			'from' => $emailFrom,
			'body' => $emailBody,
			'subj' => $emailSubject,
			'replyto' => $emailFrom,
		);
		$job = new EmaillingJob( $this->translatablePageTitle, $params );

		return JobQueueGroup::singleton()->push( $job );
	}

	/**
	 * Leave a message on the user's talk page.
	 * @param User $user To whom the message to be sent
	 * @param string[] $languagesToNotify A list of languages that are notified.
	 * Empty for all languages.
	 * @param string $destination Whether to send it to a talk page on this wiki
	 * ('talkpageHere', default) or another one ('talkpageInOtherWiki').
	 * @return boolean True if it was successful
	 */
	public function leaveUserMessage( User $user, $languagesToNotify = array(),
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
			array(
				'lang' => $wgContLang->getCode(),
				'class' => "mw-content-$dir"
			),
			$this->notificationText
		);

		global $wgLocalInterwiki;

		$titleForMessage = $this->translatablePageTitle;

		if ( $destination === 'talkpageInOtherWiki' && $wgLocalInterwiki !== false ) {
			$titleForMessage = ":$wgLocalInterwiki:$titleForMessage|$titleForMessage";
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
		)->numParams( count( $relevantLanguages ) )
			->inLanguage( $userFirstLanguage )
			->text()
			// Bidi-isolation of site name from date
			. $userFirstLanguage->getDirMarkEntity()
			. ', ~~~~~'; // Date and time

		$editSummary = $this->msg(
			'translationnotifications-edit-summary',
			$this->translatablePageTitle
		)->inLanguage( $userFirstLanguage )->text();
		$params = array(
			'text' => $text,
			'editSummary' => $editSummary,
			'editor' => $this->getUser()->getId(),
			'languageCode' => $userFirstLanguageCode,
		);

		if ( $destination === 'talkpageInOtherWiki' ) {
			$params['otherwiki'] =
				$user->getOption( 'translationnotifications-cmethod-talkpage-elsewhere-loc' );
		}

		$job = new TranslationNotificationJob( $user->getTalkPage(), $params );

		return JobQueueGroup::singleton()->push( $job );
	}
}
