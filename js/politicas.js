$(document).ready(function(){
   $('ul.cir-po li a:first').addClass('spinner1');
    $('.circulos-secciones1 article').hide();
    $('.circulos-secciones1 article:first').show();
    
    $('ul.cir-po li a').click(function(){
       $('ul.cir-po li a').removeClass('spinner1');
        $(this).addClass('spinner1');
        $('.circulos-secciones1 article').hide();
        
        var activeTab = $(this).attr('href');
        $(activeTab).show();
        return false;
    });
});