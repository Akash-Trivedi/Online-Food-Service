<?php
  include('head.php');
  $about=array(
    array("Index"=>"About Us", "Link"=>"aboutUs.php"),
    array("Index"=>"Culture", "Link"=>"culture.php"),
    array("Index"=>"Contact", "Link"=>"contact.php")
  );

  $foodies=array(
    array("Index"=>"Code of Conduct", "Link"=>"codeOfConduct.php"),
    array("Index"=>"Community", "Link"=>"Community.php"),
  );

  $restaurants=array(
    array("Index"=>"Business App", "Link"=>"app.php"),
    array("Index"=>"Business Owner Guidelines", "Link"=>"guidLines.php"),
    array("Index"=>"Products for Businesses", "Link"=>"products.php"),
    array("Index"=>"Claim your Listing", "Link"=>"claimListing.php")
  );

  $profile=array(
    array("Index"=>"Profile", "Link"=>"profile/index.php"),
    array("Index"=>"Notification", "Link"=>"profile/index.php"),
    array("Index"=>"Bookmark", "Link"=>"profile/index.php"),
    array("Index"=>"Review", "Link"=>"profile/index.php"),
    array("Index"=>"Socialize", "Link"=>"v.php"),
    array("Index"=>"Settings", "Link"=>"settings.php"),
    array("Index"=>"Log out", "Link"=>"send_otp/logout.php")
  );
  
  for ($i=0; $i <sizeof($about) ; $i++) {
    $query="INSERT INTO aboutUs VALUES('".$about[$i]['Index']."', '".$about[$i]['Link']."')";
    mysqli_query($dbobj->conobj, $query);
    }
    for ($i=0; $i <sizeof($foodies) ; $i++) {
      $query="INSERT INTO forFoodies VALUES('".$foodies[$i]['Index']."', '".$foodies[$i]['Link']."')";
      mysqli_query($dbobj->conobj, $query);
      }
      for ($i=0; $i <sizeof($restaurants) ; $i++) {
        $query="INSERT INTO forRestaurants VALUES('".$restaurants[$i]['Index']."', '".$restaurants[$i]['Link']."')";
        mysqli_query($dbobj->conobj, $query);
        }
        for ($i=0; $i <sizeof($profile) ; $i++) {
          $query="INSERT INTO userPrivilages VALUES('".$profile[$i]['Index']."', '".$profile[$i]['Link']."')";
          mysqli_query($dbobj->conobj, $query);
          }
?>