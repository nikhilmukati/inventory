<?php

include_once("../database/constants.php");
include_once("user.php");
include_once("dbOperation.php");
include_once("manage.php");

if(isset($_POST["emailValue"]))
{
	$result = getSingleRecordForUser("user","email",$_POST["id"]);
	
	//print_r($result);
	echo json_encode($result);
	exit();
}

if(isset($_POST["emailVal"])&&isset($_POST["pass"]))
{
	$result =  updateRecordForUser("user",$_POST["emailVal"],$_POST["pass"]);
	
	echo $result;
}else
{
	return "not working";
}

?>