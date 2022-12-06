<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
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
			echo '<center><img style="width:100%; height:auto" src="Images/'.$qr.'"></center>';
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