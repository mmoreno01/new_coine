
var myApp = angular.module('app', ['vcRecaptcha','angularUtils.directives.dirPagination','ngSanitize', 'ngMask']);

myApp.controller('entradas', ['$scope','$window','$http', function($scope,$window,$http) {

  //loading
  $scope.loading = true;
  // console.log($scope.loading);

  $http.get('https://www.coine.lat/blog/?rest_route=/wp/v2/posts&_embed&categories=98&per_page=100', {
    headers: {'Authorization': 'Basic '+btoa('coine_blog:zA422/*1x') }
   

  }).then(function (res){
    $scope.postConsulta = res.data;
      // fin loading
    $scope.loading= false;
    // console.log($scope.loading);
  });   
}]);  



myApp.controller('infocoine', ['$scope','$window','$http', function($scope,$window,$http) {

  //loading
  $scope.loading = true;
  // console.log($scope.loading);

  $http.get('https://www.coine.lat/blog/?rest_route=/wp/v2/posts&_embed&categories=119&per_page=100', {
    headers: {'Authorization': 'Basic '+btoa('coine_blog:zA422/*1x') }
   

  }).then(function (res){
    $scope.postConsultainfo = res.data;
      // fin loading
    $scope.loading= false;
    // console.log($scope.loading);
  });   
}]);  
myApp.controller('amlocoine', ['$scope','$window','$http', function($scope,$window,$http) {

  //loading
  $scope.loading = true;
  // console.log($scope.loading);

  $http.get('https://www.coine.lat/blog/?rest_route=/wp/v2/posts&_embed&categories=135&per_page=100', {
    headers: {'Authorization': 'Basic '+btoa('coine_blog:zA422/*1x') }
   

  }).then(function (res){
    $scope.postConsultaamlo = res.data;
      // fin loading
    $scope.loading= false;
    // console.log($scope.loading);
  });   
}]); 
myApp.controller('bcoine', ['$scope','$window','$http', function($scope,$window,$http) {

  //loading
  $scope.loading = true;
  // console.log($scope.loading);

  $http.get('https://www.coine.lat/blog/?rest_route=/wp/v2/posts&_embed&categories=129&per_page=100', {
    headers: {'Authorization': 'Basic '+btoa('coine_blog:zA422/*1x') }
   

  }).then(function (res){
    $scope.postConsultablog = res.data;
      // fin loading
    $scope.loading= false;
    // console.log($scope.loading);
  });   
}]); 

 
myApp.controller('entradasNotices', ['$scope','$window','$http', function($scope,$window,$http) {

  $http.get('https://www.coine.lat/coine_noticias/?rest_route=/wp/v2/posts&_embed&categories=4,5', {
    headers: {'Authorization': 'Basic '+btoa('user_noticias:zA422/*1x') }
   
  }).then(function (res){
    $scope.postNotices = res.data;
   

    // console.log($scope.postNotices);
  });
}]);



// validacion del recaptcha
myApp.controller('myController', ['vcRecaptchaService', '$http', function ( vcRecaptchaService, $http) { 
      var vm = this;
        vm.publicKey="6Ldw86YUAAAAAHkwuXr3JtFtzcvSVJPf-lpj1vF3";
      

        vm.signup = function () {

          
            if(vcRecaptchaService.getResponse() === ""){
              Swal.fire({
                type: 'error',
                title: 'Error de envio!',
                text: 'Vuelve  a intentarlo!',
                timer: 5000

              })
              }else{
              var post_data = {
                    'nombre':vm.Nombre,
                    'email':vm.Correo,
                    'telefono':vm.Telefono,
                    'g-recaptcha-response':vcRecaptchaService.getResponse()
                }
                Swal.fire({
                  title: 'Mensaje enviado exitosamente!',
                  text: 'A la brevedad nos prondremos en contacto con usted!',
                  type: 'success',
                  timer: 5000

                })
            }
      }
}]);