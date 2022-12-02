<!doctype html>
<html lang="en">
<head>
    <title>BulSU Gatepass</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- CSS -->
	<link rel="stylesheet" href="css/landingx.css">

</head>
<body>
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <form method="post" action="function/toLogin.php" class="d-flex flex-column justify-content-center" onsubmit="return validate()" style="width: 400px;">
            <h1 style="margin-bottom: 20px;">Login</h1>
            <div class="form-floating"  style="margin-bottom: 10px;">
                <input type="text" name="username" id="userlog" class="form-control" placeholder="Enter username">
                <label>Username</label>
            <div class="msg" id="msguser"></div>
            </div>
            <div class="form-floating" style="margin-bottom: 10px;">
                <input type="password" name="password" id="passlog"
                class="form-control" placeholder="Enter password" >
                <label>Password</label>
            <div class="msg" id="msgpass"></div>
                <a href="../Gatepass/forgotpassword_email.php">Forgot Password?</a>
            </div>
                <button type="submit" class="btn btn-primary" id="logbtn" style="margin-top: 20px;">Submit</button>
        </form>
    </div>
    <script type="text/javascript" src="js/loginx.js"></script>
</body>
</html>