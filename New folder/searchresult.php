<?php
    const TITLE="Searched Items";
    include('database/db.php');
    include('precode/header.php');
    include('menubar.php');
    if (isset($_POST['item_to_search']) && strlen($_POST['item_to_search'])>0){?>
      <div class="container">
        <div class="row text-center py-5">
            <?php include('searchlogic.php')?>
        </div>
      </div><?php
    }else{
      echo "<script>window.location='cart.php'</script>";
      }
include('precode/footer.php');?>
    