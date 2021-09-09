<?php 
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
require_once("database/db.php");
require_once("functions.php");
$dbobj=new Connect_db();
$dbobj->connect("GameToh");
$_SESSION['db']=$dbobj;

if (isset($_POST['add'])){/*when add pressed*/
  addToCart($_POST['productId'], $_POST['restaurantId']);
  //unset($_POST['add']);
}
else
{
  //unset($_POST['add']);
}?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <title><?php echo TITLE?></title>
</head>
<body>
<header>
  <div class="row page-header bg-danger">
  <div class="col-sm-2"><a href="index.php"><img src="image/logo.png" alt="altimg"></a></div>
  <div class="col-sm-5">
  <div class="searchbox">
    <form action="index.php" method="POST"><!--Search Bar-->
      <input type="text" name="item" placeholder="Food">
      <button type="submit"><i class ="fa fa-search"></i></button>
    </form>
  </div>
  </div>
  <div class="col-sm-4 bg-danger">
  <?php
    if(!isset($_SESSION['user'])){//when not logged in.
      loginForm();
    } else{//when logged in.
      userLog();
    }
  ?>
  </div>
  <div class="col-sm-1 bg-danger" id="navbarNavAltMarkup"><!--My Cart-->
    <div class="mr-auto"></div>
      <div class="navbar-nav">
        <a href="../cart.php" class="nav-item nav-link active">
          <h5 class="px-5 cart">
              <i class="fas fa-shopping-cart"></i>
              <?php
              if (isset($_SESSION['cart'])){
                  $count = count($_SESSION['cart']);
                  
              } else{
                  $count=0;
              }
              echo '<span id="cart_count" class="text-warning bg-light">'.$count.'</span>';
              ?>
          </h5>
          </a>
      </div>
    </div>
  </div>
</header>