/*!
 * @license GPL.2-0+
 */

$( () => {
	'use strict';

	const $checkbox = $( '#mw-input-wpcmethod-talkpage-elsewhere input' );

	function toggle() {
		$( '#mw-input-wpcmethod-talkpage-elsewhere-loc' ).toggle( $checkbox.prop( 'checked' ) );
	}

	toggle();
	$checkbox.change( toggle );
} );
