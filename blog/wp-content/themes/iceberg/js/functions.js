/**
 * Theme functions file.
 */
(function($) {
  "use strict";

  $(document).ready(function($){

    var $body = $('body');
    
    $body.waitForImages(function() {
      var $this = $(this);
      
      setTimeout(function() {
        $this.addClass('loaded');
      }, 200); 
    });
    
    // Mobile navigation toggle
    $('#sidebar-toggle').on( 'click', function(e) {
      e.preventDefault();
      
      $('.toggle-wrap').toggle();
      $body.toggleClass( 'menu-open' );
    });
    
    $('.widget_nav_menu .menu-item-has-children > a, .primary-navigation .menu-item-has-children > a').on( 'click', function(e) {
      e.preventDefault();
      $(this).next('.sub-menu').slideToggle(200);
    });

    // Share Buttons
    $('.share-button').on( 'click', function(e) {
      e.preventDefault();
      var $button = $(this),
          newWindowWidth = 550,
          newWindowHeight = 450,
          leftPos = ( $( window ).width()/2 ) - ( newWindowWidth/2 ),
          topPos = ( $( window ).height()/2 ) - ( newWindowHeight/2 );
          
			var newWindow = window.open( $button.attr('href'), '', 'height=' + newWindowWidth + ', width=' + newWindowHeight + ', left=' + leftPos + ', top=' + topPos );

			if ( window.focus )
				newWindow.focus();
    });
    
    // Fitvids init
    $('.post').fitVids();
  });
})(jQuery);