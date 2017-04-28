angular.module('app',['ngRoute'])
    .controller('homeController', function($scope) {
        $scope.controllerName = 'this is homeController';
    })
    .controller('howtopayController', function($scope) {
        $scope.controllerName = 'this is howtopayController';
    })
    .config(function($routeProvider,$locationProvider){
      $locationProvider.html5Mode(true);
      $routeProvider
        .when(
            '/howtopay', {
                controller:'howtopayController',
                templateUrl: 'template/home.php'
            }
        )
        .otherwise({
            redirectTo: '/'
        })
    });

