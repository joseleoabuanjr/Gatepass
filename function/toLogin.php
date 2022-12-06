<?php
session_start();
$user = $_POST["username"];
$pass = md5($_POST["password"]);
$p = $_POST["password"];

include 'connect.php';

//read data from database table
$select = "SELECT * FROM admin_account WHERE username='$user'and password='$pass'";
$result = mysqli_query($connect, $select);
$count =  mysqli_num_rows($result);

if ($count == 1) {

	while ($row = mysqli_fetch_assoc($result)) {
		$_SESSION["useradmin"] = $row["username"];
		$_SESSION["passadmin"] = $row["password"];
	}
	echo json_encode(array("status" => true, "location" => "admin/admin.php"));
	// header("location:../admin/admin.php");
} else {
	$select = "SELECT * FROM acc_temp WHERE username='$user'and password='$pass'";
	$result = mysqli_query($connect, $select);
	$count =  mysqli_num_rows($result);
	if ($count == 1) {
		//Verify account
		while ($row = mysqli_fetch_assoc($result)) {
			$id = $row["acc_no"];
			$_SESSION["accno"] = $row["acc_no"];
			$_SESSION["username"] = $user;
			$_SESSION["password"] = $pass;
			$_SESSION["pass"] = $p;
		}
		echo json_encode(array("status" => true, "location" => "verification.php?id=$id"));
		// header("refresh: 0; url=../verification.php?id=$id");
	} else {
		$select = "SELECT * FROM user_account WHERE username='$user'and password='$pass'";
		$result = mysqli_query($connect, $select);
		$c =  mysqli_num_rows($result);
		if ($c == 1) {

			while ($row = mysqli_fetch_assoc($result)) {
				$_SESSION["accno"] = $row["acc_no"];
				$_SESSION["username"] = $user;
				$_SESSION["password"] = $pass;
				$_SESSION["pass"] = $p;
			}
			$pageid = $_SESSION["accno"];
			echo json_encode(array("status" => true, "location" => "dashboard.php"));
			// header("Location: ../index.php?id='$pageid'");

		} else {
			// $_SESSION["invalid"] = 1;
			echo json_encode(array("status" => false, "msg" => "Invalid Username or Password"));
			// header("refresh: 0; url=../landing-page.php");
		}
	}
}

mysqli_close($connect);
