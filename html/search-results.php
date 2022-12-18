<?php
include_once("../php_duplicate_code/classes/items_results.php");
include_once("../php_duplicate_code/classes/nav_bar.php");
include_once("../php_duplicate_code/classes/nav_barAll.php");
include_once("../php_duplicate_code/classes/footer.php");
include_once("../php_duplicate_code/stylesheets_import.php");
session_start();
// include_once("../php_duplicate_code/nav_bar.php");
$flag = false;
$user_input = "";
$page_num = 0;
$num_of_pages = 0;

$city_input = "";
$cash_method = 0;
$credit_method = 0;
$local_pickup = 0;
$shipping = 0;

if (isset($_GET['search-field']) &&  !empty($_GET['search-field'])) //for search bar
{
  $flag = true;
  $user_input = $_GET['search-field'];


  if (isset($_GET['page-num'])) {
    $page_num = $_GET['page-num'];
  }
}
if (isset($_GET['credit-method']) &&  !empty($_GET['credit-method'])) // for credit card filters
{
  $credit_method = $_GET['credit-method'];
}
if (isset($_GET['cash-method']) &&  !empty($_GET['cash-method'])) // cash payment method
{
  $cash_method = $_GET['cash-method'];
}
if (isset($_GET['city-input']) &&  !empty($_GET['city-input'])) // city filters
{
  $city_input = $_GET['city-input'];
}
if (isset($_GET['shipping']) &&  !empty($_GET['shipping'])) //shipping
{
  $shipping = $_GET['shipping'];
}
if (isset($_GET['local-pickup']) &&  !empty($_GET['local-pickup'])) //local-pickup filters
{
  $local_pickup = $_GET['local-pickup'];
}
$isuser = false;
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
  <title>Search</title>

  <?php
  getStyles();
  ?>
  <link rel="stylesheet" href="../css/search-results.css">
</head>

<body>
  <?php
  new NavBarAll($isuser, $con, $user_email, $userName);
  ?>
  <main class="container mt-5">
    <div class="row">

      <section class="col-3 h-100 mt-2">
        <h5>فلترة النتائج</h5>
        <form action="search-results.php" method="get">

          <div class="card">
            <div class="card-body">
              <div class="card-body">

                <h5 class="card-text">خيارات التوصيل</h5>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="local-pickup" checked>
                  <label class="form-check-label" for="flexCheckDefault">
                    الاستلام الذاتي
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="shipping" checked>
                  <label class="form-check-label" for="flexCheckChecked">
                    توصيل
                  </label>
                </div>
              </div>
              <div class="card-body">

                <h5 class="card-text">طرق الدفع</h5>
                <div class="form-check">
                  
                  <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="cash-method" checked>
                  <input class="form-check-input" type="checkbox" value="<?php echo $user_input;?>" id="flexCheckDefault" name="search-field" checked style="display: none;">
                  <label class="form-check-label" for="flexCheckDefault">
                    كاش
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="credit-method" checked>
                  <label class="form-check-label" for="flexCheckChecked">
                    بطاقة ائتمان
                  </label>
                </div>

              </div>
              <div class="card-body">

                <h5 class="card-text">الموقع</h5>
                <div>
                  <label for="exampleDataList" class="form-label">المدينة</label>
                  <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="اكتب المدينة ..." name="city-input">
                  <datalist id="datalistOptions">
                    <option value="Nablus">
                    <option value="Jenin">
                    <option value="Tolkarem">
                    <option value="Qalqilya">
                    <option value="Hebron">
                  </datalist>
                </div>
              </div>
              <div class="d-flex justify-content-end">

                <button class="btn btn-primary justify-content-end" type="submit">ابحث</button>

              </div>
        </form>
      </section>
      <section class="col-9">
        <h3>النتائج ل<?php echo '"' . $user_input . '"'; ?></h3>
        <?php
        if ($flag == true) {
          if ($page_num < 0) {
            $page_num = 0;
          }
          $items = new SearchResults($user_input, $page_num, $city_input, $shipping, $local_pickup, $cash_method, $credit_method);
          $items->render();
          unset($items);

          // getCards($user_input,$page_num,$city_input, $shipping, $local_pickup, $cash_method, $credit_method);

        }
        ?>
  </main>
  <?php new Footer(); ?>
</body>

</html>