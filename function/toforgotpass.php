<?php
    session_start();
    require 'connect.php';
    $emailinput = $_POST["email"];
    

    //read data from database table
	$select = "SELECT * FROM user_account WHERE email = '$emailinput'";
	$result = mysqli_query($connect,$select);
	$count =  mysqli_num_rows ($result);
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['acc_no'];
    }
    if($count > 0)
	{
        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz!@#$%^&*';
        $temp_pass = substr(str_shuffle($data), 0, 8);
        $newpass = md5($temp_pass);

        $update = "UPDATE user_account SET password = '$newpass' WHERE email = '$emailinput'";
            if(mysqli_query($connect,$update)){
                require "../email/forgotpass.php";
            }
            else{
                echo json_encode(array("status" => false, "sql"=>$update, "error"=>mysqli_error($connect)));
                // echo "<script>alert('Update Failed.')</script>";	
            }
	}
    else {
        echo json_encode(array("status" => false, "msg" => "You have entered unregistered email address!"));
        // header("refresh: 0; url=../landing-page.php");
    }
?>
