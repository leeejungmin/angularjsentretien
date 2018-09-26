<?php

include 'dbh.php';

// $user = json_decode(file_get_contents('php://input'));
$output = array();
$userid = 18;
$sql="SELECT * FROM friends WHERE user_id = '$userid'";
$result = mysqli_query($conn,$sql);

// $row = mysqli_fetch_array($result);
if(mysqli_num_rows($result)>0){
while($row = mysqli_fetch_array($result)){

  $output[] = $row;

}
echo json_encode($output);
}

// $mysqli->close();

    ?>
