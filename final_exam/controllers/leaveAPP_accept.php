<?php
session_start();
require "../models/dbConnect.php";

if (isset($_GET["id"])) {
	$id = $_GET["id"];

	$query = "UPDATE leave_applications SET status = 'accept' WHERE leave_id='$id'";
	$db = new DbConnect();
	$res = $db->ExecuteData($query);

	if($res){
		header("Location: ../views/teacher.php");
	}
	else
	{
		echo "No rows effected.";
	}
}
?>