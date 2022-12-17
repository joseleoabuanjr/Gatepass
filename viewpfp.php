<?php
require_once "function/connect.php";

session_start();

$id = $_POST['id'];
$select = "SELECT * FROM user_account WHERE acc_no = $id";
$result = mysqli_query($connect, $select);

if (mysqli_num_rows($result) == 1) {
	while ($row = mysqli_fetch_assoc($result)) {
		if (isset($_POST['getImage'])) {
			echo $row["image"];
		} else if (isset($_POST['getCOR'])) {
			echo $row["cor"];
		}else if (isset($_POST['getVID'])) {
			echo $row["valid_id"];
		}else if (isset($_POST['getVAX'])) {
			echo $row["vax"];
		}
	}
} 

mysqli_close($connect);
?>
