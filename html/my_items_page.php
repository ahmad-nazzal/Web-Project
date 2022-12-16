<?php
  include_once("../php_duplicate_code/classes/nav_bar.php");
  include_once("../php_duplicate_code/stylesheets_import.php");
  include_once("../php_duplicate_code/classes/card.php");
  include_once("../php_duplicate_code/classes/footer.php");
  require "../php_duplicate_code/classes/nav_barAll.php";
  require '../html/database.php';

  $isuser='';
  $user_email='';
  $userName='';
  if(isset($_GET['isUser']) && isset($_GET['userEmail']) && isset($_GET['userName'])){
    $userName=$_GET['userName'];
    $user_email=$_GET['userEmail'];
    $isuser=$_GET['isUser'];
}

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../css/my-items.css" rel="stylesheet">
  <?php
    getStyles();
  ?>
  <link href="../css/cards.css" rel="stylesheet"/>

  <title>my items</title>
</head>
<body>
  <?php
        new NavBarAll($isuser,$con,$user_email,$userName);  

  ?>
    <div class="container mt-5">
    <h2>أغراضي: </h2>
    
    <div class="items-gallery mt-5">
                  
        <?php


        $queryCard="select * from (SELECT Distinct Title, price_per_day,avgRate,image_url,items.user_email,items.ID from ( (items INNER JOIN (SELECT AVG(rating) as
        avgRate,item_id from reviews GROUP BY item_id) rate ON id=item_id ) INNER JOIN images 
        ON images.item_id=items.ID)) card where card.user_email='$user_email'";
        $resultt=$con->query($queryCard);

      while($cardData=mysqli_fetch_assoc($resultt)){
        $card = new MiniCard(false,true,$cardData['avgRate'],$cardData['image_url'],$cardData['Title'],$cardData['price_per_day'], 16.3, "add_item.php?item=".$cardData['ID']);
        $card->render();
        unset($card);

      }
          ?>
    
      </div>
    </div>
  <a href="add_item.php?item=0" class="btn btn-dark add-button">
    <i class="bi bi-plus bi-md"></i>
  </a>
  <?php new Footer(); ?>
</body>
</html>