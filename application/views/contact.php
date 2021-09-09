<?php
const TITLE="ContactUs";
include_once("head.php");
?>
<html>
<?php
if(isset($_POST['sendEmail'])){
  $name=$_POST['name'];$email=$_POST['email'];$subject=$_POST['subject'];
  $query="SELECT customerId FROM customers WHERE fullname='$name' AND email='$email'";
  $result=mysqli_query($_SESSION['db']->conobj, $query);
  if($result){
    $users=mysqli_fetch_all($result, MYSQLI_ASSOC);
    $id=$users[0]['customerId'];
    $query="INSERT INTO contactus VALUES('', '$id', '$subject', '', '')";
    if(mysqli_query($_SESSION['db']->conobj, $query)){
      header("Location: contactUs.php?success");
    } else{
      header("Location: contactUs.php?send=fail");
    }
  } else{
    header("Location: contactUs.php?user=Invalid");
  }
} else{
  echo '
  <link rel="stylesheet" href= "css/contactus.css">
  <div class="container">
  <div style="text-align:center"><h2>Contact Us</h2></div>
    <div class="row">
    <div class="column"><img src="image/fooddefault.png" style="width:100%"></div>
    <div class="column">
      <form action="contactUs.php" method="POST">
        <label for="fname">Full Name</label>
        <input type="text" id="name" name="name" placeholder="Your name.." required>
       	<label for="email">Email</label>
        <input type="text" id="email" name="email" placeholder="Your email.." required>
        <label for="subject">Subject</label>
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px" required></textarea>
        <input type="submit" name="sendEmail" value="Submit">
      </form>
      </div>
    </div>
  </div>';
}
include_once("foot.php") ?>
