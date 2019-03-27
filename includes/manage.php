<?php 
function pagination($table,$pageno,$n)
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
    $query = $conn->query("SELECT COUNT(*) as rows FROM ".$table);
    $row = mysqli_fetch_assoc($query);
    $totalRecords = $row["rows"];
    //$totalRecords=1000;
   // $pageno = $pno;
    $numberOfRecorderPerPage = $n;
    $last= ceil($totalRecords/$numberOfRecorderPerPage);
   // echo "Total Pages: ".$last."<br/>";
    //echo "number of records per page".$numberOfRecorderPerPage."<br/>";
   // echo "totalRecords ".$totalRecords."<br/>";
   // echo "pageno ".$pageno."<br/>";
    //echo "last ".$last."<br/>";
    //echo "<br>";
$pagination="<ul class='pagination'>";
    if($last !=1)
    {
        if($pageno > 1)
        {
            $previous=$pageno - 1;
            $pagination.="<li class = 'page-item'><a class='page-link' pn='".$previous." 'href='#'>Previous</a></li>";
            
        }
        for($i=$pageno-3;$i<$pageno;$i++)
        {
            if($i>0){
            $pagination.="<li class='page-item'><a class='page-link' pn ='".$i."' href='#'>".$i."</a></li>";}
           

        }
        $pagination.="<li class='page-item'><a class='page-link' pn= '".$pageno."' href='#'>".$pageno."</a></li>";
        for($i=$pageno+1;$i<=$last;$i++)
        {

            if($i > $pageno + 3)
            {
                break;
            }
            $pagination.="<li class='page-item'><a class='page-link' pn='".$i."' href='#'>".$i."</a></li>";
            
        }
        if($last > $pageno)
        {
            $next = $pageno + 1;
            $pagination.="<li class='page-item'><a class='page-link' pn='".$next."' href='#'>NEXT</a></li>";
             
        }
        $pagination.="</ul>";
    }
    $limit="LIMIT"." ".($pageno-1)*$numberOfRecorderPerPage.",".$numberOfRecorderPerPage;
    $conn->close();
    return ["pagination"=>$pagination,"limit"=>$limit];

   
    }
   
