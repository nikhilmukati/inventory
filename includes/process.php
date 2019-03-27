<?php

include_once("../database/constants.php");
include_once("user.php");
include_once("dbOperation.php");
include_once("manage.php");
// for registration
if(isset($_POST["name"]) && isset($_POST["email"]))   //
{
	//echo $_POST["name"];
	//echo $_POST["email"];

	$result = connectForCreatingAccount($_POST["name"],$_POST["email"],$_POST["password"],$_POST["usertype"],$_POST["phno"]);

	echo $result;
	exit();
}


//for login

if(isset($_POST["email_log"]) && isset($_POST["password_log"]))
{
	$result = userLogin($_POST["email_log"],$_POST["password_log"]);
	$emailDisplay =$_POST["email_log"];

	echo $result;
	exit();
}


// for fetch category
if(isset($_POST["getCategory"]))
{
	$rows = getAllRecords("category");
	foreach ($rows as $row) {
		echo "<option value='".$row["cid"]."'>".$row["category_name"]." </option>";
	}
	exit();
}


//for fetch brands
if(isset($_POST["getBrands"]))
{
	$rows = getAllRecords("brands");
	foreach ($rows as $row) {
		echo "<option value='".$row["bid"]."'>".$row["brand_name"]." </option>";
	}
	exit();
}


// for adding category

if(isset($_POST["category_name"])&& isset($_POST["parent_category"]))
{
	$result = addCategory($_POST["parent_category"],$_POST["category_name"]);
	echo  $result;
	exit();
}


//for adding brands
if(isset($_POST["brand_name"]))
{
	$result = addBrands($_POST["brand_name"]);
	echo $result;
	exit();
}

//for adding products
if(isset($_POST["added_date"]) && isset($_POST["product_name"]))
{
	$result = addProducts($_POST["category_option"],$_POST["Brand_option"],$_POST["product_name"],$_POST["product_price"],$_POST["product_quantity"],$_POST["added_date"]);
	echo $result;
	exit();
}

//for managing categories
if(isset($_POST["manageCategory"]))
{
	$result = manageAllRecordWithPagination("category",$_POST["pageno"]);
	$rows = $result["rows"];
	$pagination = $result["pagination"];

	if(count($rows) > 0)
	{
		$n=(($_POST["pageno"]-1)*5)+1;
		foreach ($rows as $row) {
			
			?>
				<tr>
			        <td><?php echo $n++; ?></td>
			        <td><?php echo $row["category"]; ?></td>
			        <td><?php 
			        	if($row["child"] == NULL)
			        		echo "Root";
			        	else
			        		echo $row["child"];
			        		//echo $row["child"];
			        ?> </td>
			         <td>
			           <a href="" class ="btn btn-success btn-sm">Active</a>
			         </td>
			        <td>
			          <a href="#" did=<?php echo $row["cid"]; ?> class="btn btn-danger btn-sm my_delete">Delete</a>
			          <a href='' eid=<?php echo $row["cid"]; ?>  data-toggle="modal" data-target="#category" class="btn btn-info btn-sm my_edit">Edit</a>
			        </td>
			      </tr>
			<?php
		} ?>
		<tr><td colspan="5"><?php echo $pagination ; ?></td></tr>
		<?php 
		exit();
	}
	//exit();
}


//deleting category
if(isset($_POST["deleteCategory"]))
{
   $result = deleteRecords("category","cid",$_POST["id"]);

   echo $result;
 exit();
}



//updating category
if(isset($_POST["updateCategory"]))
{
	$result = getSingleRecord("category","cid",$_POST["id"]);
	echo json_encode($result);
	//print_r($result);
	exit();

}


//updating category after generating records
if(isset($_POST["update_category_name"]))
{
	$cid = $_POST["cid"];
	$name =$_POST["update_category_name"];
	$parent_cat =$_POST["parent_category"];
	$ans = updateRecord("category",["cid"=>$cid],["parent_category"=>$parent_cat,"category_name"=>$name,"status"=>"1"]);
	echo $ans;
}



