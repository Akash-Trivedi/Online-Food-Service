<?php
const TITLE="ContactUs";
include("head.php")?>
<html>
<link rel = "stylesheet" href= "css/aboutus.css">
<body>
<div class="about-section">
  <h1>About Us</h1>
  <p>Gametoh - A Food Ordering System</p>
  <p>We deliver for you!<p>
</div>
<?php
$query="SELECT * FROM team WHERE TRUE";
$result=mysqli_query($_SESSION['db']->conobj, $query);
if($result){
  echo '<h2 style="text-align:center">Our Team</h2>
  <div class="row">';
  $row=mysqli_fetch_all($result, MYSQLI_ASSOC);
  foreach ($row as $key => $value) {
    teamDisplay($value['memberName'], $value['contactNumber'], $value['email'], $value['profileImage']);
  }
  echo '</div>';
} else{
  randomError("Error 404", "Page Not Found");
}
?>
<?php
include("foot.php")?>
