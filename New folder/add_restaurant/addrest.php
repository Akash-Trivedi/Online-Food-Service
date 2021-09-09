<?php
  define("TITLE", "Add Restaurant");
  include("../head.php");
  if(isset($_POST['add'])){
    $contact=$_POST['contact'];
    $name=$_POST['name'];
    $city=$_POST['city'];
    $locality=$_POST['locality'];
    $std=$_POST['std'];
    $status=$_POST['status'];
    $char=$_POST['charactersitics'];
    $open_time=$_POST['open_time'];
    $close_time=$_POST['close_time'];
    $email=$_POST['email'];
    $web=$_POST['wesite'];
    if (empty($name) || empty($contact) || empty($city) || empty($locality) || empty($std) || empty($status) || empty($char) || empty($open_time) || empty($close_time) || empty($email) || empty($web) ){
        header('Location: index.php?field=empty');
        exit();
     } else {
        //field data authentication
        if (!preg_match("/^[a-zA-Z]*$/", $first_name) || !preg_match("/^[a-zA-Z]*$/", $last_name)) {
           header('Location: accsetup.php?accsetup=invalidName');
           exit();
        } else {
           //check if email is valid
           if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
              header('Location: accsetup.php?accsetup=email invalid');
              exit();
           } else {
                if (!preg_match("/^[a-zA-Z]*$/",$city) || !preg_match("/^[a-z A-Z]*$/",$state)){
                    header('Location: accsetup.php?accsetup=city/state invalid');
                    exit();
                } else{
                  $query="CREATE TABLE 'GameToh'.'Imperial'(
                    'itemId' INT NOT NULL AUTO_INCREMENT ,
                    'itemName' VARCHAR(25) NOT NULL ,
                    'itemCategory' INT(2) NOT NULL ,
                    'itemCuisine' INT(2) NOT NULL ,
                    'itemStatus' INT(1) NOT NULL ,
                    PRIMARY KEY ('itemId')) ENGINE = InnoDB";
                    
                    $test_query="SELECT contact FROM customers WHERE contact=$contact AND contact_verified=1";
                    $test_result=mysqli_query($conobj, $test_query);
                    $mail1=explode("@",$mail);
                    //insert the user into the database
                    if(mysqli_num_rows($test_result)>0){
                        $sql1="INSERT INTO customers VALUES(".$first_name."', '".$last_name."', '', '".$mail1[0]."', '".$mail1[1]."', '".$addr."', '".$city."', '".$pincode."', '".$state."', '', '')";
                        $result=mysqli_query($conobj, $sql1);
                        header('Location: index1.php?accsetup=Success');
                        exit();
                    }
                    else{
                        header('Location: accsetup.php?accsetup=failed');
                    }
                }
            }
        }
    }
} else{
    header('Location: index.php?value=empty');
}
?>
