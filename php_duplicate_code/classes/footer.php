<?php 
class Footer{

public function __construct()
{
  ?>
<div class=" footer-container">
      <footer class="container py-5">
        <div class="row">

          <div class="col-6 discription-ajar mb-3">
            <h5>حول آجار</h5>
            <p>آجار هو موقع تجاري يمنح المستخدمين الفرصة لتحقيق أقصى استفادة من مقتنياتهم من خلال إضافة المقتنيات غير المستخدمة ليستأجرها الآخرون.</p>
          </div>

          <div class="col-2 mb-3">
            <h5>الاقسام</h5>
            <ul class="nav flex-column">
              <li class="nav-item mb-2">
                <a href="index.php" class="nav-link p-0 text-muted">الصفحة الرئيسية</a>
              </li>
              <li class="nav-item mb-2">
                <a href="search-results.php" class="nav-link p-0 text-muted">البحث</a>
              </li>
              <li class="nav-item mb-2">
                <a href="#" class="nav-link p-0 text-muted">العناوين</a>
              </li>
              
            </ul>
          </div>

          <div class="col-2  mb-3">
            <h5>تواصل معنا</h5>
                <a href="#" class="nav-link p-0 text-muted">ajar2022@gmail.com</a>
          </div>

         

          
        </div>

        <div
          class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top"
        >
          <p class="text-center">&copy; حـقـوق الـنـشـر مـحـفـوظـة لـدى مـوقـع آجار 2022</p>
          <ul class="list-unstyled d-flex">
            <li class="ms-3">
              <a class="link-dark" href="#"
                ><svg class="bi" width="24" height="24">
                  <use xlink:href="#twitter" /></svg
              ></a>
            </li>
            <li class="ms-3">
              <a class="link-dark" href="#"
                ><svg class="bi" width="24" height="24">
                  <use xlink:href="#instagram" /></svg
              ></a>
            </li>
            <li class="ms-3">
              <a class="link-dark" href="#"
                ><svg class="bi" width="24" height="24">
                  <use xlink:href="#facebook" /></svg
              ></a>
            </li>
          </ul>
        </div>
      </footer>
    </div>
<?php
}

}


?>