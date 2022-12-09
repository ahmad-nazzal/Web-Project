<?php
include_once("render_interface.php");

class Pagination implements ElementsMethods
{
  public $user_input;
  public $page_num;
  public $num_rows;

  public function __construct($user_input, $page_num, $num_rows)
  {
    $this->user_input = $user_input;
    $this->page_num = $page_num;
    $this->num_rows = $num_rows;
  }

  public function render()
  {
    ?>
<section>
      <ul class="pagination modal-3 justify-content-center mt-3">
        <li class= "page-item">
        <a href="search-results.php?search-field=<?php echo $this->user_input?>&page-num=<?php echo $this->page_num-1;?>"  class ="page-link">

            <i class="bi bi-caret-right-fill"></i>
          </a>
        </li>
        <?php 
          for ($k = 0; $k < ($this->num_rows / 7) ; $k++)
          {

        ?>
        <li class= "page-item"><a href="search-results.php?search-field=<?php echo $this->user_input?>&page-num=<?php echo $k;?>"  class ="page-link"><?php echo $k+1;?></a></li>
        
        <?php 
          }
        
      
      ?>
        <li class= "page-item">
          <a href="search-results.php?search-field=<?php echo $this->user_input?>&page-num=<?php echo $this->page_num+1;?>"  class ="page-link">
            <i class="bi bi-caret-left-fill"></i>  
          </a>
        </li>
      </ul>
    </section>
<?php
  }
}
?>
  



      




