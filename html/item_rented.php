<?php
require "../php_duplicate_code/classes/nav_barAll.php";
require '../html/database.php';
require '../php_duplicate_code/classes/rating.php';
require '../php_duplicate_code/classes/footer.php';
session_start();
$isuser = '';
$user_email = '';
$userName = '';
if (isset($_SESSION['isUser']) && isset($_SESSION['useremail']) && isset($_SESSION['username'])) {
  $userName = $_SESSION['username'];
  $user_email = $_SESSION['useremail'];
  $isuser = $_SESSION['isUser'];
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>المقتنيات المستأجرة</title>

  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.rtl.min.css" />
  <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="../node_modules/swiper/swiper-bundle.min.css" />
  <link href="../css/search-results.css" rel="stylesheet" />
  <link href="../css/rented-items.css" rel="stylesheet" />

  <script src="../js/general.js"></script>
  <script src="../js/item_rented.js"></script>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script> <!-- for dropmenu it must included -->
  <script src="../js/cards.js"></script>
  <link href="../css/cards.css" rel="stylesheet" />
  <link href="../css/Header-sectionHero.css" rel="stylesheet" />
  <link href="../css/general.css" rel="stylesheet" />
  <script defer src="../js/header-sectionHero.js"></script>
</head>

<body>
  <?php new NavBarAll($isuser, $con, $user_email, $userName);
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
      <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="head-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div id="id-hiedden-modal" style="display: none;"></div>
            <div class="modal-header remove-separator-modal">
              <button type="button" class="btn-close sign-in-btn" id="review-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
              <h1 class="fs-4 text-center">تقييم المنتج</h1>

            </div>
            <div class="modal-body">

              <div class="d-flex star-container mb-2 align-items-center" style="color: rgb(239, 170, 79); cursor:pointer;">
                <i class="bi bi-star-fill star1" id="star1" onclick="calculateRating(this)"></i>
                <i class="bi bi-star star2" id="star2" onclick="calculateRating(this)"></></i>
                <i class="bi bi-star star3" id="star3" onclick="calculateRating(this)"></></i>
                <i class="bi bi-star star4" id="star4" onclick="calculateRating(this)"></></i>
                <i class="bi bi-star star5" id="star5" onclick="calculateRating(this)"></></i>
              </div>




              <textarea id="w3review" name="w3review" placeholder="اكتب تعليقك هنا ..." rows="4" cols="50"></textarea>
              <input type="submit" value="تم" onclick="userRating('<?php echo $user_email ?>')" class="btn btn-primary">







            </div>
          </div>
        </div>
      </div>
      <!-- /////////////////////////////////////// -->

      <div class="tab-pane fade show active" id="nav-oldItem" role="tabpanel" aria-labelledby="nav-oldItem-tab">
        <?php
        $itemQuery = "SELECT DISTINCT status,rent.item_id,start_date,end_date,image_url,Title from
        ((rent INNER JOIN images on images.item_id=rent.item_id)
         INNER JOIN items on rent.item_id=items.ID)
          where rent.user_email='$user_email' and (status=0 or status=1)";
        $nowItemResult = $con->query($itemQuery);
        $added_items = [];
        while ($nowItemData = mysqli_fetch_assoc($nowItemResult)) {
          if (in_array($nowItemData['item_id'], $added_items)) {
            continue;
          }
          array_push($added_items, $nowItemData['item_id']);

          $date1 = date("Y-m-d");
          $date2 = $nowItemData['end_date'];
          $diff = abs(strtotime($date2) - strtotime($date1));

          $years = floor($diff / (365 * 60 * 60 * 24));
          $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
          $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

        ?>

          <div class="card mb-2 ">
            <div class="row">
              <div class="col-auto ">
                <img src="<?php echo $nowItemData['image_url'] ?>" onclick="location.href='rent_item.php?item=<?php echo $nowItemData['item_id'] ?>'" alt="" class="rounded-start">
              </div>
              <div class="col-9 ">
                <div class="card-body">
                  <div class="item-info">
                    <div>
                      <h4 class="card-title"><?php echo $nowItemData['Title'] ?></h4>

                    </div>
                    <p class="price"><?php echo $days ?> أيام للتسليم </p>
                    <input type="button" class="btn btn-primary btn-done activ" id="doneBtn" data-bs-toggle="modal" data-bs-target="#commentModal" <?php
                                                                                                                                                    if ($nowItemData['status'] == 0) {
                                                                                                                                                    ?> value="تسليم" <?php

                                                                                                                                                                    } elseif ($nowItemData['status'] == 1) {
                                                                                                                                                                      ?> style="color: #f7f7f7; background-color: #333;" value="تم التسليم" disabled <?php

                                                                                                                                                                                                                                                    }


                                                                                                                                                                                                                                                      ?> onclick="toggleInput(<?php echo $nowItemData['item_id'] ?>)">

                  </div>

                </div>

              </div>
            </div>
          </div>
        <?php
        }
        ?>

      </div>


      <div class="tab-pane fade show active" id="nav-ownItem" role="tabpanel" aria-labelledby="nav-ownItem-tab">

        <?php
        $itemQueryPending = "SELECT DISTINCT status,rent.item_id,start_date,end_date,image_url,Title from
          ((rent INNER JOIN images on images.item_id=rent.item_id)
          INNER JOIN items on rent.item_id=items.ID)
          where items.user_email='$user_email' and status=1 ";
        $pendingItemResult = $con->query($itemQueryPending);
        $added_itemsp = [];
        while ($PendingItemData = mysqli_fetch_assoc($pendingItemResult)) {
          if (in_array($PendingItemData['item_id'], $added_itemsp)) {
            continue;
          }
          array_push($added_itemsp, $PendingItemData['item_id']);

          // $cousmterQuery = "SELECT first_name,last_name,phone FROM (users INNER JOIN rent on rent.user_email=users.Email) 
          // where users.Email='" . $user_email . "' and status =1 and item_id=" . $PendingItemData['item_id'];
          $cousmterQuery = "SELECT first_name,last_name,phone, rent.user_email FROM (users INNER JOIN rent on rent.user_email=users.Email) 
          where status =1  and item_id=" . $PendingItemData['item_id'] . ";";
          // $cousmterQuery = "SELECT renting_users.first_name, renting_users.last_name, renting_users.phone FROM ((select users.email from users where )users INNER JOIN rent on rent.user_email=users.Email) renting_users
          //  where ren.Email='" . $user_email . "' and status =1 and item_id=" . $PendingItemData['item_id'];

          $resCousm = $con->query($cousmterQuery);
          $dataCousm = mysqli_fetch_assoc($resCousm);

        ?>



          <div class="card mb-2 lqlq">
            <div class="row">

              <div class="col-auto  ">
                <img src="<?php echo $PendingItemData['image_url'] ?>" onclick="location.href='add_item.php?item=<?php echo $PendingItemData['item_id'] ?>'" alt="" class="rounded-start">
              </div>
              <div class="col-9 ">
                <div class="card-body">
                  <div class="item-info">
                    <div>
                      <h4 class="card-title"><?php echo $PendingItemData['Title'] ?></h4>
                    </div>
                    <p class="price  gap-2 fs-4 align-items-center"><span class="fs-6" style="color: #777;">اسم المستأجر: <?php echo $dataCousm['first_name'] . " " . $dataCousm['last_name'] ?></span> <?php echo $dataCousm['phone'] ?> </p>
                    <p class="price flex-row gap-2 align-items-center"><span class="fs-6" style="color: #777;">تاريخ الاستلام:</span> <?php echo $PendingItemData['end_date'] ?> </p>
                    <button type="button" class="btn btn-primary btn-done" onclick="recivedItem(this,'<?php echo $dataCousm['user_email'] ?>', <?php echo $PendingItemData['item_id'] ?>)">
                      تم الاستلام
                    </button>

                  </div>

                </div>

              </div>


            </div>
          </div>
        <?php
        }
        ?>

      </div>


      <div class="tab-pane fade" id="nav-newItem" role="tabpanel" aria-labelledby="nav-newItem-tab">

        <?php


        $itemQueryOld = "SELECT DISTINCT rent.item_id,start_date,end_date,image_url,Title from
          ((rent INNER JOIN images on images.item_id=rent.item_id)
          INNER JOIN items on rent.item_id=items.ID)
          where rent.user_email='$user_email' and status=2";
        $oldItemResult = $con->query($itemQueryOld);
        $added_itemso = [];
        while ($OldItemData = mysqli_fetch_assoc($oldItemResult)) {
          if (in_array($OldItemData['item_id'], $added_itemso)) {
            continue;
          }
          array_push($added_itemso, $OldItemData['item_id']);



        ?>
          <div class="card mb-2 ">
            <div class="row">
              <div class="col-auto">
                <img src="<?php echo $OldItemData['image_url'] ?>" onclick="location.href='rent_item.php?item=<?php echo $OldItemData['item_id'] ?>'" alt="" class="rounded-start">
              </div>
              <div class="col-9 ">
                <div class="card-body">
                  <div class="item-info">
                    <div>
                      <h4 class="card-title"><?php echo $OldItemData['Title'] ?></h4>
                    </div>
                    <p class="price"><?php echo $OldItemData['start_date'] ?> : <?php echo $OldItemData['end_date'] ?></p>
                  </div>

                  <p class="card-text"><small></small></p>
                  <p class="card-text"><small></small></p>
                </div>

              </div>
            </div>
          </div>
        <?php

        }
        ?>


      </div>


    </div>
  </main>
  <?php new Footer() ?>
</body>

</html>