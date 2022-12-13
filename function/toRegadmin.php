<?php
session_start();
//db connection
require_once "connect.php";
$user = $_POST["username"];
$pass = md5($_POST["pass"]);
$col = $_POST["college"];
$admintype = "admin";
$email = "bulsua.qrgatepass@gmail.com";

$insert = "INSERT INTO admin_account (username,password,email,type,department) VALUES ('$user','$pass','$email','$admintype','$col')";
		if (mysqli_query($connect, $insert)) {
			echo json_encode(array("status" => true, "sql"=>$insert));
		} else {
			echo json_encode(array("status" => false, "sql"=>$insert));
			// echo "<script>alert('Register Failed.')</script>";
		}
?>