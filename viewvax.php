<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
	<?php
	require_once "function/connect.php";

	session_start();

	$id = $_GET['id'];

	$select = "SELECT * FROM user_account WHERE acc_no = $id";
	$result = mysqli_query($connect,$select);

	if (mysqli_num_rows($result) == 1) 
	{
		while($row = mysqli_fetch_assoc($result)) 
		{
			$vax = $row["vax"]; //yung attach baguhin mo sa kung ano name ng column mo
			if($vax == NULL || ""){
				echo "No results found.";
				header("refresh: 2; url=index.php");
			}
			else{
				echo '<div class="container d-flex justify-content-center align-items-center" style="height:100vh;"><img class="rounded mx-auto d-block" style="height:500px" src="files/'.$vax.'"></div>'; //eto pag display nung PDF galing SQL
			}
		}
	} 
	else 
	{
		echo "No results found.";
	}

	mysqli_close($connect);
	?>
</body>
</html>

