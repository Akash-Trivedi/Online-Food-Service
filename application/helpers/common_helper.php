<?php
function component($productname, $productprice, $productimg, $productid){
    $element = "
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\" style=\"display:inline-block;\">
        <form action=\"searchresult.php\" method=\"post\">
            <div class=\"card shadow\">
                <div>
                    <img src=\"$productimg\" alt=\"$productimg\" class=\"img-fluid card-img-top\">
                </div>
                <div class=\"card-body\">
                    <h5 class=\"card-title\">$productname</h5>
                    <h5><span class=\"price\">&#x20b9 $productprice</span></h5>
                    <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                        <input type='hidden' name='product_id' value='$productid'>
                </div>
            </div>
        </form>
    </div>
    ";
    echo $element;
}

function countCartItems($count=0){
  foreach ($_SESSION['cart'] as $key => $value) {
    $count+=$value['count'];
  } return $count;
}

function footerAbout($heading, $table){
  echo '<div class="col-sm-3">
    <h5>About GameToh™</h5>
    <ul>';
  $this->load->database();
  $result=$this->db->query("SELECT * FROM $table WHERE TRUE");
  // =mysqli_query($_SESSION['db']->conobj, $query);
  while($row=mysqli_fetch_array($result)){
    echo "<li><a href=\"".$row['link']."\">".$row['name']."</a></li>";
  }
  echo ' </ul></div>';
}
function addNewRestaurant(){
  echo '
    <div class="container">
    <div class="row">
    <div class="col-sm-7 p-3 mb-2">
      <div class="row"><h3>Add a Restaurant</h3></div>
      <div class="row"><h4>Basic info</h4></div>
      <div class="row"><!--form division starts-->
          <form action="addRestaurant.php" method="POST">
            <div class="form-group">
              <label for="r-name">RESTAURANT NAME*</label>
              <input type="text" class="form-control" name="r-name" placeholder="Enter restaurant name..." required="true" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="r-city">CITY*</label>
              <input type="text" class="form-control" name="r-city" placeholder="Restaurant\'s City" required="true">
            </div>
            <div class="form-group">
              <label for="r-city">STATE*</label>
              <input type="text" class="form-control" name="r-state" placeholder="Restaurant\'s State" required="true">
            </div>
            <div class="form-group">
              <label for="r-city">Street*</label>
              <input type="text" class="form-control" name="r-street" placeholder="Example: BhairavNath, Maninagar, Ahmedabad" required="true">
            </div>
            <div class="form-group row">
                <div class="col-sm-5">STD</div>
                <div class="col-sm-7">Contact Number</div>
              </div>
              <div class="form-group row">
                <div class="col-sm-5"><input type="text" size="6" name="std" placeholder="STD" maxlength="6"></div>
                <div class="col-sm-7"><input type="text" name="contact" placeholder="Restaurant contact number..." size="25" maxlength="10"></div>
              </div>
            </div>
            <div class="row"><button type="submit" class="btn btn-success btn-block" name="addrest">Add Restaurant</button></div>
          </form>
          </div><!--form division ends-->

        <div class="col-sm-5">
            <h2>How it works</h2>
            <ul style="padding-left: 18px">
              <li>If you are the owner of a restaurant, or if you are a user who\'s discovered a place not listed on GameToh, let us know using this form.</li><br>
              <li>Once you send the information to us, our awesome content team will verify it. To help speed up the process, please provide a contact number or email address.</li><br>
              <li>That\'s it! Once verified the listing will start appearing on GameToh.</li>
            </ul>
        </div>
      </div>
      </div>
  </div>';
}

