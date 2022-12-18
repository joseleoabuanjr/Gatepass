<?php
session_start();
$user = $_POST["username"];
$pass = md5($_POST["password"]);

include 'connect.php';

//read data from database table
$select = "SELECT * FROM admin_account WHERE username='$user'and password='$pass'";
$result = mysqli_query($connect, $select);
$count =  mysqli_num_rows($result);

if ($count == 1) {

	while ($row = mysqli_fetch_assoc($result)) {
		$_SESSION["useradmin"] = $row["username"];
		$_SESSION["passadmin"] = $row["password"];
		$_SESSION["admintype"] = $row["type"];
		$admintype = $_SESSION["admintype"];
		$_SESSION["department"] = $row["department"];
	}
	if($admintype == 'superadmin'){
		echo json_encode(array("status" => true, "location" => "user.php"));
	}
	// header("location:../admin/admin.php");
} else {
			// $_SESSION["invalid"] = 1;
			echo json_encode(array("status" => false, "msg" => "Invalid Username or Password"));
}

mysqli_close($connect);
