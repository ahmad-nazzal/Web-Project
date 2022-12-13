<?php
include_once("render_interface.php");


class MiniCard implements ElementsMethods{

  public $stars, $image_url, $title, $price, $size, $heart_visible, $href;
  function __construct( $heart_visible = true, $rating_visible = true, $stars, $image_url, $title, $price, $size, $href) {
    $this->stars = $stars;
    $this->image_url = $image_url;
    $this->title = $title;
    $this->price = $price;
    $this->size = $size;
    $this->heart_visible = $heart_visible;
    $this->rating_visible = $rating_visible;
    $this->href = $href;
    
  }
  public function render()
  {
?>
<div class="card swiper-slide"  style="width: <?php echo $this->size;?>rem;">
          <?php if ($this->rating_visible === true) {   ?>
                      <span class="ratig-card">
                        <i class="bi bi-star-fill star-icon">
                          <span style="font-size:0.8rem;"><?php echo number_format($this->stars, 1, '.', '');?></span>
                        </i>
                      </span>
          <?php }?>           
                        <img src="<?php echo $this->image_url;?>"  onclick="location.href='<?php echo $this->href;?>'" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title text-center"><?php echo $this->title;?></h5>
                          <div class="card-content">
                            <div class="price">
                              <p class="card-text text-muted mb-1"><small>لكل يوم</small></p>
                              <p class="card-text "><strong>$<?php echo $this->price;?></strong></p>
                            </div>
                            
                            
                            
          <?php if($this->heart_visible === true) { ?> <i class="bi bi-heart" id="icon-to-toggle" onclick="toggleIcon(this)"></i> <?php }?>
                          </div>
                        </div>
                      </div>
<?php  
  }

  
}

?>