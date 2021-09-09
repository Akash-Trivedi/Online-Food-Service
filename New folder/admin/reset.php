<?php
  const TITLE="Password Reset";
  include("../head.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="form-class" action="reset.php" method="post">
      <input type="text" name="admin" value="">
      <input type="text" name="pswd" placeholder="new passwrod">
      <input type="submit" name="save" value="change">
    </form>
  </body>
</html>
<?php
  if(isset($_POST['save'])){
    global $dbobj1;
    $new=$_POST['pswd'];
    $uid=$_POST['admin'];
    $query="UPDATE credentials SET passkey='$new' WHERE adminName='$uid'";
    if(mysqli_query($dbobj1->conobj, $query)){
      header("Location: index.php?passwrod=updated");
    } else{
      header("Location: index.php?status=cannot change password");
    }
  } else{
      //header("Location: index.php?status=unchanged");
  }
?>
