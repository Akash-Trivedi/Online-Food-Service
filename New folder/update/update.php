<?php
  include("../head.php");
  if(isset($_POST['sub']) && isset($_SESSION['uid'])){
    global $user;
    for($i=0; $i<sizeof($user->value); $i++){
      $user->value[$i]=$_POST["$i"];
    }
  } else{
    header("Location: index.php?fatalerror");
  }
?>