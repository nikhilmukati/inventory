<?php
include_once("./database/constants.php");
if(!isset($_SESSION["userid"]))
{
  header("location:".DOMAIN."/?emailDisplay=");
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
<script src="./javascript/editProfile.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
<style>
  
  .noHover{
    pointer-events: none;
  }
</style>      
    </head>
<body style="background-image:url('./images/back1.jpeg');">
  <!--Adding a header to the page -->
    <?php include_once("./templates/header.php"); ?>
    <br/><br/>
    <div class="container ">
    <div class="row">
        <div class="col-md-4">
            <div class="card mx-auto" >
    <img class="card-img-top mx-auto" src="./images/login.png" alt="Card image cap">
  <div class="card-body">
    <p class="card-text" style="font-size: 25px"><i class="fa fa-info-circle">&nbsp;</i><B>Profile Information:</B></p>
       
             <p class="fa fa-user font-weight-bold display-4" id="userName" style="font-size:20px"><?php echo $_SESSION["username"]; ?></p><br>
             <p class="fa fa-user font-weight-bold display-4" id="userType" style="font-size:20px" ><?php echo $_SESSION["user_type"]; ?></p><br>
             <p class="fa fa-clock-o font-weight-bold display-4" id="lastLogin" style="font-size:20px"><?php echo $_SESSION["last_login"]; ?></p>
             <br>
          
         
      
    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#edit_Profile"><i class="fa fa-edit">&nbsp;</i>Edit Profile</a>
  </div>
</div>
        </div>
        <div class="col-md-8">
            <div class="jumbotron" style="width:100%;height:68%;">
             <table><tr><td><h3>Welcome&nbsp;&nbsp;</h3></td><td><h3 id="hd"><?php echo $_SESSION["username"]; ?></h3></td></tr> </table>
             <br><br>
                <div class="row">
                <div class="col-sm-6">
                   <iframe src="http://free.timeanddate.com/clock/i669lc7w/n1040/szw210/szh210/hoc000/hbw0/hfc09f/cf100/hnc07c/hwc000/facfff/fnu2/fdi76/mqcfff/mqs4/mql18/mqw4/mqd60/mhcfff/mhs4/mhl5/mhw4/mhd62/mmv0/hhcfff/hhs1/hhb10/hmcfff/hms1/hmb10/hscfff/hsw3" frameborder="0" width="210" height="210" class = "noHover"></iframe>

                    </div>
                <div class="col-sm-6">
                    <div class="card">
                      <br><br>
      <div class="card-body">
        <h5 class="card-title">New Order</h5>
        <p class="card-text">Create new Orders ans Invoices</p>
        <a href="orders.php" class="btn btn-primary">New Orders</a>
      </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div> 
    </div> 
<p></p>
<p></p>
<div class="container">
    <div class="row">
        <div class="col-md-4">
             <div class="card">
      <div class="card-body" >
        <h5 class="card-title">Categories</h5>
        <p class="card-text">Here you can manage categories.You can add new parent and subparent categories</p>
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#category">Add </a>
        <a href="manage_category.php" class="btn btn-primary">Manage </a>
          
      </div>
                    </div>
        </div>
        <div class="col-md-4">        <div class="card">
      <div class="card-body" >
        <h5 class="card-title">Brands</h5>
        <p class="card-text">Here you can manage Brands.You can add new Brands</p>
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#brands">Add </a>
        <a href="manage_brands.php" class="btn btn-primary">Manage </a>
          
      </div>
                    </div></div>
        <div class="col-md-4">
                <div class="card">
      <div class="card-body" >
        <h5 class="card-title">Products</h5>
        <p class="card-text">Here you can manage Products.You can add new Products</p>
        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#products">Add </a>
        <a href="manage_products.php" class="btn btn-primary">Manage </a>
          
      </div>
                    </div>
        </div>
    </div>
    </div>

<!-- including categoryForm-->
    <?php include_once("./templates/categoryForm.php"); ?>
    
<!-- including brandsForm-->
    <?php include_once("./templates/brandsForm.php"); ?> 

<!-- including productsForm-->
    <?php include_once("./templates/productsForm.php"); ?> 
<!-- including editProfile -->
<?php include_once("./templates/editProfile.php"); ?>    

</body>    

</html>

