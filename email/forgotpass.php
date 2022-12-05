<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require '../phpmailer/src/Exception.php';
    require '../phpmailer/src/PHPMailer.php';
    require '../phpmailer/src/SMTP.php';

    require 'connect.php';

    //read data from database table;
    $select = "SELECT * FROM user_account WHERE acc_no = $id";
    $result = mysqli_query($connect,$select);
    $count =  mysqli_num_rows ($result);

    //read data from database table;
    $s = "SELECT * FROM admin_account WHERE id = 1";
    $r = mysqli_query($connect,$select);

    //check result from database
    if ($count == 1) {
        $mail = new PHPMailer(true);

        //Server settings;
        $mail->isSMTP();
        $mail->Host         = 'smtp.gmail.com';
        $mail->SMTPAuth     = true;
        $mail->Username     = 'bulsua.qrgatepass@gmail.com';    // this is gmail username;
        $mail->Password     = 'amvzarortrcqiorr';               //this is gmail app password;
        $mail->SMTPSecure   = 'ssl';
        $mail->Port         = 465;

        //get admin email data value from databse table
        while($rw = mysqli_fetch_assoc($r)){

            //Sender
            $mail->setFrom($rw['email'], 'BulSU QR GATEPASS'); //admin gmail account;
        }
            
        while($row = mysqli_fetch_assoc($result)){

            $fst = ucfirst($row["first"]);
            $lst = ucfirst($row["last"]);
            
            //Recipients
            $mail->addAddress($row["email"]); //Add a recipient;
            $mail->isHTML(true);

            //mail content
            $mail->Subject = 'Appointment Request';
            $mail->Body    = '
            <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
                <p style="margin-bottom: 20px;">
                <br>
                <br>Hi '.$lst.', '.$fst.',
                <br>
                <br>This is your temporay password :'.$temp_pass.'
                <br>After logging in go to your profile and change your password.
                <br>
                <br>
                <br>- BulSU Gate Pass Team</p>
            </div>    
            ';
        }
        //send mail
        $mail->send();

        if($mail->send()){
            echo json_encode(array("status" => true));
            // echo "<script>console.log('Sent Successfully')</script>";
            // header("refresh: 0; url='../landing-page.php'");
        }
    }
    else{
        // echo "<script>alert('Sent Failed1')</script>;";
        echo json_encode(array("status" => false, "msg" => "Sent Failed"));
    }
?>