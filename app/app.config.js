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

        when('/home', {
          // template: '<login-list></login-list>',
          templateUrl:'home.html',
          controller:'homeCtrl',
        }).
        when('/article', {
          // template: '<article-list></article-list>'
          templateUrl:'article.html',
          controller:'articlecontroller',
        }).
        when('/amis', {
          // template: '<amis-list></amis-list>'
          templateUrl:'amis.html',
          controller:'amiscontroller',
        }).
        when('/addamis', {
          // template: '<amis-list></amis-list>'
          templateUrl:'amisadd.html',
          controller:'addamiscontroller',
        }).
        when('/register', {
          // template: '<register-list></register-list>'
          templateUrl:'register.html',
          controller:'userregistercon',
        }).
        when('/articleregister', {
          // template: '<register-list></register-list>'
          templateUrl:'articleregister.html',
          controller:'artregiscontroller',
        }).
        otherwise({redirectTo : '/'});
    }
  ])

        .controller('homeCtrl',['$scope' ,'loginService', function($scope,loginService,$location){
            $scope.txt='Bonne Jour!!!';

            $scope.logout=function(){
              loginService.logout();
            };
            // $scope.login=function(){
            //     $location.path('/login');
            // };
            // $scope.logout=function(){
            //     $location.path('/logout');
            // };
            // $scope.register=function(){
            //     $location.path('/register');
            // };
            // $scope.amis=function(){
            //     $location.path('/amis');
            // };
            // $scope.article=function(){
            //     $location.path('/article');
            // };
            // $scope.articleregister=function(){
            //     $location.path('/articleregister');
            // };
        }])
        .controller('indexController',['$scope','loginService' , function($scope, $http, loginService , $location){
          $scope.getuserid = sessionStorage.length;

          $scope.home=function(){
              $location.path('/home');
          };

          $scope.logout=function(){
            loginService.logout();
          };
        }])

       .controller('amiscontroller', function($scope, $http, $location, sessionService) {
         $scope.getuserid = sessionStorage.uid;
         $scope.addamis=function(){
             $location.path('/addamis');
         };

         $scope.getuserid = sessionStorage.uid;
             // sessionService.getItem('uid');
             // var Indata = {'product':$scope.getuserid};


          $http.post("app/data/amisvoir.php")
          .then(function (response)
          { console.log(response.data);
            $scope.names = response.data;});

          // $http.post("app/data/amisvoir2.php")
          // .then(function (response)
          // {
          //   console.log(reponse.data);
          //   $scope.namess = response.data;
          // });

          $scope.supprimamis=function(userid, amisid){
            $scope.getuserid = sessionStorage.uid;
            $http({
              method:"POST",
              url:"app/data/supprimamis.php",
              data: {userid, amisid}
            }).then(function(reponse){
              // $scope.names = reponse.data;
              // $scope.alertClass = 'success';
              console.log(reponse.data);

              $location.path('/home');
            });
          };

        })
        .controller('addamiscontroller', function($scope, $http, $location) {

          $scope.getuserid = sessionStorage.uid;
          $scope.registerShow=function(){
            $scope.alertMsg = false;
          }
          $scope.registerSubmit=function(){
              $http({
                method:"POST",
                url:"app/data/addamis.php",
                data:$scope.registerData
              }).then(function(reponse){
                $scope.names = reponse.data;
                $scope.alertClass = 'success';
                console.log(reponse.data);
                $location.path('/amis');
              });
          }

        })


      .controller('articlecontroller', function($scope, $http) {
        $scope.getuserid = sessionStorage.uid;
        $http.post("app/data/artvoir.php")
        .then(function (response)
        {$scope.names = response.data;});

        $scope.deleteart=function(artid){
            $http({
              method:"POST",
              url:"app/data/supprimart.php",
              data:$scope.artid
            }).then(function(reponse){
              $scope.names = reponse.data;
              $scope.alertClass = 'success';
              console.log(reponse.data);
              $location.path('/amis');
            });
        }

      })

      .controller('artregiscontroller', function($scope, $http, $location) {

        $scope.getuserid = sessionStorage.uid;
        // var rep[] = ($scope.registerData,  $scope.getuserid);

        $scope.registerSubmit=function(){
            $http({
              method:"POST",
              url:"app/data/artregis.php",
              data: $scope.registerData
            }).then(function(reponse){
              $scope.names = reponse.data;
              // $scope.alertClass = 'success';
              console.log(reponse.data);
              $location.path('/article');
            });
        }
      })
      .controller('userregistercon', function($scope, $http, $location) {

        $scope.getuserid = sessionStorage.uid;
        $scope.registerShow=function(){
          $scope.alertMsg = false;
        }
        $scope.registerSubmit=function(){
            $http({
              method:"POST",
              url:"app/data/userregister.php",
              data:$scope.registerData
            }).then(function(reponse){
              $scope.names = reponse.data;
              $scope.alertClass = 'success';
              console.log(reponse.data);
              $location.path('/login');
            });
        }
      })

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
          console.log(msg);
          var uid=msg.data;
          if(uid){

            sessionService.set('uid',uid );//'user'
            $location.path('/home');
          }
          else {
            $location.path('/login');
            console.log(msgtxt);
            loginController.scope.msgtxt="incorrect!";
          }
        });
      },
      logout:function(){
          console.log('uid');
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
