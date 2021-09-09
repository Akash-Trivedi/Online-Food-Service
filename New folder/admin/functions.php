<?php
$months=array(
  "January"=>"01", "February"=>"02", "March"=>"03",
  "April"=>"04", "May"=>"05", "June"=>"06",
  "July"=>"07", "August"=>"08", "September"=>"09",
  "October"=>"10", "November"=>"11", "December"=>"12",
);

function randomError($errorCode=404, $codeMessage="Page not found!"){
  echo '
  <div class="row">
  <div class="text-muted display-2 text-center">'.$errorCode.'</div></div>"
  <div class="row">
  <div class="text-muted display-5 text-center">'.$codeMessage.'</div>
  </div></div>';
}

//automated filling from next time, code still under development.
$years=array("2019", "2020", "2021");

function showAllCustomers(){
  $time=12;
  $query="SELECT * FROM customers WHERE TRUE";
  $result=mysqli_query($_SESSION['db']->conobj, $query);
  if($result){
    if(mysqli_num_rows($result)>0){
      echo '
      <div class="row">
      <div class="text-muted display-4 text-center">List of all Customers</div></div>
      <div class="row">
      <table class="table table-hover">
      <thead>
          <tr>
            <th>S No.</th>
            <th>Contact</th>
            <th>Name</th>
            <th>City</th>
            <th>Bio</th>
            <th>Twitter Handle</th>
            <th>Website</th>
            <th>Email</th>
            <th>Date of Creation</th>
          </tr>
        </thead>
        <tbody>';
        for ($i=0; $i < mysqli_num_rows($result); $i++) {
          $about1=mysqli_fetch_array($result, MYSQLI_NUM);
          echo '<tr>';
          for($j=0; $j<9; $j++){
            echo '<td>'.$about1[$j].'</td>';
          }
        }
          echo '
        </tbody>
      </table>
      ';
    } else{
        randomError(0, "No Customers to Show");
      }
    } else{
      echo 'wasted';
    }

  echo '</th></table></form><!--Customer list ends-->';
}

function showAllDeliverers(){
  $time=12;
  $query="SELECT * FROM deliverers WHERE TRUE";
  $result=mysqli_query($_SESSION['db']->conobj, $query);
  if($result){
    if(mysqli_num_rows($result)>0){
      echo '
      <div class="row">
      <div class="text-muted display-4 text-center">List of all Deliverers</div></div>
      <div class="row">
      <table class="table table-hover">
      <thead>
          <tr>
            <th>S No.</th>
            <th>Contact</th>
            <th>Name</th>
            <th>City</th>
            <th>Bio</th>
            <th>Email</th>
            <th>Date of Creation</th>
          </tr>
        </thead>
        <tbody>';
        for ($i=0; $i < mysqli_num_rows($result); $i++) {
          $about1=mysqli_fetch_array($result, MYSQLI_NUM);
          echo '<tr>';
          for($j=0; $j<9; $j++){
            echo '<td>'.$about1[$j].'</td>';
          }
        }
          echo '
        </tbody>
      </table>
      ';
    } else{
        randomError(0,"no Deliverers to Show");
      }
    } else{
      echo 'wasted';
    }

  echo '</th></table></form><!--Customer list ends-->';
}

function showAllRestaurants(){
  $time=12;
  $query="SELECT * FROM restaurants WHERE TRUE";
  $result=mysqli_query($_SESSION['db']->conobj, $query);
  if($result){
    if(mysqli_num_rows($result)>0){
      echo '
      <div class="row">
      <div class="text-muted display-4 text-center">List of all Restaurants</div></div>
      <div class="row">
      <table class="table table-hover">
      <thead>
          <tr>
            <th>S No.</th>
            <th>Name</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Contact</th>
            <th>Date of Request</th>
            <th>Request Action</th>
          </tr>
        </thead>
        <tbody>';
        for ($i=0; $i < mysqli_num_rows($result); $i++) {
          $about1=mysqli_fetch_array($result, MYSQLI_ASSOC);
          $about1['verified']==1?$status="verified":$status="pending";
          $status=="verified"?$color="green":$color="red";
          echo '<tr>';
          echo '<td>'.($i+1).'</td>';
          echo '<td>'.$about1['nm'].'</td>
          <td>'.$about1['street'].'</td>
          <td>'.$about1['city'].'</td>
          <td>'.$about1['rstate'].'</td>
          <td>'.$about1['contact'].'</td>
          <td>'.$about1['request'].'</td>
          <td style="color:'.$color.'">'.$status.'</td>';
          echo '</tr>';
        }
          echo '
        </tbody>
      </table>
      ';
    } else{
        randomError(0, "No Restaurants to show");
      }
    } else{
      echo 'wasted';
    }

  echo '</th></table></form><!--Customer list ends-->';
}

