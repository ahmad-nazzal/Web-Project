<?php
  $flag = false;
  $user_input = 0;
  $page_num = 0;
  $num_of_pages = 0;

  $city_input = "";
  $cash_method = 0;
  $credit_method = 0;
  $local_pickup = 0;
  $shipping = 0;

  if(isset($_GET['search-field']) &&  !empty($_GET['search-field'])) //for search bar
  {
    $flag = true;
    $user_input = $_GET['search-field'];
    
          
    if (isset($_GET['page-num']))
    {
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


?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search</title>

  <link
      rel="stylesheet"
      href="../node_modules/bootstrap/dist/css/bootstrap.rtl.min.css"
    />
    <link
      rel="stylesheet"
      href="../node_modules/bootstrap-icons/font/bootstrap-icons.css"
    />
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link href="../css/Header-sectionHero.css" rel="stylesheet" />
  
    <script defer src="../js/test.js"></script>
    <link rel="stylesheet" href="../css/search-results.css">
    <link rel="stylesheet" href="../css/general.css">
</head>
<body>
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
<header>
        <nav class="navbar navbar-dark navbar-expand-sm">
          <div class="container-fluid">
            <a class="navbar-brand logo" href="index.php"><h3>آجار</h3></a>
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
                    <input class="form-check-input" type="checkbox" value="l" id="flexCheckDefault" name="local-pickup" checked>
                    <label class="form-check-label" for="flexCheckDefault">
                      الاستلام الذاتي
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="s" id="flexCheckChecked" name="shipping" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      توصيل
                    </label>
                  </div>
                </div>
                <div class="card-body">
                  
                  <h5 class="card-text">طرق الدفع</h5>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="cash" id="flexCheckDefault" name="cash-method" checked>
                    <label class="form-check-label" for="flexCheckDefault">
                      كاش
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="credit" id="flexCheckChecked" name="credit-method" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      بطقاة ائتمان
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
                              
                              <button class="btn btn-primary justify-content-end" type="submit">افعل</button>
                            
                            </div>
                            </form>
                          </section>
                          <section class="col-9">
                            <h3>النتائج ل<?php echo '"'.$user_input.'"';?></h3>
                            <?php
      if ($flag == true)
      {
        if ($page_num < 0 )
        {
          $page_num = 0;
        }
        getCards($user_input,$page_num,$city_input, $shipping, $local_pickup, $cash_method, $credit_method);
        
      }
      function getCards($user_input,$page_num,$city_input, $shipping, $local_pickup, $cash_method, $credit_method)
      {
        $db = new mysqli("localhost", "root", "", "web_project_agarr");
        if (isset($db))
        {
                    
          $query = 
          ' 
          select title, price_per_day as price, rate.stars, description, shipping,local_pickup, cash_method, credit_method, location
          from items
          inner join (select avg(rating) as stars, item_id from reviews group by item_id) rate on items.id = rate.item_id
          
          where items.title like "%'.$user_input.'%" or items.description like "%'.$user_input.'%"
          and items.shipping ='.$shipping.'
          and items.local_pickup='.$local_pickup.'
          and items.cash_method ='.$cash_method.'
          and items.credit_method='.$credit_method.'
          and location like "%'.$city_input.'%"
           LIMIT 7 OFFSET '.($page_num*7).';';

          $result = $db->query($query);
          if ($page_num > (int)$result->num_rows/7) {
            $page_num = $result->num_rows/7;
          } 
          
          for ($i = 0; $i < $result->num_rows ; $i++)
          {
            $row = $result->fetch_object();
            ?>
        <div class="card mb-2 ">
          <div class="row">
            <div class="col-auto">
              <img src="https://picsum.photos/200" alt="" class="rounded-start">
            </div>
            <div class="col-9 ">
              <div class="card-body">
                <div class="item-info">
                  <div>
                    <h4 class="card-title"><?php echo $row->title; ?></h4>
                    
                    <div class="d-flex star-container mb-2">
                    <?php 
                    
                      for($j = 0; $j < (int) $row->stars ; $j++)
                      {
                    ?>

                    <i class="bi bi-star-fill"></i>
                    <?php 
                      }
                    
                      for($s = 0; $s < 5 - (int)$row->stars; $s++)
                      {

                    ?>
                    <i class="bi bi-star"></i>
                    <?php 
                      }
                    ?> 
                </div>
                  </div>
                  <p class="price"><strong><?php echo $row->price ?>$</strong></p>
                </div>
                
                <p class="card-text"><?php echo $row->description ?></p>
                <p class="card-text"><small><?php echo $row->shipping ?></small></p>
                <p class="card-text"><small><?php echo $row->location ?></small></p>
              </div>
              
            </div>
          </div>
        </div>
        <?php 
         }
        ?>
      </section>
    </div>
    <section>
      <ul class="pagination modal-3 justify-content-center mt-3">
        <li class= "page-item">
        <a href="search-results.php?search-field=<?php echo $user_input?>&page-num=<?php echo $page_num-1;?>"  class ="page-link">

            <i class="bi bi-caret-right-fill"></i>
          </a>
        </li>
        <?php 
          for ($k = 0; $k < ($result->num_rows / 7) ; $k++)
          {

        ?>
        <li class= "page-item"><a href="search-results.php?search-field=<?php echo $user_input?>&page-num=<?php echo $k;?>"  class ="page-link"><?php echo $k+1;?></a></li>
        
        <?php 
          }
        }
      } 
        ?>
        <li class= "page-item">
          <a href="search-results.php?search-field=<?php echo $user_input?>&page-num=<?php echo $page_num+1;?>"  class ="page-link">
            <i class="bi bi-caret-left-fill"></i>  
          </a>
        </li>
      </ul>
    </section>
  </main>
  <footer class="container">Footer</footer>
</body>
</html>