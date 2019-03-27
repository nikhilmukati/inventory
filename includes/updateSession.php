<?php
if(isset($_POST["edit_name"])&& isset($_POST["edit_phno"])&& isset($_POST["edit_pwd"]))
{
	$_POST["username"] = $_POST["edit_name"];
	echo "hello";
}
?>