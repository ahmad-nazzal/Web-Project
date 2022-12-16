<?php 
session_start();
require 'database.php';
require '../php_duplicate_code/classes/toast.php';

if(isset($_POST['upFirstName']) && isset($_POST['upLastName']) && isset($_POST['upEmail']) && isset($_POST['upPhone'])){
  $updateQuery= "update users set first_name='".$_POST['upFirstName']."' , last_name='"
  .$_POST['upLastName']."' , Email='".$_POST['upEmail']."' , phone='".$_POST['upPhone']."' where Email='".$_SESSION['useremail']."'";
  $con->query($updateQuery);
  $_SESSION['useremail']=$_POST['upEmail'];
  $_SESSION['username']=$_POST['upFirstName']." ".$_POST['upLastName'];
  $_SESSION['userPhone']=$_POST['upPhone'];
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
    <script src="../js/profie.js"></script>
    <script src="../js/header-sectionHero.js"></script>
    <link href="../css/cards.css" rel="stylesheet" />
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <link href="../css/Header-sectionHero.css" rel="stylesheet" />
    <link href="../css/profile.css" rel="stylesheet"/>
    <link href="../css/general.css" rel="stylesheet" />
    <script src="../js/general.js"></script>
    <title>الصفحة الشخصية</title>
  </head>
  <body>

      <main>
        <a href="index.php">
          <i class="bi bi-arrow-left-circle-fill back-arrow"></i>
        </a>
      <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0  userMenu" >
                <div class="d-flex flex-column align-items-sm-start px-3 pt-2  min-vh-100">
                  <div class="user-information">
                    <img src="../client_images/97.jpg" class="rounded-image" style="font-size: 8rem">
                    <h3 class=" nameUser"><?php echo $_SESSION['username']; ?></h3>
                  </div>
                    <ul class="nav nav-tabs " id="myTab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button class="nav-link nav-link-impl active " id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><i class="fs-5 bi-info-circle gap-2">حسابي</i></button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link nav-link-impl " id="bank" data-bs-toggle="tab" data-bs-target="#bank-account" type="button" role="tab" aria-controls="bank-account" aria-selected="false"><i class="fs-6 bi-bank gap-2">حسابي البنكي</i></button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link nav-link-impl " id="my-order" data-bs-toggle="tab" data-bs-target="#order" type="button" role="tab" aria-controls="order" aria-selected="false"><i class="fs-6 bi-shield-lock gap-2">تغيير كلمة السر</i></button>
                      </li>
                      <!-- <li class="nav-item" role="presentation"> 
                        <button class="nav-link" id="my-items-tab" data-bs-toggle="tab" data-bs-target="#my-items" type="button" role="tab" aria-controls="my-items" aria-selected="false">أغراضي</button>
                      </li> -->
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
                        <p class="bold pb-3 fs-3"><i class="bi bi-pencil-square gap-2"> معلوماتي</i></p>
                        <form
                          onsubmit="return validateUp()"
                          action="profile.php"
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
                                value="<?php echo $fullname[1] ?>"
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
                              value="<?php echo $_SESSION['useremail'] ?>"
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
                              value="<?php echo $_SESSION['userPhone']?>"
                              minlength="10"
                              name="upPhone"
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
                            value="تعديل"
                          />

                        </form>
                        

                      </div>
                      </div>

                      <div class="tab-pane " id="bank-account" role="tabpanel" aria-labelledby="bank">
                      <div id="sign-up-form">
                       
                      <p class="bold pb-3 fs-3"><i class="bi bi-pencil-square gap-2"> معلوماتي البنكية</i></p>
                        <?php  
                        $bankQuery="select bank_account_number,bank_name from users where email='".$_SESSION['useremail']."'";
                        $bankResult=$con->query($bankQuery);
                        $bankData=mysqli_fetch_assoc($bankResult);

                        ?>
                       
                       <div class="form-floating pb-3">
                         <input
                           type="text"
                           class="form-control  form-group "
                           id="bankName"
                           name="bankName"
                           value="<?php echo $bankData['bank_name'] ?>"
                           placeholder="bankName"
                           required
                         />
                         <label for="bankName" class="color-333"
                           >اسم البنك</label
                         >

                       </div>
                       <div class="form-floating pb-3">
                       <input
                         type="text"
                         class="form-control  form-group"
                         id="bankNumber"
                         name="bankNumber"
                         value="<?php echo $bankData['bank_account_number'] ?>"
                         placeholder="bankNumber"
                         required
                       />
                       <label for="bankNumber" class="color-333"
                         >رقم الحساب البنكي</label
                       >
                     
                     </div>
                     
                     
                     <button
                     onclick="changeBank('<?php echo $_SESSION['useremail'] ?>' )"
                           id="submit_changeBank"
                           class="btn sign-in-btnn"
                         >تعديل
                     </button>

                     <?php new Toast('submit_changeBank','toast1','تم التعديل') ?>
                     </div>
                      </div>


                      
                      <div class="tab-pane" id="order" role="tabpanel" aria-labelledby="my-order">
                      <div id="sign-up-form">
                       
                        <p class="bold pb-3 fs-3">تغيير كلمة السر</p>

                        
                        <div class="form-floating pb-3">
                          <input
                            type="password"
                            class="form-control password-field form-group "
                            id="floatingPassword"
                            name="password"
                            placeholder="Password"
                            required
                          />
                          <label for="floatingPassword" class="color-333"
                            >كلمة االسر القديمة</label
                          >
                          <div class="invalid-feedback" id="incorrect-passwordw">
                            كلمة السر التي أدخلتها غير صحيحة.
                          </div>
                        </div>
                        <div class="form-floating pb-3">
                        <input
                          type="password"
                          class="form-control password-field form-group"
                          id="floatingPassword11"
                          name="password"
                          placeholder="Password"
                          required
                        />
                        <label for="floatingPassword11" class="color-333"
                          >كلمة السر الجديدة</label
                        >
                      
                      </div>
                      <div class="form-floating">
                        <input
                          type="password"
                          class="form-control password-field form-group"
                          id="floatingPassword22"
                          name="password"
                          placeholder="Password"
                          required
                        />
                        <label for="floatingPassword22" class="color-333"
                          >تأكيد كلمة السر الجديدة</label
                        >
                      </div>
                      
                      <button
                      onclick="changePass('<?php echo $_SESSION['useremail'] ?>' )"
                            id="submit_changePass"
                            class="btn sign-in-btnn"
                          >تغيير
                      </button>
                      <?php new Toast('submit_changePass','toast2','تم التغيير') ?>

                      <div class="valid-feedback" id="correct-passwordw">
                          تم تغيير كلمة السر
                        </div>
                        

                      </div>
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
