$(document).ready(function(){
    $('.tabs a:first').addClass('active-inversion');
    $('.inversion-secciones article').hide();
    $('.inversion-secciones article:first').show();
    
    $('.tabs a').click(function(){
        $('.tabs a').removeClass('active-inversion');
        $(this).addClass('active-inversion');
        $('.inversion-secciones article').hide();
        
        var activeTab =$(this).attr('href');
        $(activeTab).show();
        return false;
    });
});