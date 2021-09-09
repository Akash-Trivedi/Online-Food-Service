 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <title></title>
  <style media="screen">
    .fancy-button{
      background: transparent;
      border-radius: 4px;
      border: 1px solid white;
      color: white;
    }
  </style>
</head>
<body>
<header>
  <div class="row page-header bg-warning container-fluid">
  <div class="col-sm-2">
    <a href="<?=base_url().'index.php/Welcome'?>">
      <img src=<?=base_url().'image/logo.png'?> alt="altimg">
    </a>
  </div>

  <div class="col-sm-4 searchbox"><!--search bar-->
    <form  action="<?=base_url().'index.php/Welcome/search'?>" method="POST" class="form-inline d-flex justify-content-center md-form form-sm active-purple-2 mt-2">
      <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search" name="item"
        aria-label="Search" autocomplete="off" required>
        <input class="fancy-button" type="submit" name="searchArg" value="Search">
    </form>
  </div>

  <div class="col-sm-6 bg-warning">
  <?php
    if(!isset($_SESSION['user'])){//when not logged in.
      loginForm();
    } else{//when logged in.
      userLog();
    }
  ?>
  </div>
  <?php
  if(isset($_SESSION['cart'])){
    echo '<div style="display: inline-block;" class="col-sm-1 bg-warning" id="navbarNavAltMarkup"><!--My Cart-->
      <div class="mr-auto"></div>
        <div class="navbar-nav">
          <a href="cart.php" class="nav-item nav-link active">
            <h5 class="px-5 cart">
                <i class="fas fa-shopping-cart"></i>';
                $count = count($_SESSION['cart']);
                echo '<span id="cart_count" class="text-warning bg-light">'.$count.'</span>';
                echo '
            </h5>
            </a>
        </div>
      </div>';
  } else{
    $count=0;
  } ?>

  </div>
  <script type="text/javascript">
  if((document.getElementById('cart_count')).innerHTML==0){
    (document.getElementById('navbarNavAltMarkup')).style.display="none";
  }
  </script>
</header>
