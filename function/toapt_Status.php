<?php
//include qr api
require_once "../phpqrcode/qrlib.php";
include 'connect.php';

$id = $_POST["accno"];
$reqid = $_POST["reqid"];
$status = $_POST["status"];

if ($status == "approve"){
    $status = "approved";
}else if ( $status == "reject"){
    $status = "rejected";
}

if ($status == "approved") {
    $select = "SELECT * FROM user_account WHERE acc_no = $id";
    $result = mysqli_query($connect, $select);
    $count =  mysqli_num_rows($result);
    if ($count == 1) {

        //get value form database table;
        while ($row = mysqli_fetch_assoc($result)) {

            $accno = $row['acc_no'];
            $first = $row['first'];
            $mid = $row['middle'];
            $last = $row['last'];
            $type = $row['type'];
        }
        $random = rand(100,999);
        $name = $first . " " . $mid . " " . $last;
        
        $text = $id . ":" . $reqid . ":" . $name . ":" . $random; //Only the student number will  be saved in the QR Code;
        //If you want every information be stored in the QR Code use the code below instead;

        $path = '../Images/'; //name of folder where to store all QR Images
        $file = $path . $id . "-" . $random . ".png"; //format of filename for each QR Images created. Ex: Images/2022123456.png;
        QRcode::png($text, $file, 'L', 5, 2); //generates QR Images, Parameters are (Text Contents, File Name, ECC, QRSize, FrameSize);

        $update = "UPDATE appointment SET status = '$status', qr ='$file' WHERE acc_no = $id AND req_id = '$reqid'";

        if (mysqli_query($connect, $update)) {
            require "../email/apt_approved.php";
        } else {
            echo json_encode(array("status" => false, "sql" => $update, "error" => mysqli_error($connect)));
        }
    }
} else {
    $select1 = "SELECT * FROM user_account WHERE acc_no='$id'";
    $result1 = mysqli_query($connect,$select1);
    $count1 =  mysqli_num_rows ($result1);

    if($count1 == 1){
        
		$update = "UPDATE appointment SET status = 'rejected' WHERE acc_no= '$id' AND req_id = '$reqid'";
        $result = mysqli_query($connect,$update);
        if (mysqli_query($connect, $update)) {
            require "../email/apt_denied.php";
        } else {
            echo json_encode(array("status" => false, "sql" => $update, "error" => mysqli_error($connect)));
        }
	}
    else{
        echo json_encode(array("status" => false, "sql" => $update, "error" => mysqli_error($connect)));
    }
}
