<?php
function searchItem($id, $rid){
  foreach($_SESSION['cart'] as $key=>$value){
    if($value['productId']==$id && $value['restaurantId']==$rid){
      return $key;
    }
  }
  return -1;
}
function getArray($table, &$profile){
  global $dbobj1;
  $query="SELECT * FROM userPrivilages WHERE 1";
  $result=mysqli_query($_SESSION['db']->conobj, $query);
  return mysqli_fetch_array($result, MYSQLI_ASSOC);
}

function printMenu($id, $rid, $name, $image, $price, $rnm, $addr){
  $menu='
  <form action="#" method="POST">
  <div class="row container"><!--individual container-->
    <div class="row border border-bottom-danger rounded container"><!--first row-->
      <div class="col-sm-4"><img src="../'.$image.'" style="width: 200px; height: 200px;"></div>
      <div class="col-sm-6">
        <div class="row"><h6>'.$rnm.'</h6></div>
        <div class="row"><div class="text-danger text-capitalize h3 font-weight-bolder">'.$rnm.'</div></div>
        <div class="row"><h6>STREET</h6></div>
        <div class="row"><h6>'.$addr.'</h6></div>
      </div>
      <div class="col-sm-2"><h6>RATING VOTE COUNT</h6></div>
    </div>
    <div class="row container"><!--first row over & second row-->
      <div class="col-md-4 text-secondary text-">CUISINES:</div>
      <div class="col-md-8"><h6>'.$name.'</h6></div>
    </div><!--second row over and third row starts-->
    <div class="row container">
      <div class="col-sm-4 text-secondary"><h6>COST FOR TWO:</h6></div>
      <div class="col-sm-8"><h6>'.$price.'</h6></div>
    </div><!--third row over and fourth row starts-->
    <div class="row container">
      <div class="col-sm-4 text-secondary"><h6>HOURS:</h6></div>
      <div class="col-sm-8"><h6>11am-11:30pm (Mon-Sun)</h6></div>
    </div>
    <div class="row container border border-bottom dark text-center">
      <div class="col p-3 border border-dark"><h6><i class="fa fa-phone" aria-hidden="true"></i> Call</h6></div>
      <div class="col p-3 border border-dark"><h6><i class="fa fa-list" aria-hidden="true"></i> View-menu</h6></div>
      <input type="hidden" name="productId" value="'.$id.'">
      <input type="hidden" name="restaurantId" value="'.$rid.'">
      <button type="submit" class="btn btn-warning my-3" name="add">Add to Cart <i class="fas fa-shopping-cart"></i></button>
    </div>
    </div><!--individual container ends--></form>';
    echo $menu;
}

function loginForm(){
  echo '<form action="send_otp/sendotp.php" method="POST">';
  if(isset($_SESSION['otp'])){
    echo 'OTP for '.$_SESSION["contact"];
    echo '<label for="otp"> OTP: </label><input type="text" id="otp" name="otp">';
    echo '<input type="submit" value="Login" name="cnfotp">';
  } else{
    echo '<label for="contact">Contact No.: </label><input type="text" id="contact" name="contact">';
    echo '<input type="submit" value="Send OTP" name="sendotp">';
  }
  echo '</form>';
}

function addToCart($id, $rid){
  if(isset($_SESSION['cart'])){
    $key=searchItem($id, $rid);
    if($key==-1){//if use false then error, beacuse we cannot print or use false.
      $item_array = array(
        'productId'=>$id,
        'restaurantId'=>$rid,
        'count'=>1
      );
      $count=sizeof($_SESSION['cart']);
      $_SESSION['cart'][$count]=$item_array;
    } else{
      $_SESSION['cart'][$key]['count']+=1;
      unset($key);
      header("Location: index.php");
    }
  } else{
    $item_array = array(
                'productId'=>$id,
                'restaurantId'=>$rid,
                'count'=>1
        );
    $_SESSION['cart'][0]=$item_array;
  }
  return TRUE;
}

function removeFromCart($id, $rid){
  if(isset($_SESSION['cart'])){
    $key=searchItem($id, $rid);
    if($key!=FALSE){
      unset($_SESSION['cart']);
    }
  } else{
    unset($_SESSION['cart']);
    header("Location: cart.php");
  }
}

function cartElement($productimg, $productname, $productprice, $productid, $restaurantId, $productcount){
    $element = "
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
      <div class=\"border rounded\">
          <div class=\"row bg-white\">
              <div class=\"col-md-3 pl-0\">
                  <img src=$productimg alt=\"$productimg\" class=\"img-fluid\">
              </div>
              <div class=\"col-md-6\">
                  <h5 class=\"pt-2\">$productname</h5>
                  <h5 class=\"pt-2\">&#x20b9 $productprice X $productcount</h5>
                  <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                  <input type='hidden' name='productId' value='$productid'>
                  <input type='hidden' name='restaurantId' value='$restaurantId'>
              </div>
          </div>
      </div>
    </form>
    
    ";
    echo  $element;
}

function userLog(){
  echo '
    <div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle pull-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <div class="card link right" style="width: 8rem;"></div>
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
      $table='userPrivilages';
      $query="SELECT * FROM userPrivilages WHERE 1";
      $result=mysqli_query($_SESSION['db']->conobj, $query);
      while($profile=mysqli_fetch_array($result)){
        echo "<a class=\"dropdown-item\" href=\"".$profile['link']."\">".$profile['name']."</a>";
      }
    echo '</div></div>';
}

function searchFood($item){
  $product=strtolower($item);
  $query="SELECT * FROM menu NATURAL JOIN restaurants WHERE TRUE";
  $result=mysqli_query($_SESSION['db']->conobj, $query);
  $array=mysqli_fetch_all($result, MYSQLI_ASSOC);//(Procedural Style)Every row is now transfered as array in $array
  if(count($array)>0){
      $count=0;
      $index=0;
      foreach ($array as $data){
        //To Check if the Data was Found or Not(searching comapny/full product name wise)
        if(strtolower($data['itemName'])==$product || strtolower($data['nm'])==$product || stristr(($data['itemName']),$product) || stristr(($data['nm']),$product) ){
          $_SESSION['search'][$index]=$data;
          $index++;
        }else{
          $count+=1;
        }
      }
      if($count==count($array)){
        return -1;
      echo "<h1 style='text-align:center;color=red;'>Oops1 No Such Product Available Yet!:(</h1>";
      }
  } else{
      ?>
      <h1 style="text-align:center;color=red;">Oops2 No Such Product Available Yet!:(</h1><?php
  }
}