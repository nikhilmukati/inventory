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
<script src="./javascript/manage.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
<style>
  
  .noHover{
    pointer-events: none;
  }
  
</style>      
    </head>
<body style="background-image:url('./images/back1.jpeg');" ">  <!--style="background-image:url('./images/back1.jpeg');"-->
  <!--Adding a header to the page -->
    <?php include_once("./templates/header.php"); ?>
    <br/><br/>
    <div class="container">
      <table class="table table-hover table-bordered " style="background-color: white; " >   <!---->
    <thead>
      <tr>
        <th>#</th>
        <th>Category</th>
        <th>Parent Category</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="get_category">
      <!--<tr>
        <td>1</td>
        <td>Electronics</td>
        <td>Root</td>
         <td>
           <a href="" class ="btn btn-success btn-sm">Active</a>
         </td>
        <td>
          <a href="" class="btn btn-danger btn-sm">Delete</a>
          <a href="" class="btn btn-info btn-sm">Edit</a>
        </td>
      </tr>-->
      
    </tbody>
  </table>


    </div>

  <?php include_once("./templates/update_form.php"); ?>


</body>    

</html>

