<?php
include_once "../php_duplicate_code/stylesheets_import.php";
include_once "../php_duplicate_code/classes/nav_bar.php";
include_once "../php_duplicate_code/classes/carousel.php";
include_once "../php_duplicate_code/classes/rating.php";
include_once "../php_duplicate_code/classes/nav_barAll.php";
require '../php_duplicate_code/classes/footer.php';
include_once "database.php";
session_start();
$item_id = 0;
global $con;
function get_item_comments_from_database($item_id)
{
  global $con;
  $query =
    "
  SELECT users.first_name, reviews.comment_text, reviews.rating, reviews.item_id from users INNER JOIN reviews on users.Email = reviews.user_email WHERE reviews.item_id = ?;
  ";
  $statement = $con->prepare($query);
  $statement->bind_param("i", $item_id);
  $statement->execute();
  return ($statement->get_result());
}
function get_item_images_from_database($item_id)
{
  global $con;
  $query =
    "
    SELECT images.image_url from images where item_id = ?;
    ";
  $statement = $con->prepare($query);
  $statement->bind_param("i", $item_id);
  $statement->execute();
  return ($statement->get_result());
}

function get_item_info_from_database($item_id)
{
  global $con;
  $query =
    "
    SELECT 
    owner_info.first_name, owner_info.last_name, owner_info.phone,
    item_rating.stars,
    comments.first_name as commenter_name, comments.rating as comment_rating, comments.comment_text,
    returned_item.*
    FROM
    (select DISTINCT users.first_name, users.last_name, users.phone , items.ID as item_id from users INNER JOIN items on items.user_email = users.Email where items.ID = ?) owner_info
    INNER JOIN
    (SELECT users.first_name, reviews.comment_text, reviews.rating, reviews.item_id from users INNER JOIN reviews on users.Email = reviews.user_email) comments
    ON owner_info.item_id = comments.item_id
    INNER JOIN 
    (select avg(reviews.rating) as stars, item_id from reviews GROUP BY reviews.item_id) item_rating
    ON comments.item_id = item_rating.item_id
    INNER JOIN
    (select * from items) returned_item
    ON returned_item.id = item_rating.item_id;
    ";
  $statement = $con->prepare($query);
  $statement->bind_param("i", $item_id);

  $statement->execute();
  return ($statement->get_result());
}

if (isset($_GET['item']) && 0 != $_GET['item']) {
  $item_id = $_GET['item'];
}
$result_info = get_item_info_from_database($item_id);

$result_images = get_item_images_from_database($item_id);
$result_comments = get_item_comments_from_database($item_id);
$item_info = $result_info->fetch_object();

$isuser = '';
$user_email = '';
$userName = '';
if (isset($_SESSION['isUser']) && isset($_SESSION['useremail']) && isset($_SESSION['username'])) {
  $userName = $_SESSION['username'];
  $user_email = $_SESSION['useremail'];
  $isuser = $_SESSION['isUser'];
}
$available_flag = false;


