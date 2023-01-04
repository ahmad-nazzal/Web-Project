<?php
require 'database.php';
if (isset($_POST['itemId']) && isset($_POST['email'])) {
  $recivedQuery = "update rent set status=2 where user_email='" . $_POST['email'] . "' and item_id=" . $_POST['itemId'];
  $con->query($recivedQuery);

  $item_available =
    "
  update items set stat = 1 where ID = " . $_POST['itemId'] . ";
  ";
  $con->query($item_available);
  echo $item_available;
  // echo $recivedQuery;
}
