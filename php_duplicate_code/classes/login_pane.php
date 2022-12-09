<?php
include_once("render_interface.php");

class LoginPane implements ElementsMethods
{
  public function render()
  {
    ?>
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
              class="btn-close sign-in-btn ms-0"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link active"
                  id="home-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#home-tab-pane"
                  type="button"
                  role="tab"
                  aria-controls="home-tab-pane"
                  aria-selected="true"
                >
                  تسجيل الدخول
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="profile-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#profile-tab-pane"
                  type="button"
                  role="tab"
                  aria-controls="profile-tab-pane"
                  aria-selected="false"
                >
                  إنشاء حساب
                </button>
              </li>
            </ul>
          </div>
          <div class="modal-body">
            <div class="tab-content" id="myTabContent">
              <div
                class="tab-pane fade show active"
                id="home-tab-pane"
                role="tabpanel"
                aria-labelledby="home-tab"
                tabindex="0"
              >
                <h1 class="color-333 text-center bold pb-3 bold">
                  تسجيل الدخول إلى آجار
                </h1>
                <div class="form-floating mb-3">
                  <input
                    type="email"
                    class="form-control"
                    id="floatingInput"
                    placeholder="name@example.com"
                  />
                  <label for="floatingInput" class="color-333"
                    >البريد الإلكتروني</label
                  >
                </div>
                <div class="form-floating">
                  <input
                    type="password"
                    class="form-control password-field"
                    id="floatingPassword"
                    placeholder="Password"
                  />
                  <label for="floatingPassword" class="color-333"
                    >كلمة المرور</label
                  >
                </div>
                <button type="button" class="btn sign-in-btnn">
                  تسجيل الدخول
                </button>
                <p class="text-center pt-3">
                  <a class="forgot-password" href="#">نسيت كلمة السر؟</a>
                </p>
                <p class="text-black-50 text-center">
                  ليس لديك حساب؟
                  <a href="#" class="sign-up-btnn">تسجيل</a>
                </p>
              </div>
              <div
                class="tab-pane fade"
                id="profile-tab-pane"
                role="tabpanel"
                aria-labelledby="profile-tab"
                tabindex="0"
              >
                <h1 class="text-center bold pb-3">إنشاء حساب في آجار</h1>
                <div class="d-flex name-container">
                  <div class="form-floating mb-3 flex-fill">
                    <input
                      type="text"
                      class="form-control"
                      id="floatingInput"
                      placeholder="name@example.com"
                    />
                    <label for="floatingInput" class="color-333"
                      >الاسم الأول</label
                    >
                  </div>
                  <div class="form-floating mb-3 flex-fill">
                    <input
                      type="email"
                      class="form-control"
                      id="floatingInput"
                      placeholder="name@example.com"
                    />
                    <label for="floatingInput" class="color-333"
                      >اسم العائلة</label
                    >
                  </div>
                </div>
                <div class="form-floating mb-3">
                  <input
                    type="email"
                    class="form-control"
                    id="floatingInput"
                    placeholder="name@example.com"
                  />
                  <label for="floatingInput" class="color-333"
                    >البريد الإلكتروني</label
                  >
                </div>
                <div class="form-floating mb-3">
                  <input
                    type="email"
                    class="form-control"
                    id="floatingInput"
                    placeholder="name@example.com"
                  />
                  <label for="floatingInput" class="color-333"
                    >رقم الهاتف المحمول</label
                  >
                </div>

                <div class="form-floating">
                  <input
                    type="password"
                    class="form-control password-field"
                    id="floatingPassword"
                    placeholder="Password"
                  />
                  <label for="floatingPassword" class="color-333"
                    >كلمة السر الجديدة</label
                  >
                </div>
                <button type="button" class="btn sign-in-btnn">
                  إنشاء حساب
                </button>

                <p class="text-black-50 pt-4 text-center have-acount">
                  هل لديك حساب بالفعل؟
                  <a href="#" class="sign-up-btnn">تسجيل الدخول</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
  }
}

?>