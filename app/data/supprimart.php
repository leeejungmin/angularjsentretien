<?php

include 'dbh.php';

$user = json_decode(file_get_contents('php://input'));
$articleid = $user->id;


$articleid = mysqli_real_escape_string($conn,$articleid);


$sql = "DELETE FROM article WHERE id='$user_id'";


mysqli_query($conn,$sql);




    ?>
