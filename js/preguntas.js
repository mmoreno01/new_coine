$(document).ready(function(){
   $('ul.preres li a:first').addClass('active-spa');
    $('.aticulos-preguntas article').hide();
    $('.aticulos-preguntas article:first').show();
    
    $('ul.preres li a').click(function(){
       $('ul.preres li a').removeClass('active-spa');
        $(this).addClass('active-spa');
        $('.aticulos-preguntas article').hide();
        
        var activeTab = $(this).attr('href');
        $(activeTab).show();
        return false;
    });
});