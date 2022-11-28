<?php
    $id=$_GET['id'];
    require_once "connect.php";
			
    if($id== 4){
        $user = $_POST["user"];
        $pass = md5($_POST["pass"]);
        $email = $_POST["email"];
        $insert = "INSERT INTO admin_account (username,
                                            password,
                                            email) 
                    VALUES ('$user',
                            '$pass',
                            '$email')";
        if(mysqli_query($connect,$insert))
        {
            echo "<script>alert('Register Success.')</script>";	
        }
        else
        {
            echo "<script>alert('Register Failed.')</script>";	
        }
        mysqli_close($connect);
    }
    else{
        echo "<script>alert('Action Failed.')</script>";
    }
?>