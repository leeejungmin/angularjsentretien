<?php
session_start();

include 'dbh.php';

$registerData = json_decode(file_get_contents('php://input'));



$username = $registerData->username;
$email = $registerData->email;
$password = $registerData->password;

// $userid = mysqli_real_escape_string($conn,$userid);
// $username = mysqli_real_escape_string($conn,$username);
// $email = mysqli_real_escape_string($conn,$email);
// $password = mysqli_real_escape_string($conn, $password);

//
//
$sql = "INSERT into user (username,password,email) values('$username','$password','$email')";


mysqli_query($conn,"INSERT into user (username,password,email) values('$username','$password','$email')");


//
// $reponse = [];
//
// if(isset($_POST)){
//   $reponse['userid']='userid';
// }
//
// print_r($_POST);
// json_encode($response)

$mysqli->close();


// $user = json_decode(file_get_contents('php://input'));
// $userid = $user->id;
// $friend_user_email = $user->mail;
//






/// juste ajouter amis

  // session_start();
  //
  // $_SESSION['uid']= $row['id'];
  // print $_SESSION['uid'];

    ?>
