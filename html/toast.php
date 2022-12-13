<?php 
  function renderToast() 
  {

  
?>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <!-- <img src="..." class="rounded me-2" alt="..."> -->
      <i class="bi bi-check-circle-fill me-2 " style="color: green;"></i>
      <strong class="me-auto">تحديث</strong>
      <small>هذه اللحظة</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      تم التعديل
    </div>
  </div>
</div>

<?php
  }
?>