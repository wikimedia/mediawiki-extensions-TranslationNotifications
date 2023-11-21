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

	var previewId = 'translation-notification-preview',
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
		var fullText,
			uri = new mw.Uri(),
			priority = '',
			deadline = '',
			translatablePage = $( '#mw-input-tpage :selected' ).text(),
			userName = mw.user.getName(),
			$priority = $( '#mw-input-wpPriority :selected' ),
			deadlineDate = infuseElement( 'mw-input-wpDeadlineDate' ).getValue();

		// Enable the send button after the first preview
		infuseElement( sendId ).setDisabled( false );

		uri.path = mw.config.get( 'wgScript' );
		uri.query = {
			title: 'Special:Translate',
			group: 'page-' + translatablePage
		};

		if ( $priority.val() !== 'unset' ) {
			priority = mw.msg( 'translationnotifications-email-priority', $priority.text() );
		}

		if ( deadlineDate !== '' ) {
			deadline = mw.msg( 'translationnotifications-email-deadline', deadlineDate );
		}

		fullText = mw.message( 'translationnotifications-talkpage-body',
			userName,
			userName,
			mw.msg( 'translationnotifications-generic-languages' ),
			translatablePage,
			'[' + uri.toString() + ' ' + translatablePage + ']',
			priority,
			deadline,
			infuseElement( 'mw-input-wpNotificationText' ).getValue(),
			1, // it's just an example, so provide one language,
			location.protocol + '//' + location.host + mw.util.getUrl( 'Special:TranslatorSignup' )
		);

		new mw.Api().parse( fullText.escaped().replace( /\n{3,}/g, '\n\n' ) )
			.done( function ( parsedNotification ) {
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
		var previewButton = new OO.ui.ButtonWidget( {
			label: mw.msg( 'translationnotifications-preview-notification-button' )
		} );
		previewButton.on( 'click', doPreview );
		$( '#notifytranslators-form' ).after(
			previewButton.$element,
			$( '<div>' )
				.attr( { id: previewId } )
				.hide()
		);
	}

	$( document ).ready( setup );
}( jQuery, mediaWiki ) );
