/**
 * Owl Carousels Init
 */
(function($) {
  "use strict";

  $(document).ready(function($){
  
    if( $.fn.owlCarousel !== undefined ) {
      $( '.format-gallery-carousel' ).waitForImages( function() {  
        $( '.format-gallery-carousel' ).owlCarousel({
          items: 1,
          margin: 0,
          loop: true,
          autoHeight: true,
          smartSpeed: 600,
          nav: true,
          dots: false,
          rtl: $('body').hasClass( 'rtl' ) ? true : false,
          navText : [ $('body').hasClass( 'rtl' ) ? '<i class="fa fa-angle-right"></i>' : '<i class="fa fa-angle-left"></i>', $('body').hasClass( 'rtl' ) ? '<i class="fa fa-angle-left"></i>' : '<i class="fa fa-angle-right"></i>' ]
        });
      });
    }
    
  });
})(jQuery);