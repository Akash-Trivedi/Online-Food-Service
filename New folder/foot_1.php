<div class="jumbotron">
  <div class="container">
    <div class="row">
      <div class="col-sm-10">
        logo here
      </div>
      <div class="col-sm-2">
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown button
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </div>
      </div>
    </div>
    <hr class="my-4">
    <div class="row">
      <div class="col-sm-3">
        <h5>About GameToh™</h5>
        <ul>
          <?php
            $query="SELECT * FROM aboutUs WHERE TRUE";
            $result=mysqli_query($_SESSION['db']->conobj, $query);
            while($row=mysqli_fetch_array($result)){
              echo "<li><a href=\"".$row['link']."\">".$row['name']."</a></li>";
            }
          ?>
        </ul>
      </div>
      <div class="col-sm-3">
        <h5>For Foodies</h5>
        <ul>
          <?php
              $query="SELECT * FROM forFoodies WHERE TRUE";
              $result=mysqli_query($_SESSION['db']->conobj, $query);
              while($row=mysqli_fetch_array($result)){
                echo "<li><a href=\"".$row['link']."\">".$row['name']."</a></li>";
              }
            ?>
        </ul>
      </div>
      <div class="col-sm-2">
        <h5>For Restaurants</h5>
        <ul>
          <?php
          $query="SELECT * FROM forRestaurants WHERE TRUE";
          $result=mysqli_query($_SESSION['db']->conobj, $query);
          while($row=mysqli_fetch_array($result)){
            echo "<li><a href=\"".$row['link']."\">".$row['name']."</a></li>";
          }
            ?>
        </ul>
      </div>
      <div class="col-sm-4">
        <h1></h1>&nbsp;
        <ul>
          <?php /*
              for($i=0; $i<sizeof($abtgametoh); $i++){
                echo "<li><a href=\"".$about[$i]['Value']."\">".$about[$i]['Index']."</a></li>";
              }*/
            ?>
          <li>Advertise</li>
          <li>Order</li>
          <li>Book</li>
          <li>Trace</li>
          <li>Hyperpure</li>
        </ul>
      </div>
    </div>
    <hr class="my-4">
    <div class="row">

    </div>
    <hr class="my-4">
    <h6>By continuing past this page, you agree to our Terms of Service, Cookie Policy, Privacy Policy and Content Policies. All trademarks are properties of their respective owners. © 2020-2025 - GameToh™ Media Pvt Ltd. All rights reserved.</h6>
  </div>
</div>
</body>
</html>
