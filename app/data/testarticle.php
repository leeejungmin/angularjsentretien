<?php

include 'dbh.php';

$user = json_decode(file_get_contents('php://input'));
$userid = $user->id;
$famille = $user->famille;
$age = $user->$age;
$race = $user->race;
$nourriture = $user->nourriture;

$userid = mysqli_real_escape_string($conn,$userid);
$famille = mysqli_real_escape_string($conn,$famille);
$age = mysqli_real_escape_string($conn, $age);
$race = mysqli_real_escape_string($conn, $race);
$nourriture = mysqli_real_escape_string($conn, $nourriture);


$sql = "INSERT into article(user_id, famille, age, race, nourriture)
values( '$user_id' , '$famille',  '$age',  '$race' , '$nourriture' )";

mysqli_query($conn,$sql);





/// juste ajouter amis

  // session_start();
  //
  // $_SESSION['uid']= $row['id'];
  // print $_SESSION['uid'];

    ?>

.controller('loginctrl', function($scope, $http){
  $scope.login = function(){
    var username = $scope.username;
    var password = ==
    $http({
      url: 'http://localhost/angularjs-mysql/server.php',
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      data: 'username='+username+'$password'+password
    }).then(function(reponse){
        $location.path('/dashboard');
      }else{
        alert('invalid login');
      }
    })
  }
});
service('user')
