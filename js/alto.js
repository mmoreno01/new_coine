

$(document).ready(function () {
    var altura = $('header').offset().top;
    $(window).on('scroll', function(){
        if($(window).scrollTop() > 50){
            $('header').addClass('shrink');
        }else{
            $('header').removeClass('Shrink');
        }
    });
});