
var myApp = angular.module('app', ['ngSanitize', 'ngMask']);

myApp.controller('entradas', ['$scope','$window','$http', function($scope,$window,$http) {

  $http.get('http://localhost/sitio_coine/blog/?rest_route=/wp/v2/posts&_embed', {
    headers: {'Authorization': 'Basic '+btoa('') }
   
  }).then(function (res){
    $scope.postConsulta = res.data;
    console.log($scope.postConsulta);
  });
}]);

