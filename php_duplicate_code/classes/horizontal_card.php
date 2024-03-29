<?php
include_once("rating.php");
include_once("render_interface.php");
// include_once("card.php");

class HorizontalCard implements ElementsMethods
{

  public $title, $stars, $price, $description, $shipping, $location, $image, $item_id;
  function __construct($title, $stars, $price, $description, $shipping, $location, $image, $item_id)
  {
    $this->title = $title;
    $this->stars = $stars;
    $this->price = $price;
    $this->description = $description;
    $this->shipping = $shipping;
    $this->location = $location;
    $this->image = $image;
    $this->item_id = $item_id;
  }

  public function render()
  {
?>
    <div class="card mb-2 " onclick="location.href='rent_item.php?item=<?php echo $this->item_id; ?>'">
      <div class="row">
        <div class="col-auto">
          <img src="<?php echo $this->image; ?>" alt="" class="rounded-start" style="
    width: 200px;
    height: 200px;
">
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

            <p class="card-text desc"><?php echo $this->description ?></p>
            <p class="card-text small-text"><small><?php
            if ($this->shipping == 1)
            {
              echo "متاح للتوصيل"; 

            } else {
              echo "غير متاح للتوصيل"; 
            }
            ?>
            </small></p>
            <p class="card-text small-text"><small><?php echo $this->location ?></small></p>
          </div>

        </div>
      </div>
    </div>
<?php
  }
}

?>