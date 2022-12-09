<?php
  include_once("../php_duplicate_code/classes/nav_bar.php");
  include_once("../php_duplicate_code/stylesheets_import.php");
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
  <title>my items</title>
</head>
<body>
  <?php
    $nav = new Navbar();
    $nav->render();
    unset($nav);

    for($i = 0; $i < 100; $i++)
    {

    
  ?>
  <div class="container" style="background-color: #ccc;">Color</div>
  
  <?php
    }
  ?>
  <a href="#" class="btn btn-dark add-button">
    <i class="bi bi-plus bi-md"></i>
  </a>
</body>
</html>