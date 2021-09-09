<?php
const TITLE="Admin Control";
include("template\head.php");
?>
<div class="row">
  <div class="col-sm-2">
    <!--right side-->
    <div class="row">
    <div class="card container bg bg-dark text-white">
      <img class="card-img-round" src="../image/banner.png" alt="Card image cap">
      <div class="card-body text-center">
        <h5 class="card-title"><?php
        if(isset($_SESSION['admin']))
          echo $_SESSION['admin'];
        else
          echo "Name:"?></h5>
        <p class="card-text">Admin</p>
      </div>
    </div>
    </div>
    <!-- right side over-->

    <!--admin functions init left section-->
    <?php
    if(isset($_SESSION['admin'])){
      echo '<div class="row bg bg-dark text-white border border-top-white">
      <form action="index.php" method="POST">
        <div class="col container"><label for="home">(1) Home</label><input type="submit" style="display:none" id="home" name="home"></div>
        <div class="col container"><label for="sales">(2) Sales</label><input type="submit" style="display:none;" id="sales" name="sales"></div>
        <div class="col container"><label for="showAllCustomers">(3) Show All Customers</label><input type="submit" style="display:none;" id="showAllCustomers" name="showAllCustomers"></div>
        <div class="col container"><label for="showAllDeliverers">(4) Show All Deliveres</label><input type="submit" style="display:none;" id="showAllDeliverers" name="showAllDeliverers"></div>
        <div class="col container"><label for="showAllRestaurants">(5) Show All Restaurants</label><input type="submit" style="display:none;" id="showAllRestaurants" name="showAllRestaurants"></div>
        <div class="col container"><label for="verifyRestaurants">(6) Verify Restaurants</label><input type="submit" style="display:none;" id="verifyRestaurants" name="verifyRestaurants"></div>
      </form>
      </div>';
    }?>

    <!--admin functions dest.-->
  </div>
  <!--Main panel for normal user starts-->
  <?php if(isset($_SESSION['admin'])){?>
    <div class="col-sm-10 container bg bg-warning text-white">
    <div class="row container">
    <div class="col-sm-10 text-muted display-4 text-center"><h2>Admin Control</h2></div>
    <div class="col-sm-1">
      <form action="logout.php" method="POST">
        <input type="submit" name="logout" value="logout" class="btn btn-outline-light">
      </form>
    </div>
    <?php
      if(isset($_POST['home'])){
        home();
      } elseif(isset($_POST['showAllCustomers'])){
        showAllCustomers();
      } elseif(isset($_POST['sales'])){
        salesForm();
      } elseif(isset($_POST['find'])){
        orderDetails($_POST['month'], $_POST['year']);
      } elseif (isset($_POST['showAllDeliverers'])) {
        showAllDeliverers();
      } elseif (isset($_POST['showAllRestaurants'])) {
        showAllRestaurants();
      } elseif(isset($_POST['verifyRestaurants'])){
        verifyRestaurants();
      } elseif (isset($_POST['verify'])) {
        $rid=$_POST['restaurantId'];
        $query="UPDATE restaurants SET verified=1 WHERE restaurantId=$rid";
        $result=mysqli_query($_SESSION['db']->conobj, $query);
        if($result){
          verifyRestaurants();
        } else{
          echo $rid;
          randomError();
        }
      }
      echo '</div></div>';
  } else{?>
    <div class="col-sm-10 container bg bg-warning text-white">
      <form action="login.php" class="container form-class" method="POST">
        <h1>Admin Login</h1>
        <div class="row">
          <div class="col-sm-3">
            <label for="ud">Amdin: </label>
            <input type="text" name="admin" autocomplete="off">
            <div class="text-color-danger">*incorrect username/password</div>
          </div>
          <div class="col-sm-3">
            <label for="pswd">Password: </label>
            <input type="password" name="pswd" autocomplete="off">
          </div>
          <div class="col-sm-3">
            <input type="submit" name="login" value="Login">
            <a href="reset.php">forgot password?</a>
          </div>
        </div>
      </form>
    </div>';
  <?php }?>
  <!--Main panel for normal user ends-->

  <!--Main panel for amdin RIGHT SECTION-->

  <!--Main panel ends-->

</div>
</div>
</div>
</body>
</html>
