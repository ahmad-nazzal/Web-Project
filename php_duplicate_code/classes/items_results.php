<?php
include_once("render_interface.php");
include_once("card.php");
include_once("pagination.php");



class SearchResults implements ElementsMethods{
  
  public $user_input,$page_num,$city_input, $shipping, $local_pickup, $cash_method, $credit_method;
  
  public function __construct($user_input,$page_num,$city_input, $shipping, $local_pickup, $cash_method, $credit_method)
  {
    $this->user_input = $user_input;
    $this->page_num = $page_num;
    $this->city_input = $city_input;
    $this->shipping = $shipping;
    $this->local_pickup = $local_pickup;
    $this->cash_method = $cash_method;
    $this->credit_method = $credit_method;
  }


  public function render()
  {
    $result = $this->executeQuery();

    for ($i = 0; $i < $result->num_rows ; $i++)
          {
            $row = $result->fetch_object();

            $card =  new Card($row);
            $card->render();
            unset($card);
         }
         
    $pagination = new Pagination($this->user_input, $this->page_num, $result->num_rows);
    $pagination->render();
    unset($pagination);

  }


  public function executeQuery()
  {
    $db = new mysqli("localhost", "root", "", "web_project_agar");
        if (isset($db))
        {             
          $query = 
          ' 
          select title, price_per_day as price, rate.stars, description, shipping,local_pickup, cash_method, credit_method, location
          from items
          inner join (select avg(rating) as stars, item_id from reviews group by item_id) rate on items.id = rate.item_id
          
          where items.title like "%'.$this->user_input.'%" 
          and items.shipping ='.$this->shipping.'
          and items.local_pickup='.$this->local_pickup.'
          and items.cash_method ='.$this->cash_method.'
          and items.credit_method='.$this->credit_method.'
          and location like "%'.$this->city_input.'%"
          or items.description like "%'.$this->user_input.'%"
           LIMIT 7 OFFSET '.($this->page_num*7).';';

          $result = $db->query($query);
          if ($this->page_num > (int)$result->num_rows/7) {
            $this->page_num = $result->num_rows/7;
          }
          return $result;
        }
        return null;
}

}

?>