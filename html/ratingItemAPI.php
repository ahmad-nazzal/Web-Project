<?php
require 'database.php';

if (isset($_POST['comment']) && isset($_POST['id']) && isset($_POST['rating']) && isset($_POST['email'])) {
  $insert_review = "insert into reviews (user_email, item_id, comment_text, rating ) values('" . $_POST['email'] . "'," . $_POST['id'] . ",'" . $_POST['comment'] . "'," . $_POST['rating'] . ")";
  $con->query(($insert_review));
  $updateStatus = "update rent set status=1 where user_email='" . $_POST['email'] . "' and item_id=" . $_POST['id'];
  echo $updateStatus;
  $con->query(($updateStatus));
}
