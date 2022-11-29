<?php
session_start();
require_once "function/connect.php";
$id = $_SESSION['accno'];
?>
<!doctype html>
<html>

<head>
	<title>Account Information</title>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<link rel="stylesheet" href="css/indexx.css">
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

	<!-- Javascripts -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/mainScript-1.js"></script>
</head>

<body>
	<?php require_once 'includes/navbar.php'; ?>
	<div class="tab1" id="tab1"><?php require_once 'includes/dash.php'; ?></div>
	<div class="tab2--hidden" id="tab2"><?php require_once 'includes/profile.php'; ?></div>
	<div class="tab3--hidden" id="tab3">
		<?php 
			//read data from database table
			$select = "SELECT * FROM user_account WHERE acc_no =$id";
			$result = mysqli_query($connect,$select);

			while($row = mysqli_fetch_assoc($result)) 
			{
				$status= $row['verified'];
			}
			if($status == "yes"){
				require_once "includes/request.php";
			}
			else if($status == "no"){
				echo ('<script type="text/javascript" src="js/profilebtn.js"></script>');
				require_once "includes/nf_verified.php";
			}
			else if($status == "pending"){
				require_once "includes/p_verified.php";
			}
			else{
				echo "<script>alert(Error)</script>";
			}
		?>
	</div>
	
	<script type="text/javascript" src="js/college.js"></script>
	<script type="text/javascript" src="js/request.js"></script>
	<script type="text/javascript" src="js/validationStudent.js"></script>
</body>

</html>