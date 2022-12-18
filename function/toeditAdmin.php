<?php
session_start();
//db connection
require_once "connect.php";

if(isset($_POST['getadmindetails'])){
    $id = $_POST['getadmindetails'];
    $passw = md5($_POST['pass']);

    if($passw != $_SESSION["passadmin"]){
        echo json_encode(array("status" => false));
    }else{
        $select = "SELECT * FROM admin_account WHERE id = '$id'";
        $result = mysqli_query($connect, $select);
        if(mysqli_num_rows($result)){
            if($row = mysqli_fetch_assoc($result)){
                $user = $row['username'];
                $pass = $row['password'];
                $col = $row['department'];
                echo json_encode(array("status" => true, "user" => $user, "pass"=>$pass, "col"=>$col));
            }
        }
    }
}
?>