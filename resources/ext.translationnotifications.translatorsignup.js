/*!
 * @license GPL.2-0+
 */

jQuery( function ( $ ) {
	'use strict';

	var toggle = function () {
		$( '#mw-input-wpcmethod-talkpage-elsewhere-loc' )
			.toggle( $( '#mw-input-wpcmethod-talkpage-elsewhere' )
				.prop( 'checked' ) );
	};
	toggle();
	$( '#mw-input-wpcmethod-talkpage-elsewhere' ).change( toggle );
} );
