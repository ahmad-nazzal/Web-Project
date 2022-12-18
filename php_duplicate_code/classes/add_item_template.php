<?php

class AddItemTemplate
{
  public $item_id, $item_images, $Title, $Description, $price_per_day, $cash_method, $credit_method, $local_pickup, $shipping, $stat, $location;
  function __construct($item_id, $item_images, $Title, $Description, $price_per_day, $cash_method, $credit_method, $local_pickup, $shipping, $stat, $location)
  {
    $this->item_id = $item_id;
    $this->item_images = $item_images;
    $this->Title = $Title;
    $this->Description = $Description;
    $this->price_per_day = $price_per_day;
    $this->cash_method = $cash_method;
    $this->credit_method = $credit_method;
    $this->local_pickup = $local_pickup;
    $this->shipping = $shipping;
    $this->stat = $stat;
    $this->location = $location;
  }

  public function render()
  {


?>


    <h1 class="mt-5">تعديل/انشاء </h1>
    <section class="section-images">
      <h2 class="text-center heading-helper">الصور</h2>
      <div class="img-display text-center mb-5" style="background-color: #f7f7f7;">

        <img src="<?php echo $this->item_images[0]; ?>" alt="image" id="big-img">

      </div>


      <!-- <!?php renderToast(); ?> -->
      <input type="text" name="create" value="<?php echo $this->item_id; ?>" style="display: none;">
      <!-- <label for="file" style="cursor: pointer;">اضف صور</label> -->





      <input class="form-control mb-2" type="file" id="formFileMultiple" onchange="loadFile(event)" multiple>
      <span>

        <div class="available-imgs">
          <?php
          for ($i = 0; $i < count($this->item_images); $i++) {
          ?>
            <img onclick="selectPhoto(this)" src="<?php echo $this->item_images[$i]; ?>" alt="image" class="item-img">
          <?php
          } ?>

        </div>
      </span>
    </section>

    <section class="section-info">
      <h2 class="text-center heading-helper">المعلومات</h2>
      <h5 class="mb-3">العنوان</h5>
      <div class="form-group mb-3">

        <input id="title-input" class="form-control" type="text" value="<?php echo $this->Title; ?>" placeholder="اكتب عنوانًا لغرضك" name="">
      </div>
      <h5 class="text-description mb-e">الوصف</h5>
      <div class="form-group">
        <textarea form="main-form" class="form-control" id="exampleFormControlTextarea1" rows="10" placeholder="اكتب وصفًا لغرضك" name="desc"><?php echo $this->Description; ?></textarea>
      </div>
    </section>
    <section class="section-accordion">
      <h2 class="text-center heading-helper">الخصائص</h2>
      <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="panelsStayOpen-headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
              الدفع
            </button>
          </h2>
          <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
            <div class="accordion-body">
              <div class="price">
                <h5 class=" d-inline">السعر</h5>
                <p class="price-tag d-inline">ليوم واحد</p>
                <div class=" d-flex align-items-center gap-1">

                  <strong>$</strong>
                  <input id="price-input" class="form-control d-inline" type="text" value="<?php echo $this->price_per_day; ?>" name="price">
                </div>




              </div>
              <div class="form-check w-50">
                <?php
                if ($this->cash_method == 1) {


                ?>
                  <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="cash-method" checked>
                <?php
                } else {
                ?>
                  <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="cash-method">
                <?php
                }
                ?>
                <label class="form-check-label" for="flexCheckChecked">
                  كاش
                </label>

              </div>
              <div class="form-check w-50">
                <?php
                if ($this->credit_method == 1) {

                ?>
                  <input class="form-check-input" type="checkbox" value="1" id="flexCheck" name="credit-method" checked>
                <?php
                } else {
                ?>
                  <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="credit-method">
                <?php
                }
                ?>

                <label class="form-check-label" for="flexCheck">
                  بطاقة ائتمان
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="panelsStayOpen-headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapsefour" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
              الصنف
            </button>
          </h2>
          <div id="panelsStayOpen-collapsefour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
            <div class="accordion-body">
              <div class="category">
                <h5 class="mb-2">صنف الغرض</h5>
                <!-- <p class="price-tag d-inline">ليوم واحد</p> -->
                <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                  <option selected>اختر الصنف</option>
                  <?php
                  global $con;
                  $result = $con->query("select * from tags");
                  for ($i = 0; $i < $result->num_rows; $i++) {

                    $row = $result->fetch_object();
                  ?>
                    <option value="<?php echo $i + 1; ?>"><?php echo $row->category; ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>

            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
              التوصيل
            </button>
          </h2>
          <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">

            <div class="accordion-body my-2">
              <div class="form-check w-50">
                <?php
                if ($this->local_pickup == 1) {

                ?>
                  <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="self-pickup" checked>
                <?php
                } else {
                ?>
                  <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="self-pickup">
                <?php
                }
                ?>
                <label class="form-check-label" for="flexCheckChecked">
                  استلام شخصي
                </label>
              </div>
              <div class="form-check w-50">
                <?php
                if ($this->shipping == 1) {

                ?>
                  <input class="form-check-input" type="checkbox" value="1" id="flexCheck" name="shipping" checked>
                <?php
                } else {
                ?>
                  <input class="form-check-input" type="checkbox" value="1" id="flexCheck" name="shipping">
                <?php
                }
                ?>
                <label class="form-check-label" for="flexCheck">
                  توصيل عادي
                </label>
              </div>
              <div class="d-flex align-items-center gap-1 w-50">

                <!-- <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked> -->
                <label class="form-check-label" for="location-input">الموقع</label>
                <input id="location-input" class="form-control d-inline" type="text" value="<?php echo $this->location; ?>" name="location">
              </div>

            </div>
          </div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header" id="panelsStayOpen-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
              الحالة
            </button>
          </h2>
          <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
            <div class="accordion-body">
              <div class="form-check form-switch">
                <?php
                if ($this->stat == 1) {

                ?>
                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="status" value="1" checked>
                <?php
                } else {
                ?>
                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" name="status" value="1">
                <?php
                }
                ?>
                <!-- <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked> -->
                <label class="form-check-label" for="flexSwitchCheckChecked">متاح</label>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

<?php
  }
}
?>