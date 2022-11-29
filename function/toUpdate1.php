<?php

    session_start();

    $id = $_SESSION["accno"];

    require_once "connect.php";
    $user = $_POST["user"];
    $pass = md5($_POST["pass"]);
    $email = $_POST["email"];
    $first = $_POST["first"];
    $mid = $_POST["mid"];
    $last = $_POST["last"];
    $status = "pending";

    $select = "SELECT * FROM user_account WHERE acc_no = $id";
	$result = mysqli_query($connect,$select);
    while($row = mysqli_fetch_assoc($result)){
        $type = $row["type"];
        $stats = $row["verified"];
    }

    if($type == "student"){
        $studno = $_POST["studno"];
        $col = $_POST["college"];
        $cour = $_POST["course"];
        $year = $_POST["year"];
        $sec = $_POST["section"];
        $v_idpdf = "";
        $corpdf=$_FILES['cor']['name']; //additional codes para sa PDF
        $corpdf_type=$_FILES['cor']['type']; //additional codes para sa PDF
        $corpdf_size=$_FILES['cor']['size']; //additional codes para sa PDF
        $corpdf_tem_loc=$_FILES['cor']['tmp_name']; //additional codes para sa PDF
        $corpdf_store="../files/".$corpdf; //additional codes para sa PDF

        move_uploaded_file($corpdf_tem_loc,$corpdf_store);
    }
    else if($type == "employee"){
        $empno = $_POST['empno'];
        $corpdf = "";
        $v_idpdf=$_FILES['v_id']['name']; //additional codes para sa PDF
        $v_idpdf_type=$_FILES['v_id']['type']; //additional codes para sa PDF
        $v_idpdf_size=$_FILES['v_id']['size']; //additional codes para sa PDF
        $v_idpdf_tem_loc=$_FILES['v_id']['tmp_name']; //additional codes para sa PDF
        $v_idpdf_store="../files/".$v_idpdf; //additional codes para sa PDF

        move_uploaded_file($v_idpdf_tem_loc,$v_idpdf_store);
    }
    else if($type == "visitor"){
        $corpdf = "";
        $v_idpdf=$_FILES['v_id']['name']; //additional codes para sa PDF
        $v_idpdf_type=$_FILES['v_id']['type']; //additional codes para sa PDF
        $v_idpdf_size=$_FILES['v_id']['size']; //additional codes para sa PDF
        $v_idpdf_tem_loc=$_FILES['v_id']['tmp_name']; //additional codes para sa PDF
        $v_idpdf_store="../files/".$v_idpdf; //additional codes para sa PDF

        move_uploaded_file($v_idpdf_tem_loc,$v_idpdf_store);
    }
    else{
        echo "<script>alert('Error')</script>";
    }

    $vaxpdf=$_FILES['vax']['name']; //additional codes para sa PDF
    $vaxpdf_type=$_FILES['vax']['type']; //additional codes para sa PDF
    $vaxpdf_size=$_FILES['vax']['size']; //additional codes para sa PDF
    $vaxpdf_tem_loc=$_FILES['vax']['tmp_name']; //additional codes para sa PDF
    $vaxpdf_store="../files/".$vaxpdf; //additional codes para sa PDF

    move_uploaded_file($vaxpdf_tem_loc,$vaxpdf_store);

    if($vaxpdf && $corpdf || $v_idpdf  != "" || NULL){
        if($type == "student"){
            if($stats == "unverified"){
                $update = "UPDATE user_account SET first = '$first', last = '$last', middle = '$mid', email = '$email', stud_no = '$studno', username = '$user', password = '$pass', cor = '$corpdf', vax = '$vaxpdf', verified ='$status',college='$col', course ='$cour', year='$year',section='$sec' WHERE acc_no = $id";
                if(mysqli_query($connect,$update)){
                    echo "<script>alert('Update Success.')</script>";
                    header("refresh: 0; url='../index.php'");
                }
                else{
                    echo "<script>alert('Update Failed.')</script>";	
                }
            }
            else{
                $update = "UPDATE user_account SET first = '$first', last = '$last', middle = '$mid', email = '$email', stud_no = '$studno', username = '$user', password = '$pass', cor = '$corpdf', vax = '$vaxpdf',college='$col', course ='$cour', year='$year',section='$sec' WHERE acc_no = $id";
                if(mysqli_query($connect,$update)){
                    echo "<script>alert('Update Success.')</script>";
                    header("refresh: 0; url='../index.php'");
                }
                else{
                    echo "<script>alert('Update Failed.')</script>";	
                }
            }
        }
        else if($type == 'employee'){
            if($stats =="unverified"){
                $update = "UPDATE user_account SET first = '$first', last = '$last', middle = '$mid', email = '$email', emp_no = '$empno', username = '$user', password = '$pass', valid_id = '$v_idpdf', vax = '$vaxpdf', verified ='$status' WHERE acc_no = $id";
                if(mysqli_query($connect,$update)){
                    echo "<script>alert('Update Success.')</script>";
                    header("refresh: 0; url='../index.php'");
                }
                else{
                    echo "<script>alert('Update Failed.')</script>";	
                }
            }
            else{
                $update = "UPDATE user_account SET first = '$first', last = '$last', middle = '$mid', email = '$email', emp_no = '$empno', username = '$user', password = '$pass', valid_id = '$v_idpdf', vax = '$vaxpdf' WHERE acc_no = $id";
                if(mysqli_query($connect,$update)){
                    echo "<script>alert('Update Success.')</script>";
                    header("refresh: 0; url='../index.php'");
                }
                else{
                    echo "<script>alert('Update Failed.')</script>";	
                }
            }
            
        }
        else if($type == 'visitor'){
            if($stats == "unverified"){
                $update = "UPDATE user_account SET first = '$first', last = '$last', middle = '$mid', email = '$email', username = '$user', password = '$pass', valid_id = '$v_idpdf', vax = '$vaxpdf', verified ='$status' WHERE acc_no = $id";
                if(mysqli_query($connect,$update))
                {
                    echo "<script>alert('Update Success.')</script>";
                    header("refresh: 0; url='../index.php'");
                }
                else
                {
                    echo "<script>alert('Update Failed.')</script>";	
                }
            }
            else{
                $update = "UPDATE user_account SET first = '$first', last = '$last', middle = '$mid', email = '$email', username = '$user', password = '$pass', valid_id = '$v_idpdf', vax = '$vaxpdf' WHERE acc_no = $id";
                if(mysqli_query($connect,$update))
                {
                    echo "<script>alert('Update Success.')</script>";
                    header("refresh: 0; url='../index.php'");
                }
                else
                {
                    echo "<script>alert('Update Failed.')</script>";	
                }
            }
            
        }
        else{
            echo "<script>alert('Failed')</script>";
        }
    }
    else{
        echo "<script>alert('Failed')</script>";
        header("location:javascript://history.go(-1)");

    }
?>