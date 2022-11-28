<?php
    // //include qr api
    // require_once "../phpqrcode/qrlib.php";
    include 'connect.php';

    $id = $_GET["id"];
    $status = "yes";

    // $text = $id;	//Only the student number will  be saved in the QR Code;
    //                 //If you want every information be stored in the QR Code use the code below instead;
    // $idqr = $id.rand(10,99);
    // $path = '../Images/'; 		//name of folder where to store all QR Images
    // $file = $path.$idqr.".png"; 	//format of filename for each QR Images created. Ex: Images/2022123456.png;
    // QRcode::png($text, $file, 'L', 5, 2); //generates QR Images, Parameters are (Text Contents, File Name, ECC, QRSize, FrameSize);

    $update = "UPDATE user_account SET verified = '$status' WHERE acc_no = $id";

    if(mysqli_query($connect,$update))
    {
        echo "<script>alert('Update Success.')</script>";
        require "../email/apt_approve.php";
    }
    else
    {
        echo "<script>alert('Update Failed.')</script>";	
    }
?>