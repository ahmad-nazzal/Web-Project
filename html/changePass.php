<?php
require 'database.php';

$flag=0;
if(isset($_POST['oldPass']) && isset($_POST['passNew']) && isset($_POST['confirmPass']) && isset($_POST['email'])){

  $query="select pass,email from users where email='".$_POST['email']."'";
  $res=$con->query($query);
  $userDataa=mysqli_fetch_assoc($res);
  if(sha1($_POST['oldPass']) == $userDataa['pass']){
    if($_POST['passNew']==$_POST['confirmPass']){
      $queryUpdate="update users set pass='".sha1($_POST['passNew'])."' where email='".$_POST['email']."'";
      $con->query($queryUpdate);
      $flag= 1;
    }
  }

}
echo $flag;
?>