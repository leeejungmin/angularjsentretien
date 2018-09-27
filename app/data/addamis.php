<?php
session_start();
include 'dbh.php';

$user = json_decode(file_get_contents('php://input'));
$userid = $_SESSION['uid'];
$friend_user_email = $user->email;

$useridd = intval($userid);




$result = mysqli_query($conn,"SELECT * FROM user WHERE email = '$friend_user_email'");

$row = mysqli_fetch_array($result);


$amisid=intval($row['id']);
// $amisid = mysqli_real_escape_string($conn, $amisid);

$sqlToInputFriend = "INSERT into friends (user_id, friend_user_id) values( $useridd , $amisid )";
// mysqli_query($conn,$sqlToInputFriend);
if (mysqli_query($conn,$sqlToInputFriend)){

  echo 'good jungmin';
  echo $friend_user_email;
  echo $amisid;
}else{

  echo 'essayer';
  echo $friend_user_email;
  // echo $useridd;
  echo $amisid;
}

/// juste ajouter amis

  // session_start();
  //
  // $_SESSION['uid']= $row['id'];
  // print $_SESSION['uid'];

    ?>
