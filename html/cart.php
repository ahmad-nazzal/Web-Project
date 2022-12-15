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
  <title>cart</title>
  <?php getStyles(); ?>
  <link rel="stylesheet" href="../css/cart.css">
</head>

<body>
  <?php
  $nav = new Navbar();
  $nav->render();
  unset($nav);
  ?>

  <div class="modal fade" tabindex="-1" id="mmm" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-between align-items-center gap-2">
          <button class="btn btn-close" data-bs-dismiss="modal"></button>
          <p>الفاتورة</p>
        </div>
        <div class=" modal-body d-flex flex-column modal-first">
          <?php
          for ($i = 0; $i < 4; $i++) {

          ?>
            <p class="element-price ms-auto">0.99$</p>
          <?php
          }
          ?>
        </div>
        <div class="modal-body d-flex  justify-content-between">
          <p class="total-price-text ms-0">المجموع:</p>
          <p class="total-price">3.99$</p>
        </div>
        <div class="modal-footer">
          <button class=" btn btn-dark">ادفع</button>
        </div>
      </div>
    </div>
  </div>
  <main>
    <div class="cart mt-5">
      <div class="cart-content">

        <?php
        for ($i = 0; $i < 5; $i++) {
          // (new HorizontalCard("dsadasf", 4, 0.99, "dsffdfkaskdkaskdkkksfskgfdhfjhghfgfdsfghjgfsdafrgh", "", ""))->render();

        ?>
          <div class="card mb-2 ">
            <div class="row align-items-center justify-content-start">
              <i class="bi bi-trash justify-content-center icons"></i>

              <div class="col-auto">
                <img src="https://picsum.photos/180" alt="" class="" width="156px" height="156px">
              </div>
              <div class="col-8 ">
                <div class="card-body">
                  <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
                  <p class="price-per-day">0.99$</p>
                  <div class="rent-days d-flex align-items-center gap-4 mt-5">
                    <i class=" bi bi-plus-circle control-btn icons"></i>
                    <p class="days-number">6</p>
                    <i class=" bi bi-dash-circle control-btn icons"></i>
                    <p class="total-price-text">المجموع: </p>
                    <p class="total-price">19.99$</p>
                  </div>

                </div>
              </div>
            </div>
          </div>
        <?php  } ?>
      </div>
      <div class="cart-btn">
        <button data-bs-toggle="modal" data-bs-target="#mmm">استأجر الآن</button>
      </div>
    </div>
  </main>
</body>

</html>