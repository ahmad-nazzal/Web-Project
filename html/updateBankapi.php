<?php 
require 'database.php'; 
$flag=0;
if(isset($_POST['bankNumber']) && isset($_POST['bankName']) && isset($_POST['email'])){

  $query="update users set bank_account_number='".$_POST['bankNumber']."', bank_name='".$_POST['bankName']."' where email='".$_POST['email']."'";
  $con->query($query);
  $flag=1;
}



echo $flag;















  





?>