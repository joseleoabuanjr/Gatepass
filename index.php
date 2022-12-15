<!doctype html>
<html lang="en">

<head>
    <title>BulSU Gatepass</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/landing.css">
</head>

<body>
    <div class="glass-effect">
        <div class="d-flex align-items-center vh-100">
            <main class="form-signin w-100 m-auto text-center pt-4">
                <form id="loginForm">
                    <div class="text-white">
                        <img class="" src="resources/bulsulogo.png" alt="" height="100">
                        <h1 class="h3 m-1">BulSU Gatepass</h1>
                        <hr>
                        <h5 class="mb-3">LOGIN</h5>
                    </div>

                    <div class="form-floating">
                        <input type="text" class="form-control" id="username" name="username" placeholder="name@example.com">
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        <label for="password">Password</label>
                    </div>

                    <button type="button" class="btn btn-link text-decoration-none" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">
                        Forgot Password?
                    </button>
                    <div class="alert alert-danger my-1 p-2" role="alert" id="errorAlert">Invalid Username or Password
                    </div>
                    <button class="w-100 btn btn-lg btn-warning my-2" type="submit">Login</button>
                    <button class="btn btn-link text-decoration-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Create an Account
                    </button>
                    <div class="collapse" id="collapseExample">
                        <a href="includes/registration/student.php" class="btn btn-sm btn-outline-warning">Student</a>
                        <a href="includes/registration/employee.php" class="btn btn-sm btn-outline-warning">Employee</a>
                        <a href="includes/registration/visitor.php" class="btn btn-sm btn-outline-warning">Visitor</a>
                    </div>
                    <p class="mt-5 text-muted">BulSU Gatepass &copy; 2022</p>
                </form>
            </main>
        </div>
    </div>

    <!-- Forgot Password Modal -->
    <div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Forgot Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="forgotPasswordForm">
                    <div class="modal-body">
                        <p>Enter your <span class="fw-bold text-uppercase">REGISTERED <span id="modalUserType"></span>
                                EMAIL</span></p>
                        <p>A new password will be sent to your registered email address</p>
                        <input type="email" name="fpEmail" id="fpEmail" class="form-control" placeholder="Registered Email" required>
                        <div class="alert alert-danger my-1" role="alert" id="errorAlertFP">
                            You have entered an unregistered email address!
                        </div>
                        <div class="alert alert-success my-1" role="alert" id="successAlertFP">
                            Your new password has been sent to your email address
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="forgotbtn">
                            Send Email
                            <div id="fPSpinner" class="spinner-border spinner-border-sm" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="js/login1.js"></script>
</body>

</html>
