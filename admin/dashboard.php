<?php
session_start();
if (!isset($_SESSION["useradmin"]) && !isset($_SESSION["passadmin"])) {
    header("Location: ../admin/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="../js/adminDashboard.js"></script>
    <script>
        $(document).ready(function() {
            $("#userAccountsTable, #accountVerificationTable, #appointmentRequestTable, #timeinoutTable").DataTable();
        });
    </script>
</head>

<body>
    <?php 
    require_once '../includes/navbar-admin.php'; 
    require_once "../function/connect.php";

    $department = $_SESSION["department"];
    ?>
    
    <div class="container" style="padding-bottom:20px;">
        <header class="pb-3 mb-4 border-bottom mt-5">
            <div class="d-flex align-items-center text-dark text-decoration-none">
                <span class="fs-3">Dashboard</span>
                
            </div>
        </header>
        <span><?php echo $department ?></span> <!-- Department -->
        <div class="row mb-2">
            <h5>No. of Pending Accounts for Verification: </h5>
        </div>
        <div class="row mb-2">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5>Students</h5>
                            </div>
                            <div class="col">
                                <h5><span id="pendingStudents"></h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5>Employees</h5>
                            </div>
                            <div class="col">
                                <h5><span id="pendingEmployees"></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5>Visitors</h5>
                            </div>
                            <div class="col">
                                <h5><span id="pendingVisitors"></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- APPOINTMENTS -->
        <div class="row mb-2">
            <h5>No. of Pending Appointments: </h5>
        </div>
        <div class="row mb-2">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5>Students</h5>
                            </div>
                            <div class="col">
                                <h5><span id="pendingApptStudents"></h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5>Employees</h5>
                            </div>
                            <div class="col">
                                <h5><span id="pendingApptEmployees"></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5>Visitors</h5>
                            </div>
                            <div class="col">
                                <h5><span id="pendingApptVisitors"></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>