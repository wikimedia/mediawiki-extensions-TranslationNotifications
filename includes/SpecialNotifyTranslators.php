<?php
declare( strict_types = 1 );

namespace MediaWiki\Extension\TranslationNotifications;

use LogicException;
use MediaWiki\Exception\ErrorPageError;
use MediaWiki\Extension\Translate\MessageGroupProcessing\MessageGroups;
use MediaWiki\Extension\Translate\PageTranslation\TranslatablePage;
use MediaWiki\Extension\TranslationNotifications\Jobs\TranslationNotificationsSubmitJob;
use MediaWiki\Extension\TranslationNotifications\Utilities\LanguageSet;
use MediaWiki\Extension\TranslationNotifications\Utilities\NotificationMessageBuilder;
use MediaWiki\HTMLForm\HTMLForm;
use MediaWiki\JobQueue\JobQueueGroup;
use MediaWiki\Languages\LanguageNameUtils;
use MediaWiki\SpecialPage\FormSpecialPage;
use MediaWiki\Status\Status;
use MediaWiki\Title\Title;
use WikiPageMessageGroup;

/**
 * Form for translation managers to send a notification
 * to registered translators.
 *
 * @author Amir E. Aharoni
 * @author Santhosh Thottingal
 * @author Niklas Laxström
 * @author Siebrand Mazeland
 * @copyright Copyright © 2012, Amir E. Aharoni, Santhosh Thottingal
 * @license GPL-2.0-or-later
 * @ingroup SpecialPage TranslateSpecialPage
 */
class SpecialNotifyTranslators extends FormSpecialPage {
	public static string $right = 'translate-manage';
	private LanguageNameUtils $languageNameUtils;
	private JobQueueGroup $jobQueueGroup;

	public function __construct(
		LanguageNameUtils $languageNameUtils,
		JobQueueGroup $jobQueueGroup
	) {
		parent::__construct( 'NotifyTranslators', self::$right );
		$this->languageNameUtils = $languageNameUtils;
		$this->jobQueueGroup = $jobQueueGroup;
	}

	public function doesWrites(): bool {
		return true;
	}

	protected function getGroupName(): string {
		return 'translation';
	}

	protected function getMessagePrefix(): string {
		return 'translationnotifications';
	}

	protected function getDisplayFormat(): string {
		return 'ooui';
	}

	protected function alterForm( HTMLForm $form ): void {
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
			'id' => 'mw-tns-group-selector',
			'type' => 'select',
			'label-message' => [ 'translationnotifications-translatablepage-title' ],
			'options' => $pages,
			'cssclass' => 'mw-tns-translatable-page-selector',
			'default' => '',
			'required' => true
		];

		$languages = array_flip(
			$this->languageNameUtils->getLanguageNames( $this->getLanguage()->getCode() )
		);

		$formFields['LanguageSet'] = [
			'name' => 'notifiable-languages-options',
			'type' => 'radio',
			'default' => LanguageSet::ALL,
			'label-message' => 'translationnotifications-requested-languages-label',
			'options-messages' => [
				'translationnotifications-languages-to-notify-all-label'
					=> LanguageSet::ALL,
				'translationnotifications-languages-to-notify-only-selected-label'
					=> LanguageSet::SOME,
				'translationnotifications-languages-to-notify-all-except-label'
					=> LanguageSet::ALL_EXCEPT_SOME
			]
		];

		// Selected languages input box
		$formFields['SelectedLanguages'] = [
			'type' => 'multiselect',
			'dropdown' => true,
			'label-message' => 'translationnotifications-languages-to-notify-label',
			'help-message' => 'translationnotifications-languages-to-notify-label-help-message',
			'options' => $languages,
			'hide-if' => [ '===', 'LanguageSet', (string)LanguageSet::ALL ]
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

		$options = [
			// Default value
			'' => ''
		];
		foreach ( $translatablePages as $page ) {
			if ( MessageGroups::getPriority( $page ) === 'discouraged' ) {
				continue;
			}
			$options[$page->getTitle()->getPrefixedText()] = $page->getId();
		}

		return $options;
	}

	private function getSourceLanguage( Title $title ): string {
		$translatablePage = TranslatablePage::newFromTitle( $title );
		return $translatablePage->getMessageGroup()->getSourceLanguage();
	}

	public function onSubmit( array $formData ): Status {
		$group = MessageGroups::getGroup( $formData['TranslatablePage'] );
		if ( !$group instanceof WikiPageMessageGroup ) {
			throw new LogicException( 'Cannot send notification to non-translatable pages.' );
		}

		$translatablePageTitle = $group->getTitle();
		$notificationText = $formData['NotificationText'];
		$priority = $formData['Priority'];
		$deadlineDate = $formData['DeadlineDate'];
		$selectedLanguages = $formData['SelectedLanguages'];
		$pageSourceLangCode = $this->getSourceLanguage( $translatablePageTitle );
		$notificationLanguages = [];

		// The default is not to specify any languages and to send the notification to speakers of
		// all the languages except the source language. When no languages are specified,
		// an empty string will be sent here and an appropriate message will be shown in the log.
		if ( count( $selectedLanguages ) ) {
			// Filter out the source language
			foreach ( $selectedLanguages as $langCode ) {
				if ( $langCode !== $pageSourceLangCode ) {
					$notificationLanguages[] = $langCode;
				}
			}

			if ( $notificationLanguages === [] ) {
				return Status::newFatal( 'translationnotifications-sourcelang-only' );
			}
		}
		$languageSet = new LanguageSet( (int)$formData['LanguageSet'] );

		$requestData = [
			'notificationText' => $notificationText,
			'priority' => $priority,
			'deadlineDate' => $deadlineDate,
			'selectedLanguages' => $selectedLanguages,
			'languageSet' => $languageSet->jsonSerialize(),
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

	public function onSuccess(): void {
		$this->getOutput()->addWikiMsg( 'translationnotifications-submit-ok' );
	}
}
