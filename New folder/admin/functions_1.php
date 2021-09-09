<?php
$months=array(
  "January"=>"01", "February"=>"02", "March"=>"03",
  "April"=>"04", "May"=>"05", "June"=>"06",
  "July"=>"07", "August"=>"08", "September"=>"09",
  "October"=>"10", "November"=>"11", "December"=>"12",
);

//automated filling from next time, code still under development.
$years=array("2019", "2020", "2021");
function showAllCustomers(){    
  $time=12;
  $query="SELECT * FROM customers WHERE 1";
  $result=mysqli_query($_SESSION['db1']->conobj, $query);
  if($result){
    if(mysqli_num_rows($result)>0){
      echo '
      <table class="table table-hover">
      <thead>
          <tr>
            <th>UserId</th>
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
        $query="SELECT * FROM customers WHERE TRUE";
        $result=mysqli_query($_SESSION['db1']->conobj, $query);
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
        echo '</br>No records Found';
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
    echo '</select><input type="submit" name="find" value="Find!"></form>';
}

function orderDetails($month, $year){
  salesForm();
  echo '<table><th>Orders for ';
  echo $month."-".$year;
  $date=$year.'-'.$month.'-20';
  $query="SELECT * FROM orderSummary WHERE dateOfOrder='$date'";
  $result=mysqli_query($_SESSION['db1']->conobj, $query);
  if($result){
    if(mysqli_num_rows($result)>0){
      echo '<table class="table table-hover"><thead><tr><th>OrderId</th>
      <th>UserId</th>
      <th>ProductName</th>
      <th>RestaurantId</th>
      <th>Price</th>
      <th>Quantity</th>
      <th>DateOfOrder</th>
      <th>TimeOfOrder</th>
      </tr>
      </thead>
      <tbody>';
      for ($i=0; $i < mysqli_num_rows($result); $i++){
        $about1=mysqli_fetch_array($result, MYSQLI_NUM);
        echo "<tr>
          <td>$about1[2]</td><td>$about1[1]</td>
          <td>$about1[0]</td><td>$about1[5]</td>
          <td>$about1[3]</td><td>$about1[4]</td>
          <td>$about1[6]</td><td>$about1[7]</td>
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