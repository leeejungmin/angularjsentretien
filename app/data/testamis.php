<?php

include 'dbh.php';

$user = json_decode(file_get_contents('php://input'));
$userid = $user->id;
$friend_user_email = $user->mail;

$userid = mysqli_real_escape_string($conn,$userid);
$email = mysqli_real_escape_string($conn,$email);
$password = mysqli_real_escape_string($conn, $password);




$result = mysqli_query($conn,"SELECT * FROM user WHERE email = '$friend_user_email'")
                or die("fail to dababase".mysqli_error());
$row = mysqli_fetch_array($result);

$amisid=$row['id'];
$amisid = mysqli_real_escape_string($conn, $amisid);

$sqlToInputFriend = "INSERT into friend values( '$userid' , '$amisid' )";
mysqli_query($conn,$sqlToInputFriend);

$mysqli->close();
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
