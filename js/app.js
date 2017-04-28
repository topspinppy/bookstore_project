angular.module('app',['ngRoute'])
    .controller('homeController', function($scope) {
        $scope.controllerName = 'this is homeController';
    })
    .config(function($routeProvider){
      $routeProvider
        .when(
            '/', {
                controller:'homeController',
                templateUrl: 'template/home.php'
            }
        )
    });
