<?php
include_once "database.php";
session_start();
global $con;
$user_email = $_POST['renting_user'];
$item_id = $_POST['rented_item'];
$start_date = $_POST['todays_date'];
$end_date = $_POST['return_date'];


$query =
  '
    INSERT INTO rent(user_email, item_id, start_date, end_date,status) 
    VALUES ("' . $user_email . '",' . $item_id . ',date("' . $start_date . '"),date("' . $end_date . '"),0);
  ';
// $statement = $con->prepare($query);
// $statement->bind_param("siss", $user_email, $item_id, $start_date, $end_date);

// $output = $statement->execute();
if (isset($_SESSION['isUser']) && $_SESSION['isUser'] == 1) {
  $output = $con->query($query);
  echo $output;
} else {
  echo "salah";
}
