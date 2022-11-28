<?php
    $id=$_GET['id'];

    //connect to database
    require_once "connect.php";
    
    //read data to database table
    $select1 = "SELECT * FROM user_account WHERE acc_no='$id'";
    $result1 = mysqli_query($connect,$select1);
    $count1 =  mysqli_num_rows ($result1);

    if($count1 == 1){
        
		$update = "UPDATE user_account SET verified = 'no', cor = NULL, vax = NULL, valid_id = NULL WHERE acc_no= '$id'";
        $result = mysqli_query($connect,$update);
        if(mysqli_query($connect,$update))
		{
            require "../email/fv_denied.php";
		}
        else{
                echo "<script>alert('Denied Failed.')</script>";	
        }
	}
    else{
        echo "<script>alert('No Result')</script>";
    }
?>