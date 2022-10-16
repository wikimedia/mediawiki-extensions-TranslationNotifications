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

namespace MediaWiki\Extension\TranslationNotifications;

use ErrorPageError;
use FormSpecialPage;
use HTMLForm;
use JobQueueGroup;
use LinkBatch;
use MediaWiki\Extension\TranslationNotifications\Jobs\TranslationNotificationsSubmitJob;
use MediaWiki\Extension\TranslationNotifications\Utilities\NotificationMessageBuilder;
use MediaWiki\Languages\LanguageNameUtils;
use MessageGroups;
use Status;
use Title;
use TranslatablePage;
use WikiPageMessageGroup;

/**
 * Form for translation managers to send a notification
 * to registered translators.
 *
 * @ingroup SpecialPage TranslateSpecialPage
 */
class SpecialNotifyTranslators extends FormSpecialPage {
	public static $right = 'translate-manage';

	/** @var LanguageNameUtils */
	private $languageNameUtils;
	/** @var JobQueueGroup */
	private $jobQueueGroup;

	public function __construct( LanguageNameUtils $languageNameUtils, JobQueueGroup $jobQueueGroup ) {
		parent::__construct( 'NotifyTranslators', self::$right );
		$this->languageNameUtils = $languageNameUtils;
		$this->jobQueueGroup = $jobQueueGroup;
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

	protected function getDisplayFormat() {
		return 'ooui';
	}

	protected function alterForm( HTMLForm $form ) {
		$form->setId( 'notifytranslators-form' );
		$form->setSubmitID( 'translationnotifications-send-notification-button' );
		$form->setSubmitTextMsg( 'translationnotifications-send-notification-button' );
	}

	/**
	 * Get the form fields for use by the HTMLForm.
	 * We also set up the JavaScript needed on the form here.
	 *
	 * @return array
	 * @throws ErrorPageError if there is no translatable page on this wiki
	 */
	protected function getFormFields(): array {
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

		$languages = array_flip(
			$this->languageNameUtils->getLanguageNames( $this->getLanguage()->getCode() )
		);
		// Languages to notify input box
		$formFields['LanguagesToNotify'] = [
			'type' => 'multiselect',
			'dropdown' => true,
			'label-message' => 'translationnotifications-languages-to-notify-label',
			'help-message' => 'translationnotifications-languages-to-notify-label-help-message',
			'options' => $languages,
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
			'type' => 'date',
			'min' => date( 'Y-m-d' ),
			'label-message' => 'translationnotifications-deadline-label',
			'help-message' => 'translationnotifications-deadline-help-message',
		];

		// Custom text
		$formFields['NotificationText'] = [
			'type' => 'textarea',
			'rows' => 20,
			'label-message' => 'emailmessage',
		];

		return $formFields;
	}

	protected function getTranslatablePages(): array {
		$translatablePages = MessageGroups::getGroupsByType( WikiPageMessageGroup::class );
		usort( $translatablePages, [ MessageGroups::class, 'groupLabelSort' ] );

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

	private function getSourceLanguage( Title $title ): string {
		$translatablePage = TranslatablePage::newFromTitle( $title );
		return $translatablePage->getMessageGroup()->getSourceLanguage();
	}

	public function onSubmit( array $formData ): Status {
		$translatablePageTitle = Title::newFromID( $formData['TranslatablePage'] );
		$notificationText = $formData['NotificationText'];
		$priority = $formData['Priority'];
		$deadlineDate = $formData['DeadlineDate'];
		$languagesToNotify = $formData['LanguagesToNotify'];

		$pageSourceLangCode = $this->getSourceLanguage( $translatablePageTitle );
		$notificationLanguages = [];

		// The default is not to specify any languages and to send the notification to speakers of
		// all the languages except the source language. When no languages are specified,
		// an empty string will be sent here and an appropriate message will be shown in the log.
		if ( count( $languagesToNotify ) ) {
			// Filter out the source language
			foreach ( $languagesToNotify as $langCode ) {
				if ( $langCode !== $pageSourceLangCode ) {
					$notificationLanguages[] = $langCode;
				}
			}

			if ( $notificationLanguages === [] ) {
				return Status::newFatal( 'translationnotifications-sourcelang-only' );
			}
		}

		$requestData = [
			'notificationText' => $notificationText,
			'priority' => $priority,
			'languagesToNotify' => $notificationLanguages,
			'deadlineDate' => $deadlineDate
		];

		$job = TranslationNotificationsSubmitJob::newJob(
			$translatablePageTitle,
			$requestData,
			$this->getUser()->getId(),
			$this->getLanguage()->getCode()
		);

		$this->jobQueueGroup->push( $job );
		return Status::newGood();
	}

	public function onSuccess() {
		$this->getOutput()->addWikiMsg( 'translationnotifications-submit-ok' );
	}
}
