<?php

include 'dbh.php';

$user = json_decode(file_get_contents('php://input'));

$email = $user->mail;
$password = $user->password;

$email = mysqli_real_escape_string($conn,$email);
$password = mysqli_real_escape_string($conn, $password);

$result = mysqli_query($conn,"select * from user where email = '$email' and password ='$password' ")
                or die("fail to dababase".mysqli_error());
$row = mysqli_fetch_array($result);

$mysqli->close();

if($row['email'] == $email && $row['password'] == $password){
  session_start();

  $_SESSION['uid']= $row['id'];
  print $_SESSION['uid'];

    ?>
