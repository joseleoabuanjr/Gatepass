<?php
    session_start();
    require 'connect.php';
    $emailinput = $_POST["emailinput"];
    

    //read data from database table
	$select = "SELECT * FROM user_account WHERE email = '$emailinput';";
	$result = mysqli_query($connect,$select);
	$count =  mysqli_num_rows ($result);
    if($count > 0)
	{
        header("refresh: 0; url=../forgotpassword.php");
	}

    else {
        header("refresh: 0; url=../forgotpassword_email.php");
    }
?>
