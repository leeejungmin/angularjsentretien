var loginService = angular.module('leeApp', []);

.factory('loginService', function($http, $location, sessionService){
  return{
    login:function(data,scope){
      var $promise=$http.post('app/data/user.php',data);
      $promise.then(function(msg){
        var uid=msg.data;
        if(uid){

          sessionService.set('user',uid);
          $location.path('/home');
        }
        else {
          scope.msgtxt="incorrect!";
          $location.path('/login');
        }
      });
    }
    // logout: function(){
    //     sessionService.destroy('user');
    //     $location.path('/login');

  }
});
