<?php
include_once("rating.php");
include_once("render_interface.php");
// include_once("card.php");

class HorizontalCard implements ElementsMethods
{

  public $title, $stars, $price, $description, $shipping, $location;
  function __construct($title, $stars, $price, $description, $shipping, $location)
  {
    $this->title = $title;
    $this->stars = $stars;
    $this->price = $price;
    $this->description = $description;
    $this->shipping = $shipping;
    $this->location = $location;
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
                <h4 class="card-title"><?php echo $this->title; ?></h4>

                <?php
                $rating = new Rating(round($this->stars, 2));
                $rating->render();
                ?>
              </div>
              <p class="price"><strong><?php echo $this->price ?>$</strong></p>
            </div>

            <p class="card-text"><?php echo $this->description ?></p>
            <p class="card-text"><small><?php echo $this->shipping ?></small></p>
            <p class="card-text"><small><?php echo $this->location ?></small></p>
          </div>

        </div>
      </div>
    </div>
<?php
  }
}

?>