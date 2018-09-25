<?php

include 'dbh.php';

$user = json_decode(file_get_contents('php://input'));

$userid = $user->id;

$result = mysqli_query($conn,"select * from friends where user_id = '$userid'")
                or die("fail to dababase".mysqli_error());
// $row = mysqli_fetch_array($result);

while ($row = $result->fetch_assoc()) {

// ca sera bon d'envoyer ca;
    }

$mysqli->close();

if($row['email'] == $email && $row['password'] == $password){
  session_start();

  $_SESSION['uid']= $row['id'];
  print $_SESSION['uid'];

    ?>