?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>rent item</title>
  <?php getStyles(); ?>
  <link rel="stylesheet" href="../css/rent-item.css">
  <script>
    function calculateVars() {
      calculateDate(1);
    }

    function calculateDate(num) {
      let element = document.querySelector("#return-date");
      let date = new Date(Date.now() + (num * 24 * 60 * 60 * 1000));

      let arr = (date.toLocaleString().split(',')[0]).split('/');
      element.innerText = arr[1] + '/' + arr[0] + '/' + arr[2];
    }

    function calculateTotal(num) {
      let element = document.querySelector("#price_total");
      let dayPrice = document.querySelector('#day_price');

      element.innerText = (num * dayPrice.innerText.split('$')[0]) + '$';
    }

    function increaseDays() {

      let element = document.querySelector("#num_days");
      element.innerText = parseInt(element.innerText) + 1;
      // alert(typeof(parseInt(element.innerText)));
      calculateTotal(parseInt(element.innerText));
      calculateDate(parseInt(element.innerText));
    }

    function decreaseDays() {
      let element = document.querySelector("#num_days");
      element.innerText = parseInt(element.innerText) - 1;
      calculateTotal(parseInt(element.innerText));
      calculateDate(parseInt(element.innerText));
    }

    // function fillIcon(element) {
    //   element.classList.remove("bi-plus-circle");
    //   element.classList.add("bi-plus-circle-fill");
    // }

    // function unfillIcon(element) {
    //   element.classList.remove("bi-plus-circle-fill");
    //   element.classList.add("bi-plus-circle");
    // }

    function rentItem() {
      let xml = new XMLHttpRequest();
      xml.onreadystatechange = function() {
        if (xml.readyState == 4 && xml.status == 200) {
          if (xml.responseText == "salah") {
            alert("قم بتسجيل الدخول");
          }
          //   document.querySelector(".rent-btn").innerHTML = "تم الايجار بنجاح";
          // document.querySelector(".rent-btn").disabled = true;
        }
      }
      xml.open("post", "store_item.php", true);
      xml.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

      let rentingUser = document.querySelector("#user-email-hidden");
      let rentedItem = document.querySelector("#item-id-hidden");

      let returnDate = document.querySelector("#return-date");
      let arr1 = returnDate.innerText.split('/');
      let returnDateString = arr1[2] + '-' + arr1[1] + '-' + arr1[0];


      let todaysDate = (new Date().toLocaleString()).split(',')[0];
      let arr2 = todaysDate.split('/');
      let todaysDateString = arr2[2] + '-' + arr2[0] + '-' + arr2[1];


      xml.send("renting_user=" + '<?php echo $_SESSION['useremail']; ?>' + "&" +
        "rented_item=" + '<?php echo $_GET['item']; ?>' + "&" +
        "return_date=" + returnDateString + "&" +
        "todays_date=" + todaysDateString);
    }
  </script>
</head>