function searchItem($id, $rid){
  foreach($_SESSION['cart'] as $key=>$value){
    if($value['productId']==$id && $value['restaurantId']==$rid){
      return $key;
    }
  }
  return -1;
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
      echo '<h1 style="text-align:center;color=red;">Oops1 No Such Product Available Yet!:(</h1>';
      }
  } else{
      ?>
      <h1 style="text-align:center;color=red;">Oops2 No Such Product Available Yet!:(</h1><?php
  }
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
      <div class="col-sm-4"><img src="'.$image.'" style="width: 200px; height: 200px;"></div>
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
  echo '<form action="sendotp.php" method="POST" class="form-inline d-flex justify-content-center md-form form-sm active-purple-2 mt-2" required';
  if(isset($_SESSION['otp'])){
    echo '<label for="otp"> OTP: </label><input type="text" id="otp" name="otp"  class="form-control form-control-sm" autocomplete="offs">';
    echo '<input class="fancy-button" type="submit" value="Login" name="cnfotp">';
  } else{
    echo '<label for="contact"></label><input type="text" id="contact" placeholder="Number" name="contact" autocomplete="off" class="form-control form-control-sm mr-3 w-20" required>';
    echo '<input class="fancy-button" type="submit" value="Send OTP" name="sendotp">';
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
    if($key!=-1){
      unset($_SESSION['cart'][$key]);
    }
  } else{
    unset($_SESSION['cart']);
    header("Location: cart.php");
  }
}

function cartElement($productimg, $productname, $productprice, $productid, $restaurantId, $productcount){
    $element = '
      <div class="border rounded">
        <form action="cart.php?action=remove&id='.$productid.'" method="post" class="cart-items">
          <div class="row bg-white">
              <div class="col-md-3 pl-0">
                  <img src="'.$productimg.'" alt="$productimg" class="img-fluid">
              </div>
              <div class="col-md-6">
                  <h5 class="pt-2">'.$productname.'</h5>
                  <h5 class="pt-2">&#x20b9 '.$productprice.' X '.$productcount.'</h5>
                  <button>for deleting the quantity</button>
                  <button type="submit" class="btn btn-danger mx-2" name="remove">Remove</button>
                  <input type="hidden" name="productId" value="'.$productid.'">
                  <input type="hidden" name="restaurantId" value="'.$restaurantId.'">
              </div>
          </div>
        </form>
      </div>';
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
        echo '<a class="dropdown-item" href="'.$profile['link'].'">'.$profile['name'].'"</a>';
      }
    echo '</div></div>';
}

function teamDisplay($name, $contact, $email, $image){
  $string='<div class="container column">
    <div class="card">
      <img src="'.$image.'" alt="'.$name.'" style="width:100%">
      <div class="container">
        <h2>'.$name.'</h2>
        <p class="title">'.$contact.'</p>
        <p>'.$email.'</p>
      </div>
    </div>
  </div>';
  echo $string;
}

function randomError($errorCode, $codeMessage){
  echo '<div class="text-muted display-2 text-center">$errorCode</div>';
  echo '<div class="text-muted display-5 text-center">$codeMessage</div>';
}

function sideBill($total){
  echo '<!--RIGHT SIDE OF MYCART PAGE, PAYMENT DETAILS-->
  <div class="col-md-5 offset-md-1 border rounded mt-5 bg-white h-25">
    <div class="pt-4">
      <h6>PRICE DETAILS</h6><hr>
      <div class="row price-details">
        <div class="col-md-6">';
        $count=countCartItems();
          echo "<h6>Price for $count item(s)</h6>";
          echo "<h6>Price ($count items)</h6>";
        echo '
          <h6>Delivery Charges</h6><hr>
          <h6>Amount Payable</h6>
        </div>
        <div class="col-md-6"><!--next column-->
        '.$total.'
          <h6>&#x20b9'; echo $total;echo '</h6>';
          if($count>0){
            $charge=50;
            $total>500?($charge=0):NULL;
            $total>500?$text="success":$text="danger";
            echo '<h6 class="text-"'.$text.'"> '.$charge.'</h6>';//&#x20b9 <- to be put when internet available
          } else{
              $charge=0;
              echo '<h6 class="text-success"> '.$charge.'</h6>';//&#x20b9 <- to be put when internet available
          }
          $grand_total=$total+$charge;
          echo '
          <hr>
          <h6>';echo $grand_total;$_SESSION['total']=$grand_total; echo '</h6></br>
        </div>
        <!--Check out button only when cart!empty-->
        ';//&#x20b9
        if($total>0){
          echo '
          <form action="checkout.php" method="POST">
            <div class="col-md-6 border-rounded">
            <input type="hidden" name="amount" value="'.$grand_total.'">
            <button type="submit" class="btn btn-success mx-2" name="remove">CheckOut</button>
            <div>
          </form>
      </div>
    </div>
  </div>
    </div>
    </div>';
}
}

function displayCategories(){
  foreach ($variable as $key => $value) {
    // code...
  }
  echo'
  <div></div>
  ';
}
