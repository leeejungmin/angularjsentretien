<?php

include 'dbh.php';

// $user = json_decode(file_get_contents('php://input'));
$output = array();
$response=[];
$query = "SELECT * FROM article";
$result = mysqli_query($conn, $query);

// $row = mysqli_fetch_array($result);

if(mysqli_num_rows($result)>0){
while($row = mysqli_fetch_array($result)){

  $output[] = $row;
  // $response[] = $row;

}
echo json_encode($output);
// echo json_encode($reponse);
}

?>
