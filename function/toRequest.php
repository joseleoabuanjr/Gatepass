<?php
    
    require 'connect.php';

    $id = $_GET['id'];
    $pps = $_POST['purpose'];
    $date= $_POST['date'];
    $scan_s = "denied";
    $apt_s = "pending";
    $exp = date_create($date);
    
    // Use date_add() function to add date object
    date_add($exp, date_interval_create_from_date_string("1 days"));
    
    // Display the added date
    $dexp = date_format($exp, "Y-m-d");

    //--CHECKING DATA
    //read data from database table;
    //to check if $id is in the database table;
    $select = "SELECT * FROM user_account WHERE acc_no = $id";
    $result = mysqli_query($connect,$select);
    $count =  mysqli_num_rows ($result);
    if($count == 1){

        //get value form database table;
        while($row = mysqli_fetch_assoc($result)){

                $accno = $row['acc_no'];
                $first = $row['first'];
                $mid = $row['middle'];
                $last = $row['last'];
                $type = $row['type'];
        }
        $name = $first." ".$mid.". ".$last;

        //--REQUEST CREATION;
        if($pps == "Other"){
            $reason = $_POST["reason"];
            //insert data to appt_request table form user_account table;
            $insert = "INSERT INTO appointment (acc_no,name,type,reason,date_apt,scan_stats,apt_stats,qr,apt_exp) VALUES ('$accno','$name','$type','$reason','$date','$scan_s','$apt_s','$qr','$dexp')";
            if(mysqli_query($connect,$insert))
            {
                header("Location: ../index.php");
            }
        }
        else{
            $reason = $pps;
            //insert data to appt_request table form user_account table;
            $insert = "INSERT INTO appointment (acc_no,name,type,reason,date_apt,scan_stats,apt_stats,qr,apt_exp) VALUES ('$accno','$name','$type','$reason','$date','$scan_s','$apt_s','$qr','$dexp')";
            if(mysqli_query($connect,$insert))
            {
                header("Location: ../index.php");
            }
        }
    }
    else{
        echo "<script>alert('empty')</script>";
    }
?>