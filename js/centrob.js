$(document).ready(function(){
   $('ul.cir_b li a:first').addClass('active-spa');
    $('.circulos-secciones_bienestar article').hide();
    $('.circulos-secciones_bienestar article:first').show();
    
    $('ul.cir_b li a').click(function(){
       $('ul.cir_b li a').removeClass('active-spa');
        $(this).addClass('active-spa');
        $('.circulos-secciones_bienestar article').hide();
        
        var activeTab = $(this).attr('href');
        $(activeTab).show();
        return false;
    });
});