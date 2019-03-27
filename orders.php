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
<script src="./javascript/order.js"></script>
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
          <div class="col-md-10 mx-auto">
            <div class="card" style="box-shadow: 0 0 25px 0 lightgrey;">
                <div class="card-header">
                  New Orders
                </div>
                <div class="card-body">
                  <form id="my_order_form" onsubmit="return false">
                   <div class="form-group row">
                     <label class = "col-sm-3" align="right">
                       Order Date
                     </label>
                     <div class="col-sm-6">
                       <input type="text" class="form-control form-control-sm" id="order_date" name="order_date" readonly value="<?php echo date("Y-m-d"); ?>"/>
                     </div> 
                   </div>

                    <div class="form-group row">
                     <label class = "col-sm-3" align="right">
                       Customer Name*
                     </label>
                     <div class="col-sm-6">
                       <input type="text" class="form-control form-control-sm"  id="cust_name" name="cust_name" required />
                     </div> 
                   </div>

                   <div class="card" style="box-shadow: 0 0 25px 0 lightgrey;">
                     <div class="card-body">
                       <h4>Make a Order List</h4>
                        <table class="table table-hover  " style="background-color: white; " >   <!---->
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Item Name</th>
                                 
                                  <th style="text-align: center;">Total Quantity</th>
                                  <th style="text-align: center;">Quantity</th>
                                  <th style="text-align: center;">Price</th>
                                  <th style="text-align: center;"></th>
                                  <th style="text-align: center;">Total Amount</th>
                                </tr>
                              </thead>
                              <tbody id="invoice_form">
                                <!--<tr>
                                  <td id="number">1</td>
                                  <td>
                                    <select class="form-control form-control-sm">
                                      <option name="pid[]">Washing Machine</option>
                                    </select>
                                  </td>
                                  <td>
                                   <input type="text" name="total[]" class="form-control form-control-sm">
                                    
                                  </td>
                                  <td>
                                   <input type="text" name="qty[]" class="form-control form-control-sm">
                                    
                                  </td>

                                  <td>
                                   <input type="text" name="price[]" class="form-control form-control-sm" readonly>
                                    
                                  </td>

                                  
                                  <td>1500</td>
                                </tr>-->
                                
                              </tbody>
                       </table>

                          <center style="padding: 10px; ">
                            <button id="add" class="btn btn-success">Add</button>
                              <button id="remove" class="btn btn-danger">Remove</button>
                          </center>

                     </div>

                   </div> <!-- Card Ends Here -->
                   <br><br>
                   <form id="total">
                      <div class="form-group row">
                        <label for="subtotal" class="col-sm-3 col-form-label" align="right">Sub-Total</label>
                        <div class="col-sm-6">
                          <input type="text"  class="form-control form-control-sm" id="subtotal" name="subtotal" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="subtotal" class="col-sm-3 col-form-label" align="right">GST</label>
                        <div class="col-sm-6">
                          <input type="text"  class="form-control form-control-sm" id="GST" name="GST" readonly>
                        </div>
                      </div>

                       <div class="form-group row">
                        <label for="subtotal" class="col-sm-3 col-form-label" align="right">Discount</label>
                        <div class="col-sm-6">
                          <input type="text"  class="form-control form-control-sm" id="Discount" name="Discount" >
                        </div>
                      </div>

                         <div class="form-group row">
                        <label for="subtotal" class="col-sm-3 col-form-label" align="right">Net Total</label>
                        <div class="col-sm-6">
                          <input type="text"  class="form-control form-control-sm" id="nettotal" name="nettotal"  readonly>
                        </div>
                      </div>
                      
                       <div class="form-group row">
                        <label for="subtotal" class="col-sm-3 col-form-label" align="right">Paid</label>
                        <div class="col-sm-6"> 
                          <input type="text"  class="form-control form-control-sm" id="paidAmount" name="paidAmount" value="" >
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="subtotal" class="col-sm-3 col-form-label" align="right">Due</label>
                        <div class="col-sm-6">
                          <input type="text"  class="form-control form-control-sm" id="due" name="due" readonly>
                        </div>
                      </div>
                      <!--
                      <div class="form-group row">
                         <label for="subtotal" class="col-sm-3 col-form-label" align="right">Payment-Option</label>
                        <div class="col-sm-6">
                        <<select class="form-control form-control-sm" id="payment" name="payment">
                           
                            <option >Cash</option>
                            <option >Cheque</option>
                            <option >Card</option>
                      </select>
                      </div>-->
                      </div>  
                      <center>
                     <input type="submit" id="order_form" name="order_form" class="btn btn-info" value="Orders"> 
                     <input type="submit" id="print_invoice" name="print_invoice" class="btn btn-success d-none" value="Print-Invoice"> </center>
                    </form>
</form>
                </div>
           </div>

          </div>
        </div>
    </div>
</body>    

</html>

