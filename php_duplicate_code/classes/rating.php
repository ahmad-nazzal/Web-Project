<?php
include_once("render_interface.php");

class Rating implements ElementsMethods{
  
  private $stars;
  
  public function render()
  {
    ?>
        
    
    <div class="d-flex star-container mb-2">
    <?php 
                
    for($j = 0; $j < (int) $this->stars ; $j++)
     {
    ?>

    <i class="bi bi-star-fill"></i>
   <?php 
      }
                
    for($s = 0; $s < 5 - (int)$this->stars; $s++)
    {

    ?>
    <i class="bi bi-star"></i>
    <?php 
    }
    ?> 
    </div>

    <?php
  }
  
  function __construct($stars)
  {
    $this->stars = $stars;
  }
}
?>