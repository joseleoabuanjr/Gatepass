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
		<title>Verification</title>

		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

	</head>
	<body>
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
            <form method="post" action="function/toVerify.php?id=<?php echo($id);?>" enctype="multipart/form-data" style="width: 400px">
                <h1 style="margin-bottom: 20px;">Email Verification</h1>
                <p>A verification code has been sent to:  <?php echo censor($email);?></p>
                <div class="form-group" style="margin-bottom: 10px;">
                    <label>Verify Email</label>
                    <input type="text" name="vcode" class="form-control" placeholder="Enter verification code" required>
                </div>
                <button type="submit" class="btn btn-primary" id="ver1">Submit</button>
                <a href="function/toResendVerif.php?id=<?php echo($id);?>"><button type="button" class="btn btn-primary" id="rsend1">Resend Verification Code</button></a>
            </form>
        </div>
    </body>
</html>