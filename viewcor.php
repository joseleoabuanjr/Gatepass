<?php
require_once "function/connect.php";

session_start();

$id =$_GET['id'];

$select = "SELECT * FROM user_account WHERE acc_no = $id";
$result = mysqli_query($connect,$select);
if (mysqli_num_rows($result) == 1) 
{
	while($row = mysqli_fetch_assoc($result)) 
	{
		$cor = $row["cor"]; //yung attach baguhin mo sa kung ano name ng column mo
		if($cor == NULL || ""){
			echo "No results found.";
			header("refresh: 2; url=index.php");
		}
		else{
			echo '<embed type="application/pdf" src="files/'.$cor.'" width="100%" height="100%">'; //eto pag display nung PDF galing SQL
		}
		
    }
} 
else 
{
    echo "No results found.";
}

mysqli_close($connect);
?>
