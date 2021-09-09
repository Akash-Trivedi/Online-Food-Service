<?php
  session_start();
  if(isset($_POST['logout'])){
    unset($_SESSION['admin']);
    header("Location: index.php?logout=True");
  } else{
    header("Location: index.php?cantTrack");
  }
?>