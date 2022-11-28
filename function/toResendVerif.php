<?php
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    require '../phpmailer/src/Exception.php';
    require '../phpmailer/src/PHPMailer.php';
    require '../phpmailer/src/SMTP.php';

    require 'connect.php';

    //generate verification code;
    $gcode = rand(10,99).rand(10,99).rand(10,99);
    $id = $_GET["id"];
					
    $update = "UPDATE acc_temp SET v_code = $gcode WHERE acc_no = $id";

    if(mysqli_query($connect,$update))
    {
        //read data from database table;
        $select = "SELECT * FROM acc_temp WHERE acc_no = $id";
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

                $usern = $row["username"];
                $passw = $_SESSION["passw"];
                $fst = ucfirst($row["first"]);
                $lst = ucfirst($row["last"]);
                
                //Recipients
                $mail->addAddress($row["email"]); //Add a recipient;
                $mail->isHTML(true);

                //mail content
                $mail->Subject = 'Verification';
                $mail->Body    = '
                <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
                    <p style="margin-bottom: 20px;">
                    Code: '.$gcode.'
                    <br>
                    <br>Hi '.$lst.', '.$fst.',
                    <br>
                    <br>We would like to thank you for registering to Bulacan State University Gate Pass. 
                    <br>
                    <br>Here are your account details:
                    <br>Username: '.$usern.'
                    <br>Password: '.$passw.'
                    <br>
                    <br>To complete your registration process, we just need to verify that this e-mail address belongs to you.
                    <br>Please enter the verification code above in your BulSU Gate Pass.
                    <br>
                    <br> Thanks,
                    <br>BulSU Gate Pass Team</p>
                    <a href="http://localhost/Gatepass/pages/verification.php?id='.$id.'"><button type="submit" class="btn btn-primary">Verify</button></a>
                </div>
                    
                ';
            }
            //send mail
            $mail->send();

            if(!$mail->send()){
                echo "<script>alert('Sent Failed')</script>;";
            }
            else{
                
                echo "<script>alert('Sent Successfuly')</script>;";
                header("location:../verification.php?id=$id");
            }
        }
        else{
            echo "<script>alert('Select Failed')</script>;";
        }
    }
    else
    {
        echo "<script>alert('Update Failed.')</script>";	
    }


?>