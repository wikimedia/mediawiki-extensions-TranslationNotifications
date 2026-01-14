/*!
 * JavaScript functions for embedding jQuery controls
 * into translation notification form.
 *
 * @author Amir E. Aharoni
 * @copyright Copyright © 2012 Amir E. Aharoni
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */
( function ( $, mw ) {
	'use strict';

	const previewId = 'translation-notification-preview',
		sendId = 'translationnotifications-send-notification-button';

	/**
	 * Infuse the OOUI element with the given ID.
	 *
	 * @param {string} id
	 * @return {OO.ui.Element}
	 */
	function infuseElement( id ) {
		return OO.ui.infuse( document.getElementById( id ) );
	}

	/**
	 * Actually do the preview.
	 */
	function doPreview() {
		const url = new URL( location.href );
		const $translatablePageDropdown = $( '[name="tpage"]' );
		const translatablePage = $translatablePageDropdown.find( ':selected' ).text();
		const translatablePageGroup = $translatablePageDropdown.val();
		const userName = mw.user.getName();
		const $priority = $( '#mw-input-wpPriority :selected' );
		const deadlineDate = infuseElement( 'mw-input-wpDeadlineDate' ).getValue();

		// Enable the send button after the first preview
		infuseElement( sendId ).setDisabled( false );

		url.path = mw.config.get( 'wgScript' );
		url.search = '';
		url.searchParams.set( 'title', 'Special:Translate' );
		url.searchParams.set( 'group', translatablePageGroup );

		let priority = '';
		if ( $priority.val() !== 'unset' ) {
			priority = mw.msg( 'translationnotifications-email-priority', $priority.text() );
		}

		let deadline = '';
		if ( deadlineDate !== '' ) {
			deadline = mw.msg( 'translationnotifications-email-deadline', deadlineDate );
		}

		const fullText = mw.message( 'translationnotifications-talkpage-body',
			userName,
			userName,
			mw.msg( 'translationnotifications-generic-languages' ),
			translatablePage,
			'[' + url.toString() + ' ' + translatablePage + ']',
			priority,
			deadline,
			infuseElement( 'mw-input-wpNotificationText' ).getValue(),
			1, // it's just an example, so provide one language,
			location.protocol + '//' + location.host + mw.util.getUrl( 'Special:TranslatorSignup' )
		);

		new mw.Api().parse( fullText.text().replace( /\n{3,}/g, '\n\n' ) )
			.done( ( parsedNotification ) => {
				$( '#' + previewId )
					.html( parsedNotification )
					.show();
			} );
	}

	/**
	 * Set up the notification preview and the auto-update of the language
	 * selector label
	 */
	function setup() {
		/**
		 * Notification preview
		 */
		// Initially disable the send button to force at least one preview
		infuseElement( sendId ).setDisabled( true );

		// Add the preview button
		const previewButton = new OO.ui.ButtonWidget( {
			label: mw.msg( 'translationnotifications-preview-notification-button' )
		} );
		previewButton.on( 'click', doPreview );
		$( '#notifytranslators-form' ).after(
			previewButton.$element,
			$( '<div>' )
				.attr( { id: previewId } )
				.hide()
		);

		activateEntitySelector( $( '#mw-tns-group-selector' ) );

		$( '#notifytranslators-form' ).on( 'submit', onSubmit );
	}

	let translatablePageField;
	function activateEntitySelector( $group ) {
		const { getEntitySelector } = require( 'ext.translate.entity.selector' );
		const $layoutNode = $( '.mw-tns-translatable-page-selector' ).first();

		translatablePageField = OO.ui.infuse( $layoutNode );

		const oouiEntitySelector = translatablePageField.getField();
		oouiEntitySelector.toggle( false );

		// Get the initial value from the hidden widget
		const initialValue = oouiEntitySelector.getValue();
		const $selectedOption = $group.find( 'select option:selected' );

		const entitySelector = getEntitySelector( {
			onSelect: onEntitySelect,
			entityType: [ 'groups' ],
			groupTypes: [ 'translatable-pages' ],
			inputId: 'mw-entity-selector-input',
			value: {
				label: $selectedOption.text(),
				value: initialValue,
				type: 'group'
			},
			allowSuggestionsWhenEmpty: true
		} );

		translatablePageField.$element
			.off( 'click' )
			.find( 'label' )
			.attr( 'for', 'mw-entity-selector-input' );

		const container = document.createElement( 'div' );
		translatablePageField.$field.append( container );
		entitySelector.mount( container );
	}

	function onEntitySelect( selectedGroupId ) {
		// Keep the OOUI widget in sync
		translatablePageField.getField().setValue( selectedGroupId );
	}

	function onSubmit() {
		const selectedGroupName = $( 'select[name="tpage"]' ).find( 'option:selected' ).text();
		const currentVal = $( '.tes-entity-selector' ).find( 'input[type="text"]' ).val();

		// Check if the user has selected a discouraged entity.
		if ( currentVal !== selectedGroupName ) {
			mw.notify(
				mw.msg( 'translationnotifications-tes-discouraged-group', currentVal ),
				{
					type: 'error',
					tag: 'invalid-selection'
				}
			);
			return false;
		}
	}

	$( document ).ready( setup );
}( jQuery, mw ) );
