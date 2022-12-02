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
<div class="container d-flex" style="width: 100%; height: 100%; margin-top:100px;">
<h1>Profile Information</h1>
</div>
<div class="container d-flex" style="width: 100%; height: 100%;">
	<div class="d-flex justify-content-center align-items-center flex-column w-25 pt-5">
		<div class="d-flex flex-column w-100 pe-2">
			<button type="button" class="btn btn-primary btn-sm" id="infobtn1" style="margin-bottom:10px;">Information</button>
			<button type="button" class="btn btn-primary btn-sm" id="infobtn2" style="margin-bottom:10px;">Avatar</button>
			<button type="button" class="btn btn-primary btn-sm" id="infobtn3" style="margin-bottom:10px;">Credential</button>
		</div>
	</div>
	<div class="d-flex">

	</div>
</div>