<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <title><?php echo TITLE?></title>
</head>
<body>
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
        <!-- LOGOUT -->
        <div class="row">
          <form class="col-sm-12" action="<?=base_url().'index.php/Admin1/Dashboard/logout'?>" method="post">
            <input class="col-sm-12" type="submit" name="logout" value="Logout">
          </form>
        </div>
      </div>

      <!-- right side over-->

      <!--admin functions init left section-->
      <div class="row bg bg-dark text-white border border-top-white">
        <form action="<?=base_url().'index.php/admin1/Dashboard/divert'?>" method="POST">
          <div class="col container">
            <label for="home">(1) Home</label>
            <input type="submit" style="display:none" id="home" name="page" value="dashboard">
          </div>
          <div class="col container">
            <label for="sales">(2) Sales</label>
            <input type="submit" style="display:none;" id="sales" name="page" value="sales">
          </div>
          <div class="col container">
            <label for="showAllCustomers">(3) Show All Customers</label>
            <input type="submit" style="display:none;" id="showAllCustomers" name="page" value="customers">
          </div>
          <div class="col container">
            <label for="showAllDeliverers">(4) Show All Deliveres</label>
            <input type="submit" style="display:none;" id="showAllDeliverers" name="page" value="deliverers">
          </div>
          <div class="col container">
            <label for="showAllRestaurants">(5) Show All Restaurants</label>
            <input type="submit" style="display:none;" id="showAllRestaurants" name="page" value="restaurants">
          </div>
          <div class="col container">
            <label for="verifyRestaurants">(6) Verify Restaurants</label>
            <input type="submit" style="display:none;" id="verifyRestaurants" name="page" value="verifyRestaurants">
          </div>
        </form>
      </div>

      <!--admin functions dest.-->
    </div>

    <!--Main panel for normal user starts-->
      <div class="col-sm-10 container bg bg-warning text-white">
      <div class="row container">
        <div class="col-sm-10 text-muted display-4 text-center"><h2>Admin Control</h2>
      </div>
