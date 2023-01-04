<?php
session_start();
require_once "../function/connect.php";

$query = "SELECT * FROM appointment WHERE status = 'pending'";
$result = mysqli_query($connect, $query);

if (!$result) {
    die("Invalid query: " . $connect->connect_error);
}

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = (object) [
        "accNo" => $row['acc_no'],
        "reqId" => $row['req_id'],
        "name" => $row['name'],
        "type" => $row['type'],
        "reason" => $row['reason'],
        "date" => $row['date'],
    ];
}

echo json_encode((array) $data);
