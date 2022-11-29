<?php
    session_start();
    // $id = $_SESSION["accno"];
    require 'connect.php';

    $password_input = $_POST["password_input"];
    $confirmpass_input = $_POST["confirmpass_input"];
    $email_input = $_SESSION["emailinput"];
    $pass = md5($password_input);

    if($password_input == $confirmpass_input){

        $update = "UPDATE user_account SET password = '$pass' WHERE email = '$email_input'";
                if(mysqli_query($connect,$update)){
                    echo "<script>alert('Update Success.')</script>";

                    header("refresh: 0; url=../landing-page.php");
                }
                else{
                    echo "<script>alert('Update Failed.')</script>";	
                }
    }

    else if($password_input != $confirmpass_input){
        echo "<script>alert('Update Unsuccessful.')</script>";

        header("refresh: 0; url=../forgotpassword.php");
    }

    
?>