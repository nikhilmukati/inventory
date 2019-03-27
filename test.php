<html>
<body>
  <form action="index.php">
    OTP:
    <input type="text" />
    <button type="submit" value="submit">Submit</button> 
  </form>
</body>
</html>



<?php
//echo rand(10000,999999);
  // Authorisation details.
function sendOtp($number){
  $otp = rand(10000,999999);
  $username = "rastogi.fresh88@gmail.com";
  $hash = "4cfd410d161f009b33473d75af5e4e405b8060600396ef681514ae6b2f481813";

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
echo sendOtp("8218225082");
?>