<?php 
require "../php_duplicate_code/classes/nav_barAll.php";
require '../html/database.php';
require '../php_duplicate_code/classes/rating.php';
$isuser='';
$user_email='';
$userName='';
if(isset($_GET['isUser']) && isset($_GET['userEmail']) && isset($_GET['userName'])){
  $userName=$_GET['userName'];
  $user_email=$_GET['userEmail'];
  $isuser=$_GET['isUser'];
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>المقتنيات المستأجرة</title>

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
    <link href="../css/search-results.css" rel="stylesheet"/>
    <link href="../css/rented-items.css" rel="stylesheet"/>

    <script src="../js/general.js"></script>
    <script src="../js/item_rented.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script> <!-- for dropmenu it must included -->
    <script src="../js/cards.js"></script>
    <link href="../css/cards.css" rel="stylesheet"/>
    <link href="../css/Header-sectionHero.css" rel="stylesheet" />
    <link href="../css/general.css" rel="stylesheet" />
    <script defer src="../js/header-sectionHero.js"></script>
</head>
<body >
<?php     new NavBarAll($isuser,$con,$user_email,$userName);
?>
  <main class="container content">
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-oldItem-tab" data-bs-toggle="tab" data-bs-target="#nav-oldItem" type="button" role="tab" aria-controls="nav-oldItem" aria-selected="true">المقتنيات المستأجرة حاليا</button>
        <button class="nav-link" id="nav-newItem-tab" data-bs-toggle="tab" data-bs-target="#nav-newItem" type="button" role="tab" aria-controls="nav-newItem" aria-selected="false">المقتنيات المستأجرة سابقا</button>
        <button class="nav-link" id="nav-ownItem-tab" data-bs-toggle="tab" data-bs-target="#nav-ownItem" type="button" role="tab" aria-controls="nav-ownItem" aria-selected="false">مقتنياتي المؤجرة</button>
      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
      
<!-- modal -->
<div
      class="modal fade"
      id="commentModal"
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
            <h1 class="fs-4 text-center">تقييم المنتج</h1>

          </div>
          <div class="modal-body">
              <?php (new Rating(4))->render(); ?>
              <textarea id="w3review" name="w3review" placeholder="اكتب تعليقك هنا ..." rows="4" cols="50"></textarea>
              <input type="submit" value="تم" class="btn btn-primary">







          </div>
        </div>
      </div>
    </div>
<!-- /////////////////////////////////////// -->


      <div class="tab-pane fade show active" id="nav-oldItem" role="tabpanel" aria-labelledby="nav-oldItem-tab">
      <div class="card mb-2 ">
          <div class="row">
            <div class="col-auto ">
              <img src="https://picsum.photos/200" alt="" class="rounded-start">
            </div>
            <div class="col-9 ">
              <div class="card-body">
                <div class="item-info">
                  <div>
                    <h4 class="card-title">salah item</h4>
                    
                  </div>
                  <p class="price">7 أيام للتسليم </p>
                  <input type="button" class="btn btn-primary btn-done activ" id="doneBtn"  data-bs-toggle="modal" data-bs-target="#commentModal" value="تسليم" onclick="toggleInput()">

                </div>
                
              </div>
              
            </div>
          </div>
        </div>


      </div>


      <div class="tab-pane fade show active" id="nav-ownItem" role="tabpanel" aria-labelledby="nav-ownItem-tab">
      <div class="card mb-2 ">
          <div class="row">
            
            <div class="col-auto  " >
              <img src="https://picsum.photos/200" alt="" class="rounded-start">
            </div>
            <div class="col-9 ">
              <div class="card-body">
                <div class="item-info">
                  <div>
                    <h4 class="card-title">salah item</h4>
                  </div>
                  <p class="price">تاريخ الاستلام: 19/12/2022  </p>
                  <input type="button" class="btn btn-primary btn-done" value="تم الاستلام">
                </div>

              </div>

            </div>
            

          </div>
        </div>


      </div>


      <div class="tab-pane fade" id="nav-newItem" role="tabpanel" aria-labelledby="nav-newItem-tab">
      <div class="card mb-2 ">
          <div class="row">
            <div class="col-auto">
              <img src="https://picsum.photos/200" alt="" class="rounded-start">
            </div>
            <div class="col-9 ">
              <div class="card-body">
                <div class="item-info">
                  <div>
                    <h4 class="card-title">salah item</h4>
                  </div>
                  <p class="price">15/12/2022 - 29/12/2022</p>
                </div>
                
                <p class="card-text"><small></small></p>
                <p class="card-text"><small></small></p>
              </div>
              
            </div>
          </div>
        </div>


      </div>


    </div>
  </main>
</body>
</html>