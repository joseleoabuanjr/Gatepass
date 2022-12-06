<?php
    // //include qr api
    // require_once "../phpqrcode/qrlib.php";
    include 'connect.php';

    $id = $_POST["accno"];
    $status = "blocked";

    // $text = $id;	//Only the student number will  be saved in the QR Code;
    //                 //If you want every information be stored in the QR Code use the code below instead;
    // $idqr = $id.rand(10,99);
    // $path = '../Images/'; 		//name of folder where to store all QR Images
    // $file = $path.$idqr.".png"; 	//format of filename for each QR Images created. Ex: Images/2022123456.png;
    // QRcode::png($text, $file, 'L', 5, 2); //generates QR Images, Parameters are (Text Contents, File Name, ECC, QRSize, FrameSize);

    $update = "UPDATE user_account SET verification= '$status' WHERE acc_no = $id";

    if (mysqli_query($connect, $update)) {
        require "../email/userblocked.php";
    } else {
        echo json_encode(array("status" => false, "sql" => $update, "error" => mysqli_error($connect)));
    }
?>
