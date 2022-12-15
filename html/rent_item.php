<?php
include_once "../php_duplicate_code/stylesheets_import.php";
include_once "../php_duplicate_code/classes/nav_bar.php";
include_once "../php_duplicate_code/classes/carousel.php";
include_once "../php_duplicate_code/classes/rating.php";
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
  <script defer>
    function fillIcon(element) {
      element.classList.remove("bi-plus-circle");
      element.classList.add("bi-plus-circle-fill");
    }

    function unfillIcon(element) {
      element.classList.remove("bi-plus-circle-fill");
      element.classList.add("bi-plus-circle");
    }
  </script>
</head>

<body>
  <?php
  $nav = new Navbar();
  $nav->render();
  unset($nav);
  ?>
  <main>
    <div class="container">
      <section class="section-display-item">

        <div class="row mt-5">
          <div class="col-6">
            <?php
            $images = [
              "https://picsum.photos/300/300",
              "https://picsum.photos/550/650",
              "https://picsum.photos/550/650",
              "https://picsum.photos/500/700",
              "https://picsum.photos/500/700",
            ];

            (new Carousel(550, 650, "", "", $images))->render();
            ?>
          </div>

          <div class="col-6">
            <div class="item-header">
              <h2 class="item-title "> الأخرى إضافة إلى زيادة عدد الحروف التى يولدها </h2>
              <p class="status">متاح</p>
            </div>
            <?php (new Rating(4))->render(); ?>
            <div class="price-box mt-3">
              <p class="price d-inline"><strong>0.99$</strong></p>
              <p class="price-text d-inline">ليوم واحد</p>
            </div>
            <div class="rent-info-box mt-5 ps-3">

              <p class="location-text">نابلس</p>
              <p class="shipping-text">امكانية التوصيل</p>
              <p class="shipping-price-text">2.99$</p>
              <p class="cash-method-text">الدفع بالكاش</p>
              <p class="credit-method-text">لا بطاقة ائتمان</p>

              <div class="rent-days d-flex align-items-center gap-4 mt-5">
                <i class=" bi bi-plus-circle control-btn"></i>
                <p class="days-number">6</p>
                <i class=" bi bi-dash-circle control-btn"></i>
                <p class="total-price-text">المجموع: </p>
                <p class="total-price">19.99$</p>
              </div>
            </div>
            <div class="cta-box d-flex gap-0 align-items-center justify-content-between mt-3">
              <div class="like-btn"><i class=" bi-heart icons heart-icon"></i></div>
              <button class="btn btn-dark w-75 rent-btn">استأجر الآن</button>
              <button class=" btn btn-outline-dark w-auto cart-btn">الى العربة</button>

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
                ا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
                ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.
                هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.

                هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
                ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.
                هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.</p>
              <br>
              <p class="item-text" id="owner-details">
                ا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
                ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.
                هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.

                هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
                ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.
                هذا النص يمكن أن يتم تركيبه على أي تصميم دون مشكلة فلن يبدو وكأنه نص منسوخ، غير منظم، غير منسق، أو حتى غير مفهوم. لأنه مازال نصاً بديلاً ومؤقتاً.</p>
            </div>
          </div>


          <div class=" col-6 reviews-box">
            <h4 class=" mb-3">التقييمات</h4>
            <div class="reviews">

              <?php for ($i = 0; $i < 10; $i++) { ?>
                <div class=" card">
                  <div class=" card-body">

                    <p class="commenter-name">م***د</p>


                    <?php (new Rating(4))->render(); ?>
                    <p>يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا </p>
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

</body>

</html>