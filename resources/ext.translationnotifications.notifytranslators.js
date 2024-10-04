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

		new mw.Api().parse( fullText.escaped().replace( /\n{3,}/g, '\n\n' ) )
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

	function activateEntitySelector( $group ) {
		// hide the message group selector
		const $groupContainer = $( '.mw-tns-translatable-page-selector' );

		// Change the label, and update the for attribute, and remove the click handler
		// which causes the entity selector to become un-responsive when triggered
		$groupContainer
			.attr( 'for', 'mw-entity-selector-input' )
			.off( 'click' );

		// Determine what value was set, and set it on the entity selector
		const selectedGroup = $group.find( 'select option:selected' ).text();

		// load the entity selector and set the value
		const entitySelector = getEntitySelector( onEntitySelect );
		entitySelector.setValue( selectedGroup );

		$group.addClass( 'mw-tns-hidden' );
		$group.after( entitySelector.$element );
	}

	function onEntitySelect( selectedItem ) {
		const options = document.querySelectorAll( 'select[name="tpage"] option' );
		const hasOption = Array.prototype.some.call(
			options,
			( option ) => option.value === selectedItem.data
		);

		// Remove existing errors
		this.$element.parents( '.mw-tns-translatable-page-selector' )
			.first()
			.find( '.oo-ui-flaggedElement-error' )
			.remove();
		if ( !hasOption ) {
			// Selected option does not exist, assume that a discouraged message group was selected
			const errorWidget =
				new OO.ui.MessageWidget( {
					type: 'error',
					inline: true,
					label: mw.msg( 'translationnotifications-tes-discouraged-group' )
				} );
			this.$element.parent().append( errorWidget.$element );
		}

		// On changing the value using setValue, TextInputWidget has a debounced trigger that removes any validity
		// flag that's been previously set. See:
		// https://github.com/wikimedia/oojs-ui/blob/cc5390ef6a2b1f327d0ee1509381f79daba62af9/src/widgets/TextInputWidget.js#L256
		// setValidityFlag is preferred over using setValidation because setValidation triggers on every key press
		// making it difficult to determine when an option is selected from the entity selector.
		setTimeout( () => this.setValidityFlag( hasOption ), 250 );

		const selectedValue = hasOption ? selectedItem.data : '';
		$( 'select[name="tpage"]' ).val( selectedValue );
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

	function getEntitySelector( onSelect ) {
		const EntitySelectorWidget = require( 'ext.translate.entity.selector' );
		return new EntitySelectorWidget( {
			onSelect: onSelect,
			entityType: [ 'groups' ],
			groupTypes: [ 'translatable-pages' ],
			inputId: 'mw-entity-selector-input'
		} );
	}

	$( document ).ready( setup );
}( jQuery, mw ) );
