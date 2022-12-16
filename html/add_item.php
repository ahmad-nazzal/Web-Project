<?php
include_once("../php_duplicate_code/stylesheets_import.php");
include_once("../php_duplicate_code/classes/card.php");
include_once("toast.php");
include_once("database.php");
// 780px best width


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
if ($item_id == 0) {
  $create_flag = false;
} else {
  global $item_obj;
  global $item_imgs;

  $create_flag = true;
  $item_obj = get_item_object_from_database($item_id);
  $item_imgs_result = get_item_images_from_database($item_id);

  $item_images = [];

  for ($i = 0; $i < $item_imgs_result->num_rows; $i++) {
    $img = $item_imgs_result->fetch_object();
    array_push($item_images, $img->image_url);
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
  <link rel="stylesheet" href="../node_modules/swiper/swiper-bundle.min.css" />
  <script src="../js/cards.js"></script>

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


  <div class="container ">
    <h1 class="mt-5">تعديل/انشاء </h1>
    <section class="section-images">
      <h2 class="text-center heading-helper">الصور</h2>
      <div class="img-display text-center mb-5">
        <?php
        if (!$create_flag) {
        } else {


        ?>
          <img src="<?php echo $item_images[0]; ?>" alt="image" id="big-img">
        <?php
        }
        ?>
      </div>
      <form action="my_items_page.php" method="post" id="main-form">

        <!-- <!?php renderToast(); ?> -->
        <input type="text" name="create" value="<?php echo $item_id; ?>" style="display: none;">
        <!-- <label for="file" style="cursor: pointer;">اضف صور</label> -->





        <input class="form-control mb-2" type="file" id="formFileMultiple" onchange="loadFile(event)" multiple>
        <span>

          <div class="available-imgs">
            <?php
            for ($i = 0; $i < count($item_images); $i++) {
            ?>
              <img onclick="selectPhoto(this)" src="<?php echo $item_images[$i]; ?>" alt="image" class="item-img">
            <?php
            } ?>

          </div>
        </span>
    </section>

    <section class="section-info">
      <h2 class="text-center heading-helper">المعلومات</h2>
      <h5 class="mb-3">العنوان</h5>
      <div class="form-group mb-3">

        <input id="title-input" class="form-control" type="text" value="<?php echo $item_obj->Title; ?>">
      </div>
      <h5 class="text-description mb-e">الوصف</h5>
      <div class="form-group">
        <textarea form="main-form" class="form-control" id="exampleFormControlTextarea1" rows="10"><?php echo $item_obj->Description; ?></textarea>
      </div>
    </section>
    <section class="section-accordion">
      <h2 class="text-center heading-helper">الخصائص</h2>
      <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="panelsStayOpen-headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
              الدفع
            </button>
          </h2>
          <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
            <div class="accordion-body">
              <div class="price">
                <h3 class=" d-inline"><strong contenteditable="true"><?php echo $item_obj->price_per_day; ?></strong><strong>$</strong></h3>
                <p class="price-tag d-inline">ليوم واحد</p>

              </div>
              <div class="form-check w-50">
                <?php
                if ($item_obj->cash_method == 1) {


                ?>
                  <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="cash-method" checked>
                <?php
                } else {
                ?>
                  <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="cash-method">
                <?php
                }
                ?>
                <label class="form-check-label" for="flexCheckChecked">
                  كاش
                </label>

              </div>
              <div class="form-check w-50">
                <?php
                if ($item_obj->credit_method == 1) {

                ?>
                  <input class="form-check-input" type="checkbox" value="1" id="flexCheck" name="credit-method" checked>
                <?php
                } else {
                ?>
                  <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="credit-method">
                <?php
                }
                ?>

                <label class="form-check-label" for="flexCheck">
                  بطاقة ائتمان
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
              التوصيل
            </button>
          </h2>
          <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">

            <div class="accordion-body my-2">
              <div class="form-check w-50">
                <?php
                if ($item_obj->local_pickup == 1) {

                ?>
                  <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="self-pickup" checked>
                <?php
                } else {
                ?>
                  <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="self-pickup">
                <?php
                }
                ?>
                <label class="form-check-label" for="flexCheckChecked">
                  استلام شخصي
                </label>
              </div>
              <div class="form-check w-50">
                <?php
                if ($item_obj->shipping == 1) {

                ?>
                  <input class="form-check-input" type="checkbox" value="1" id="flexCheck" name="shipping" checked>
                <?php
                } else {
                ?>
                  <input class="form-check-input" type="checkbox" value="1" id="flexCheck" name="shipping">
                <?php
                }
                ?>
                <label class="form-check-label" for="flexCheck">
                  توصيل عادي
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="panelsStayOpen-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
              الحالة
            </button>
          </h2>
          <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
            <div class="accordion-body">
              <div class="form-check form-switch">
                <?php
                if ($item_obj->credit_method == 1) {

                ?>
                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                <?php
                } else {
                ?>
                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                <?php
                }
                ?>
                <!-- <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked> -->
                <label class="form-check-label" for="flexSwitchCheckChecked">متاح</label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="d-flex justify-content-center">

      <button type="submit" class="btn btn-primary my-4 col-4" id="update-btn" onclick="storeItem()">حفظ</button>
    </div>
    </form>


  </div>
</body>

</html>