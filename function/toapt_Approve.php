<?php
    //include qr api
    require_once "../phpqrcode/qrlib.php";
    include 'connect.php';

    $id = $_GET["id"];
    $reqid = $_GET["reqid"];
    $status = "approved";

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

        $text = $id.":".$reqid.":".$name.":".rand(10,9999);//Only the student number will  be saved in the QR Code;
				//If you want every information be stored in the QR Code use the code below instead;
				
        $path = '../Images/'; //name of folder where to store all QR Images
        $file = $path.$id.".png"; //format of filename for each QR Images created. Ex: Images/2022123456.png;
        QRcode::png($text, $file, 'L', 5, 2); //generates QR Images, Parameters are (Text Contents, File Name, ECC, QRSize, FrameSize);
        
        $update = "UPDATE appointment SET status = '$status', qr ='$file' WHERE acc_no = $id AND req_id = '$reqid'";

        if(mysqli_query($connect,$update))
        {
            echo "<script>alert('Update Success.')</script>";
            require "../email/fv_approve.php";
        }
        else
        {
            echo "<script>alert('Update Failed.')</script>";	
        }
    }
?>