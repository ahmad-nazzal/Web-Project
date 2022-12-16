<?php
session_start();
if(isset($_GET['destroy_session'])){
  session_destroy();
  header('location: index.php');
}
use LDAP\Result;
require 'database.php';
require 'functions.php';
require '../php_duplicate_code/classes/nav_barAll.php';
require '../php_duplicate_code/classes/footer.php';
$isuser=false;
$user_email='';
$userName='';
if(isset($_POST['upFirstName']) && isset($_POST['upLastName']) && isset($_POST['upEmail']) && isset($_POST['upPassword']) && isset($_POST['upPhone']))
{
  $upFirstName=$_POST['upFirstName'];
  $upLastName=$_POST['upLastName'];
  $user_email=$_POST['upEmail'];
  $user_pass=$_POST['upPassword'];
  $uesrPassencrypted=sha1($user_pass);
  $upPhone=$_POST['upPhone'];
  $query ="insert into users(email,first_name,last_name,pass,phone) values('$user_email','$upFirstName','$upLastName','$uesrPassencrypted','$upPhone') ";
  $userName=$_POST['upFirstName'].' '.$_POST['upLastName'];
  if($con->query($query)){
    $isuser=true;
    $_SESSION['useremail']=$user_email;
    $_SESSION['username']=$userName;
    $_SESSION['userPhone']=$upPhone;
  }
}

