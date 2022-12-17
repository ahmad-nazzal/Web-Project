<?php 
require 'database.php';
if (isset($_POST['itemId'])&& isset($_POST['email'])){
  $recivedQuery="update rent set status=2 where user_email='".$_POST['email']."' and item_id=".$_POST['itemId'];
  $con->query($recivedQuery);


}



?>