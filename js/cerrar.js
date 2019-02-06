var container = document.getElementById('container');
setTimeout(function(){
    container.classList.add('cerrar');
},10000);

function redireccionar(){window.location="index.html";} 
setTimeout ("redireccionar()", 12000);