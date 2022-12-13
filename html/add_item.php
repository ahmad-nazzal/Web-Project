<?php
  include_once("../php_duplicate_code/stylesheets_import.php");
  include_once("../php_duplicate_code/classes/card.php");
  include_once("toast.php")
  // 780px best width
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
  getStyles();
?>
    <link
      rel="stylesheet"
      href="../node_modules/swiper/swiper-bundle.min.css"
    />
    <script src="../js/cards.js"></script>
    
    <link href="../css/cards.css" rel="stylesheet"/>
    <link href="../css//add-item.css" rel="stylesheet"/>
    <script defer>
      function selectPhoto(element) {
          // removeStyles(element);

          let bigImg = document.querySelector('#big-img');
          bigImg.src = element.src;
          // alert(element.src);
      }
      // function removeStyles(element) {
      //   let imgs = document.querySelectorAll('.item-img');
      //   alert(imgs.length);
      //   for (let img of imgs) {
          
      //     let list = img.classList;
      //       list.toggle("img-selected");
      //       console.log(img.className);
            
      //     } element.classList.add('img-selected');
      //   }
       
      
      // function addBorder(ele) {
      //   ele.className += " img-selected"
      //   alert(ele.className);
      // }
      // function removeBorder(ele) {
      //   ele.className.replace('img-selected','');
      // }
    </script>
    <script defer>
        var loadFile = function(event) {
          
          let imgContainer = document.querySelector(".available-imgs");

          for (let i = 0; i < imgContainer.childNodes.length; i++) {
            let image = document.createElement('img');
            image.src = URL.createObjectURL(event.target.files[i]);
            image.classList.add('item-img');
            image.alt = "added image";
            image.addEventListener("click", function() {
              selectPhoto(image);
            });

            imgContainer.appendChild(image);
          }
          
        };
</script>

      <script defer>
        function displayToast()
        {
          
          const toastLiveExample = document.getElementById('liveToast');
          const toast = new bootstrap.Toast(toastLiveExample);
          toast.show();
        }
        function storeItem()
        {
          let xml = new XMLHttpRequest();
          xml.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200)
            {
              displayToast();
              sleep(3000);
              window.location("my_items_page.php");
            }
          }
          
          xml.open("post", "store_item.php", true);
          xml.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

          let imgs = document.querySelectorAll(".available-imgs img");
          let title = document.querySelector("");
          for (let i = 0; i < imgs.length; i++) 
          {

          }
          xml.send("");
        }



      </script>
      <!-- <script defer>
        
        const toastTrigger = document.getElementById('update-btn');
        
        if (toastTrigger) {
          
          toastTrigger.addEventListener('click', () => {
            
          })
        }
      </script> -->
  <title>add/edit item</title>

</head>
<body>

  
    <div class="container ">
      <h1 class="mt-5">تعديل/انشاء </h1>
      <section class="section-images">
        <h2 class="text-center heading-helper">الصور</h2>
        <div class="img-display text-center mb-5">
          <img src="https://picsum.photos/600/350" alt="image" id="big-img">
        </div>

        <?php renderToast(); ?>
        <input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;">
        <label for="file" style="cursor: pointer;">اضف صور</label>
        <p><img id="output" width="200" /></p>

        



        <input class="form-control mb-2" type="file" id="formFileMultiple" onchange="loadFile(event)" multiple>
        <span>

          <div class="available-imgs">
            <!-- <label for="formFile" class="form-label">Default file input example</label> -->
            
            <img onclick="selectPhoto(this)" src="https://picsum.photos/100" alt="image" class="item-img">
            <img onclick="selectPhoto(this)" src="https://picsum.photos/100" alt="image"  class="item-img">
          <!-- <img onclick="selectPhoto(this)" src="https://picsum.photos/100" alt="image" class="item-img">
          <img onclick="selectPhoto(this)" src="https://picsum.photos/100" alt="image" class="item-img">
          <img onclick="selectPhoto(this)" src="https://picsum.photos/100" alt="image" class="item-img">
          <img onclick="selectPhoto(this)" src="https://picsum.photos/100" alt="image" class="item-img">
          <img onclick="selectPhoto(this)" src="https://picsum.photos/100" alt="image" class="item-img">
          <img onclick="selectPhoto(this)" src="https://picsum.photos/100" alt="image" class="item-img">
          <img onclick="selectPhoto(this)" src="https://picsum.photos/100" alt="image" class="item-img"> -->
          
          <!-- <i class="bi bi-plus bi-md"></i> -->
          
        </div>
      </span>
      </section>
      <section class="section-info">
      <h2 class="text-center heading-helper">المعلومات</h2>
            <h3 contenteditable="true">يادة عدد الحروف التى يولدها التطبي</h3>
            <p contenteditable="true" class="text-description">ا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على </p>
            
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
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
            <div class="accordion-body">
        <div class="price">
          <h3 class=" d-inline"><strong contenteditable="true">0.99</strong><strong>$</strong></h3>
          <p class="price-tag d-inline">ليوم واحد</p>

        </div>
        <div class="form-check w-50">

          <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="credit-method" checked>
          <label class="form-check-label" for="flexCheckChecked">
            كاش
          </label>
        </div>
        <div class="form-check w-50">
          <input class="form-check-input" type="checkbox" value="1" id="flexCheck" name="credit-method" checked>
          <label class="form-check-label" for="flexCheck">
            بطاقة ائتمان
          </label>
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
                  <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="credit-method" checked>
                  <label class="form-check-label" for="flexCheckChecked">
                    استلام شخصي
                  </label>
                  </div>
                  <div class="form-check w-50">
                  <input class="form-check-input" type="checkbox" value="1" id="flexCheck" name="credit-method" checked>
                  <label class="form-check-label" for="flexCheck">
                    توصيل عادي
                  </label>
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
                  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                  <label class="form-check-label" for="flexSwitchCheckChecked">متاح</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <div class="d-flex justify-content-center">

        <button class="btn btn-primary my-4 col-4" id="update-btn" onclick="storeItem()">حفظ</button>
      </div>

  </div>
</body>
</html>