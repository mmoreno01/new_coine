
var myApp = angular.module('app', ['angularUtils.directives.dirPagination','ngSanitize', 'ngMask']);

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



