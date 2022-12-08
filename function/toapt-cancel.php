<?php
    $id=$_POST['accno'];
    $reqid=$_POST['reqid'];
    //connect to database
    require_once "connect.php";
    
    //read data to database table
    $select1 = "SELECT * FROM appointment WHERE req_id='$reqid' AND acc_no='$id'";
    $result1 = mysqli_query($connect,$select1);
    $count1 =  mysqli_num_rows ($result1);
    while($row = mysqli_fetch_assoc($result1)){
        $qrfile = $row["qr"];
    }
    if($count1 == 1){
		$delete = "DELETE FROM appointment WHERE req_id='$reqid' AND acc_no='$id'";
        $result = mysqli_query($connect,$delete);
        if(mysqli_query($connect,$delete))
		{
            $filename = $qrfile;
            if($filename != NULL|| ""){
                if (unlink($filename)) {
                }
                else {
                }
            }
            echo json_encode(array("status" => true));
		}
        else {
            echo json_encode(array("status" => false));
        }
	}
    else{
        echo json_encode(array("status" => false));
    }
