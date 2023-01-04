<?php
include_once "database.php";
include_once "../php_duplicate_code/stylesheets_import.php";
include_once "../php_duplicate_code/classes/nav_barAll.php";
include_once "../php_duplicate_code/classes/rating.php";
include_once "../php_duplicate_code/classes/horizontal_card.php";

session_start();

$isuser = false;
$user_email = '';
$userName = '';
if (isset($_SESSION['isUser']) && isset($_SESSION['useremail']) && isset($_SESSION['username'])) {
  $userName = $_SESSION['username'];
  $user_email = $_SESSION['useremail'];
  $isuser = $_SESSION['isUser'];
}


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
  $nav = new NavBarAll($isuser, $con, $user_email, $userName)

  ?>
  <div class=" container mt-5">
    <h2 class=" mb-3">المفضلة:</h2>
    <?php
    $query =
      "
    SELECT item_id FROM (USERS INNER JOIN ACTION OM USERS.EMAIL = ACTION.USER_EMAIL) TYPE = 'C' AND  ACTION.USER_EMAIL = " . $_SESSION['useremail'] . "
    ";
    $result = $con->query($query);
    for ($i = 0; $i < 9; $i++) {
      (new HorizontalCard("aslah item", 4, 20.0, "loremloremlorem lorem", "", ""))->render();
    }
    ?>




  </div>
</body>

</html>