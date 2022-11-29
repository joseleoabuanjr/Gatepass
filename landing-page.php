<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- CSS -->
	<link rel="stylesheet" href="css/landingx.css">

</head>
<body>
    <div class="actionBtn">
        <div class="actionBtns">
            <button class="actionBtn loginBtn" id="actionBtn_login"> LOGIN</button>
            <button class="actionBtn registerBtn" id="actionBtn_register"> REGISTER</button>
            <button class="moveBtn" id="actionBtn_login"> LOGIN</button>
            <!-- <button class="actionBtn studentBtn"> STUDENT</button>
            <button class="actionBtn employeeBtn"> EMPLOYEE</button>
            <button class="actionBtn visitorBtn"> VISITOR</button> -->
        </div>
    </div>
    <div class="lgcontain" id="login1">
        <?php 
        session_start();
        $invalid = 0;
        if(isset($_SESSION["invalid"])){
            $invalid = 1;
            session_unset();
            session_destroy();
        }
        if($invalid == 1){
            require_once 'includes/login-invalid.php';
        }
        else{
            require_once 'includes/login.php';
        }
        ?>
    </div>


    <div class="regcontain--hidden" id="register1">
        <div class="actionBtn">
            <div class="actionBtns">
                <button class="actionBtn studentBtn" id="studentBtn"> STUDENT</button>
                <button class="actionBtn employeeBtn" id="employeeBtn"> EMPLOYEE</button>
                <button class="actionBtn visitorBtn" id="visitorBtn"> VISITOR</button> 
                <button class="moveBtn2" id="actionBtn_login"> STUDENT</button>
            </div>
    </div>
        <?php require_once 'includes/register.php'; ?>
    </div>
    <script type="text/javascript" src="js/landing.js"></script>
    <script type="text/javascript" src="js/loginx.js"></script>
    <script type="text/javascript" src="js/form1.js"></script>
    <script type="text/javascript" src="js/formx2.js"></script>
    <script type="text/javascript" src="js/form3.js"></script>

</body>
</html>
