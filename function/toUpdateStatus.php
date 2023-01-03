<?php
// //include qr api
// require_once "../phpqrcode/qrlib.php";
include 'connect.php';

$id = $_POST["accno"];
$status = $_POST["status"];
$statusemail = "";
$subject = "Account Status";
if(isset($_POST["qrstatus"])){
    $qrstats = $_POST["qrstatus"];
}else{
    $qrstats = 'granted';
}
if($status == "unblock"){
    $statusemail= "unblock";
    $status = "verified";
}else if ($status == "block"){
    $status = "blocked";
}else if ($status == "approve"){
    $subject = "Account Verification";
    $status = "verified";
}else if ( $status == "deny"){
    $subject = "Account Verification";
    $status = "unverified";
}

if (isset($_POST["SET_USER_STATUS"])) {
    $reasonSql = '';
    if(isset($_POST['reason'])) {
        $reason = $_POST['reason'];
        $reasonSql = ", verification_note='$reason'";
    }
    $update = "UPDATE user_account SET verification= '$status', qr_status= '$qrstats'$reasonSql WHERE acc_no = $id";
    if (mysqli_query($connect, $update)) {
        require "../email/userStatus.php";
    } else {
        echo json_encode(array("status" => false, "sql" => $update, "error" => mysqli_error($connect)));
    }
} else if (isset($_POST["SET_VERIFICATION_STATUS"])) {
    $update = "UPDATE user_account SET verification= '$status', qr_status= '$qrstats' WHERE acc_no = $id";
    if (mysqli_query($connect, $update)) {
        require "../email/userStatus.php";
    } else {
        echo json_encode(array("status" => false, "sql" => $update, "error" => mysqli_error($connect)));
    }
}
