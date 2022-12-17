<?php
session_start();
require_once "connect.php";

$id = $_SESSION["accno"];
$npassSet = false;
$npassValid = false;
$email = $_POST["email"];
$username = $_POST["user"];
$password = md5($_POST["pass"]);


if (isEmailDuplicate($connect, $email, $id)) {
    echo json_encode(array("status" => false, "msg" => "The email address you entered is already exist."));
} else if (isUsernameDuplicate($connect, $username, $id)) {
    echo json_encode(array("status" => false, "msg" => "The username you entered is already exist."));
} else if ($password == $_SESSION['password']) {

    $select = "SELECT * FROM user_account WHERE acc_no = $id";
    $result = mysqli_query($connect, $select);
    while ($row = mysqli_fetch_assoc($result)) {
        $type = $row["type"];
        $stats = $row["verification"];
    }

    if (isset($_POST['npass'])) {
        $npassSet = true;
        if ($_POST['npass'] == $_POST['npass1']) {
            $npassValid = true;
        }
    }

    $first = $_POST["first"];
    $last = $_POST["last"];
    $pnum = $_POST["contact"];
    $bday = $_POST["dob"];
    $add = $_POST["address"];

    $query = "UPDATE user_account SET email = '$email', first = '$first', last = '$last',  contact_no = '$pnum', birthday = '$bday', address = '$add', username = '$username', ";

    if ($_FILES["image"]["error"] == 0 && $_FILES["image"]["size"] != 0) {
        $img = base64_encode(file_get_contents(addslashes($_FILES["image"]["tmp_name"])));
        $query .= "image = '$img', ";
    }
    if ($type == 'student') {
        if (isset($_POST["college"])) {
            $col = $_POST["college"];
            $query .= "college = '$col', ";
        }
        if (isset($_POST["course"])) {
            $course = $_POST["course"];
            $query .= "course = '$course', ";
        }
        if (isset($_POST["year"])) {
            $yr = $_POST["year"];
            $query .= "year = '$yr', ";
        }
        if (isset($_POST["section"])) {
            $sec = $_POST["section"];
            $query .= "section = '$sec', ";
        }
        if ($_FILES["cor"]["error"] == 0 && $_FILES["cor"]["size"] != 0) {
            $corpdf = $_FILES['cor']['name']; //additional codes para sa PDF
            $corpdf_type = $_FILES['cor']['type']; //additional codes para sa PDF
            $corpdf_size = $_FILES['cor']['size']; //additional codes para sa PDF
            $corpdf_tem_loc = $_FILES['cor']['tmp_name']; //additional codes para sa PDF
            $corpdf_store = "../files/" . $corpdf; //additional codes para sa PDF

            $query .= "cor = '$corpdf', ";

            move_uploaded_file($corpdf_tem_loc, $corpdf_store);
        }
    }
    if (isset($_POST["mid"])) {
        $mid = $_POST["mid"];
        $query .= "mid = '$mid', ";
    }
    if (isset($_POST["empno"])) {
        $empno = $_POST["empno"];
        $query .= "emp_no = '$empno', ";
    }
    if (isset($_POST["contact_p"])) {
        $cp_name = $_POST["contact_p"];
        $query .= "cp_name = '$cp_name', ";
    }
    if (isset($_POST["contact_pnum"])) {
        $cpno = $_POST["contact_pnum"];
        $query .= "cp_no = '$cpno', ";
    }
    if ($npassValid) {
        $newPass = md5($_POST['npass']);
        $query .= "password = '$newPass', ";
    }
    if ($_FILES["vax"]["error"] == 0 && $_FILES["vax"]["size"] != 0) {
        $vaxpdf = $_FILES['vax']['name']; //additional codes para sa PDF
        $vaxpdf_type = $_FILES['vax']['type']; //additional codes para sa PDF
        $vaxpdf_size = $_FILES['vax']['size']; //additional codes para sa PDF
        $vaxpdf_tem_loc = $_FILES['vax']['tmp_name']; //additional codes para sa PDF
        $vaxpdf_store = "../files/" . $vaxpdf; //additional codes para sa PDF

        $query .= "vax = '$vaxpdf', ";

        move_uploaded_file($vaxpdf_tem_loc, $vaxpdf_store);
    }
    if ($_FILES["vid"]["error"] == 0 && $_FILES["vid"]["size"] != 0) {
        $v_idpdf = $_FILES['vid']['name']; //additional codes para sa PDF
        $v_idpdf_type = $_FILES['vid']['type']; //additional codes para sa PDF
        $v_idpdf_size = $_FILES['vid']['size']; //additional codes para sa PDF
        $v_idpdf_tem_loc = $_FILES['vid']['tmp_name']; //additional codes para sa PDF
        $v_idpdf_store = "../files/" . $v_idpdf; //additional codes para sa PDF

        $query .= "valid_id = '$v_idpdf', ";

        move_uploaded_file($v_idpdf_tem_loc, $v_idpdf_store);
    }
    if ($stats == "unverified") {
        $stats = 'pending';
        $query .= "verification = '$stats', ";
    }
    $query = substr($query, 0, -2);
    // $query = rtrim($query, ',');
    $query .= " WHERE acc_no = '$id'";

    // echo json_encode(array("status" => true, "msg" => "Save Successfully", "sql" => $query));
    if ($npassSet && $npassValid) {
        if ($npassValid) {
            if (mysqli_query($connect, $query)) {
            } else {
                echo json_encode(array("status" => false, "msg" => "Save Failed!", "sql" => $query));
            }
        } else {
            echo json_encode(array("status" => false, "msg" => "New password and confirm password doesn't match"));
        }
    }
    if (!$npassSet) {
        if (mysqli_query($connect, $query)) {
            echo json_encode(array("status" => true, "msg" => "Save Successfully", "sql" => $query));
        } else {
            echo json_encode(array("status" => false, "msg" => "Save Failed!", "sql" => $query));
        }
    }
} else {
    echo json_encode(array("status" => false, "msg" => "Incorrect Password"));
}


function isEmailDuplicate($connect, $email, $id)
{
    $query = "SELECT acc_temp.acc_no, user_account.acc_no FROM acc_temp, user_account WHERE (acc_temp.email='$email' AND acc_temp.acc_no != '$id') OR (user_account.email='$email' AND user_account.acc_no != '$id')";
    $result = mysqli_query($connect, $query);
    return mysqli_num_rows($result);
}

function isUsernameDuplicate($connect, $username, $id)
{
    $query = "SELECT acc_temp.acc_no, user_account.acc_no FROM acc_temp, user_account WHERE (acc_temp.username='$username' AND acc_temp.acc_no != '$id') OR (user_account.username='$username' AND user_account.acc_no != '$id')";
    $result = mysqli_query($connect, $query);
    return mysqli_num_rows($result);
}
