
var myApp = angular.module('app', ['ngSanitize', 'ngMask']);

myApp.controller('entradas', ['$scope','$window','$http', function($scope,$window,$http) {

<<<<<<< HEAD
  $http.get('http://localhost/new_coine/blog/?rest_route=/wp/v2/posts&_embed', {
    headers: {'Authorization': 'Basic '+btoa('coine_blog:coine_MKT2019') }
=======
  $http.get('http://localhost/sitio_coine/blog/?rest_route=/wp/v2/posts&_embed', {
    headers: {'Authorization': 'Basic '+btoa('') }
>>>>>>> 70ac96dc0db1e053580cc16c6ed39e44560346a4
   
  }).then(function (res){
    $scope.postConsulta = res.data;
    console.log($scope.postConsulta);
  });
}]);

