<?php
session_start();
include('confirmotp.php');
//send otp to the user, 6digit random generated code...
if(isset($_POST['sendotp']) && is_numeric($_POST['contact']) && strlen($_POST['contact'])==10){
  $number=$_POST['contact'];
  $_SESSION['otp']=rand(100000, 999999);
  $_SESSION['contact']=$number;
  function1($number, $otp);
  header("Location: otp.php?enterotp");//now the session is created and use it any php file, but start session first to access the session data.
  } elseif(isset($_POST['cnfotp'])){
    confirmOTP();
  } else{
  header("Location: ../index.php?formsubmission=false|contact=invalid");
}
function function1($number, $otp){
  $fields = array(
    "sender_id" => "FSTSMS",
    "message" => "To login for $number Gametoh opt is $otp.",
    "language" => "english",
    "route" => "p",
    "numbers" => $number);

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode($fields),
    CURLOPT_HTTPHEADER => array(
      "authorization: grNubweOH0y84mPIDz9UFnqfcv75dxB3s2oTLkja1JVQtYlEZKOonwzmAIdtQPEgh74vJVe5lsLRY9H6",
      "accept: */*",
      "cache-control: no-cache",
      "content-type: application/json"
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    header("Location: ../index.php");
  }
}
?>
