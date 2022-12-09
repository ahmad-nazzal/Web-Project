<?php
include_once("render_interface.php");
include_once("login_pane.php");

class Navbar implements ElementsMethods{
  
  public $login_pane;
  public function render()
  {
    $this->login_pane->render();
    ?>
<header>
        <nav class="navbar navbar-dark navbar-expand-sm">
          <div class="container-fluid">
            <a class="navbar-brand logo" href="#"><h3>آجار</h3></a>
            <form action="search-results.php" method="get" class="form-search">
              <input
                class="form-control search-bar"
                type="text"
                placeholder="بحث..."
                name="search-field"
              />
              <!-- <input type="submit" class="search-btn btn" title="بحث" /> -->
            </form>
            <ul class="navbar-nav gap-2">
              <li class="nav-item">
                <a class="nav-link" href="#">الصفحة الرئيسية</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">الصفحة الرئيسية </a>
              </li>
              <li class="nav-item">
                <i
                  class="bi-person-fill icons"
                  data-bs-toggle="modal"
                  data-bs-target="#sign-in-modal"
                  ><span class="fs-6">تسجيل الدخول</span>
                </i>
              </li>
            </ul>
          </div>
        </nav>
      </header>
    <?php

  }

  public function __construct()
  {
    $this->login_pane = new LoginPane();
  }
}

?>