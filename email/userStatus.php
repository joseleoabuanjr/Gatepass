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
            $name = $fst." ".$lst;
            $text = "";
            $footertxt = "For more information or if you wish to contact us. You may send an email or visit the University Office.";
            if($status == 'blocked'){
                $text = "Your account may have been blocked for several reasons such as; active suspension, incorrect information provided, system maintenance, etc.";
                $footertxt = "If you wish to unblock your account you may reach technical support via bulsua.qrgatepass@gmail.com or visit the university for direct support.";

            }else if ($statusemail == 'unblock'){
                $status = 'unblocked';
            }

            //Recipients
            $mail->addAddress($row["email"]); //Add a recipient;
            $mail->isHTML(true);

            //mail content
            $mail->Subject = $subject;
            $mail->Body    = '
            <img class="rounded mx-auto d-block" style="height:500px" src="../resources/emailhead.png">
                <p style="margin-bottom: 20px;">
                <br>Hi '.$name.',<br>
                <br>We would like to notify you that your account has been '.$status.' by the Admin.
                <br>'.$text.'
                <br>
                <br>'.$footertxt.'
                <br>Thanks,
                <br>
                <br> -BulSU Gatepass Team</p>
            </div>   
            ';
        }
        //send mail
        if($mail->send()){
            echo json_encode(array("status" => true));
        } else{
            echo json_encode(array("status" => false, "msg" => "Sent Failed"));
        }
    }
    else{
        echo json_encode(array("status" => false, "msg" => "Sent Failed"));
    }
?>
