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

use MediaWiki\MediaWikiServices;

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
		return 'translation';
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

		$contLang = MediaWikiServices::getInstance()->getContentLanguage();
		// Dummy dropdown, will be invisible. Used as data source for language name autocompletion.
		// @todo Implement a proper field with everything needed for this and make this less hackish
		$languageSelector = Xml::languageSelector(
			$contLang->getCode(),
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
				NotificationMessageBuilder::getPriorityMessage( $priority )
					->setContext( $this->getContext() )->text();
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

		$config = $this->getConfig();

		$notifyUser = new TranslationNotifyUser(
			$this->translatablePageTitle,
			$this->getUser(),
			$config->get( 'LocalInterwikis' ),
			$config->get( 'NoReplyAddress' ),
			$config->get( 'TranslationNotificationsAlwaysHttpsInEmail' ),
			$this->getSourceLanguage(),
			[
				'text' => $this->notificationText,
				'priority' => $this->priority,
				'deadline' => $this->deadlineDate,
				'languagesToNotify' => $languagesToNotify
			]
		);

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
						$jobs[] = $notifyUser->sendTranslationNotificationEmail( $user );
					}
				}
				if ( $user->getOption( 'translationnotifications-cmethod-talkpage' ) ) {
					$jobs[] = $notifyUser->leaveUserMessage(
						$user,
						'talkpageHere'
					);
				}
				if ( $user->getOption( 'translationnotifications-cmethod-talkpage-elsewhere' ) ) {
					$jobs[] = $notifyUser->leaveUserMessage(
						$user,
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
}
