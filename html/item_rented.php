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
          <div id="id-hiedden-modal" style="display: none;" ></div>
          <div class="modal-header remove-separator-modal">
            <button
              type="button"
              class="btn-close sign-in-btn"
              id="review-close-btn"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
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
      $itemQuery="SELECT DISTINCT status,rent.item_id,start_date,end_date,image_url,Title from
        ((rent INNER JOIN images on images.item_id=rent.item_id)
         INNER JOIN items on rent.item_id=items.ID)
          where rent.user_email='$user_email' and (status=0 or status=1)";
      $nowItemResult=$con->query($itemQuery);
      while($nowItemData=mysqli_fetch_assoc($nowItemResult)){

        $date1 = date("Y-m-d");
        $date2 = $nowItemData['end_date'];
        $diff = abs(strtotime($date2) - strtotime($date1));

        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

      ?>

      <div class="card mb-2 ">
          <div class="row">
            <div class="col-auto ">
              <img src="<?php echo $nowItemData['image_url'] ?>" alt="" class="rounded-start">
            </div>
            <div class="col-9 ">
              <div class="card-body">
                <div class="item-info">
                  <div>
                    <h4 class="card-title"><?php echo $nowItemData['Title'] ?></h4>
                    
                  </div>
                  <p class="price"><?php echo $days?>  أيام للتسليم </p>
                  <input type="button" class="btn btn-primary btn-done activ"
                   id="doneBtn"  data-bs-toggle="modal" data-bs-target="#commentModal"
                   <?php 
                    if($nowItemData['status']==0){
                      ?>
                      value="تسليم" 

                      <?php
                      
                    }
                    elseif($nowItemData['status']==1){
                      ?>
                      style="color: #f7f7f7; background-color: #333;"
                      value="تم التسليم"
                      disabled
                      <?php

                    }
                    
                    
                    ?>
                    
                    
                    onclick="toggleInput(<?php echo $nowItemData['item_id'] ?>)">

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
        $itemQueryPending="SELECT DISTINCT status,rent.item_id,start_date,end_date,image_url,Title from
          ((rent INNER JOIN images on images.item_id=rent.item_id)
          INNER JOIN items on rent.item_id=items.ID)
          where rent.user_email='$user_email' and status=1";
        $pendingItemResult=$con->query($itemQueryPending);
        while($PendingItemData=mysqli_fetch_assoc($pendingItemResult)){
      
      
      
      ?>


      
      <div class="card mb-2 lqlq">
          <div class="row">
            
            <div class="col-auto  " >
              <img src="<?php  echo $PendingItemData['image_url'] ?>" alt="" class="rounded-start">
            </div>
            <div class="col-9 ">
              <div class="card-body">
                <div class="item-info">
                  <div>
                    <h4 class="card-title"><?php echo $PendingItemData['Title'] ?></h4>
                  </div>
                  <p class="price flex-row gap-2 align-items-center"><span class="fs-6" style="color: #777;">تاريخ الاستلام:</span> <?php echo $PendingItemData['end_date'] ?>  </p>
                  <button type="button" class="btn btn-primary btn-done"
                  onclick="recivedItem(this,'<?php echo $user_email?>', <?php echo $PendingItemData['item_id'] ?>)"
                  >
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
      
      
      $itemQueryOld="SELECT DISTINCT rent.item_id,start_date,end_date,image_url,Title from
          ((rent INNER JOIN images on images.item_id=rent.item_id)
          INNER JOIN items on rent.item_id=items.ID)
          where rent.user_email='$user_email' and status=2";
        $oldItemResult=$con->query($itemQueryOld);
        while($OldItemData=mysqli_fetch_assoc($oldItemResult)){
      
      
      ?>
      <div class="card mb-2 ">
          <div class="row">
            <div class="col-auto">
              <img src="<?php echo $OldItemData['image_url']?>" alt="" class="rounded-start">
            </div>
            <div class="col-9 ">
              <div class="card-body">
                <div class="item-info">
                  <div>
                    <h4 class="card-title"><?php echo $OldItemData['Title']?></h4>
                  </div>
                  <p class="price"><?php echo $OldItemData['start_date']?>- <?php echo $OldItemData['end_date']?></p>
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
</body>
</html>