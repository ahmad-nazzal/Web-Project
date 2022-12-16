<?php

class Toast{


  public function __construct($buttonId,$anyUniqueId,$messageToShow)
  {
    
    ?>
    <style>
      .toastt {
        flex-direction: row-reverse;
        justify-content: start;
      }
    </style>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div class="toast align-items-center text-bg-dark border-0 fade" id="<?php echo $anyUniqueId ?>" role="alert" aria-live="assertive" aria-atomic="true">
     <div class="d-flex toastt">
       <div class="toast-body">
         <?php echo $messageToShow ?>
       </div>
       <button type="button" class="btn-close btn-close-white mt-auto mb-auto" data-bs-dismiss="toast" aria-label="Close"></button>
     </div>
    </div>
    </div>
      <script >
       const toastTrigger = document.getElementById("<?php echo $buttonId ?>");
       const toastLiveExample = document.getElementById("<?php echo $anyUniqueId ?>");
       if (toastTrigger) {
         toastTrigger.addEventListener("click", () => {
           const toast = new bootstrap.Toast(toastLiveExample);

           toast.show();
         });
       }
     </script>
    




  <?php
  }
}

?>