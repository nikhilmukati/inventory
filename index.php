<?php
include_once("./database/constants.php");
if(isset($_SESSION["userid"]))
{
  header("location:" .DOMAIN ."/dashboard.php");
}

?>


<html>
    <head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inventary Management System</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>   
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  
<script src="./javascript/main.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  
 <link rel="stylesheet" href="./includes/style.css">    
    </head>
<body >
  <!--Adding a header to the page -->
 
  <div id="loader" style="display: none"></div>
    <?php include_once("./templates/header.php"); ?>
    <br/><br/>
    <div class="container ">
      <?php 
        if(isset($_GET["msg"]) AND !(empty($_GET["msg"])))
        {?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
               <?php echo $_GET["msg"]; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

        <?php
      }

      ?>
    <div class="card mx-auto" style="width: 18rem;">
  <img class="card-img-top mx-auto" src="./images/login2.png" style="width:60%;" alt="login icon">
  <div class="card-body">
    
    <form id="login_form" onsubmit="return false">
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email_log" name="email_log"  placeholder="Enter email">
    <small id="e_error" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password_log" name="password_log" placeholder="Password">
    <small id="p_error" class="form-text text-muted"></small>
  </div>
  
  <button type="submit" class="btn btn-primary"><i class="fa fa-lock">&nbsp;</i>Login</button>&nbsp;
  <span><a href="register.php">Register</a></span>        
</form>
  </div>
        <div class="card-footer">
         <a href="forgotPassword.php">Forget Password?</a>
        </div>
</div>
  </div>  
</body>    

</html>

