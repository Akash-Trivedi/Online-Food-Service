<?php
const TITLE="Restaurants";
include("../head.php");?>
<div class="jumbotron">
  <div class="container border">
    <div class="row">
      <div class="col-sm-6 bg-white border border-dark"><!--start items block container-->
        <?php
        if(isset($_POST['item'])&&strlen($_POST['item'])>0){
          if(searchFood($_POST['item'])!=-1){
            foreach ($_SESSION['search'] as $key => $row1) {
              printMenu($row1['itemId'], $row1['restaurantId'], $row1['itemName'], $row1['photo'], $row1['price'],$row1['nm'], $row1['street']);
            }
            unset($_POST['item']);
          }
        } else{
          $query="SELECT * FROM menu NATURAL JOIN restaurants WHERE TRUE";
          $result=mysqli_query($_SESSION['db']->conobj, $query);
          $count=mysqli_num_rows($result);
          while($count){
            $row1=mysqli_fetch_array($result, MYSQLI_ASSOC);
            printMenu($row1['itemId'], $row1['restaurantId'], $row1['itemName'], $row1['photo'], $row1['price'],$row1['nm'], $row1['street']);
            $count--;
          }
        ?>
      <div>
	  <!--end items block container-->	
	<div class="row">
		<div class="col-md-4" style="color:grey; font-size:16px;"><!--Coding of random restaurant-->	
		</div>
	</div>
    </div>	
</div>
</div>
      <?php }
      include("../foot.php") ?>
