<?php
include 'dbh.php';


    $user = json_decode(file_get_contents('php://input')); 


    if($user->mail =='root')
    session_start();

    $_SESSION['uid']= 1;
    // $_SESSION['uid']= uniqid('ang_');
    print $_SESSION['uid'];


  ?>
