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
    <title>Super Admin Dashboard</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="../js/dashboardSA.js"></script>
    <script>
        $(document).ready(function() {
            $("#userAccountsTable, #accountVerificationTable, #appointmentRequestTable, #timeinoutTable").DataTable();
        });
    </script>
</head>

<body>
    <?php require_once '../includes/navbar-sadmin.php'; ?>
    <div class="container" style="padding-bottom:20px;">
        <header class="pb-3 mb-4 border-bottom mt-5">
            <div class="d-flex align-items-center text-dark text-decoration-none">
                <span class="fs-3">Dashboard</span>
            </div>
        </header>
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
        <!-- TABLE -->
        <!-- <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header" style="background-color: #4F4F4B; color:white;">
                        <div class="row align-items-center">
                            <div class="col col-sm-8 ps-5 py-2"></div>
                            <div class="col col-sm-3">
                            </div>
                            <div class="col col-sm-auto p-0"></div>
                        </div>
                    </div>
                    <div class="card-body">
                        Table ng nag time in
                    </div>
                </div>
            </div>
        </div> -->

</body>

</html>