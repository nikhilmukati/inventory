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
<script  src="./javascript/main.js"></script>    

    </head>
<body style="background-image:url('./images/back1.jpeg');">
 
  <!--Adding a header to the page -->
    <!--Adding a header to the page -->
    <?php include_once("./templates/header.php"); ?>
   <!--<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
  <a class="navbar-brand" href="#">Inventary System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="#"><i class="fa fa-home"></i>&nbsp;Home <span class="sr-only">(current)</span></a>
      

    </div>
  </div>
</nav>-->
<div id="customAlert"></div> 
    <br/><br/>

    <div class="container ">
        
     <div class="card mx-auto" style="width: 30rem;" >
  <img class="card-img-top" src="./images/register.jpeg" alt="Register">
  <div class="card-body">
    
     <form id="registration_form" onsubmit="return false" autocomplete="off">
         
           <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" name="name" >
    <small id="n_error" class="form-text text-muted"></small>
  </div>
         
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email" name="email">
    <small id="e_error" class="form-text text-muted"></small>
  </div>
   <div class="form-group">
    <label for="text">Phone no.:</label>
    <input type="text" class="form-control" id="phno" name="phno">
    <small id="ph_error" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="password">
    <small id="p_error" class="form-text text-muted"></small>
  </div>

         <div class="form-group">
    <label for="pwd">Confirm Password:</label>
    <input type="password" class="form-control" id="cpwd" name="cpassword">
    <small id="cp_error" class="form-text text-muted"></small>
  </div>
         
     <div class="form-group">
  <label for="usertype">User Type:</label>
  <select class="form-control" id="usertype" name="usertype">
    <option value="">Choose option type</option>
    <option value="1">Admin</option>
    <option value="0">Others</option>
  </select>
   <small id="t_error" class="form-text text-muted"></small>
</div>      
         
  <button type="submit" class="btn btn-primary" name="submit" value="submit"><span class="fa fa-user">&nbsp;&nbsp;</span>Register</button>
   <span><a href="index.php">Login</a></span>   
</form> 
    
  </div>
</div>
    </div>

</body>    

</html>

