<?php 
session_start();
require 'database.php';
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
    <script src="../js/header-sectionHero.js"></script>
    <link href="../css/cards.css" rel="stylesheet" />
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link href="../css/Header-sectionHero.css" rel="stylesheet" />
    <link href="../css/profile.css" rel="stylesheet"/>
    <link href="../css/general.css" rel="stylesheet" />
    <script src="../js/general.js"></script>
    <title>الصفحة الشخصية</title>
  </head>
  <body>

      <main>

      <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0  userMenu" >
                <div class="d-flex flex-column align-items-sm-start px-3 pt-2  min-vh-100">
                  <div class="user-information">
                    <i class="bi bi-person-circle" style="font-size: 8rem" ></i>
                    <h3 class=" nameUser"><?php echo $_SESSION['username']; ?></h3>
                    <h5 class=" nameUser"><?php echo $_SESSION['userPhone']; ?></h5>
                  </div>
                    <ul class="nav nav-tabs " id="myTab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><i class="fs-5 bi-house gap-2">حسابي</i></button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="my-order" data-bs-toggle="tab" data-bs-target="#order" type="button" role="tab" aria-controls="order" aria-selected="false">تغيير كلمة السر</button>
                      </li>
                      <!-- <li class="nav-item" role="presentation"> 
                        <button class="nav-link" id="my-items-tab" data-bs-toggle="tab" data-bs-target="#my-items" type="button" role="tab" aria-controls="my-items" aria-selected="false">أغراضي</button>
                      </li> -->
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" href="index.php" >الخروج</a>
                      </li>
                    </ul>
                </div>
            </div>
            <div class="col py-3 tab-user">
                 <!-- Tab panes -->
                  <div class="tab-content">
                  <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                      <div id="sign-up-form">
                        <?php 
                        $fullname=explode(" ",$_SESSION['username']);
                        
                        ?>
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
                                value="<?php echo $fullname[0] ?>"
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
                                value="<?php echo $fullname[0] ?>"
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
                      </div>
                      <div class="tab-pane" id="order" role="tabpanel" aria-labelledby="my-order">
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
                      </div>
  
  
  
  
  
                      



                      <!-- <div class="tab-pane" id="my-items" role="tabpanel" aria-labelledby="my-items-tab"> -->
                        <!-- <div class="grid-container">
                        <?php
                          // $emaill=$_SESSION['useremail'];
                          // $queryCard="SELECT Title, price_per_day,avgRate,image_url from
                          //  ( (items INNER JOIN (SELECT AVG(rating) as avgRate,item_id from reviews GROUP BY item_id) rate ON id=item_id )
                          //   INNER JOIN images ON images.item_id=items.ID),users where 
                          //   items.user_email=users.Email and items.user_email='$emaill'";
                          // $resultt=$con->query($queryCard);
                          // while($cardData=mysqli_fetch_assoc($resultt)){
                        ?>
                          <div class="card">
                            <span class="ratig-card">
                              <i class="bi bi-star-fill star-icon">
                                <span style="font-size:0.8rem;"><?php //echo number_format($cardData['avgRate'], 1, '.', '');?></span>
                              </i>
                            </span>
                            <img src="<?php //echo $cardData['image_url'];?>"  onclick="location.href='#'" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title text-center"><?php //echo $cardData['Title'];?></h5>
                              <div class="card-content">
                                <div class="price">
                                  <p class="card-text">$<?php // echo $cardData['price_per_day'];?></p>
                                  <p class="card-text every-day">لكل يوم</p>
                                </div>
                                <i class="bi bi-heart" id="icon-to-toggle" onclick="toggleIcon(this)"></i>
                              </div>
                            </div>
                         </div>
                            <?php //}?>
                          <div class="card"  >
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
                        <div class="card"  >
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
                        <div class="card"  >
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
                        <div class="card"  >
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
                        <div class="card"  >
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
                        <div class="card"  >
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
                        <div class="card"  >
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
                        <div class="card"  >
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
                        <div class="card"  >
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
                        <div class="card"  >
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
                        </div> -->
                      <!-- </div> -->
                  </div>
            </div>
        </div>
    </div>
    </main>
  </body>
</html>
