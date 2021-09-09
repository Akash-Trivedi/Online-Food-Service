<?php
  include("head.php");
  if(isset($_POST['login'])){
    if(!empty($_POST['admin']) && !empty($_POST['pswd'])){
      $uid=$_POST['admin'];
      $pswd=$_POST['pswd'];
      $query="SELECT * FROM credentials WHERE adminName='$uid' AND passkey='$pswd'";
      
      if(mysqli_query($dbobj1->conobj, $query)){
        $_SESSION['admin']=$_POST['admin'];
        header("Location: index.php?user=Active");
      } else{
        header("Location: index.php?credentials=invalid");
      }
    } else{
      header("Location: index.php?credentials=empty");
    }
  } else{
    unset($_POST['admin']);
    unset($_POST['pswd']);
    header("Location: index.php?status=new");
  }
 ?>
