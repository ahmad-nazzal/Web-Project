<?php


$host="localhost";
$dbname="web_project_agarr";
$passwordDb="";
$usernameRoot="root";




if(!$con=mysqli_connect($host,$usernameRoot,$passwordDb,$dbname) ){
  die("failed to connect");
}
?>