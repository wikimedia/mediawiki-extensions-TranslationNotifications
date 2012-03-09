/**
 * JavaScript functions for embedding jQuery controls
 * into TranslationNotificatnions forms.
 *
 * @author Amir E. Aharoni
 * @copyright Copyright © 2012 Amir E. Aharoni
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

(function ( $ ) {
	$( document ).ready( function( page, group ) {
		// Based on UploadWizard
		$( '#mw-input-wpDeadlineDate' ).datepicker( {
			dateFormat: 'yy-mm-dd',
			constrainInput: false,
			showOn: 'focus',
			changeMonth: true,
			changeYear: true,
			showAnim: false,
			showButtonPanel: true
		} )
		.data( 'open', 0 )
		.click( function() {
			var $this = $( this );
			if ( $this.data( 'open' ) === 0 ) {
				$this.data( 'open', 1 ).datepicker( 'show' );
			} else {
				$this.data( 'open', 0 ).datepicker( 'hide' );
			}
		} );
	} );
} )( jQuery );
