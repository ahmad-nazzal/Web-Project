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

  for ($i = 0; $i < count($images_path); $i++) {
    $insert_images =
      "
    INSERT INTO images(item_id,image_url)
    VALUES (" . $item_id . " ,'" . $images_path[$i] . "');
    ";
    $con->query($insert_images);
  }
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

function insert_item_into_database($images_path)
{
  global $con;
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
  // insert a new item to items relation.
  $ps->execute();
  // get the last index of this insert statement.
  $id = $ps->insert_id;

  // insert tags 


  $insert_into_tags =
    " 
    INSERT INTO items_tags (item_id, tag_category) values (" . $id . ", '" . $_POST['tag'] . "');
    ";
  $con->query($insert_into_tags);
  // storing the images in images relation.
  store_images($images_path, $id);

  // insert empty review
  $insert_into_reviews =
    "
    INSERT INTO REVIEWS(item_id, user_email) VALUES (" . $id . ",'" . $_SESSION['useremail'] . "');
    ";
  $con->query($insert_into_reviews);
}
function update_item_in_database($images_path)
{
  global $con;
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
  // update item in database;
  $ps->execute();

  // update tags
  if ($_POST['tag'] != "اخرى") {

    $update_tags =
      " UPDATE items_tags set tag_category = '" . $_POST['tag'] . "' WHERE item_id = " . $_POST['create'] . "
  ";
    $con->query($update_tags);
  }
  // insert new added images
  store_images($images_path, $_POST['create']);
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
  && isset($_POST['tag'])
) {

  if ($_POST['create'] == 0) {
    insert_item_into_database($images_path);
  } else {
    update_item_in_database($images_path);
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
        ON images.item_id=items.ID )) card where card.user_email='$user_email';";

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

      $added_items = [];

      while ($cardData = mysqli_fetch_assoc($resultt)) {
        if (in_array($cardData['ID'], $added_items)) {
          continue;
        }
        array_push($added_items, $cardData['ID']);

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