//----------------------Managing Brands--------------//

if(isset($_POST["manageBrands"]))
{
	$result = manageAllRecordWithPagination("brands",$_POST["pageno"]);
	$rows = $result["rows"];
	$pagination = $result["pagination"];

	if(count($rows) > 0)
	{
		$n=(($_POST["pageno"]-1)*5)+1;
		foreach ($rows as $row) {
			
			?>
				<tr>
			        <td><?php echo $n++; ?></td>
			        <td><?php echo $row["brand_name"]; ?></td>
			    
			         <td>
			           <a href="" class ="btn btn-success btn-sm">Active</a>
			         </td>
			        <td>
			          <a href="#" did=<?php echo $row["bid"]; ?> class="btn btn-danger btn-sm delete_brand">Delete</a>
			          <a href='' eid=<?php echo $row["bid"]; ?>  data-toggle="modal" data-target="#update_brand" class="btn btn-info btn-sm edit_brand">Edit</a>
			        </td>
			      </tr>
			<?php
		} ?>
		<tr><td colspan="5"><?php echo $pagination ; ?></td></tr>
		<?php 
		exit();
	}
	//exit();
}

if(isset($_POST["deleteBrand"]))
{
	$result = deleteRecords("brands","bid",$_POST["id"]);

   echo $result;
}


if(isset($_POST["updateBrands"]))
{
	$result = getSingleRecord("brands","bid",$_POST["id"]);
	echo json_encode($result);
	//print_r($result);
	exit();

}


if(isset($_POST["update_brand_name"]))
{
	$bid = $_POST["bid"];
	$name =$_POST["update_brand_name"];
	
	$ans = updateRecord("brands",["bid"=>$bid],["brand_name"=>$name,"status"=>"1"]);
	echo $ans;
}

//--------------------Manage Products-----------------//

if(isset($_POST["manageProducts"]))
{
	$result = manageAllRecordWithPagination("PRODUCTS",$_POST["pageno"]);
	$rows = $result["rows"];
	$pagination = $result["pagination"];

	if(count($rows) > 0)
	{
		$n=(($_POST["pageno"]-1)*5)+1;
		foreach ($rows as $row) {
			
			?>
				<tr>
			        <td><?php echo $n++; ?></td>
			        <td><?php echo $row["product_name"]; ?></td>
			    	<td><?php echo $row["category_name"]; ?></td>
			    	<td><?php echo $row["brand_name"]; ?></td>
			    	<td><?php echo $row["product_price"]; ?></td>
			    	<td><?php echo $row["product_stock"]; ?></td>
			    	<td><?php echo $row["added_date"]; ?></td>
			    	
			         <td>
			           <a href="" class ="btn btn-success btn-sm">Active</a>
			         </td>
			        <td>
			          <a href="#" did=<?php echo $row["pid"]; ?> class="btn btn-danger btn-sm delete_prod">Delete</a>
			          <a href='' eid=<?php echo $row["pid"]; ?>  data-toggle="modal" data-target="#products" class="btn btn-info btn-sm edit_prod">Edit</a>
			        </td>
			      </tr>
			<?php
		} ?>
		<tr><td colspan="5"><?php echo $pagination ; ?></td></tr>
		<?php 
		exit();
	}else
	{
		echo "not working";
	}
	//exit();
}

if(isset($_POST["deleteProd"]))
{
	$result = deleteRecords("PRODUCTS","pid",$_POST["id"]);

   echo $result;
}

if(isset($_POST["updateProducts"]))
{
	$result = getSingleRecord("PRODUCTS","pid",$_POST["id"]);
	echo json_encode($result);
	//print_r($result);
	exit();

}


