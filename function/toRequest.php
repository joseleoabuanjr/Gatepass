<?php
    
    //include qr api
    require_once "../phpqrcode/qrlib.php";
    require 'connect.php';

    $id = $_GET['id'];
    $pps = $_POST['purpose'];
    $date= $_POST['date'];
    $s_stats = "denied";
    $status = "pending";

    $select = "SELECT COALESCE(MAX(req_id),0)+1 FROM appointment WHERE acc_no = '$id';";
    $result = mysqli_query($connect,$select); 
    while($row = mysqli_fetch_assoc($result)){
        //convert to integer before passing of value;
        $reqid = (int)$row["COALESCE(MAX(req_id),0)+1"];
    }
    $select = "SELECT COALESCE(MAX(id),0)+1 FROM appointment WHERE acc_no = '$id';";
    $result = mysqli_query($connect,$select); 
    while($row = mysqli_fetch_assoc($result)){
        //convert to integer before passing of value;
        $apptid = (int)$row["COALESCE(MAX(id),0)+1"];
    }

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

        // $text = $id.":".$reqid.":".$name.":".rand(10,99);//Only the student number will  be saved in the QR Code;
		// 		//If you want every information be stored in the QR Code use the code below instead;
				
        // $path = '../Images/'; //name of folder where to store all QR Images
        // $file = $path.$id.".png"; //format of filename for each QR Images created. Ex: Images/2022123456.png;
        // QRcode::png($text, $file, 'L', 5, 2); //generates QR Images, Parameters are (Text Contents, File Name, ECC, QRSize, FrameSize);

        //--REQUEST CREATION;
        if($pps == "Other"){
            $reason = $_POST["reason"];
        }
        else{
            $reason = $pps;
            
        }
        //insert data to appt_request table form user_account table;
        $insert = "INSERT INTO appointment (id,req_id,acc_no,name,type,reason,status,date,qr_status) VALUES ('$apptid','$reqid','$accno','$name','$type','$reason','$status','$date','$s_stats')";
        if(mysqli_query($connect,$insert))
        {
            // header("Location: ../index.php");
        }
    }
    else{
        echo "<script>alert('empty')</script>";
    }
?>