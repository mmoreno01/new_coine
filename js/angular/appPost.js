
var myApp = angular.module('app', ['ngSanitize', 'ngMask']);

myApp.controller('entradas', ['$scope','$window','$http', function($scope,$window,$http) {

  $http.get('http://www.bilanz.mx/blog/?rest_route=/wp/v2/posts&_embed', {
    headers: {'Authorization': 'Basic '+btoa('user_blog:user_MKT_2018') }
   
  }).then(function (res){
    $scope.postConsulta = res.data;
    console.log($scope.postConsulta);
  });
}]);

