$(document).ready(function(){
    $('ul.tabs--afiliate li a:first').addClass('active');
    $('.afiliate--secciones article').hide();
    $('.afiliate--secciones article:first').show();
    
    $('ul.tabs--afiliate li a').click(function(){
        $('ul.tabs--afiliate li a').removeClass('active');
        $(this).addClass('active');
        $('.afiliate--secciones article').hide();
        
        var activeTab =$(this).attr('href');
        $(activeTab).show();
        return false;
    });
});s