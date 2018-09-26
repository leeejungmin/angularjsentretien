<?php
include 'dbh.php';


    $user = json_decode(file_get_contents('php://input'));


      $email = $user->email;
      $password = $user->password;


      // connect to the database
      $result = mysqli_query($conn,"select * from user where email = '$email' and password ='$password' ")
                    or die("fail to dababase".mysqli_error());
      $row = mysqli_fetch_array($result);
      if($row['email'] == $email && $row['password'] == $password){
          session_start();
          $_SESSION['uid']= $row['id'];
          // $_SESSION['uid']= uniqid('ang_');

          print $_SESSION['uid'];


          // echo "Login success !! wow" . $row['username'];
          // header("Location: ../index.html");
      }else{
          echo "failed wowowowo.....";
      }






  ?>
