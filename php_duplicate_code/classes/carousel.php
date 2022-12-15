<?php
include_once("render_interface.php");




class Carousel implements ElementsMethods
{


  public $width, $title, $text, $result, $height;

  public function __construct($width, $height, $title, $text, $images)
  {
    $this->width = $width;
    $this->title = $title;
    $this->text = $text;
    $this->images = $images;
    $this->height = $height;
  }
  public function render()
  {
?>
    <div id="demo" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="9000" style="width: <?php echo $this->width; ?>px; height: <?php echo $this->height; ?>px;">
      <div class="carousel-indicators">
        <?php
        for ($i = 0; $i < count($this->images); $i++) {

        ?>
          <button type="button" data-bs-target="#demo" data-bs-slide-to="<?php echo $i; ?>" class="<?php echo (($i == 0) ? "active" : ""); ?> bg-black"></button>

        <?php

        }

        ?>
      </div>
      <div class="carousel-inner">
        <?php
        for ($i = 0; $i < count($this->images); $i++) {

        ?>
          <div class="carousel-item active" id="page-<?php echo $i; ?>">
            <img id="img1" src="<?php echo $this->images[$i]; ?> " alt="Los Angeles" class="d-block img" style="width: <?php echo $this->width; ?>px; height: <?php echo $this->height; ?>px;" />
            <div class="carousel-caption">


              <h3><?php echo ($this->title); ?></h3>
              <h1><?php echo ($this->text); ?></h1>
            </div>
          </div>
        <?php
        }
        ?>

      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>

<?php
  }
}
?>