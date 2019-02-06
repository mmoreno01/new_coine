
var myApp = angular.module('app', ['ngSanitize', 'ngMask']);

myApp.controller('entradas', ['$scope','$window','$http', function($scope,$window,$http) {

  $http.get('http://localhost/new_coine/blog/?rest_route=/wp/v2/posts&_embed', {
    headers: {'Authorization': 'Basic '+btoa('coine_blog:coine_MKT2019') }
   
  }).then(function (res){
    $scope.postConsulta = res.data;
    console.log($scope.postConsulta);
  });
}]);

