<?php
const TITLE="My Cart";
require_once ('head.php');
if (isset($_POST['remove'])){//working fine
  removeFromCart($_POST['productId'], $_POST['restaurantId']);
  /*
    foreach ($_SESSION['cart'] as $key => $value){
        if($value["product_id"] == $_GET['id']){
            unset($_SESSION['cart'][$key]);
            echo "<script>window.location = 'cart.php'</script>";
        }
    }*/
}
?>
<!--THE MAIN CART COLUMN-->
<div class="container-fluid">
  <div class="row px-5">
    <div class="col-md-6">
      <div class="shopping-cart">
      <h6>My Cart</h6>
      <hr>
      <?php
      $total = 0;
      if (isset($_SESSION['cart']) and count($_SESSION['cart'])>0){
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
         } else{
          echo "<h5>Cart is Empty</h5>";
         }?>
      </div>
    </div>
      
    <!--RIGHT SIDE OF MYCART PAGE, PAYMENT DETAILS-->
    <div class="col-md-5 offset-md-1 border rounded mt-5 bg-white h-25">
      <div class="pt-4">
        <h6>PRICE DETAILS</h6>
        <hr>
        <div class="row price-details">
          <div class="col-md-6">
            <?php
            $count=0;
            if (isset($_SESSION['cart'])){
              foreach ($_SESSION['cart'] as $key => $value) {
                $count+=$value['count'];
              }
              echo "<h6>Price for $count item(s)</h6>";
            }else{
              foreach ($_SESSION['cart'] as $key => $value) {
                $count+=$value['count'];
              }
              echo "<h6>Price ($count items)</h6>";
            }
            ?>
            <h6>Delivery Charges</h6>
            <hr>
            <h6>Amount Payable</h6>
          </div>
          <div class="col-md-6"><!--next column-->
            <h6>&#x20b9 <?php echo $total; ?></h6>
            <?php
            if($count>0){
              $charge=50;
              $total>500?($charge=0):NULL;
              $total>500?$text="success":$text="danger";
              echo "<h6 class='text-".$text."'>&#x20b9 $charge</h6>";    
            } else{
                $charge=0;
                echo "<h6 class='text-success'>&#x20b9 $charge</h6>";
            }
            $grand_total=$total+$charge;
            ?>
            <hr>
            <h6>&#x20b9 <?php echo $grand_total;$_SESSION['total']=$grand_total; ?></h6></br>
          </div>
          <!--Check out button only when cart!empty-->
          <?php
          if($total>0){?>
            <form action="checkout.php" method="POST">
              <div class="col-md-6 border-rounded">
              <input type="hidden" name="amount" value="<?php echo $grand_total?>">
              <button type="submit" class="btn btn-success mx-2" name="remove">CheckOut</button>
              <div>
            </form>
          <?php }?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
    include('foot.php');
?>
