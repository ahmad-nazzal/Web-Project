<?php
  include_once("../php_duplicate_code/classes/nav_bar.php");
  include_once("../php_duplicate_code/stylesheets_import.php");
  include_once("../php_duplicate_code/classes/card.php");
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../css/my-items.css" rel="stylesheet">
  <link href="../css/cards.css" rel="stylesheet"/>
  <?php
    getStyles();
  ?>
  <title>my items</title>
</head>
<body>
  <?php
    $nav = new Navbar();
    $nav->render();
    unset($nav);

  ?>
    <div class="container mt-5">
    <h2>منتجاتي: </h2>
    
    <div class="items-gallery mt-5">
                  
        <?php
        for($i = 0; $i < 12; $i++)
        {
    
            $card = new MiniCard(false,true,5,"https://picsum.photos/200","Shoe",10.99, 18, "add_item.php");
            $card->render();
            unset($card);
        }
          ?>
    
      </div>
    </div>
  <a href="#" class="btn btn-dark add-button">
    <i class="bi bi-plus bi-md"></i>
  </a>
</body>
</html>