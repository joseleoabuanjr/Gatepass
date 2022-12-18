<?php
    include 'connect.php';

    $id = $_POST["id"];
    $user = $_POST["user"];
    $status = $_POST["status"];

    if ($status == "archive"){
        $status = "true";
    }else{
        $status = "false";
    }
    
    $update = "UPDATE admin_account SET archived = '$status' WHERE id = $id";

    if (mysqli_query($connect, $update)) {
        echo json_encode(array("status" => true));
    } else {
        echo json_encode(array("status" => false));
    }

?>