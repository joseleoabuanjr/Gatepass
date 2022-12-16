<?php
session_start();
require_once "../function/connect.php";
$department = $_SESSION["department"];


//verification 
if (isset($_POST['getPendingStudents'])) {
    $sql = "SELECT COUNT(acc_no) as pendingStudents
        FROM user_account
        WHERE college='$department' AND type='student' AND verification='pending'";
    $result =  mysqli_query($connect, $sql);
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['pendingStudents'];
        }
    }
} 

if (isset($_POST['getPendingEmployees'])) {
    $sql = "SELECT COUNT(acc_no) as pendingEmployees
        FROM user_account
        WHERE college='$department' AND type='employee' AND verification='pending'";
    $result =  mysqli_query($connect, $sql);
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['pendingEmployees'];
        }
    }
} 

if (isset($_POST['getPendingVisitors'])) {
    $sql = "SELECT COUNT(acc_no) as pendingVisitors
        FROM user_account
        WHERE college='$department' AND type='visitor' AND verification='pending'";
    $result =  mysqli_query($connect, $sql);
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['pendingVisitors'];
        }
    }
} 

//appointment
if (isset($_POST['getAppointmentStudents'])) {
    $sql = "SELECT COUNT(acc_no) as appointmentStudents
        FROM appointment
        WHERE college='$department' AND type='student' AND status='pending'";
    $result =  mysqli_query($connect, $sql);
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['appointmentStudents'];
        }
    }
}

if (isset($_POST['getAppointmentEmployees'])) {
    $sql = "SELECT COUNT(acc_no) as appointmentEmployees
        FROM appointment
        WHERE college='$department' AND type='employee' AND status='pending'";
    $result =  mysqli_query($connect, $sql);
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['appointmentEmployees'];
        }
    }
}

if (isset($_POST['getAppointmentVisitors'])) {
    $sql = "SELECT COUNT(acc_no) as appointmentVisitors
        FROM appointment
        WHERE college='$department' AND type='visitor' AND status='pending'";
    $result =  mysqli_query($connect, $sql);
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['appointmentVisitors'];
        }
    }
}