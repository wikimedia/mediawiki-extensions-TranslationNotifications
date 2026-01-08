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

	mw.loader.using( 'mediawiki.languageselector' ).then( () => {
		Array.prototype.forEach.call(
			document.querySelectorAll( '.mw-translationnotifications-lang-selector.oo-ui-widget' ),
			( widgetElement ) => {
				const languageSelectorWidget = OO.ui.infuse( widgetElement );
				replaceSelectWithLookup( widgetElement, languageSelectorWidget.getValue() || null,
					( languageCode ) => {
						languageSelectorWidget.setValue( languageCode || '' );
					}
				);
			}
		);
	} );

	function replaceSelectWithLookup( $languageSelector, selectedLanguage, onLanguageChange ) {
		$languageSelector.style.display = 'none';

		const { getLookupLanguageSelector } = require( 'mediawiki.languageselector' );
		const languageSelectorApp = getLookupLanguageSelector( {
			selectedLanguage,
			placeholder: mw.msg( 'translationnotifications-nolang' ),
			menuItemSlot: ( { languageCode, languageName } ) => languageCode + ' - ' + languageName,
			onLanguageChange: ( newValue ) => onLanguageChange( newValue || '' )
		} );

		// Mount the Vue app after the hidden OOUI selector
		const container = document.createElement( 'div' );
		$languageSelector.after( container );
		languageSelectorApp.mount( container );
	}
} );