if ( isset($_POST['email']) && isset($_POST['password']) ) {
  $user_email=$_POST['email'];
  $user_pass=$_POST['password'];
  $query= "select * from users where email = '".$user_email."'";
  $result= $con->query($query);

  if($result && mysqli_num_rows($result)>0 )
  {
    $user_data=mysqli_fetch_assoc($result);
    $userName=$user_data['first_name'].' '.$user_data['last_name'];
    if($user_data['pass']===sha1($user_pass)){
      $isuser=true;
      $_SESSION['useremail']=$user_email;
      $_SESSION['username']=$userName;
      $_SESSION['userPhone']=$user_data['phone'];


    }

  }
  

  
}
elseif(isset($_SESSION['useremail']) && isset($_SESSION['username'])){
  $isuser=true;
  $userName=$_SESSION['username'];
  $user_email=$_SESSION['useremail'];

}

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- direct connect with bootstrap  -->
    <!--<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>-->

    <link
      rel="stylesheet"
      href="../node_modules/bootstrap/dist/css/bootstrap.rtl.min.css"
    />
    <link
      rel="stylesheet"
      href="../node_modules/bootstrap-icons/font/bootstrap-icons.css"
    />
    <link
      rel="stylesheet"
      href="../node_modules/swiper/swiper-bundle.min.css"
    />

    <script src="../js/general.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script> <!-- for dropmenu it must included -->
    <script src="../js/cards.js"></script>
    <link href="../css/cards.css" rel="stylesheet"/>
    <link href="../css/Header-sectionHero.css" rel="stylesheet" />
    <link href="../css/general.css" rel="stylesheet" />
    <script defer src="../js/header-sectionHero.js"></script>
    <title>آجار</title>
  </head>

  <body>
    <?php 
    new NavBarAll($isuser,$con,$user_email,$userName);
    ?>
      <!-- main page -->
    <div class="base-container bg">
      
      <main class="main-container">
        <section class="section-hero">
          <div
            id="demo"
            class="carousel slide carousel-fade"
            data-bs-ride="carousel"
            data-bs-interval="9000"
          >
            <div class="carousel-indicators">
              <button
                type="button"
                data-bs-target="#demo"
                data-bs-slide-to="0"
                class="active bg-black"
              ></button>
              <button
                type="button"
                data-bs-target="#demo"
                data-bs-slide-to="1"
                class="bg-black"
              ></button>
              <button
                type="button"
                data-bs-target="#demo"
                data-bs-slide-to="2"
                class="bg-black"
              ></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active" id="first-page">
                <img
                  id="img1"
                  src="../assets/imgs/web images/static web images/bicycle.jpg "
                  alt="Los Angeles"
                  class="d-block img"
                  style="width: 100%"
                />
                <div class="carousel-caption mt-5 textShadow ms-5">
                  <h1>اجعل منتجاتك قابلة للإستئجار في دقائق</h1>
                </div>
              </div>
              <div class="carousel-item" id="second-page">
                <img
                  id="img2"
                  src="../assets/imgs/web images/static web images/dreses.webp"
                  alt="Chicago"
                  class="d-block img"
                  style="width: 100%"
                />
                <div class="carousel-caption mt-5 textShadow ms-5">
                  <h1>آجار هو منصة لبيع وتأجير أي شيء في أي مكان</h1>
                </div>
              </div>
              <div class="carousel-item" id="third-page">
                <img
                  id="img3"
                  src="../assets/imgs/web images/static web images/camera.jpg"
                  alt="New York"
                  class="d-block img"
                  style="width: 100%"
                />
                <div class="carousel-caption mt-5 textShadow ms-5">
                  <h1>يمكنك عرض منتجاتك عبر الانترنت والاستفادة من مقتنياتك</h1>
                </div>
              </div>
            </div>
            <button
              class="carousel-control-prev"
              type="button"
              data-bs-target="#demo"
              data-bs-slide="prev"
            >
              <span class="carousel-control-prev-icon"></span>
            </button>
            <button
              class="carousel-control-next"
              type="button"
              data-bs-target="#demo"
              data-bs-slide="next"
            >
              <span class="carousel-control-next-icon"></span>
            </button>
          </div>
        </section>
        <section class="cards">
        <?php
                  $sql='select * from tags';
                  $result = $con->query($sql);
                  $numSliders=0;
                  while($tagsData= mysqli_fetch_assoc($result)){
                    $numSliders=$numSliders+1;
                
                ?>
          <div class="slide-container swiper">
              <div class="slide-content<?php echo $numSliders ?>" id="slides-group">
              
                <h1 class="cat-name pb-2"><?php echo $tagsData['category'] ?></h1>
                  <div class="card-wrapper swiper-wrapper">
                    <?php
                      $cate=$tagsData['category'];
                      $queryCard="SELECT Distinct Title, price_per_day,avgRate,image_url,items_tags.item_id from ( (items INNER JOIN (SELECT AVG(rating) as
                       avgRate,item_id from reviews GROUP BY item_id) rate ON id=item_id ) INNER JOIN images 
                       ON images.item_id=items.ID),items_tags where items.ID= items_tags.item_id and items_tags.tag_category='$cate'";
                      $resultt=$con->query($queryCard);
                      while($cardData=mysqli_fetch_assoc($resultt)){
                    ?>
                      <div class="card swiper-slide">
                      <span class="ratig-card">
                        <i class="bi bi-star-fill star-icon">
                          <span style="font-size:0.8rem;"><?php echo number_format($cardData['avgRate'], 1, '.', '');?></span>
                        </i>
                      </span>
                        <img src="<?php echo $cardData['image_url'];?>"  onclick="location.href='#'" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title text-center"><?php echo $cardData['Title'];?></h5>
                          <div class="card-content">
                            <div class="price">
                              <p class="card-text">$<?php echo $cardData['price_per_day'];?></p>
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



                      <div class="card swiper-slide"  style="width: 18rem;">
                      <span class="ratig-card">
                        <i class="bi bi-star-fill star-icon">
                          <span style="font-size:0.8rem;">4.7</span>
                        </i>
                      </span>
                        <img src="../client_images/dum.webp"  onclick="location.href='#'" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title text-center">Shoes</h5>
                          <div class="card-content">
                            <div class="price">
                              <p class="card-text">$99.9</p>
                              <p class="card-text every-day">لكل يوم</p>
                            </div>
                            <i class="bi bi-heart" id="icon-to-toggle" onclick="toggleIcon(this)"></i>
                          </div>
                        </div>
                      </div>
                      <div class="card swiper-slide"  style="width: 18rem;">
                      <span class="ratig-card">
                        <i class="bi bi-star-fill star-icon">
                          <span style="font-size:0.8rem;">4.7</span>
                        </i>
                      </span>
                        <img src="../client_images/dum.webp"  onclick="location.href='#'" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title text-center">Shoes</h5>
                          <div class="card-content">
                            <div class="price">
                              <p class="card-text">$99.9</p>
                              <p class="card-text every-day">لكل يوم</p>
                            </div>
                            <i class="bi bi-heart" id="icon-to-toggle" onclick="toggleIcon(this)"></i>
                          </div>
                        </div>
                      </div>
                      <div class="card swiper-slide"  style="width: 18rem;">
                      <span class="ratig-card">
                        <i class="bi bi-star-fill star-icon">
                          <span style="font-size:0.8rem;">4.7</span>
                        </i>
                      </span>
                        <img src="../client_images/dum.webp"  onclick="location.href='#'" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title text-center">Shoes</h5>
                          <div class="card-content">
                            <div class="price">
                              <p class="card-text">$99.9</p>
                              <p class="card-text every-day">لكل يوم</p>
                            </div>
                            <i class="bi bi-heart" id="icon-to-toggle" onclick="toggleIcon(this)"></i>
                          </div>
                        </div>
                      </div>
                      <div class="card swiper-slide"  style="width: 18rem;">
                      <span class="ratig-card">
                        <i class="bi bi-star-fill star-icon">
                          <span style="font-size:0.8rem;">4.7</span>
                        </i>
                      </span>
                        <img src="../client_images/dum.webp"  onclick="location.href='#'" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title text-center">Shoes</h5>
                          <div class="card-content">
                            <div class="price">
                              <p class="card-text">$99.9</p>
                              <p class="card-text every-day">لكل يوم</p>
                            </div>
                            <i class="bi bi-heart" id="icon-to-toggle" onclick="toggleIcon(this)"></i>
                          </div>
                        </div>
                      </div>
                      <div class="card swiper-slide"  style="width: 18rem;">
                      <span class="ratig-card">
                        <i class="bi bi-star-fill star-icon">
                          <span style="font-size:0.8rem;">4.7</span>
                        </i>
                      </span>
                        <img src="../client_images/dum.webp"  onclick="location.href='#'" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title text-center">Shoes</h5>
                          <div class="card-content">
                            <div class="price">
                              <p class="card-text">$99.9</p>
                              <p class="card-text every-day">لكل يوم</p>
                            </div>
                            <i class="bi bi-heart" id="icon-to-toggle" onclick="toggleIcon(this)"></i>
                          </div>
                        </div>
                      </div>
                      
                      
                      
                      
                      
                 
                     
                  </div>
                  
              </div>
              <div class="swiper-button-next<?php echo $numSliders ?> swiper-button-next swiper-navBtn"></div>
              <div class="swiper-button-prev<?php echo $numSliders ?> swiper-button-prev swiper-navBtn"></div>
              <div class="swiper-pagination<?php echo $numSliders ?> swiper-pagination"></div>
          </div>
        
          <script>
            var swiper = new Swiper(".slide-content<?php echo $numSliders  ?>", {
              slidesPerView: 4,
              spaceBetween: 25,
              loop: true,
              centerSlide: "true",
              fade: "true",
              grabCursor: "true",
              pagination: {
              el: ".swiper-pagination<?php echo $numSliders ?>",
              clickable: true,
              dynamicBullets: true,
              },
              navigation: {
              nextEl: ".swiper-button-prev<?php echo $numSliders ?>",
              prevEl: ".swiper-button-next<?php echo $numSliders ?>",
              },
              autoplay: {
              delay: 5000,
              disableOnInteraction: false,
              },
              breakpoints: {
              0: {
                slidesPerView: 1,
              },
              520: {
                slidesPerView: 2,
              },
              950: {
                slidesPerView: 4 ,
              },
              },
            });
          </script>
          <?php
                    }
                    ?>

        </section>
      </main>
      <?php new Footer(); ?>
    </div>
          
  </body>
</html>


