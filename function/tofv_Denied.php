<?php
    $id=$_POST['accno'];

    //connect to database
    require_once "connect.php";
    
    //read data to database table
    $select1 = "SELECT * FROM user_account WHERE acc_no='$id'";
    $result1 = mysqli_query($connect,$select1);
    $count1 =  mysqli_num_rows ($result1);

    if($count1 == 1){
        
		$update = "UPDATE user_account SET verification = 'unverified' WHERE acc_no= '$id'";
        $result = mysqli_query($connect,$update);
        if(mysqli_query($connect,$update))
		{
            require "../email/fv_denied.php";
		}
        else{
            echo json_encode(array("status" => false, "sql"=>$update, "error"=>mysqli_error($connect)));
                // echo "<script>alert('Denied Failed.')</script>";	
        }
	}
    else{
        echo json_encode(array("status" => false, "sql"=>$select1));
        // echo "<script>alert('No Result')</script>";
    }
?>