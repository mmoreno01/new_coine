/**
 * Live-update changed settings in real time in the Customizer preview.
 */

( function( $ ) {
	var api = wp.customize;

	// Site title
	api( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	
  // Tagline
	api( 'tagline', function( value ) {
		value.bind( function( to ) {
			$( '.tagline' ).html( to );
		} );
	} );
	
  api( 'link_color', function( value ) {
		value.bind( function( to ) {
			$( '.page-content a, .entry-content a, .post-meta a, .author-link, .logged-in-as a, .comment-content a, .comment-edit-link, .textwidget a, .widget_calendar a' ).css( 'color', to );
		} );
	} );
	
	api( 'button_background_color', function( value ) {
		value.bind( function( to ) {
			$( 'button, input[type="button"], input[type="reset"], input[type="submit"]' ).css( 'background-color', to );
		} );
	} );
	
  api( 'button_text_color', function( value ) {
		value.bind( function( to ) {
			$( 'button, input[type="button"], input[type="reset"], input[type="submit"]' ).css( 'color', to );
		} );
	} );

} )( jQuery );
