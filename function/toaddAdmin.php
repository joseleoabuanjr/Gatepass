<?php
session_start();
//db connection
require_once "connect.php";
$user = $_POST["username"];
$pass = $_POST["pass"];
$col = $_POST["college"];
$status = 'false';
$admintype = "admin";
$email = "bulsua.qrgatepass@gmail.com";

$insert = "INSERT INTO admin_account (username,password,email,type,department,archived) VALUES ('$user','$pass','$email','$admintype','$col','$status')";
		if (mysqli_query($connect, $insert)) {
			echo json_encode(array("status" => true, "sql"=>$insert));
		} else {
			echo json_encode(array("status" => false, "sql"=>$insert));
			// echo "<script>alert('Register Failed.')</script>";
		}
?>