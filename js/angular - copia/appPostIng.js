var myApp = angular.module('appIng', ['vcRecaptcha','angularUtils.directives.dirPagination','ngSanitize', 'ngMask']);

myApp.controller('entradas', ['$scope','$window','$http', function($scope,$window,$http) {

  $http.get('http://www.coine.lat/blog/?rest_route=/wp/v2/posts&_embed', {
    headers: {'Authorization': 'Basic '+btoa('coine_blog:coine_MKT2019') }
   
  }).then(function (res){
    $scope.postConsulta = res.data;
  });   
}]);  
 
myApp.controller('entradasNotices', ['$scope','$window','$http', function($scope,$window,$http) {

  $http.get('http://www.coine.lat/coine_noticias/?rest_route=/wp/v2/posts&_embed&categories=4,5', {
    headers: {'Authorization': 'Basic '+btoa('user_noticias:DNHV$Dr0(*jJEg0uMV') }
   
  }).then(function (res){
    $scope.postNotices = res.data;
   

    console.log($scope.postNotices);
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
                title: 'Send Error!',
                text: 'Please try again!',
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
                  title: 'Message sent successfully!',
                  text: 'We will contact you shortly!',
                  type: 'success',
                  timer: 5000

                })
            }
      }
}]);