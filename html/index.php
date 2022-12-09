<?php

session_start();
use LDAP\Result;
require 'database.php';
require 'functions.php';
$isuser=false;
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
    $_SESSION['username']=$username;
    $_SESSION['userPhone']=$upPhone;
  }
}

if ( isset($_POST['email']) && isset($_POST['email']) ) {
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

    <script src="../js/cards.js"></script>
    <link href="../css/cards.css" rel="stylesheet"/>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link href="../css/Header-sectionHero.css" rel="stylesheet" />
    <link href="../css/general.css" rel="stylesheet" />
    <script defer src="../js/header-sectionHero.js"></script>
    <script src="../js/general.js"></script>
    <title>آجار</title>
  </head>

  <body>
    <!-- Modal -->
    <div
      class="modal fade"
      id="sign-in-modal"
      tabindex="-1"
      aria-labelledby="head-label"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header remove-separator-modal">
            <button
              type="button"
              class="btn-close sign-in-btn"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <div class="tab-content" id="myTabContent">
              <div id="sign-in-form">
                <h1 class="color-333 text-center bold pb-3 bold">
                  تسجيل الدخول إلى آجار
                </h1>
                <form
                  method="post"
                  onsubmit="return validate()"
                  action="index.php"
                  id="form-sign"
                  novalidate
                >
                  <div class="form-floating mb-3 form-group">
                    <input
                      type="email"
                      class="form-control"
                      id="floatingInput"
                      name="email"
                      placeholder="name@example.com"
                      required
                    />
                    <label for="floatingInput" class="color-333"
                      >البريد الإلكتروني</label
                    >
                    <div class="invalid-feedback">
                      البريد الإلكتروني الذي أدخلته غير مرتبط بحساب.
                    </div>
                  </div>
                  <div class="form-floating">
                    <input
                      type="password"
                      class="form-control password-field form-group"
                      id="floatingPassword"
                      name="password"
                      placeholder="Password"
                      required
                    />
                    <label for="floatingPassword" class="color-333"
                      >كلمة المرور</label
                    >
                    <div class="invalid-feedback">
                      كلمة السر التي أدخلتها غير صحيحة.
                    </div>
                  </div>
                  <input
                    type="submit"
                    class="btn sign-in-btnn"
                    value="تسجيل الدخول"
                  />
                </form>
                <p class="text-center pt-3">
                  <a
                    class="forgot-password"
                    href="#"
                    onclick=" return toSignForgot()"
                    >نسيت كلمة السر؟</a
                  >
                </p>
                <p class="text-black-50 text-center">
                  ليس لديك حساب؟
                  <a
                    href="#"
                    class="sign-up-btnn"
                    id="tasjel"
                    onclick=" return toSignUp()"
                    >تسجيل</a
                  >
                </p>
              </div>

              <div id="sign-up-form">
                <h1 class="text-center bold pb-3">إنشاء حساب في آجار</h1>
                <form
                  onsubmit="return validateUp()"
                  action="index.php"
                  id="form-signUp"
                  method="POST"
                  novalidate
                >
                  <div class="d-flex name-container">
                    <div class="form-floating mb-3 flex-fill">
                      <input
                        type="text"
                        class="form-control"
                        id="floatingInput1"
                        placeholder="name@example.com"
                        name="upFirstName"
                        required
                      />
                      <label for="floatingInput1" class="color-333"
                        >الاسم الأول</label
                      >
                    </div>
                    <div class="form-floating mb-3 flex-fill">
                      <input
                        type="text"
                        class="form-control"
                        id="floatingInput2"
                        name="upLastName"
                        placeholder="name@example.com"
                        required
                      />
                      <label for="floatingInput2" class="color-333"
                        >اسم العائلة</label
                      >
                    </div>
                  </div>
                  <div class="form-floating mb-3">
                    <input
                      type="email"
                      class="form-control"
                      id="floatingInput3"
                      name="upEmail"
                      placeholder="name@example.com"
                      required
                    />
                    <label for="floatingInput3" class="color-333"
                      >البريد الإلكتروني</label
                    >

                  </div>
                  <div class="form-floating mb-3">
                    <input
                      type="tel"
                      class="form-control"
                      id="floatingInput4"
                      maxlength="10"
                      minlength="10"
                      name="upPhone"
                      placeholder="name@example.com"
                      required
                    />
                    <label for="floatingInput4" class="color-333"
                      >رقم الهاتف المحمول</label
                    >
                    <div class="invalid-feedback">
                      الرجاء ادخال رقم مكون من 10 خانات
                    </div>
                  </div>

                  <div class="form-floating">
                    <input
                      type="password"
                      class="form-control password-field"
                      id="floatingPassword1"
                      name="upPassword"
                      placeholder="Password"
                      pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                      required
                    />
                    <label for="floatingPassword1" class="color-333"
                      >كلمة السر الجديدة</label>
                      <div class="invalid-feedback">
                      الرجاء ادخال رقم يحتوي على 8 أحرف أو أكثر بحيث تتكون من رقم واحد على الأقل ، وحرف واحد كبير و صغير
                    </div>
                  </div>
                  <input
                    type="submit"
                    class="btn sign-in-btnn"
                    value="إنشاء حساب"
                  />
                </form>

                <p class="text-black-50 pt-4 text-center have-acount">
                  هل لديك حساب بالفعل؟
                  <a href="#" class="sign-up-btnn" onclick=" return toSignIn()"
                    >تسجيل الدخول</a
                  >
                </p>
              </div>
              <div id="forgot-formm">
                <h1 class="color-333 text-center bold pb-3 bold">
                  تغيير كلمة المرور
                </h1>
                <form
                  onsubmit="return validateForgot()"
                  action="index.php"
                  id="form-forgot"
                  novalidate
                >
                  <div class="form-floating mb-3 form-group">
                    <input
                      type="email"
                      class="form-control"
                      id="floatingInput11"
                      placeholder="name@example.com"
                      required
                    />
                    <label for="floatingInput11" class="color-333"
                      >البريد الإلكتروني</label
                    >
                    <div class="invalid-feedback">
                      البريد الإلكتروني الذي أدخلته غير مرتبط بحساب.
                    </div>
                  </div>

                  <input type="submit" class="btn sign-in-btnn" value="إرسال" />
                </form>
                <p class="text-center pt-3">
                  <a
                    class="forgot-password"
                    href="#"
                    onclick="return toSignIn()"
                    >تسجيل الدخول</a
                  >
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- main page -->
    <div class="base-container bg">
      <header>
        <nav id="navbar_top"class="navbar navbar-dark navbar-expand-sm">
          <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
              <h3>آجار</h3>
            </a>
            <form action="search-results.php" method="get" class="form-search">
              <input
                class="form-control search-bar"
                type="text"
                placeholder="بحث..."
                name="search-field"
              />
              <!-- <input type="submit" class="search-btn btn" title="بحث" /> -->
            </form>
            <ul class="navbar-nav ">
              <li class="nav-item">
                <a class="nav-link" href="#">الصفحة الرئيسية</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">الصفحة الرئيسية </a>
              </li>
              <li class="nav-item">
                <?php
                  if (!$isuser){
                ?>
                <i
                  class="bi-person-fill icons"
                  data-bs-toggle="modal"
                  data-bs-target="#sign-in-modal"
                  >
                  <span class="fs-6">
                      تسجيل الدخول
                    </span>
                </i>
                <?php 
                  }
                  else{
                  ?>
                  <a href="profile.php" id="avatar" >
                    <i class="bi bi-person-circle icons">
                      <span class="fs-6">
                        <?php
                        echo $userName;
                        ?>
                      </span></i>
                    <?php
                    }
                    ?>
                  </a>
                  
              </li>
              <?php
              if($isuser){
              ?>
              <form action="index.php" id="outForm">
                <li class="nav-item" onclick="out_form()">
                  <i class="bi bi-box-arrow-left icons" ></i>
                </li>
              </form>
              <?php
              }
              ?>
            </ul>
          </div>
        </nav>
      </header>
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
                  src="../assets/imgs/web images/table 1457 360.png "
                  alt="Los Angeles"
                  class="d-block img"
                  style="width: 100%"
                />
                <div class="carousel-caption">
                  <h3>Los Angeles</h3>
                  <h1>اجعل منتجاتك قابلة للإستئجار في دقائق</h1>
                </div>
              </div>
              <div class="carousel-item" id="second-page">
                <img
                  id="img2"
                  src="../assets/imgs/web images/shoes fv.png"
                  alt="Chicago"
                  class="d-block img"
                  style="width: 100%"
                />
                <div class="carousel-caption">
                  <h3>Chicago</h3>
                  <h1>آجار هو منصة لبيع وتأجير أي شيء في أي مكان</h1>
                </div>
              </div>
              <div class="carousel-item" id="third-page">
                <img
                  id="img3"
                  src="../assets/imgs/web images/table 1457 360.png"
                  alt="New York"
                  class="d-block img"
                  style="width: 100%"
                />
                <div class="carousel-caption">
                  <h3>New York</h3>
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
                  while($tagsData= mysqli_fetch_assoc($result)){
                    
                
                ?>
          <div class="slide-container swiper">
              <div class="slide-content">
                
                <h1 class="cat-name pb-2"><?php echo $tagsData['category'] ?></h1>
                  <div class="card-wrapper swiper-wrapper">
                    <?php
                      $cate=$tagsData['category'];
                      $queryCard="SELECT Title, price_per_day,avgRate,image_url from ( (items INNER JOIN (SELECT AVG(rating) as
                       avgRate,item_id from reviews GROUP BY item_id) rate ON id=item_id ) INNER JOIN images 
                       ON images.item_id=items.ID),items_tags where items.ID= items_tags.item_id and items_tags.tag_category='$cate'";
                      $resultt=$con->query($queryCard);
                      while($cardData=mysqli_fetch_assoc($resultt)){
                    ?>
                      <div class="card swiper-slide"  style="width: 18rem;">
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
                            <i class="bi bi-heart" id="icon-to-toggle" onclick="toggleIcon(this)"></i>
                          </div>
                        </div>
                      </div>

                      <?php
                      }
                      ?>



                      <div class="card swiper-slide"  style="width: 18rem;">
                      <span class="ratig-card">
                        <i class="bi bi-star-fill star-icon">
                          <span style="font-size:0.8rem;">4.7</span>
                        </i>
                      </span>
                        <img src="../assets/imgs/web images/shoes240.webp"  onclick="location.href='#'" class="card-img-top" alt="...">
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
                        <img src="../assets/imgs/web images/shoes240.webp"  onclick="location.href='#'" class="card-img-top" alt="...">
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
                        <img src="../assets/imgs/web images/shoes240.webp"  onclick="location.href='#'" class="card-img-top" alt="...">
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
                        <img src="../assets/imgs/web images/shoes240.webp"  onclick="location.href='#'" class="card-img-top" alt="...">
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
                        <img src="../assets/imgs/web images/shoes240.webp"  onclick="location.href='#'" class="card-img-top" alt="...">
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
              <div class="swiper-button-next swiper-navBtn"></div>
              <div class="swiper-button-prev swiper-navBtn"></div>
              <div class="swiper-pagination"></div>
          </div>
        
          <?php
                    }
                    ?>

        </section>
      </main>
      <footer></footer>
    </div>
          <script src="../node_modules/swiper/swiper-bundle.min.js"></script>

          <script>
          var swiper = new Swiper(".slide-content", {
        slidesPerView: 4,
        spaceBetween: 25,
        loop: true,
        centerSlide: "true",
        fade: "true",
        grabCursor: "true",
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
          dynamicBullets: true,
        },
        navigation: {
          nextEl: ".swiper-button-prev",
          prevEl: ".swiper-button-next",
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
      <?php $con->close(); ?>
      </script>
  </body>
</html>
