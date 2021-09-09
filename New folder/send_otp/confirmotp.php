<?php
session_start();
function checkUser($number){//check user in database
  global $dbobj;
  $query="SELECT * FROM customers WHERE contact='$number'";
  $result=mysqli_query($dbobj->conobj, $query);
  $numrows=mysqli_num_rows($result);
  echo $numrows;
  return $numrows==1?TRUE:FALSE;
}

function confirmOTP(){
  global $dbobj;
  if(isset($_POST['cnfotp'])){
    if($_POST['otp']==$_SESSION['otp']){
      unset($_POST['otp']);
      $_SESSION['user']=$_SESSION['contact'];
      if(!checkUser($_SESSION['contact'])){
        $number=$_SESSION['contact'];
        $query="INSERT INTO customers(contact) VALUES ($number)";
        if(mysqli_query($dbobj->conobj, $query)){
          header("Location: ../index.php?login=true|user created");
        } else{
          header("Location: ../index.php?login=true|user not created");
        }
      } else{
        header("Location: ../index.php?login=true");
      }
    } else{
      header("Location: ../index.php?otp=false");
    } 
  } else{
    header("Location: ../index.php?otp=false");
  }
}