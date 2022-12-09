<?php
  require 'database.php';
  $isUserr='false';
  if(isset($_POST['emailIn']) && isset($_POST['passIn'])){
    $user_email=$_POST['emailIn'];
    $user_pass=$_POST['passIn'];
    $query= "select * from users where email = '".$user_email."'";
    $result= $con->query($query);

  if($result && mysqli_num_rows($result)>0 )
  {
    $user_data=mysqli_fetch_assoc($result);
    if($user_data['pass']===sha1($user_pass)){
      $isUserr='true';
    }

  }
  }
  echo $isUserr ;
?>

