<?php
session_start();
require_once "../function/connect.php";

if (isset($_POST["admin"])){
    $col = $_SESSION["department"];   
    $query = "SELECT * FROM user_account WHERE college ='$col' AND type = 'student'";
} elseif(isset($_POST["superadmin"])) {
    $query = "SELECT * FROM user_account";
}
$result = mysqli_query($connect, $query);

if (!$result) {
    die("Invalid query: " . $connect->connect_error);
}

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    if($row['type'] == 'student'){
        $yrsec = $row['year'].$row['section'];
        $course = $row['course'];
    }else{
        $yrsec = "N/A";
        $course = "N/A";
    }
    
    
    $data[] = (object) [
        "accNo" => $row['acc_no'],
        "studentNo" => $row['stud_no'],
        "empNo" => $row['emp_no'],
        "course" => $course,
        "year" => $yrsec,
        "fullName" => $row["first"] . " " . $row["middle"] . ". " . $row["last"],
        "type" => $row['type'],
        "verification" => $row['verification'],
    ];
}

echo json_encode((array) $data);
