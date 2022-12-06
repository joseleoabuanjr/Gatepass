<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require '../phpmailer/src/Exception.php';
    require '../phpmailer/src/PHPMailer.php';
    require '../phpmailer/src/SMTP.php';

    $mail = new PHPMailer(true);

    //Server settings;
    $mail->isSMTP();
    $mail->Host         = 'smtp.gmail.com';
    $mail->SMTPAuth     = true;
    $mail->Username     = 'bulsua.qrgatepass@gmail.com';    // this is gmail username;
    $mail->Password     = 'amvzarortrcqiorr';               //this is gmail app password;
    $mail->SMTPSecure   = 'ssl';
    $mail->Port         = 465;

    //read data from database table;
    $s = "SELECT * FROM admin_account WHERE id = 1";
    $res = mysqli_query($connect,$s);
    $c =  mysqli_num_rows ($res);
    //get admin email data value from databse table
    while($row = mysqli_fetch_assoc($res)){

        //Sender
        $mail->setFrom($row['email'], 'BulSU QR GATEPASS'); //admin gmail account;
    }

    //read data from database table;
    $select = "SELECT * FROM user_account WHERE acc_no = $id";
    $result = mysqli_query($connect,$select);
    $count =  mysqli_num_rows ($result);
    if ($count == 1) {
        while($row = mysqli_fetch_assoc($result)){

            $name = $row['last'].", ".$row['first'].", ";
            $email = $row["email"];
        }
        //Recipients
        $mail->addAddress($email); //Add a recipient;
        $mail->isHTML(true);
    }
    else{
        echo "<script>alert('Select Failed')</script>;";
    }
    

    //mail content
    $mail->Subject = 'Fully Verification';
    $mail->Body    = '
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <p style="margin-bottom: 20px;">
        <br>Hi '.$name.',
        <br>
        <br>We would like to inform you that your Request for Account Verification was Denied.
        <br>Your Information was considered Invalid. If you wish to Try Again, Please send another Account Verification Request.
        <br>
        <br>
        <br>- BulSU Gate Pass Team</p>
    </div>    
    ';
    //send mail
    if($mail->send()){
        echo json_encode(array("status" => true));
    }
    else{
        echo json_encode(array("status" => false));
    }
    // header("refresh: 0; url=../admin.php?");
?>