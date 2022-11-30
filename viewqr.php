<?php
require_once "function/connect.php";

session_start();

$id =$_GET['id'];

$select = "SELECT * FROM appointment WHERE acc_no = $id";
$result = mysqli_query($connect,$select);
if (mysqli_num_rows($result) == 1) 
{
	while($row = mysqli_fetch_assoc($result)) 
	{
		$qr = $row["qr"]; 
		if($qr == NULL || ""){
			echo "No results found.";
			header("refresh: 2; url=index.php");
		}
		else{
			echo '<img src="Images/'.$qr.'" height="300" width="300">';
		}
		
    }
} 
else 
{
    echo "No results found.";
}

mysqli_close($connect);
?>