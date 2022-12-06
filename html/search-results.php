<?php
  $flag = false;
  $user_input = 0;
  if(isset($_GET['search-field']) &&  !empty($_GET['search-field']))
  {
    $flag = true;
    $user_input = $_GET['search-field'];
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
              <input type="submit" class="search-btn btn" title="بحث" />
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
            <div class="card sticky-top">
              <div class="card-body">
                <div class="card-body">

                  <h5 class="card-text">خيارات التوصيل</h5>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      الاستلام الذاتي
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      توصيل
                    </label>
                  </div>
                </div>
                <div class="card-body">

                  <h5 class="card-text">طرق الدفع</h5>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      كاش
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      بطقاة ائتمان
                    </label>
                  </div>
                  
            </div>
            <div class="card-body">

                  <h5 class="card-text">الموقع</h5>
                  <div>
                    <label for="exampleDataList" class="form-label">المدينة</label>
                    <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="اكتب المدينة ...">
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

                <button class="btn btn-primary justify-content-end">افعل</button>
              </div>
        </section>
      <section class="col-9">
      <h3>النتائج</h3>
      <?php
      if ($flag == true)
      {
        getCards($user_input);

      }
      function getCards($user_input)
      {
        $db = new mysqli("localhost", "root", "", "web_project_agar");
        if (isset($db))
        {

          $query = 
          ' 
          select title, price_per_day as price, rate.stars, description, shipping_cost, location
          from items
          inner join (select avg(rating) as stars, item_id from reviews) rate on items.id = rate.item_id
          
          where items.title like "%'.$user_input.'%" or items.description like "%'.$user_input.'%";';

          $result = $db->query($query);
          

          for ($i = 0; $i < $result->num_rows; $i++)
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
                    <h4 class="card-title"><?php echo $row->title ?></h4>
                    
                    <div class="d-flex star-container mb-2">
                    <?php 
                      for($i = 0; $i < $row->stars -1; $i++)
                      {
                        ?>

                      
                    <i class="bi bi-star-fill"></i>
                    <?php 
                      }
                    
                      for($i = 0; $i < 5 - $row->stars; $i++)
                      {

                  ?>
<!--                     
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i> -->
                    <i class="bi bi-star"></i>
                  <?php 
                      }
                  ?> 
                    <!-- <i class="bi bi-star"></i> -->
                </div>
                  </div>
                  <p class="price"><strong><?php echo $row->price ?>$</strong></p>
                </div>
                
                <p class="card-text"><?php echo $row->description ?></p>
                <p class="card-text"><small><?php echo $row->shipping_cost ?></small></p>
                <p class="card-text"><small><?php echo $row->location ?></small></p>
              </div>
              
            </div>
          </div>
        </div>
        <?php 
         }
          
        }
      }
        ?>
        <!-- <div class="card mb-2 ">
          <div class="row">
            <div class="col-auto">
              <img src="https://picsum.photos/200" alt="">
            </div>
            <div class="col-9 ">
              <div class="card-body">
                <div class="item-info">
                  <div>
                    <h4 class="card-title">Lorem ipsum dolor sit amet.</h4>
                    <div class="d-flex star-container mb-2">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star"></i>
                    <i class="bi bi-star"></i>
                </div>
                  </div>
                  <p class="price"><strong>0.99$</strong></p>
                </div>
                
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi illum quo, fuga aut rem saepe?</p>
                <p class="card-text"><small>Lorem ipsum dolor sit amet.</small></p>
              </div>
              
            </div>
          </div>
        </div>
        <div class="card mb-2 ">
          <div class="row">
            <div class="col-auto">
              <img src="https://picsum.photos/200" alt="">
            </div>
            <div class="col-9 ">
              <div class="card-body">
                <div class="item-info">
                  <div>
                    <h4 class="card-title">Lorem ipsum dolor sit amet.</h4>
                    <div class="d-flex star-container mb-2">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star"></i>
                    <i class="bi bi-star"></i>

                
                </div>
                  </div>
                  <p class="price"><strong>0.99$</strong></p>
                </div>

                <p class="card-text mb-1"><small>Free shipping</small></p>
                <p class="card-text"><small>Nablus</small></p>
                <!-- <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi illum quo, fuga aut rem saepe?</p>
                <p class="card-text"><small>Lorem ipsum dolor sit amet.</small></p> -->
              </div>
              
            </div>
          </div>
        <!-- </div>
        
        <div class="card mb-2 ">
          <div class="row">
            <div class="col-auto">
              <img src="https://picsum.photos/200" alt="">
            </div>
            <div class="col-9 ">
              <div class="card-body">
                <div class="item-info">
                  <div>
                    <h4 class="card-title">Lorem ipsum dolor sit amet.</h4>
                    <div class="d-flex star-container mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
              </svg>
                
                </div>
                  </div>
                  <p class="price"><strong>0.99$</strong></p>
                </div>
                
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi illum quo, fuga aut rem saepe?</p>
                <p class="card-text"><small>Lorem ipsum dolor sit amet.</small></p>
              </div>
              
            </div>
          </div>
        </div> -->

      </section>
    </div>
    <section>
      <ul class="pagination modal-3 justify-content-center mt-3">
        <li class= "page-item"><a href="#"  class ="page-link">
        <i class="bi bi-caret-left-fill"></i>
        </a></li>
        <li class= "page-item"><a href="#"  class ="page-link">1</a></li>
        <li class= "page-item"><a href="#"  class ="page-link">2</a></li>
        <li class= "page-item"><a href="#"  class ="page-link">3</a></li>
        <li class= "page-item"><a href="#"  class ="page-link">
        <i class="bi bi-caret-right-fill"></i>
        
        </a></li>
      </ul>
    </section>
  </main>
  <footer class="container">Footer</footer>
</body>
</html>