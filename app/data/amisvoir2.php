<?php

include 'dbh.php';

// $user = json_decode(file_get_contents('php://input'));
$output = array();
$userid = 18;
$sql="SELECT * FROM friends WHERE user_id = '$userid'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result)



// $row = mysqli_fetch_array($result);

$amisid=$row['friend_user_id'];
$sqll = "SELECT * FROM user WHERE id = $amisid";
$result2= mysqli_query($conn,$sqll);


if(mysqli_num_rows($result2)>0){
while($row = mysqli_fetch_array($result2)){

  $output[] = $row;

}
echo json_encode($output);
}

// $mysqli->close();



    ?>
