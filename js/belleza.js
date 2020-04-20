$(document).ready(function(){
   $('ul.cir_be li a:first').addClass('active-spa');
    $('.circulos-secciones_belleza article').hide();
    $('.circulos-secciones_belleza article:first').show();
    
    $('ul.cir_be li a').click(function(){
       $('ul.cir_be li a').removeClass('active-spa');
        $(this).addClass('active-spa');
        $('.circulos-secciones_belleza article').hide();
        
        var activeTab = $(this).attr('href');
        $(activeTab).show();
        return false;
    });
});