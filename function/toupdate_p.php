<?php

    session_start();

    $id = $_SESSION["accno"];

    require_once "connect.php";

    $query = "UPDATE form SET ";
    if(isset($_POST["email"])){
        $email = $_POST["email"];
        $query .= "email = '$email', ";
    }
    if(isset($_POST["first"])){
        $first= $_POST["first"];
        $query .= "first = '$first', ";
    }
    if(isset($_POST["mid"])){
        $mid = $_POST["mid"];
        $query .= "mid = '$mid', ";
    }
    if(isset($_POST["last"])){
        $last = $_POST["last"];
        $query .= "last = '$last', ";
    }
    if(isset($_POST["studno"])){
        $studno = $_POST["studno"];
        $query .= "stud_no = '$studno', ";
    }
    if(isset($_POST["empno"])){
        $empno = $_POST["empno"];
        $query .= "emp_no = '$empno', ";
    }
    if(isset($_POST["contact"])){
        $pnum = $_POST["contact"];
        $query .= "contact_no = '$pnum', ";
    }
    if(isset($_POST["dob"])){
        $bday = $_POST["dob"];
        $query .= "birthday = '$bday', ";
    }
    if(isset($_POST["address"])){
        $add = $_POST["address"];
        $query .= "address = '$add', ";
    }
    if(isset($_POST["college"])){
        $col = $_POST["college"];
        $query .= "college = '$col', ";
    }
    if(isset($_POST["course"])){
        $course = $_POST["course"];
        $query .= "course = '$course', ";
    }
    if(isset($_POST["year"])){
        $yr = $_POST["year"];
        $query .= "year = '$yr', ";
    }
    if(isset($_POST["section"])){
        $sec = $_POST["section"];
        $query .= "section = '$sec', ";
    }
    if(isset($_POST["image"])){
        $img = base64_encode(file_get_contents(addslashes($_FILES["image"]["tmp_name"])));
        $query .= "image = '$img', ";
    }
    if(isset($_POST["contact_p"])){
        $cp_name = $_POST["contact_p"];
        $query .= "cp_name = '$cp_name', ";
    }
    if(isset($_POST["contact_pnum"])){
        $cpno = $_POST["contact_pnum"];
        $query .= "cp_no = '$cpno',";
    }
    if(isset($_POST["cor"])){
        $corpdf = $_FILES['cor']['name']; //additional codes para sa PDF
        $corpdf_type = $_FILES['cor']['type']; //additional codes para sa PDF
        $corpdf_size = $_FILES['cor']['size']; //additional codes para sa PDF
        $corpdf_tem_loc = $_FILES['cor']['tmp_name']; //additional codes para sa PDF
        $corpdf_store = "../files/" . $corpdf; //additional codes para sa PDF

        $query .= "cor = '$corpdf', ";

        move_uploaded_file($corpdf_tem_loc, $corpdf_store);
    }
    if(isset($_POST["vax"])){
        $vaxpdf = $_FILES['vax']['name']; //additional codes para sa PDF
        $vaxpdf_type = $_FILES['vax']['type']; //additional codes para sa PDF
        $vaxpdf_size = $_FILES['vax']['size']; //additional codes para sa PDF
        $vaxpdf_tem_loc = $_FILES['vax']['tmp_name']; //additional codes para sa PDF
        $vaxpdf_store = "../files/" . $vaxpdf; //additional codes para sa PDF

        $query .= "vax = '$vaxpdf', ";

        move_uploaded_file($vaxpdf_tem_loc, $vaxpdf_store);
    }
    if(isset($_POST["vid"])){
        $v_idpdf = $_FILES['vid']['name']; //additional codes para sa PDF
        $v_idpdf_type = $_FILES['vid']['type']; //additional codes para sa PDF
        $v_idpdf_size = $_FILES['vid']['size']; //additional codes para sa PDF
        $v_idpdf_tem_loc = $_FILES['vid']['tmp_name']; //additional codes para sa PDF
        $v_idpdf_store = "../files/" . $v_idpdf; //additional codes para sa PDF

        $query .= "valid_id = '$v_idpdf', ";

        move_uploaded_file($v_idpdf_tem_loc, $v_idpdf_store);
    }

    $query .= "WHERE acc_no = '$id'";

    // strip off any extra commas on the end
    $query = rtrim($query, ',');

    echo $query;

    if(mysqli_query($connect,$query)){
        echo "<script>alert('Update Success.')</script>";
        header("refresh: 0; url='../index.php'");
    }
    else{
        echo "<script>alert('Update Failed.')</script>";	
    }