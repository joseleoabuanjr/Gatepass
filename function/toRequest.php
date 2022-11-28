<?php
    
    require 'connect.php';

    $id = $_GET['id'];
    $pps = $_POST['purpose'];
    $date = $_POST['date'];
    $req = "pending";
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
        }
        $name = $first." ".$mid.". ".$last;

        //--REQUEST CREATION;
        if($pps == "Other"){
            $reason = $_POST["reason"];
            //insert data to appt_request table form user_account table;
            $update = "UPDATE user_account SET req_status ='$req',reason ='$reason',date_apt ='$date' WHERE acc_no = $accno";
            if(mysqli_query($connect,$update)){
                header("Location: ../index.php");
            }
        }
        else{
            $reason = $pps;
            //insert data to appt_request table form user_account table;
            $update = "UPDATE user_account SET req_status ='$req',reason ='$reason',date_apt ='$date' WHERE acc_no = $accno";
            if(mysqli_query($connect,$update)){
                header("Location: ../index.php");
            }
        }
    }
    else{
        echo "<script>alert('empty')</script>";
    }
?>