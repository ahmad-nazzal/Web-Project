<?php
include_once "../php_duplicate_code/stylesheets_import.php";
include_once "../php_duplicate_code/classes/nav_bar.php";
include_once "../php_duplicate_code/classes/rating.php";
include_once "../php_duplicate_code/classes/horizontal_card.php";



?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Likes</title>
  <?php getStyles(); ?>
  <link rel="stylesheet" href="../css/search-results.css">
</head>

<body>
  <?php
  $nav = new Navbar();
  $nav->render();
  unset($nav);
  ?>
  <div class=" container mt-5">
    <h2 class=" mb-3">المفضلة:</h2>
    <?php
    for ($i = 0; $i < 9; $i++) {
      (new HorizontalCard("aslah item", 4, 20.0, "loremloremlorem lorem", "", ""))->render();
    }
    ?>




  </div>
</body>

</html>