<body onload="calculateVars()">
  <?php

  new NavBarAll($isuser, $con, $user_email, $userName);

  if ($result_info->num_rows < 1) {
    echo "<h1 class ='container text-center'>حصل عطل ما</h1>";
    exit(0);
  }
  ?>
  <main>
    <div class="container">
      <section class="section-display-item">

        <div class="row mt-5">
          <div class="col-6">
            <?php
            $images = [];
            for ($i = 0; $i < $result_images->num_rows; $i++) {
              $image = $result_images->fetch_object();
              array_push($images, $image->image_url);
            }
            (new Carousel(550, 650, "", "", $images))->render();
            ?>
          </div>

          <div class="col-6">
            <div class="item-header">
              <h2 class="item-title "><?php echo $item_info->Title; ?> </h2>

              <?php
              if ($item_info->stat == 1) {
                $available_flag = true;
                echo '<p class="status status-available">متاح</p>';
              } else {
                $available_flag = false;
                echo '<p class="status status-not-available">غير متاح</p>';
              }
              ?>


            </div>
            <?php (new Rating(round($item_info->stars, 2)))->render(); ?>
            <div class="price-box mt-3">
              <p class="price d-inline" id="day_price"><strong><?php echo $item_info->price_per_day; ?>$</strong></p>
              <p class="price-text d-inline">ليوم واحد</p>
            </div>
            <!-- <div id="item-id-hidden" class=" d-none"><!?php echo $item_id; ?></div> -->
            <!-- <div id="user-email-hidden" class=" d-none"><!?php echo $_SESSION['useremail']; ?></div> -->
            <div class="rent-info-box mt-5 ps-3">

              <p class="location-text"><?php echo $item_info->location; ?></p>
              <p class="shipping-text">
                <?php
                if ($item_info->shipping >= 1) {

                  echo " متاح للتوصيل" . '  <strong>$' . round($item_info->shipping_cost, 2) . '</strong>';

                ?>
                  <!-- <p class="shipping-price-text"><!-?php echo $item_info->shipping_cost ?>$</p> -->
              </p>
            <?php
                } else {
                  echo "غير متاح للتوصيل";
                }
            ?>


            <p class="cash-method-text">
              <?php if ($item_info->cash_method == 1) {
                echo "يمكن الدفع كاش";
              } else {
                echo "لا يمكن الدفع كاش";
              }
              ?>
            </p>
            <p class="credit-method-text">
              <?php if ($item_info->credit_method == 1) {
                echo "يمكن الدفع ببطاقة الأئتمان";
              } else {
                echo "لا يمكن الدفع ببطاقة الأئتمان";
              }
              ?>
            </p>

            <div class="rent-days d-flex align-items-center gap-4 mt-5">
              <i class=" bi bi-plus-circle control-btn" onclick="increaseDays();"></i>
              <span class="days-number" id="num_days">1</span>
              <span class="days-number-text mt-2">يوم </span>
              <i class=" bi bi-dash-circle control-btn" onclick="decreaseDays();"></i>

              <p class="total-price-text">المجموع: </p>
              <p class="total-price" id="price_total">19.99$</p>

            </div>
            <div class=" d-flex gap-2 mt-4 align-items-center">
              <p class="date-text">تاريخ التسليم: </p>
              <p id="return-date" class=" ">12-8-2022</p>
            </div>

            </div>
            <div class="cta-box d-flex gap-0 align-items-center justify-content-between mt-3">
              <div class="like-btn"><i class=" bi-heart icons heart-icon"></i></div>
              <button class="btn btn-dark w-75 rent-btn" onclick="rentItem()" <?php if (!isset($_SESSION['isUser']) || $available_flag == false) {
                                                                                echo "disabled";
                                                                              } ?>>
                استأجر الآن</button>
              <button class=" btn btn-outline-dark w-auto cart-btn">
                <i class=" bi bi-cart gap-1">الى العربة</i>
              </button>

            </div>
          </div>
        </div>
      </section>
      <section class="section-second">


        <div class="row mt-5 d-flex gap-5">
          <div class="item-data-col">
            <h4 class=" mb-3">تفاصيل المنتج</h4>
            <nav id="item-text-nav" class="navbar bg-light px-3 mb-3 gap-2 d-flex">
              <ul class="nav nav-pills">
                <li class="nav-item">
                  <a class="nav-link" href="#description">الوصف</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#owner-details">معلومات المالك</a>
                </li>
              </ul>
            </nav>
            <div class="item-text-box" data-bs-spy="scroll" data-bs-target="#item-text-nav">
              <p class="item-text" id="description">
                <?php echo $item_info->Description; ?>

              <p class="item-text" id="owner-details">
              <p>

                <?php echo $item_info->first_name . ' ' . $item_info->last_name; ?>
              </p>
              <p>
                <?php echo $item_info->phone; ?>
              </p>
            </div>
          </div>


          <div class=" col-6 reviews-box">
            <h4 class=" mb-3">التقييمات</h4>
            <div class="reviews">

              <?php for ($i = 0; $i < $result_comments->num_rows; $i++) {
                $row = $result_comments->fetch_object();
              ?>
                <div class=" card">
                  <div class=" card-body">

                    <p class="commenter-name">
                      <?php
                      $first_char = ($row->first_name)[0];
                      $last_char = ($row->first_name)[strlen($row->first_name) - 1];
                      echo ($first_char . '***' . $last_char);
                      ?>
                    </p>


                    <?php (new Rating($row->rating))->render(); ?>
                    <p>
                      <?php echo $row->comment_text; ?>
                    </p>
                  </div>
                </div>

              <?php } ?>
            </div>
          </div>

        </div>
      </section>
      <!-- <section class="section-similar">
        <?php
        // $cate = $tagsData['category'];
        $queryCard = "SELECT Distinct Title, price_per_day,avgRate,image_url,items_tags.item_id from ( (items INNER JOIN (SELECT AVG(rating) as
                       avgRate,item_id from reviews GROUP BY item_id) rate ON id=item_id ) INNER JOIN images 
                       ON images.item_id=items.ID),items_tags where items.ID= items_tags.item_id and items_tags.tag_category='فساتين'";
        $resultt = $con->query($queryCard);
        while ($cardData = mysqli_fetch_assoc($resultt)) {
        ?>
          <div class="card swiper-slide">
            <span class="ratig-card">
              <i class="bi bi-star-fill star-icon">
                <span style="font-size:0.8rem;"><?php echo number_format($cardData['avgRate'], 1, '.', ''); ?></span>
              </i>
            </span>
            <img src="<?php echo $cardData['image_url']; ?>" onclick="location.href='#'" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title text-center"><?php echo $cardData['Title']; ?></h5>
              <div class="card-content">
                <div class="price">
                  <p class="card-text">$<?php echo $cardData['price_per_day']; ?></p>
                  <p class="card-text every-day">لكل يوم</p>
                </div>
                <i class="bi bi-heart" id="icon-to-toggle" onclick="toggleIcon(this,<?php echo $cardData['item_id'] ?>)"></i>
              </div>
            </div>
          </div>
          <script src="../node_modules/swiper/swiper-bundle.min.js"></script>


        <?php
        }
        ?>
      </section> -->
    </div>

  </main>
  <?php new Footer(); ?>

</body>

</html>