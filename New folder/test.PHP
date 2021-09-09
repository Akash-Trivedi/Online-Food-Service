<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <p id="score">20</p>
    <form class="" action="test.php" method="post">
      <input id="score1" type="hidden" name="value" value="">
      <script type="text/javascript">
      var a = document.getElementById("score");
        var b=document.getElementById("score1");
        b.value=a.innerHTML;
      </script>
      <input type="submit" name="submit" value="">
    </form>
  </body>
</html>
<?php
if(isset($_POST['submit'])){
  echo "This is form data -> ".$_POST['value'];
}
?>
