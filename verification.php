<?php
session_start();
require 'function/connect.php';
$id = $_GET["id"];
//read data from database table
$select = "SELECT * FROM acc_temp WHERE acc_no = $id";
$result = mysqli_query($connect,$select);
$count =  mysqli_num_rows ($result);
if($count == 1)
{

	while($row = mysqli_fetch_assoc($result)) 
	{
		$email=$row["email"];
	}
}

//censor half of email
function censor($email)
{
$start='';
$prop=2;
    $domain = substr(strrchr($email, "@"), 1);
    $mailname=str_replace($domain,'',$email);
    $name_l=strlen($mailname);
    $domain_l=strlen($domain);
        for($i=0;$i<=$name_l/$prop-1;$i++)
        {

            $start.='*';
        }
    return substr_replace($mailname, $start, 4, $name_l/$prop).substr_replace($domain,'', $domain_l);
} 
?>
<!doctype html>
<html>

<head>
    <title>Account Email Verification</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/landing.css">

</head>

<body>
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <form method="post" action="function/toVerify.php?id=<?php echo ($id); ?>" enctype="multipart/form-data" style="width: 450px" class="text-bg-light p-5 rounded-2">
            <h1 style="margin-bottom: 20px;">Email Verification</h1>
            <p>Verification code has been sent to: <span class="fw-bold"><?php echo censor($email); ?></span></p>
            <div class="form-group" style="margin-bottom: 10px;">
                <input type="text" name="vcode" class="form-control" placeholder="Enter verification code" required>
                <a href="function/toResendVerif.php?id=<?php echo ($id); ?>" class="text-secondary ms-1 mt-2" id="rsend1">Resend Verification Code</a>
            </div>
            <button type="submit" class="btn btn-primary mt-2 w-100" id="ver1">Submit</button>
        </form>
    </div>
</body>

</html>
