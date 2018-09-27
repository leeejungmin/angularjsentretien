<?php
session_start();

include 'dbh.php';

$user = json_decode(file_get_contents('php://input'));
$articleid = $user->id;


// $articleid = mysqli_real_escape_string($conn,$articleid);


$sql = "DELETE FROM article WHERE id='$articleid'";


mysqli_query($conn,$sql);


// if($result){
//
//   echo 'good jungmin';
//   echo $friend_user_email;
//   echo $useridd;
//
// }else{
//
//   echo 'essayer';
//   echo $friend_user_email;
// }


    ?>
