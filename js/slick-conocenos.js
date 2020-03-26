$(document).ready(function(){

  $('.owl-carousel').owlCarousel({
    items:3,
    loop:true,
    margin:10,
    autoplay: true,
    responsiveClass:true,
    autoplayHoverPause:false,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        576:{
            items:1,
            nav:false
        },
        768:{
          items:2,
          nav:false
      },
        1000:{
            items:3,
            nav:true,
        }
    }
})
});
	