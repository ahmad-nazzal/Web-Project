<?php


$host="localhost";
$dbname="web_project_agarr";
$passwordDb="";
$usernameRoot="root";


$con=mysqli_connect($host,$usernameRoot,$passwordDb,$dbname);

if(!$con){
  die("failed to connect");
}
