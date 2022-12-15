<?php
include_once("render_interface.php");
include_once("login_pane.php");
include_once(__DIR__ . "/../../html/database.php");

class Navbar implements ElementsMethods
{

  public $login_pane;
  private $isuser = false, $userName, $user_email;

  public function render()
  {
    global $con;
    $this->login_pane->render();
    $this->check_login_status();
?>
    <header>
      <nav id="navbar_top" class="navbar navbar-expand-sm">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">
            <h3>آجار</h3>
          </a>
          <form action="search-results.php" method="get" class="form-search">
            <input class="form-control search-bar" type="text" placeholder="بحث..." name="search-field" />
            <!-- <input type="submit" class="search-btn btn" title="بحث" /> -->
          </form>
          <ul class="navbar-nav ">
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="bi bi-cart2 icons">
                  <span class="small-grey-text">
                    <?php

                    if ($this->isuser) {
                      $query_action = "select likes.numOfLiksRows,carts.numOfCartRows from ((select count(item_id) as numOfLiksRows from action where user_email='$this->user_email' and type='l') likes
                      , (select count(item_id) as numOfCartRows from action where user_email='$this->user_email' and type='c') carts);";
                      $result_action = $con->query($query_action);
                      $data_action = mysqli_fetch_assoc($result_action);
                    }
                    if (!$this->isuser) {
                      echo 0;
                    } else echo $data_action['numOfLiksRows'];
                    ?>
                  </span>
                </i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"> <i class="bi bi-heart icons">
                  <span class="small-grey-text">
                    <?php
                    if (!$this->isuser) {
                      echo 0;
                    } else echo $data_action['numOfCartRows'];
                    ?>
                  </span>
                </i></a>
            </li>
            <li class="nav-item ">
              <?php
              if (!$this->isuser) {
              ?>
                <i class="bi bi-person-fill btn btn-primary signin-nav icons" data-bs-toggle="modal" data-bs-target="#sign-in-modal">
                  <span class="fs-6">
                    تسجيل الدخول
                  </span>
                </i>
              <?php
              } else {
              ?>
                <div class="dropdown">
                  <button class="dropdown-toggle btn btn-primary" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle arr-down signin-nav icons">
                      <span class="fs-6">
                        <?php
                        echo $this->userName;
                        ?>
                      </span>
                    </i>
                  </button>
                  <ul class="dropdown-menu p-2" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="profile.php">حسابي</a></li>
                    <li><a class="dropdown-item" href="#">مقتنياتي</a></li>
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
  private function check_login_status()
  {
    global $con;
    if (isset($_POST['email']) && isset($_POST['password'])) {
      $this->user_email = $_POST['email'];
      $user_pass = $_POST['password'];
      $query = "select * from users where email = '" . $this->user_email . "'";
      $result = $con->query($query);

      if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        $userName = $user_data['first_name'] . ' ' . $user_data['last_name'];
        if ($user_data['pass'] === sha1($user_pass)) {
          $this->isuser = true;
          $_SESSION['useremail'] = $this->user_email;
          $_SESSION['username'] = $userName;
          $_SESSION['userPhone'] = $user_data['phone'];
        }
      }
    } elseif (isset($_SESSION['useremail']) && isset($_SESSION['username'])) {
      $this->isuser = true;
      $this->userName = $_SESSION['username'];
      $this->user_email = $_SESSION['useremail'];
    }
  }
  public function __construct()
  {
    $this->login_pane = new LoginPane();
  }
}

?>