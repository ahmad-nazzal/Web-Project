<?php
include_once("../php_duplicate_code/stylesheets_import.php");
include_once("../php_duplicate_code/classes/card.php");
include_once("toast.php");
include_once("database.php");
include_once("../php_duplicate_code/classes/add_item_template.php");
require "../php_duplicate_code/classes/nav_barAll.php";
require '../php_duplicate_code/classes/footer.php';

// 780px best width

session_start();
$item_id = 0;
$create_flag = false;
if (isset($_GET['item'])) {
  global $item_id;
  $item_id = $_GET['item'];
}

function get_item_images_from_database($item_id)
{
  global $con;
  $query =
    "
    SELECT * 
    FROM
    images 
    WHERE item_id = ?;
  ";
  $stmt = $con->prepare($query);
  $stmt->bind_param("i", $item_id);
  $stmt->execute();
  $result = $stmt->get_result();
  return $result;
}

function get_item_object_from_database($item_id)
{
  global $con;
  $query =
    "
    SELECT * 
    FROM
    items 
    WHERE items.id = ?;
  ";
  $stmt = $con->prepare($query);
  $stmt->bind_param("i", $item_id);
  $stmt->execute();
  $result = $stmt->get_result();
  return ($result->fetch_object());
}

$item_obj = 0;
$item_imgs = 0;
$create_flag = true;
if ($item_id == 0) {
  global $create_flag;
  $create_flag = true;
} else {
  global $item_obj;
  global $item_imgs;

  $create_flag = false;
  $item_obj = get_item_object_from_database($item_id);
  $item_imgs_result = get_item_images_from_database($item_id);

  $item_images = [];

  for ($i = 0; $i < $item_imgs_result->num_rows; $i++) {
    $img = $item_imgs_result->fetch_object();
    array_push($item_images, $img->image_url);
  }
}
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
  <?php
  getStyles();
  ?>

  <!-- <link rel="stylesheet" href="../node_modules/swiper/swiper-bundle.min.css" /> -->
  <script src="../js/cards.js"></script>
  <script src="../js/general.js"></script>

  <link href="../css/cards.css" rel="stylesheet" />
  <link href="../css//add-item.css" rel="stylesheet" />
  <script defer>
    function selectPhoto(element) {
      // removeStyles(element);

      let bigImg = document.querySelector('#big-img');
      bigImg.src = element.src;
      // alert(element.src);
    }
    // function removeStyles(element) {
    //   let imgs = document.querySelectorAll('.item-img');
    //   alert(imgs.length);
    //   for (let img of imgs) {

    //     let list = img.classList;
    //       list.toggle("img-selected");
    //       console.log(img.className);

    //     } element.classList.add('img-selected');
    //   }


    // function addBorder(ele) {
    //   ele.className += " img-selected"
    //   alert(ele.className);
    // }
    // function removeBorder(ele) {
    //   ele.className.replace('img-selected','');
    // }
  </script>
  <script defer>
    var loadFile = function(event) {

      let imgContainer = document.querySelector(".available-imgs");

      for (let i = 0; i < imgContainer.childNodes.length; i++) {
        let image = document.createElement('img');
        image.src = URL.createObjectURL(event.target.files[i]);
        image.classList.add('item-img');
        image.alt = "added image";
        image.addEventListener("click", function() {
          selectPhoto(image);
        });

        imgContainer.appendChild(image);
      }

    };
  </script>

  <script defer>
    function displayToast() {

      const toastLiveExample = document.getElementById('liveToast');
      const toast = new bootstrap.Toast(toastLiveExample);
      toast.show();
    }

    function storeItem() {
      let xml = new XMLHttpRequest();
      xml.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          displayToast();
          sleep(3000);
          window.location("my_items_page.php");
        }
      }

      xml.open("post", "store_item.php", true);
      xml.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

      let imgs = document.querySelectorAll(".available-imgs img");
      let title = document.querySelector("");
      for (let i = 0; i < imgs.length; i++) {

      }
      xml.send("");
    }
  </script>
  <!-- <script defer>
        
        const toastTrigger = document.getElementById('update-btn');
        
        if (toastTrigger) {
          
          toastTrigger.addEventListener('click', () => {
            
          })
        }
      </script> -->
  <title>add/edit item</title>

</head>

<body>

  <?php new NavBarAll($isuser, $con, $user_email, $userName); ?>

  <div class="container ">
    <form action="my_items_page.php" method="post" id="main-form" enctype="multipart/form-data">
      <?php
      if ($create_flag == false) {
        (new AddItemTemplate($item_id, $item_images, $item_obj->Title, $item_obj->Description, $item_obj->price_per_day, $item_obj->cash_method, $item_obj->credit_method, $item_obj->local_pickup, $item_obj->shipping, $item_obj->stat, $item_obj->location))->render();
      } else {
        $arr = [];
        (new AddItemTemplate(0, $arr, "", "", 0, 0, 0, 0, 0, 1, ""))->render();
      }
      ?>
      <div class="d-flex justify-content-center">

        <button type="submit" class="btn btn-primary my-4 col-4" id="update-btn" onclick="">حفظ</button>
      </div>
    </form>


  </div>
</body>
<?php new Footer() ?>

</html>