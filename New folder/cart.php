<?php
const TITLE="My Cart";
require_once('head.php');
?>
<!--THE MAIN CART COLUMN-->
<div class="container-fluid">
  <div class="row px-5">
    <div class="col-md-6">
      <?php
      $total = 0;
      if (isset($_SESSION['cart']) and count($_SESSION['cart'])>0){
        echo '<div class="shopping-cart">
        <h6>My Cart</h6>
        <hr>';
        $count=0;
          foreach ($_SESSION['cart'] as $key=>$value){
              $id=$value['productId'];
              $rid=$value['restaurantId'];
              $query="SELECT * FROM menu NATURAL JOIN restaurants WHERE itemId='$id' AND restaurantId='$rid'";
              $result=mysqli_query($_SESSION['db']->conobj, $query);
              $data=mysqli_fetch_array($result, MYSQLI_ASSOC);//bool given means Query result false
              cartElement($data['photo'], $data['nm'].":".$data['itemName'], $data['price'], $data['itemId'], $data['restaurantId'], $value['count']);
              $total+=$data['price']*$value['count'];
          }
          echo '</div>';
          echo '</div>';
          sideBill($total);
          echo '</div>
        </div>
      </div>
      </div>';
         } else{
          echo "<h5>Cart is Empty. <a href='food.php'>Browse</a></h5>";
         }
include('foot.php');
?>
