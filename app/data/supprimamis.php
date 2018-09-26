<?php

include 'dbh.php';

$user = json_decode(file_get_contents('php://input'));


// $userid = $user->id;
$userid = $user->userid;
$friend_user_email = $user->amisid;


$useridd = intval($userid);
$friend_user_emaill = intval($friend_user_email);


$sql="DELETE FROM friends WHERE user_id = $useridd AND friend_user_id = $friend_user_emaill";
$result = mysqli_query($conn,$sql);


if($result){

  echo 'good jungmin';
  echo $friend_user_email;

}else{

  echo 'essayer';
  echo $friend_user_email;
}



    ?>
