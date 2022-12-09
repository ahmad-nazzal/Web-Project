<?php
include_once("rating.php");
include_once("render_interface.php");


class Card implements ElementsMethods{

  public $row;
  function __construct($row) {
    $this->row = $row;
  }
  public function render()
  {
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
                    <h4 class="card-title"><?php echo $this->row->title; ?></h4>
                    
                    <?php
                      $rating = new Rating($this->row->stars);
                      $rating->render();
                    ?>
                  </div>
                  <p class="price"><strong><?php echo $this->row->price ?>$</strong></p>
                </div>
                
                <p class="card-text"><?php echo $this->row->description ?></p>
                <p class="card-text"><small><?php echo $this->row->shipping ?></small></p>
                <p class="card-text"><small><?php echo $this->row->location ?></small></p>
              </div>
              
            </div>
          </div>
        </div>
<?php  
  }

  
}

?>