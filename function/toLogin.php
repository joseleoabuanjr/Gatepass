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
	}
	if ($admintype == 'superadmin') {
		echo json_encode(array("status" => true, "location" => "dashboard.php"));
	} elseif ($admintype == 'admin') {
		echo json_encode(array("status" => true, "location" => "dashboard.php"));
	}
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
		}
		echo json_encode(array("status" => true, "location" => "verification.php?id=$id"));
		// header("refresh: 0; url=../verification.php?id=$id");
	} else {
		$select = "SELECT * FROM user_account WHERE username='$user'and password='$pass'";
		$result = mysqli_query($connect, $select);
		$c =  mysqli_num_rows($result);
		$foo = new stdClass();
		$foo->renewal = false;
		if ($c == 1) {

			while ($row = mysqli_fetch_assoc($result)) {
				$accno =  $row["acc_no"];
				$_SESSION["accno"] = $accno;
				$_SESSION["username"] = $user;
				$_SESSION["password"] = $pass;
				$renewalDate = new DateTime($row["renewal"]);
				$today = new DateTime();
				if ($renewalDate < $today) {
					$update = "UPDATE user_account SET type = 'visitor', renewal=NULL WHERE acc_no = $accno";
					if (mysqli_query($connect, $update)) {
						$foo->renewal = true;
					}
				}
			}
			$pageid = $_SESSION["accno"];
			$foo->status = true;
			$foo->location = "dashboard.php";
			echo json_encode((array)$foo);
		} else {
			// $_SESSION["invalid"] = 1;
			echo json_encode(array("status" => false, "msg" => "Invalid Username or Password"));
			// header("refresh: 0; url=../landing-page.php");
		}
	}
}

mysqli_close($connect);
