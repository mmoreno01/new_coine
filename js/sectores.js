$(document).ready(function(){
   $('ul.cir li a:first').addClass('');
    $('.circulos-secciones article').hide();
    $('.circulos-secciones article:first').show();
    
    $('ul.cir li a').click(function(){
        $('ul.cir li a').removeClass('');
        $(this).addClass('');
        $('.circulos-secciones article').hide();
        
        var activeTab =$(this).attr('href');
        $(activeTab).show();
        return false;
    });
});