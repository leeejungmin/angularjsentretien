<?php

include 'dbh.php';

$registerData = json_decode(file_get_contents('php://input'));


$userid = '1';
$famille = $registerData->famille;
$age = $registerData->age;
$race = $registerData->race;
$nourriture = $registerData->nourriture;

// $userid = mysqli_real_escape_string($conn,$userid);
// $famille = mysqli_real_escape_string($conn,$famille);
// $age = mysqli_real_escape_string($conn, $age);
// $race = mysqli_real_escape_string($conn, $race);
// $nourriture = mysqli_real_escape_string($conn, $nourriture);


$sql = "INSERT INTO article ( famille, age, race, nourriture) VALUES ( '$famille',  '$age',  '$race' , '$nourriture' )";

if ( mysqli_query($conn, $sql)){

  echo 'good jungmin';
  echo $famille;

}else{

  echo 'essayer';
}
mysqli_close($conn);

// $output = array(
//   'good' => $message
// );
//
// echo json_encode($output);
// $updatesql = "UPDATE article SET(user_id = '$user_id' , famille = '$famille',age = '$age', race = '$race', nourriture = '$nourriture')
// WHERE id='$id'";



    ?>
