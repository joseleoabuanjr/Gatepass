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
                $first = $row['first'];
                $last = $row['last'];
                $mid = $row['middle'];
                $pnum = $row['contact_no'];
                $bday = $row['birthday'];
                $add = $row['address'];
				$cname = $row['cp_name'];
				$contnum = $row['cp_no'];
                $studno = $row['stud_no'];
                $empno = $row['emp_no'];
                $col = $row['college'];
				$course = $row['course'];
				$yr = $row['year'];
				$sec = $row['section'];
                $user = $row['username'];
                $pass = $row['password'];
                $email = $row['email'];
                $type = $row['type'];
                $vcode = $row['v_code'];
                $img = $row['image'];
                $cor = $row['cor'];
                $v_id = $row['valid_id'];
                $vax = $row["vax"];
                $qr = $row['qr'];
                
            }

        //Validate inputed verification code with database verification code;
        if($vcode == $in_vcode){
            $verif = "unverified";
            //insert data to database table
            $renewal = date('Y-m-d', strtotime(' + 5 years'));
            $insert = "INSERT INTO user_account (acc_no,first,middle,last,contact_no,birthday,address,cp_name,cp_no,stud_no,emp_no,college,course,year,section,username,password,email,image,cor,valid_id,vax,verification,qr,type,renewal) VALUES ('$accno','$first','$mid','$last','$pnum','$bday','$add','$cname','$contnum','$studno','$empno','$col','$course','$yr','$sec','$user','$pass','$email','$img','$cor','$v_id','$vax','$verif','$qr','$type','$renewal')";

            if(mysqli_query($connect,$insert)){
                //delete data of acc_no from database table;
                $delete = "DELETE FROM acc_temp WHERE acc_no = $id;";

                if(mysqli_query($connect,$delete)){
                    header("refresh: 0; url=../dashboard.php");
                }
			}
            else{
                echo "<script>alert('Register Failed.')</script>";	
            }

        }
        else{
            echo "<script>alert('Invalid verification code')</script>";
            header("refresh: 0; url=../verification.php?id=$accno");
        }
    }
    else{
        echo "<script>alert('Verification code not found')</script>;";
    }
?>