function manageAllRecordWithPagination($table,$pageno)
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
    $pno=$pageno;
    $a = pagination($table,$pno,5);
    //echo $a["limit"];

    if($table == "category")
    {
        $sql = "SELECT p.category_name as category,c.category_name as child,p.cid,p.status FROM  category p LEFT JOIN category c ON p.parent_category = c.cid ".$a["limit"];
        $result = $conn->query($sql) or die($conn->error);
        $rows = array();
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                $rows[]= $row;
            }
        }
        $conn->close();
        return ["rows"=>$rows,"pagination"=>$a["pagination"]];
    }else if($table == "brands"){
        $sql = "SELECT * FROM ".$table." ".$a["limit"];
        $result = $conn->query($sql) or die($conn->error);
        $rows = array();
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                $rows[]= $row;
            }
        }
        
       
    }else
    {
        $sql = "SELECT c.category_name,b.brand_name,p.product_name,p.product_price,p.product_stock,p.added_date,p.p_status,p.pid  FROM PRODUCTS p,category c,brands b WHERE p.cid = c.cid AND p.bid = b.bid ".$a["limit"];
        $result = $conn->query($sql) or die($conn->error);
        $rows = array();
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                $rows[]= $row;
            }
        }
        
    }
    $conn->close();
     return ["rows"=>$rows,"pagination"=>$a["pagination"]];
}
 

 function deleteRecords($table,$pk,$id)
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
    
    if($table == "category")
    {
        $pre_stmt = $conn->prepare("SELECT ".$id." FROM category WHERE parent_category = ?");
        if($pre_stmt)
        {
            $pre_stmt->bind_param("i",$id);
            $pre_stmt->execute();
            $result = $pre_stmt->get_result() or die($conn->error);
            if($result->num_rows > 0)
            {
                $conn->close();
                return  "DEPENDENT CATEGORY";
            }else
            {
                $pre_stmt = $conn->prepare("DELETE FROM ".$table." WHERE ".$pk." = ?");
                if($pre_stmt)
                {
                    $pre_stmt->bind_param("i",$id);
                    //echo "hello";
                    $result = $pre_stmt->execute() or die($conn->error);
                    //echo "hello";
                    if($result)
                    {
                        $conn->close();
                        return "CATEGORY_DELETED";
                    }
                }
            }
        }
    }

    if($table != "category")
    {
        $pre_stmt = $conn->prepare("DELETE FROM ".$table." WHERE ".$pk." = ?");
                if($pre_stmt)
                {
                    $pre_stmt->bind_param("i",$id);
                    $result = $pre_stmt->execute() or die($conn->error);
                    if($result)
                    {
                        $conn->close();
                        return "Record_deleted";
                    }
                }
    }
    return "not deleting";

 }   


 function getSingleRecord($table,$pk,$id)
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

    $pre_stmt = $conn->prepare("SELECT * FROM ".$table." WHERE ".$pk. "= ? ");

 if($pre_stmt)
        {
            $pre_stmt->bind_param("i",$id);
            $pre_stmt->execute();
            $result = $pre_stmt->get_result() or die($conn->error);
            if($result->num_rows == 1)
            {
                $row = $result->fetch_assoc();
                return $row;    
            }
        }
    
    
 }


 function getSingleRecordForUser($table,$pk,$id)
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

    $pre_stmt = $conn->prepare("SELECT * FROM ".$table." WHERE ".$pk. "= ? ");

 if($pre_stmt)
        {
            $pre_stmt->bind_param("s",$id);
            $pre_stmt->execute();
            $result = $pre_stmt->get_result() or die($conn->error);
            if($result->num_rows == 1)
            {
                $row = $result->fetch_assoc();
                return $row;    
            }
        }else
        {
            return "not working";
        }
    
    
 }


 function updateRecord($table,$where,$fields)
 {
    
    $sql="";
    $condition="";
    foreach ($where as $key => $value) {
        # code...
        $condition.=$key." =' ".$value."' AND "; 
    }
    $condition = substr($condition,0,-5);
    foreach ($fields as $key => $value) {
        # code...
       $sql .=$key . "= '" . $value ."' , ";
    }
    $sql = substr($sql,0,-2);
    $sql = "UPDATE ".$table." SET ".$sql." WHERE ".$condition;
   // echo $sql;
   // return $sql;
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
  
     if (mysqli_query($conn, $sql)) {
    return "Record updated successfully";
} else {
    return  "Error updating record: " . mysqli_error($conn);
}
  
  // $conn->close();

 }


 //------------storing customer information--------//

 function storeCustomerInvoice($cust_name,$order_date, $arr_tqty,$arr_qty ,$arr_price,$arr_prod, $subtotal,$nettotal, $gst,$Discount, $paid,$due)
 {
  
 
    if($cust_name=="" || $paid == "" || $Discount=="")
    {
        return "Please Enter the Required Fields";
    }
   

  //if(!preg_match("/^[a-zA-Z'-]+$/",$cust_name)) { return "Invalid Name";} 
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

    $pre_stmt = $conn->prepare("INSERT INTO `invoice`( `cust_name`, `order_date`, `subtotal`, `nettotal`, `gst`, `Discount`, `paid`, `due`) VALUES (?,?,?,?,?,?,?,?)");
   if($pre_stmt)
   {
       $pre_stmt->bind_param("ssdddddd",$cust_name,$order_date,$subtotal,$nettotal,$gst,$Discount,$paid,$due);
        $result = $pre_stmt->execute() or die($conn->error);
         if($result)
            $invoice_no =  $conn->insert_id;
        if($invoice_no!=null)
        {
            for($i=0;$i<count($arr_price);$i++)
            {
                if($arr_qty[$i] == "")
                {
                    return "Please Enter the Quantity";
                }

                $rem_qty = $arr_tqty[$i] -$arr_qty[$i];
               // return $rem_qty;
                if($rem_qty < 0)
                {
                    return "Order_is_not_completed"; 

                }else
                {
                    $sql = "UPDATE `PRODUCTS` SET `product_stock`= ".$rem_qty." WHERE product_name = '".$arr_prod[$i]."' ";
                    mysqli_query($conn, $sql);

                     //if (mysqli_query($conn, $sql)) 
                       //   return "Record updated successfully";
                }
              $prod = $conn->prepare("INSERT INTO `invoice_details`(`invoice_no`, `product_name`, `price`, `qty`) VALUES (?,?,?,?)");
              if($prod)
              {
                $prod->bind_param("isdi",$invoice_no,$arr_prod[$i],$arr_price[$i],$arr_qty[$i]);
                $res = $prod->execute() or die($conn->error);

              }
            }
            return "Order Completed";

        }
   

   }else{
    return  "wrong insert query for invoice";
   } 
    
 }
   


 function updateRecordForUser($table,$email,$password)
 {
    $pass_hash = password_hash($password,PASSWORD_BCRYPT,["cost"=>8]);
    $sql = "UPDATE ".$table." SET password = '".$pass_hash."' WHERE email='".$email."'";
    //echo $sql;
     //return $sql;
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
  
     if (mysqli_query($conn, $sql)) {
    return "Record updated successfully";
} else {
    return  "Error updating record: " . mysqli_error($conn);
    
}
 } 
 
//echo "<pre>";
//print_r(manageAllRecordWithPagination("PRODUCTS",1));   
//print_r(pagination("category",1,3)); 
//print_r(getSingleRecord("category","cid",6));
 //echo updateRecord("category",["cid"=>37],["parent_category"=>0,"category_name"=>"boxes","status"=>"1"]);
 //echo deleteRecords("brands","bid",7);

 //$ans = updateRecord("category",["pid"=>12],["product_name"=>"nokia","product_price"=>1100,"product_stock"=>300,"bid"=>2,"cid"=>1]);
 //   echo $ans;

 //$res =storeCustomerInvoice("Kumar","25-10-12",array('1'),array('1') ,array('1'),array('ram'),100,200, 300,400, 500,600);
 // echo $res;
 //echo "<pre>";
 //print_r(getSingleRecordForUser("user","email","rider@gmail.com"));
 //$result =  updateRecordForUser("user","ghost@gmail.com","123456789");
   // echo $result;
?>