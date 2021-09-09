<?php
  include("../head.php");
  if(isset($_POST['addrest'])){
    $rname=$_POST['r-name'];
    $rstreet=$_POST['r-street'];
    $rcity=$_POST['r-city'];
    $rstate=$_POST['r-state'];
    $rstd=$_POST['std'];
    $rcontact=$_POST['contact'];
    $ver=1;
    $query="INSERT INTO restaurants(contact, nm, street, city, rstate, verified, std) VALUES('$rcontact','$rname','$rstreet','$rcity','$rstate','$ver','$rstd')";
    if(mysqli_query($dbobj->conobj, $query)){
      header("Location: index.php?request=pending");
    } else{
      header("Location: index.php?request=not send");
    }
  } else{
    header("Location: index.php?status=Nan");
  }
?>