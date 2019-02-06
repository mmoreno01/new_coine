(function($) {
  "use strict";

  $(document).ready(function($){
    $( '#iceberg-category-color' ).wpColorPicker( {
      defaultColor: $(this).attr('data-default-color')
    } );
  });
})(jQuery);