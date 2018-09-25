var App = angular.module('leeApp', []);

App.controller('homeCtrl','loginService' , function($scope,loginService){
    $scope.txt='Page Home';
    $scope.logout=function(){
        loginService.logout();
    }
});
