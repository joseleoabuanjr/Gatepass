<?php
// //include qr api
// require_once "../phpqrcode/qrlib.php";
include 'connect.php';

$id = $_POST["accno"];
$status = $_POST["status"];
$qrstats = $_POST["qrstatus"];

if (isset($_POST["SET_USER_STATUS"])) {
    $update = "UPDATE user_account SET verification= '$status', qr_status= '$qrstats' WHERE acc_no = $id";
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
