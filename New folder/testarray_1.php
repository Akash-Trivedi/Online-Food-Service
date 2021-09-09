<?php
$r=array();
print_r($r);echo "<br>";
$a=array("Akash"=>"Trivedi");
print_r($a);echo "<br>";
$s=array("Age"=>23);
print_r($s);echo "<br>";
$r[0]=$a;
print_r($r);echo "<br>";
$r[0]["Akash"]=$s;
print_r($r);echo "<br>";
echo $r[0]['Akash']['Age'];
function keep_track() {
  STATIC $count = 0;
  $count++;
  print $count;
  print "<br />";
}

keep_track();
keep_track();
keep_track();
?>