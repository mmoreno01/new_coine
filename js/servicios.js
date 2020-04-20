$(document).ready(function(){
   $('div.cuadros a:first').addClass('active-circulos active-textos');
    $('.serviciost article').hide();
    $('.serviciost article:first').show();
    
    $('div.cuadros a').click(function(){
       $('div.cuadros a').removeClass('active-circulos');
        $(this).addClass('active-circulos');
        $('.serviciost article').hide();
        
        var activeTab = $(this).attr('href');
        $(activeTab).show();
        return false;
    });
});