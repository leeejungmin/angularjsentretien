<?php
session_start();

include 'dbh.php';

$user = json_decode(file_get_contents('php://input'));


// $userid = $user->id;

$friend_user_email = $user->amisid;
$userid = $_SESSION['uid'];
$useridd = intval($userid);


// $friend_user_emaill = intval($friend_user_email);


$result = mysqli_query($conn,"SELECT * FROM user WHERE email = '$friend_user_email'");
$row = mysqli_fetch_array($result);
$amisid=intval($row['id']);

$sql="DELETE FROM friends WHERE user_id = $useridd AND friend_user_id = $amisid";
$result = mysqli_query($conn,$sql);


if($result){

  echo 'good jungmin';
  echo $friend_user_email;
  echo $useridd;

}else{

  echo 'essayer';
  echo $friend_user_email;
}



    ?>
