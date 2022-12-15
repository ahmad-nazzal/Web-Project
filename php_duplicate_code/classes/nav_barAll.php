<?php
class NavBarAll{

  public function __construct($isuser,$con,$user_email,$userName)
  {
    ?>

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
                <h1 class="color-333 text-center bold pb-3 bold fs-2">
                  تسجيل الدخول إلى آجار
                </h1>
                <form
                  method="post"
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
                    <div class="invalid-feedback" id="incorrect-password">
                      كلمة السر التي أدخلتها غير صحيحة.
                    </div>
                  </div>
                  <input
                    type="submit"
                    id="login-submit"
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
                <h1 class="text-center bold pb-3 fs-2">إنشاء حساب في آجار</h1>
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
                <h1 class="color-333 text-center bold pb-3 bold fs-2">
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


    <header>
        <nav id="navbar_top"class="navbar navbar-expand-sm">
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
                <a class="nav-link" href="#"><i class="bi bi-cart2 icons">
                  <span class="small-grey-text">
                    <?php
                    if($isuser)
                    {
                      $query_action="select likes.numOfLiksRows,carts.numOfCartRows from ((select count(item_id) as numOfLiksRows from action where user_email='$user_email' and type='l') likes
                      , (select count(item_id) as numOfCartRows from action where user_email='$user_email' and type='c') carts);";
                      $result_action=$con->query($query_action);
                      $data_action=mysqli_fetch_assoc($result_action);
                    }
                    if(!$isuser){echo 0;}
                    else echo $data_action['numOfLiksRows'];
                    ?>                    
                  </span>
                </i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"> <i class="bi bi-heart icons" >
                  <span class="small-grey-text">
                    <?php
                    if(!$isuser){echo 0;}
                    else echo $data_action['numOfCartRows'];
                    ?>
                  </span>
                </i></a>
              </li>
              <li class="nav-item ">
                <?php
                  if (!$isuser){
                ?>
                <i
                  class="bi bi-person-fill btn btn-primary signin-nav icons"
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
                <div class="dropdown">
                  <button class="dropdown-toggle btn btn-primary" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle arr-down signin-nav icons">
                      <span class="fs-6">
                        <?php
                        echo $userName;
                        ?>
                      </span>
                    </i>
                  </button>
                  <ul class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="profile.php">حسابي</a></li>
                    <li><a class="dropdown-item" href="<?php echo "item_rented.php?isUser=$isuser &userEmail=$user_email&userName=$userName" ?>">مقتنياتي</a></li>
                    <li>
                      <a class="dropdown-item log-out" href="index.php?destroy_session=1">
                          تسجيل الخروج
                     </a>
                    </li>
                  </ul>
                </div>
                    <?php
                    }
                    ?>
                  
              </li>
            </ul>
          </div>
        </nav>
      </header>













    <?php
  }

}
?>