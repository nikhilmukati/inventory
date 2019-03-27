<?php
function sendOtp($number){


//api keys to put for sending otp

  // Config variables. Consult http://api.textlocal.in/docs for more info.
  $test = "0";

  // Data for text message. This is the text message data.
  $sender = ""; // This is who the message appears to be from.
  $numbers = "".$number; // A single number or a comma-seperated list of numbers
  $message = "".$otp;
  // 612 chars or less
  // A single number or a comma-seperated list of numbers
  $message = urlencode($message);
  $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
  $ch = curl_init('http://api.textlocal.in/send/?');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($ch); // This is the result from the API
  
  curl_close($ch);
  return $otp;
}



if(isset($_POST['sendOtp']))
{

	$result = sendOtp($_POST["num"]);
  echo $result;
}


?>
