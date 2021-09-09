<!-- SuperUser login form -->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Login | Admin</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?= base_url().'css/login.css'  ?>">
    <link href="https://fonts.googleapis.com/css?family=Oxygen:400,300,700" rel="stylesheet" type="text/css"/>
    <link href="https://code.ionicframework.com/ionicons/1.4.1/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
  </head>
  <body style="text-align: center">
    <!-- go back to where it was called -->
  <div class="signin cf">
    <div class="avatar"></div>
    <form class="" action="<?= base_url().'index.php/admin1/Admin1/verifyAdminLogin' ?>" method="post">
      <div class="inputrow">
        <label class="ion-person" for="name"></label>
        <input id="name" type="text" placeholder="Admin" name="usrnm" autocomplete="off" required/>
      </div>
      <div class="inputrow">
        <label class="ion-locked" for="pass"></label>
        <input id="pass" type="password" placeholder="Password" name="pswd" required/>
      </div>
      <input type="submit" value="Login" name="login"/>
    </form>
  </div>

</body>
</html>
