<?php
session_start();
include 'dbh.php';

$user = json_decode(file_get_contents('php://input'));
$response=[];
$output = array();
$userid = $_SESSION['uid'];
$useridd = intval($userid);
// $sql="SELECT * FROM friends WHERE user_id = '$userid'";
$sql="SELECT email, username FROM user INNER JOIN friends WHERE  user.id = friends.friend_user_id and friends.user_id = $userid";
$result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_array($result);
if(mysqli_num_rows($result)>0){
while($row = mysqli_fetch_array($result)){

  $output[] = $row;

}
echo json_encode($output);
}else{
  echo "essayer";
}

// $mysqli->close();

    ?>
