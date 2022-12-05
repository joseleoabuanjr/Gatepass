<?php
session_start();
if (!isset($_SESSION["accno"])) {
	header("Location: landing-page.php");
}
require_once "function/connect.php";
$id = $_SESSION['accno'];

$select = "SELECT * FROM user_account Where acc_no = $id";
$result = mysqli_query($connect, $select);
$count =  mysqli_num_rows($result);

if ($count == 1) {
	while ($row = mysqli_fetch_assoc($result)) {
		$type = $row['type'];
	}
}
?>
<!doctype html>
<html>

<head>
	<title>Account Information</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="css/indexx.css">
</head>

<body>
	<?php require_once 'includes/navbar.php'; ?>
	<div class="tab1" id="tab1"><?php require_once 'includes/dashboard.php'; ?></div>
	<div class="tab2--hidden" id="tab2"><?php require_once 'includes/profile.php'; ?></div>
	<div class="tab3--hidden" id="tab3">
		<?php
		//read data from database table
		$select = "SELECT * FROM user_account WHERE acc_no =$id";
		$result = mysqli_query($connect, $select);

		while ($row = mysqli_fetch_assoc($result)) {
			$status = $row['verification'];
		}
		if ($status == "verified") {
			require_once "includes/request.php";
		} else if ($status == "unverified") {
			echo ('<script type="text/javascript" src="js/profilebtn.js"></script>');
			require_once "includes/nf_verified.php";
		} else if ($status == "pending") {
			require_once "includes/nf_verified.php";
		} else {
			echo "<script>alert(Error)</script>";
		}
		?>
		<input type="hidden" name="type" id="type" value="<?php echo $type ?>"></input>
	</div>

	<!-- Javascripts -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="js/mainScriptx1.js"></script>
	<script type="text/javascript" src="js/request.js"></script>
</body>

</html>