function verifyRestaurants(){
  $time=12;
  $query="SELECT * FROM restaurants WHERE verified=0";
  $result=mysqli_query($_SESSION['db']->conobj, $query);
  if($result){
    if(mysqli_num_rows($result)>0){
      echo '
      <div class="row">
      <div class="text-muted display-4 text-center">List of all Restaurants to Verify.</div></div>
      <div class="row">
      <table class="table table-hover">
      <thead>
          <tr>
            <th>S No.</th>
            <th>Name</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Contact</th>
            <th>Date of Request</th>
            <th>Request Action</th>
          </tr>
        </thead>
        <tbody>';
        for ($i=0; $i < mysqli_num_rows($result); $i++) {
          $about1=mysqli_fetch_array($result, MYSQLI_ASSOC);
          echo '<tr>';
          echo '<td>'.($i+1).'</td>';
          echo '<td>'.$about1['nm'].'</td>
          <td>'.$about1['street'].'</td>
          <td>'.$about1['city'].'</td>
          <td>'.$about1['rstate'].'</td>
          <td>'.$about1['contact'].'</td>
          <td>'.$about1['request'].'</td>
          <td>pending</td>';
          echo '<td>';
          echo '<form action="index.php" method="POST">
            <input type="hidden" name="restaurantId" value="'.$about1['restaurantId'].'">
            <input type="submit" name="verify" value="verify">
          </form>';
          echo '</td>';
          echo '</tr>';
        }
          echo '
        </tbody>
      </table>
      ';
    } else{
      randomError(0, "No Restaurants to Verify.");
      }
    } else{
      echo 'wasted';
    }

  echo '</th></table></form><!--Customer list ends-->';
}

function home(){
  echo 'All Admin Details will be displayed here.';
}

function salesForm(){
  global $months, $years;
  echo '
  <div class="row">
  <form class="form-class" action="index.php" method="POST">
    <p><span style="color:black;"><u>Check Monthly Sales</u> : </span>select Year
    <select class="years" name="year">';
  for($i=0; $i<sizeof($years); $i++){
    echo '<option value="'.$years[$i].'">'.$years[$i].'</option>';
  }
  echo '</select>select month<select class="months" name="month">';
    foreach ($months as $key => $value) {
      echo '<option value="'.$value.'">'.$key.'</option>';
    }
    echo '</select><input type="submit" name="find" value="Find!"></form></div>';
}

function orderDetails($month, $year){
  salesForm();
  echo '<table><th>Orders for ';
  echo $month."-".$year;
  $date=$year.'-'.$month.'-20';
  $query="SELECT * FROM orderSummary NATURAL JOIN customers, restaurants WHERE dateOfOrder='$date' AND orderSummary.customerId=customers.customerId AND orderSummary.restaurantId=restaurants.restaurantId";
  $result=mysqli_query($_SESSION['db']->conobj, $query);
  if($result){
    if(mysqli_num_rows($result)>0){
      echo '<table class="table table-hover"><thead><tr>
      <th>S No.</th>
      <th>OrderId</th>
      <th>UserName</th>
      <th>ProductName</th>
      <th>Restaurant Name</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>DateOfOrder</th>
      <th>TimeOfOrder</th>
      </tr>
      </thead>
      <tbody>';
      for ($i=0; $i < mysqli_num_rows($result); $i++){
        $about1=mysqli_fetch_array($result, MYSQLI_ASSOC);
        echo "<tr>
        <td>".($i+1)."</td>
          <td>".$about1['orderId']."</td><td>".$about1['fullName']."</td>
          <td>".$about1['productName']."</td><td>".$about1['nm']."</td>
          <td>".$about1['price']."</td><td>".$about1['quantity']."</td>
          <td>".$about1['dateOfOrder']."</td><td>".$about1['timeOfOrder']."</td>
        </tr>";
      }
      echo "</tbody></table>";
    } else{
      echo "</br>No records Found";
    }
  } else{
    echo "</br>Internal Error.";
  }
  echo '</th>
  </table>';
}
?>
