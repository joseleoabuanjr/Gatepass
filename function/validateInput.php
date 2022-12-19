<?php
session_start();
require_once "connect.php";

if (isset($_POST["checkDuplicateEmail"])) {
    $email = $_POST["checkDuplicateEmail"];
    $query = "SELECT acc_no FROM acc_temp WHERE acc_temp.email='$email'";
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result)) {
        echo json_encode((object) [
            "status" => true,
            "msg" => "The email address you entered is already registered.",
        ]);
    } else {
        $query = "SELECT acc_no FROM user_account WHERE user_account.email='$email'";
        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result)) {
            echo json_encode((object) [
                "status" => true,
                "msg" => "The email address you entered is already registered.",
            ]);
        } else {
            echo json_encode((object) [
                "status" => false,
            ]);
        }
    }
} elseif (isset($_POST["checkDuplicateIDNo"])) {
    $id = $_POST["checkDuplicateIDNo"];
    $query = "SELECT acc_no FROM acc_temp WHERE acc_temp.stud_no='$id' OR acc_temp.emp_no='$id';";
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result)) {
        echo json_encode((object) [
            "status" => true,
            "msg" => "ID No is already exist",
        ]);
    } else {
        $query = "SELECT acc_no FROM user_account WHERE user_account.stud_no='$id' OR user_account.emp_no='$id';";
        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result)) {
            echo json_encode((object) [
                "status" => true,
                "msg" => "ID No is already exist",
            ]);
        } else {
            echo json_encode((object) [
                "status" => false,
            ]);
        }
    }
}
