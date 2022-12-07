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

$id =$_GET['id'];
$reqid = $_GET['reqid'];

$select = "SELECT * FROM appointment WHERE acc_no = $id AND req_id = $reqid";
$result = mysqli_query($connect,$select);
if (mysqli_num_rows($result) == 1) 
{
	while($row = mysqli_fetch_assoc($result)) 
	{
		$qr = $row["qr"]; 
		if($qr == NULL || ""){
			echo "No results found.";
		}
		else{
			echo '<div class="container d-flex justify-content-center align-items-center" style="height:99vh; width:100%;"><div style="width:auto;"><a href="Images/' . $qr . '" download><img class="rounded" style="height:300px;" src="Images/'.$qr.'"></a></div></div>';
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