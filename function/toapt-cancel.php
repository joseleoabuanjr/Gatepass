<?php
    $id=$_GET['id'];
    $reqid=$_GET['req'];
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
                    echo 'The file ' . $filename . ' was deleted successfully!';
                }
                else {
                    echo 'There was a error deleting the file ' . $filename;
                }
            }
			echo "<script>alert('Cancel Success')</script>";	
            header("refresh: 0; url= ../appointment.php");	
		}
        else{
                echo "<script>alert('Delete Failed.')</script>";	
        }
	}
    else{
        echo "<script>alert('No Result')</script>";
    }    
?>