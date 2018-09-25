<?php

include 'dbh.php';

$user = json_decode(file_get_contents('php://input'));


$result = mysqli_query($conn,"select * from article")
                or die("fail to dababase".mysqli_error());
// $row = mysqli_fetch_array($result);
//
// foreach ($row as $value){
//   echo $value[famille];
//
// }

while ($row = $result->fetch_assoc()) {
        printf ("%s (%s)\n", $row["famille"], $row["age"]);
        echo "<br />\n";


    }
    $mysqli->close();
?>
