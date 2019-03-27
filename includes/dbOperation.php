<?php

function addCategory($parent_category,$category_name)
{
    $servername = "localhost";
    $user= "root";
    $pass = "ghost";
    $dbname = "project";

    // Create connection
    $conn = new mysqli($servername, $user, $pass, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
  
$pre_stmt = $conn->prepare("INSERT INTO `category`(`parent_category`, `category_name`, `status`) VALUES (?,?,?)");

   $status=1;
if($pre_stmt)
{
     $pre_stmt->bind_param("isi",$parent_category,$category_name,$status);
    $result = $pre_stmt->execute() or die($conn->error);
    if($result)
        return "CATEGORY ADDED";
    else
        return "SOME_ERROR";
}else
{
    return "SOME_ERROR";
}
  $conn->close();  
}

function getAllRecords($table)
{
	$servername = "localhost";
    $user= "root";
    $pass = "ghost";
    $dbname = "project";

    // Create connection
    $conn = new mysqli($servername, $user, $pass, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
  
$pre_stmt = $conn->prepare("SELECT * FROM ".$table);

if($pre_stmt)
{
    
     $pre_stmt->execute() or die($conn->error);
     $result=$pre_stmt->get_result();
    $rows = array();
    if($result->num_rows > 0)
    {
    	while($row = $result->fetch_assoc())
    	{
    		$rows[] = $row ; 
    	}
    	return $rows;
    }
}else
{
    return "SOME_ERROR";
}
  $conn->close();  
}


function addBrands($brand_name)
{

	$servername = "localhost";
    $user= "root";
    $pass = "ghost";
    $dbname = "project";

    // Create connection
    $conn = new mysqli($servername, $user, $pass, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
  
$pre_stmt = $conn->prepare("INSERT INTO `brands`( `brand_name`, `status`) VALUES (?,?)");

   $status=1;
if($pre_stmt)
{
     $pre_stmt->bind_param("si",$brand_name,$status);
    $result = $pre_stmt->execute() or die($conn->error);
    if($result)
        return "Brand ADDED";
    else
        return "SOME_ERROR";
}else
{
    return "SOME_ERROR";
}
  $conn->close(); 
}



function addProducts($cid,$bid,$product_name,$price,$stock,$date)
{

	$servername = "localhost";
    $user= "root";
    $pass = "ghost";
    $dbname = "project";

    // Create connection
    $conn = new mysqli($servername, $user, $pass, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
  
$pre_stmt = $conn->prepare("INSERT INTO `PRODUCTS`(`cid`, `bid`, `product_name`, `product_price`, `product_stock`, `added_date`, `p_status`) VALUES (?,?,?,?,?,?,?)");

   $status=1;
if($pre_stmt)
{
     $pre_stmt->bind_param("iisdisi",$cid,$bid,$product_name,$price,$stock,$date,$status);
    $result = $pre_stmt->execute() or die($conn->error);
    if($result)
        return "Product ADDED";
    else
        return "SOME_ERROR";
}else
{
    return "SOME_ERROR1";
}
  $conn->close(); 
}
//addCategory(1,"Mobile");
//echo "<pre>";
//print_r(getAllRecords("category"));
//echo addBrands("samsung");
//echo addProducts(6,2,"vivo",123,123,date("Y-m-d"));
?>