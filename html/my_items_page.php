<?php
include_once("../php_duplicate_code/classes/nav_bar.php");
include_once("../php_duplicate_code/stylesheets_import.php");
include_once("../php_duplicate_code/classes/card.php");
include_once("../php_duplicate_code/classes/footer.php");
require "../php_duplicate_code/classes/nav_barAll.php";
require '../html/database.php';
session_start();

$isuser = '';
$user_email = '';
$userName = '';
if (isset($_SESSION['isUser']) && isset($_SESSION['useremail']) && isset($_SESSION['username'])) {
  $userName = $_SESSION['username'];
  $user_email = $_SESSION['useremail'];
  $isuser = $_SESSION['isUser'];
}

function store_images($images_path, $item_id)
{
  global $con;



  // $first_image = $images_path[0];
  // echo $images_path[0];
  // $ps = $con->prepare($insert_images);
  for ($i = 0; $i < count($images_path); $i++) {
    $insert_images =
      "
    INSERT INTO images(item_id,image_url)
    VALUES (" . $item_id . " ,'" . $images_path[$i] . "');
    ";
    $result = $con->query($insert_images);
    // $s->bind_param("is", $item_id, $images_path[$i]);
    // $first_image = $images_path[$i];
    // $s->execute();
  }
  // $s->close();
  // $result = $con->query($insert_images);

  // return $ps->get_result();
}

// $_FILES['images']['name'][$i];
$to = "../../client_images/";
chmod($to, 0777);
$images_path = [];
if (isset($_POST['create']) && $_FILES['images']['name'] != "") {


  for ($i = 0; $i < count($_FILES['images']['name']); $i++) {

    if (is_uploaded_file($_FILES['images']['tmp_name'][$i])) {

      $tmp = $to . $_FILES['images']['name'][$i];
      move_uploaded_file($_FILES['images']['tmp_name'][$i], $tmp);
      array_push($images_path, $tmp);
    }
  }
}


if (
  isset($_POST['title'])
  && isset($_POST['desc'])
  && isset($_POST['price'])
  && isset($_POST['cash-method'])
  && isset($_POST['credit-method'])
  && isset($_POST['self-pickup'])
  && isset($_POST['shipping'])
  && isset($_POST['status'])
  && isset($_POST['create'])
  && isset($_POST['location'])
) {



  global $con;
  if ($_POST['create'] == 0) {
    $insert =
      "
    INSERT INTO items(title,description,stat,price_per_day,cash_method,credit_method,local_pickup,shipping,location, user_email)
    VALUES 
    (?,?,?,?,?,?,?,?,?,?)
    ";

    $ps = $con->prepare($insert);
    $ps->bind_param(
      "ssiiiiiiss",
      $_POST['title'],
      $_POST['desc'],
      $_POST['status'],
      $_POST['price'],
      $_POST['cash-method'],
      $_POST['credit-method'],
      $_POST['self-pickup'],
      $_POST['shipping'],
      $_POST['location'],
      $_SESSION['useremail']
    );
    $output = $ps->execute();


    // $get_item_id_query =
    //   "
    // SELECT items.id from items order by items.id desc limit 1;
    // ";
    // $row = $con->query($get_item_id_query);
    $id = $ps->insert_id;
    // $id = $con->insert_id;
    $insert_into_reviews =
      "
    INSERT INTO REVIEWS(item_id) VALUES (" . $id . ");
    ";
    $con->query($insert_into_reviews);
  } else {


    $update =
      "
    UPDATE items 
    SET title = ?,
    description = ?,
    price_per_day = ?,
    cash_method = ?,
    credit_method = ?,
    local_pickup = ?,
    shipping = ?,
    stat = ?,
    location = ?
    WHERE id = ? AND user_email = ?;

  ";

    $ps = $con->prepare($update);
    $ps->bind_param(
      "ssiiiiiisis",
      $_POST['title'],
      $_POST['desc'],
      $_POST['price'],
      $_POST['cash-method'],
      $_POST['credit-method'],
      $_POST['self-pickup'],
      $_POST['shipping'],
      $_POST['status'],
      $_POST['location'],
      $_POST['create'],
      $_SESSION['useremail']
    );
    $output = $ps->execute();

    store_images($images_path, $_POST['create']);
  }
}


?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php
  getStyles();
  ?>
  <link href="../css/my-items.css" rel="stylesheet">
  <link href="../css/cards.css" rel="stylesheet" />

  <title>my items</title>
</head>

<body>
  <?php
  new NavBarAll($isuser, $con, $user_email, $userName);

  ?>
  <div class="container mt-5">
    <h2>أغراضي: </h2>

    <div class="items-gallery mt-5">

      <?php
      $queryCard = "select * from (SELECT Distinct Title, price_per_day,avgRate,image_url,items.user_email,items.ID from ( (items INNER JOIN (SELECT AVG(rating) as
        avgRate,item_id from reviews GROUP BY item_id) rate ON items.id= rate.item_id ) INNER JOIN images 
        ON images.item_id=items.ID)) card where card.user_email='$user_email';";

      //       $queryCard =
      //         "
      //       SELECT DISTINCT
      //     items.ID,
      //     normal.stars,
      //     images.image_url,
      //     items.title,
      //     items.price_per_day
      // FROM
      //     (
      //         items,
      //         items AS i
      //     INNER JOIN images ON i.ID = images.item_id,
      //         (
      //         SELECT
      //             AVG(rating) as stars,
      //             reviews.item_id
      //         FROM
      //             items AS it
      //         INNER JOIN reviews ON it.ID = reviews.item_id Group by reviews.item_id
      //     ) normal
      //     )
      // WHERE
      //     items.user_email = '" . $user_email . "'
      // GROUP BY
      //     items.ID;
      //       ";
      $resultt = $con->query($queryCard);

      while ($cardData = mysqli_fetch_assoc($resultt)) {
        $card = new MiniCard(false, true, $cardData['avgRate'], $cardData['image_url'], $cardData['Title'], $cardData['price_per_day'], 16.3, "add_item.php?item=" . $cardData['ID']);
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