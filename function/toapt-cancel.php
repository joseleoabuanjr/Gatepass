<?php
    $id=$_GET['id'];

    //connect to database
    require_once "connect.php";
    
    //read data to database table
    $select1 = "SELECT * FROM appointment WHERE acc_no='$id'";
    $result1 = mysqli_query($connect,$select1);
    $count1 =  mysqli_num_rows ($result1);

    if($count1 == 1){
		$delete = "DELETE FROM appointment WHERE acc_no='$id'";
        $result = mysqli_query($connect,$delete);
        if(mysqli_query($connect,$delete))
		{
			echo "<script>alert('Delete Success')</script>";	
            header("refresh: 0; url= ../admin.php");	
		}
        else{
                echo "<script>alert('Delete Failed.')</script>";	
        }
	}
    else{
        echo "<script>alert('No Result')</script>";
    }

    
?>