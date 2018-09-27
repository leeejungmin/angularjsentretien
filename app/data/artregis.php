<?php

include 'dbh.php';
session_start();

$registerData = json_decode(file_get_contents('php://input'));

$userid = $_SESSION['uid'];
$useridd = intval($userid);


$famille = $registerData->famille;
$age = $registerData->age;
$race = $registerData->race;
$nourriture = $registerData->nourriture;
// $famille = "GREATTTT";
// $age = 100;
// $race = "ESPANOLE";
// $nourriture ="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQvJTarTLMUXQoJWrdf6Jedp41RL_FEt0qrY59CE-POuZiHEIq2yQ" ;




 $sql = "INSERT INTO article ( user_id, famille, age, race, nourriture) VALUES ($useridd , '$famille',  '$age',  '$race' , '$nourriture' )";
 $result = mysqli_query($conn, $sql);
 echo json_encode($result);
// if ( mysqli_query($conn, $sql)){
//
//   echo 'good jungmin';
//   echo $famille;
//
// }else{
//   echo $useridd;
//   echo 'essayer';
// }
// mysqli_close($conn);

// $output = array(
//   'good' => $message
// );
//
// echo json_encode($output);
// $updatesql = "UPDATE article SET(user_id = '$user_id' , famille = '$famille',age = '$age', race = '$race', nourriture = '$nourriture')
// WHERE id='$id'";



    ?>