if(isset($_POST["update_product_name"]))
{
	$pid = $_POST["pid"];
	$product_name=$_POST["update_product_name"];
	$product_price=$_POST["update_product_price"];
	$product_stock=$_POST["update_product_quantity"];
	$parent_category =$_POST["parent_category"];
	$brand_category =$_POST["Brand_option"];
	$added_date = $_POST["added_date"];
	$ans = updateRecord("PRODUCTS",["pid"=>$pid],["product_name"=>$product_name,"product_price"=>$product_price,"product_stock"=>$product_stock,"bid"=>$brand_category,"cid"=>$parent_category,"added_date"=>$added_date]);
	echo $ans;
}



//--------------------------Order Processing------------------//
if(isset($_POST["addProduct"]))
{
	$rows = getAllRecords("PRODUCTS");
	//print_r ($rows);
	?>
	<tr>
                                  <td class="number">1</td>
                                  <td>
                                    <select class="form-control form-control-sm  pid">
                                    <option value="">Choose Product</option>	
                                    <?php 
                                    foreach ($rows as $row) {
                                    	# code...
                                    ?>
                                    <option value="<?php echo $row["pid"]; ?>">
                                    	<?php echo $row["product_name"]; ?>
                                    </option> 
                                    <?php	
                                    }
                                    ?>	
                                     
                                  </td>
                                  <td>
                                   <input type="text"  id="tqty[]" name="tqty[]" class="form-control form-control-sm tqty " readonly>
                                    
                                  </td>
                                  <td>
                                   <input type="text" name="qty[]" id="qty[]" name="qty[]" class="form-control form-control-sm qty">
                                    
                                  </td>

                                  <td>
                                   <input type="text" name="price[]" id="price[]" class="form-control form-control-sm price" readonly>
                                    
                                  </td>

                                 <td>
                                   <input type="hidden" name="product_name[]" id="product_name[]" class="form-control form-control-sm product_name" >
                                    
                                  </td>
                                  <td>Rs:<span class="amt">0</span></td>
    </tr>

<?php 
exit();
}


if(isset($_POST["getPriceAndQuantity"]))
{
	$result = getSingleRecord("PRODUCTS","pid",$_POST["id"]);
	echo json_encode($result);
	exit();
}


if(isset($_POST["order_date"]) AND isset($_POST["cust_name"]))
{
	$cust_name = $_POST["cust_name"];
	$order_date = $_POST["order_date"];
	//echo $cust_name." ".$order_date;
	//exit();


	// Getting array for orders


		$arr_tqty = $_POST["tqty"];
		$arr_qty = $_POST["qty"];
		$arr_price = $_POST["price"];
		$arr_prod = $_POST["product_name"];

		$subtotal = $_POST["subtotal"];
        $nettotal = $_POST["nettotal"];
        $gst = $_POST["GST"];
        $Discount = $_POST["Discount"];
        $paid = $_POST["paidAmount"];
        $due = $_POST["due"];
        
      // print_r($arr_tqty);
       //print_r($arr_qty);
       //print_r($arr_price);
       //print_r($arr_prod);

        $res =storeCustomerInvoice($cust_name,$order_date, $arr_tqty,$arr_qty ,$arr_price,$arr_prod, $subtotal,$nettotal, $gst,$Discount, $paid,$due);
        echo $res;
               
}

if(isset($_POST["getUser"]))
{
	$result = getSingleRecordForUser("user","email",$_POST["ed"]);
	echo  json_encode($result);
	exit();
	//print_r($result);
}


if(isset($_POST["edit_name"])&&isset($_POST["edit_phno"])&&isset($_POST["edit_pwd"]))
{
	$editpwd = $_POST["edit_pwd"];

	$password_hash = password_hash($editpwd,PASSWORD_BCRYPT,["cost"=>8]);
	$result = updateRecord("user",["id"=>$_POST["userid"]],["name"=>$_POST["edit_name"],"notes"=>$_POST["edit_phno"],"password"=>$password_hash]);
				//$_SESSION["userid"] = $row["id"];
               
	echo $result; 
}
?>
