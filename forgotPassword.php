
<html>
    <head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inventary Management System</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>   
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  
<script src="./javascript/forgot.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  
 <link rel="stylesheet" href="./includes/style.css">  

    </head>
<body >

<?php include_once("./templates/header.php") ?>
<br><br>
    <div class="card mx-auto" style="width: 18rem;" id="firstCard" >
  <img class="card-img-top mx-auto" src="./images/login2.png" style="width:60%;" alt="login icon">
  <div class="card-body">
    
    <form id="forgotPass_form" onsubmit="return false" >
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="forgotPasswordEmail" name="forgotPasswordEmail"  placeholder="Enter email">
  </div>
  <button class="btn btn-primary" id="fetchOtp" style="display: block">Get OTP</button>

  <div class="form-group" id="otp" style="display: none;">
    <label for="email">OTP</label>
    <input type="text" class="form-control" id="otpValue" name="otpValue"  placeholder="">

  </div>
  <button class="btn btn-primary" id="verify" name="verify" style="display: none">Verify</button>
   
  
</form>
  
  
</form>
  </div>
</div>

</body>    

</html>

