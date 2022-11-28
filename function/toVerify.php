<?php

    require "connect.php";

    $id = $_GET["id"];

    if(!$_POST["vcode"] == ""||NULL){

        $in_vcode = $_POST["vcode"];
    }
    else{
        echo "<script>alert('Input field is empty')</script>";
    }

    // read data form temp database table for validation;
    $select = "SELECT * FROM acc_temp Where acc_no = $id";
    $result = mysqli_query($connect,$select);
	$count =  mysqli_num_rows ($result);
    
    if($count == 1){
        while($row = mysqli_fetch_assoc($result)) 
            {
                $accno= $row['acc_no'];
                $user = $row['username'];
                $pass = $row['password'];
                $email = $row['email'];
                $studno = $row['stud_no'];
                $empno = $row['emp_no'];
                $type = $row['type'];
                $vcode = $row['v_code'];
                $first = $row['first'];
                $last = $row['last'];
                $mid = $row['middle'];
                $img = $row['image'];
                $qr = $row['qr'];
            }

        //Validate inputed verification code with database verification code;
        if($vcode == $in_vcode){
            $fv = "no";
            $req = "none";
            //insert data to database table
            $insert = "INSERT INTO user_account(acc_no,username,password,email,stud_no,emp_no,type,first,last,middle,image,qr,verified,req_status) VALUES ('$accno','$user','$pass','$email','$studno','$empno','$type','$first','$last','$mid','$img','$qr','$fv','$req')";

            if(mysqli_query($connect,$insert)){
                //delete data of acc_no from database table;
                $delete = "DELETE FROM acc_temp WHERE acc_no = $id;";

                if(mysqli_query($connect,$delete)){
                    
                    header("refresh: 0; url=../index.php");
                }
                else{
                    echo "<script>alert('Delete Failed.')</script>";	
                }
			}
            else{
                echo "<script>alert('Register Failed.')</script>";	
            }

        }
        else{
            echo "<script>alert('Invalid verification code')</script>;";
            header("refresh: 0; url=verification.php?id=$accno");
        }
    }
    else{
        echo "<script>alert('Verification code not found')</script>;";
    }
?>