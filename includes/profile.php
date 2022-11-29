<?php

	require "function/connect.php";

	$accno = $_SESSION["accno"];
	$p = $_SESSION["pass"];
	$select = "SELECT * FROM user_account WHERE acc_no = $accno";
	$result = mysqli_query($connect, $select);

	while($row = mysqli_fetch_assoc($result)){
		$accno = $row["acc_no"];
		$usern = $row["username"];
		$pass = $row["password"];
		$email = $row["email"];
		$studno = $row["stud_no"];
		$empno = $row["emp_no"];
		$type = $row["type"];
		$first = $row["first"];
		$last = $row["last"];
		$mid = $row["middle"];
		$cor = $row["cor"];
		$v_id = $row["valid_id"];
		$vax = $row["vax"];
	}
?>
<?php
	if($type == "student"){
		require_once 'profile_s1.php';
	}
	else if($type == "employee"){
		require_once 'profile_e.php';
	}
	else if($type == "visitor"){
		require_once 'profile_v.php';
	}
	else{
		echo "<script>alert(Error)</script>";
	}
?>