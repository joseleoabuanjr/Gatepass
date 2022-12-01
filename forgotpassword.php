<!doctype html>
<html>
<head>
	<title>Forgot Password</title>

        <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
                <form method="post" action="function/toUpdatePassword.php" enctype="multipart/form-data" style="width: 400px" onsubmit="return toCheck()">
                        <h1 style="margin-bottom: 20px;">Forgot Password</h1>
                        <div class="form-floating" style="margin-bottom: 10px;">
                                <input type="password" name="password" id="pass1"
                                class="form-control" placeholder="Enter new password" >
                                <label>Password</label>
                                <div class="msg" id="message1"></div>
                        </div>
                        <div class="form-floating" style="margin-bottom: 10px;">
                                <input type="password" name="cpassword" id="cpass"
                                class="form-control" placeholder="Enter confirm new password" >
                                <label>Confirm New Password</label>
                                <div class="msg" id="message2"></div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="submitbut">Update</button>
                </form>
        </div>
        <script type="text/javascript" src="js/forgotpass1.js"></script>
</body>
</html>