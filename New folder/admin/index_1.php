<?php
  const TITLE="Admin Control";
  include("head.php");
?>
<div class="row">

  <div class="col-sm-2">

    <!--card init-->
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
    <!--card dest.-->

    <!--admin functions init left section-->
    <div class="row bg bg-dark text-white border border-top-white" style="
    <?php if(!isset($_SESSION['admin'])){echo "display: none";}?>">
    <form action="index.php" method="POST">
      <div class="col-sm-12 container"><label for="home">Home</label><input type="submit" style="display:none;" id="home" name="home"></div>
      <div class="col-sm-12 container"><label for="sales">Sales</label><input type="submit" style="display:none;" id="sales" name="sales"></div>
      <div class="col-sm-12 container"><label for="showAllCustomers">Show All Customers</label><input type="submit" style="display:none;" id="showAllCustomers" name="showAllCustomers"></div>
    </form>
    </div>
    <!--admin functions dest.-->
  </div>
  <!--Main panel for normal user starts-->
  <div class="col-sm-10 container bg bg-warning text-white" style="
  <?php if(isset($_SESSION['admin'])){echo "display: none";}?>">

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
  </div>
  <!--Main panel for normal user ends-->

  <!--Main panel for amdin RIGHT SECTION-->
  <div class="col-sm-10 container bg bg-warning text-white" style="
  <?php if(!isset($_SESSION['admin'])){echo "display: none";}?>">
  <div class="row container">
  <div class="col-sm-11"><h2>Admin Control</h2></div>
  <div class="col-sm-1"><form action="logout.php" method="POST"><input type="submit" name="logout" value="logout" class="btn btn-outline-light"></form></div></div>
  <?php
    if(isset($_POST['home'])){
      home();
    } elseif(isset($_POST['showAllCustomers'])){
      showAllCustomers();
    } elseif(isset($_POST['sales'])){
      salesForm();
    } elseif(isset($_POST['find'])){
      orderDetails($_POST['month'], $_POST['year']);
    }
  ?>
  <!--Monthly Orders start-->
</div>

  <!--Main panel ends-->

</div>
</body>
</html>
