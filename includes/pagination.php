<html>
 <head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inventary Management System</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>   
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  
 <link rel="stylesheet" href="./includes/style.css">    
    </head>
    <body>
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
    echo "Total Pages ".$last."<br/>";
    echo "number of records per page".$numberOfRecorderPerPage."<br/>";
     echo "totalRecords ".$totalRecords."<br/>";
    echo "pageno ".$pageno."<br/>";
    echo "last ".$last."<br/>";
$pagination="<ul class='pagination'>";
    if($last !=1)
    {
        if($pageno > 1)
        {
            $previous=$pageno - 1;
            $pagination.="<li class = 'page-item'><a class='page-link' href='pagination.php?pageno=".$previous."'>Previous</a></li>";
            
        }
        for($i=$pageno-3;$i<$pageno;$i++)
        {
            if($i>0){
            $pagination.="<li class='page-item'><a class='page-link'href='pagination.php?pageno=".$i."'>".$i."</a></li>";}
           

        }
        $pagination.="<li class='page-item'><a class='page-link' href='pagination.php?pageno=".$pageno."'>".$pageno."</a></li>";
        for($i=$pageno+1;$i<=$last;$i++)
        {

            if($i > $pageno + 3)
            {
                break;
            }
            $pagination.="<li class='page-item'><a class='page-link' href='pagination.php?pageno=".$i."'>".$i."</a></li>";
            
        }
        if($last > $pageno)
        {
            $next = $pageno + 1;
            $pagination.="<li class='page-item'><a class='page-link' href='pagination.php?pageno=".$next."'>NEXT</a></li>";
             
        }
        $pagination.="</ul>";
    }
    $limit="LIMIT"."".($pageno-1)*$numberOfRecorderPerPage.",".$numberOfRecorderPerPage;
    $conn->close();
    return ["pagination"=>$pagination,"limit"=>$limit];
   
    }

if($_GET["pageno"])
{
    $pageno = $_GET["pageno"];
   // echo "<pre>";
    print_r(pagination("category",$pageno,3));
}

	
?>
</body>
</html>