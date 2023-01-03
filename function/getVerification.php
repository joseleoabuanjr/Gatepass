<?php
session_start();
require_once "../function/connect.php";

if (isset($_POST["admin"])) {
    $col = $_SESSION["department"];
    $query = "SELECT * FROM user_account WHERE verification = 'pending' AND college ='$col' AND type = 'student'";
} elseif (isset($_POST["superadmin"])) {
    $query = "SELECT * FROM user_account WHERE verification = 'pending'";
}
$result = mysqli_query($connect, $query);

if (!$result) {
    die("Invalid query: " . $connect->connect_error);
}

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = (object) [
        "accNo" => $row['acc_no'],
        "fullName" => $row["first"] . " " . $row["middle"] . ". " . $row["last"],
        "type" => $row['type'],
        "studentNo" => $row['stud_no'] == 0 ? "" : $row['stud_no'],
        "empNo" => $row['emp_no'] == 0 ? "" : $row['emp_no'],
        "contactNo" => $row['contact_no'],
        "cor" => $row['cor'],
        "vax" => $row['vax'],
        "vid" => $row['valid_id'],
    ];
}

echo json_encode((array) $data);
