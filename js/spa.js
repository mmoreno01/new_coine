$(document).ready(function(){
   $('ul.cir li a:first').addClass('active-spa');
    $('.circulos-secciones article').hide();
    $('.circulos-secciones article:first').show();
    
    $('ul.cir li a').click(function(){
       $('ul.cir li a').removeClass('active-spa');
        $(this).addClass('active-spa');
        $('.circulos-secciones article').hide();
        
        var activeTab = $(this).attr('href');
        $(activeTab).show();
        return false;
    });
});