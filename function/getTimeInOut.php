<?php
session_start();
require_once "../function/connect.php";

$col = $_SESSION["department"];

$query = "SELECT * FROM time_inout WHERE college ='$col' AND type = 'student' ORDER BY time DESC";
$result = mysqli_query($connect, $query);
$data = array();
if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = (object) [
            "account_no" => $row['account_no'],
            "reasons" => explode(',', $row['reason']),
            "name" => $row['name'],
            "type" => $row['type'],
            "in_out" => $row['in_out'],
            "time" => $row['time'],
            "query" => $query,
        ];
    }
}
echo json_encode((array) $data);
