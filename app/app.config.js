'use strict';

var leeApp = angular.module('leeApp', ['ngRoute']);

leeApp.
  config([ '$routeProvider',
    function config( $routeProvider) {
      // $locationProvider.hashPrefix('!');

      $routeProvider.
        when('/login', {
          // template: '<login-list></login-list>',
          templateUrl:'login.html',
          controller:'loginController',
        }).
        when('/logout', {
          // template: '<login-list></login-list>',
          templateUrl:'logout.html',
          // controller:'loginController',
        }).
        when('/home', {
          // template: '<login-list></login-list>',
          templateUrl:'home.html',
          controller:'homeCtrl',
        }).
        when('/article', {
          // template: '<article-list></article-list>'
          templateUrl:'article.html',
          // controller:'articleController',
        }).
        when('/amis', {
          // template: '<amis-list></amis-list>'
          templateUrl:'amis.html',
          // controller:'amisController',
        }).
        when('/register', {
          // template: '<register-list></register-list>'
          templateUrl:'register.html',
          // controller:'registerController',
        }).
        otherwise({redirectTo : '/'});
    }
  ])

  .controller('homeCtrl',['$scope' ,'loginService', function($scope,loginService){
      $scope.txt='Page Home';
      $scope.logout=function(){
          loginService.logout();
      }
  }])

  .controller('loginController', function ($scope,loginService) {
    // $scope.user = [
    // {  username: ''},
    // {  password: ''},
    // {  mail: ''},
    // ];
    $scope.msgtxt='';

    // c'est diffrente que truc dessous
    $scope.login=function(user){
      // console.log($scope.user.mail);

        loginService.login(user, $scope);
        //appeler service
    };
  })
  // oublier '$http' sous la fonction
  .factory('sessionService',['$http', function($http){
    return{
      set:function(key,value){
        return sessionStorage.setItem(key,value);
      },
      get:function(key){
        return sessionStorage.getItem(key);
      },
      destroy:function(key){
        $http.post('app/data/destory_session.php');
        return sessionStorage.removeItem(key);
      }
    };
  }])
  .run(function($rootScope, $location, loginService){
      var routespermission=['/home']; // route that require login
      $rootScope.$on('$routeChangeStart', function(){

          if( routespermission.indexOf($location.path())  !=-1)
          {
              var connected=loginService.islogged();
              connected.then(function(msg){
                  if(!msg.data) $location.path('/login');
              });
          }
      });
})
  .factory('loginService', function($http, $location, sessionService){
    return{
      login:function(data,scope){
        var $promise=$http.post('app/data/user.php',data);
        $promise.then(function(msg){
          var uid=msg.data;
          if(uid){

            sessionService.set('uid',uid);//'user'
            $location.path('/home');
          }
          else {
            scope.msgtxt="incorrect!";
            $location.path('/login');
          }
        });
      },
      logout: function(){
          sessionService.destroy('uid');//'user'
          $location.path('/login');
        },
      islogged:function(){

          var $checkSessionServer= $http.post('app/data/ckeck_session.php');
          return $checkSessionServer;
          // if(sessionService.get('user')) return true;
          // else return false;
        }
    }
  });
