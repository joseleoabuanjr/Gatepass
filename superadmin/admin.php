<?php
session_start();
if (!isset($_SESSION["useradmin"]) && !isset($_SESSION["passadmin"])) {
    header("Location: ../superadmin/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BulSU Gatepass - SuperAdmin</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#userAccountsTable, #accountVerificationTable, #appointmentRequestTable, #timeinoutTable").DataTable();
        });
    </script>
</head>

<body>
    <?php require_once '../includes/navbar-sadmin.php'; ?>
    <div class="container">
        <div class="container " style="width: 600px;">
            <div class="d-flex align-items-center vh-100">
                <div class="container bg-white shadow-lg py-3 px-3" >
                        <h5 class="mb-3 text-uppercase">Create Admin Account</h5>
                        <form id="registrationForm">
                        <div id="step1">    
                            <div class="row ">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">College</label>
                                        <select class="form-select mb-3" name="college" id="col-s" required>
                                            <option selected disabled>Select College</option>
                                            <option value="College of Architecture and Fine Arts (CAFA)">College of Architecture and Fine Arts (CAFA)</option>
                                            <option value="College of Arts and Letters (CAL)">College of Arts and Letters (CAL)</option>
                                            <option value="College of Business Administration (CBA)">College of Business Administration (CBA)</option>
                                            <option value="College of Criminal Justice Education (CCJE)">College of Criminal Justice Education (CCJE)</option>
                                            <option value="College of Hospitality and Tourism Management (CHTM)">College of Hospitality and Tourism Management (CHTM)</option>
                                            <option value="College of Information and Communications Technology (CICT)">College of Information and Communications Technology (CICT)</option>
                                            <option value="College of Industrial Technology (CIT)">College of Industrial Technology (CIT)</option>
                                            <option value="College of Law (CLAW)">College of Law (CLAW)</option>
                                            <option value="College of Nursing (CN)">College of Nursing (CN)</option>
                                            <option value="College of Engineering (COE)">College of Engineering (COE)</option>
                                            <option value="College of Education (COED)">College of Education (COED)</option>
                                            <option value="College of Science (CS)">College of Science (CS)</option>
                                            <option value="College of Sports Exercise and Recreation (CSER)">College of Sports Exercise and Recreation (CSER)</option>
                                            <option value="College of Social Sciences and Philosophy (CSSP)">College of Social Sciences and Philosophy (CSSP)</option>
                                            <option value="Graduate School (GS)">Graduate School (GS)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username" id="username" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="pass" id="password" required minlength="8">
                                        <!-- <small class="text-secondary">Password must be at least 8 characters </small> -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" required>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-danger" role="alert" id="errorAlert">
                                {{ errorMessage }}
                            </div>
                        </div>
                        <button class="btn btn-primary me-md-2 px-5" type="submit">
                            <span>Register</span>
                            <div id="registerSpinner" class="spinner-border spinner-border-sm" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </button>
                        </form>
                    <div class="alert alert-success mt-3" role="alert" id="successAlert">
                        Registration Completed!
                    </div>
                </div>
            </div>
        </div>
        <div style="margin:100px 0px; border-top:2px black solid;"></div>
        <div class="container table-responsive" style="margin-bottom:100px;" id="divtable">
            <table class="table pt-2 shadow-sm table-striped table-hover display compact" id="userAccountsTable">
                <h2 style="padding-top: 60px; padding-bottom:20px;">Admin Accounts</h2>
                <!-- <div class="searchbar">
                    <input type="text" name="s_name" id="s_n" placeholder="Name">
                </div> -->
                <thead>
                    <tr style="background-color: #4F4F4B; color:white;">
                        <th class="text-center">Username</th>
                        <th class="text-center">Password</th>
                        <th class="text-center">Type</th>
                        <th class="text-center">Department</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    //connect to database
                    require_once "../function/connect.php";

                    //read all row from database table
                    $select = "SELECT * FROM admin_account";
                    $result = mysqli_query($connect, $select);

                    if (!$result) {
                        die("Invalid query: " . $connect->connect_error);
                    }

                    $count = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo ("
                                <tr>
                                    <td class='text-capitalize'>" . $row["username"] . "</td>
                                    <td class='text-capitalize'>" . $row["password"] . " </td>
                                    <td class='text-capitalize'>" . $row["type"] . "</td>
                                    <td class='text-capitalize'>" . $row["department"] . "</td>
                            ");
                        //read 10 row of data from database table
                        // if ($count == 9) {
                        //     break;
                        // }
                        // $count += 1;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        
    </div>
    <!-- Status Modal -->
    <div class="modal fade py-5" tabindex="-1" id="statusModal">
        <div class="modal-dialog">
            <div class="modal-content rounded-3">
                <div class="modal-body p-4 text-center">
                    <h5 class="">Confirmation</h5>
                    <p class="mb-1">Are you sure you want to <span class="status"></span> Account No. <span id="accNoModal"></span>?</p>
                    <!-- <p class="mb-0 text-danger fw-bolder">*This action is cannot be undone!</p> -->
                    <div class="alert alert-danger my-1" role="alert" id="errorAlert">
                        <span class="status text-capitalize"></span> Failed.
                    </div>
                </div>
                <div class="modal-footer flex-nowrap p-0">
                    <button type="button" id="statusBtnModal" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-end"><strong>Yes</strong> 
                        <div id="fPSpinner" class="spinner-border spinner-border-sm" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </button>
                    <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Status modal -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="../js/table1.js"></script>
    <script src="../js/adminRegistration.js"></script>
</body>

</html>