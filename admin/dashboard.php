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

</head>

<body>
    <?php
    require_once '../includes/navbar-admin.php';
    require_once "../function/connect.php";

    $department = $_SESSION["department"];
    ?>

    <div class="container" style="padding-bottom:20px;">
        <header class="pb-3 mb-4 border-bottom mt-5">
            <div class="d-flex d-flex justify-content-between align-items-center text-dark text-decoration-none">
                <div class="fs-3">Dashboard</div>
                <div class="h4 text-primary"><?php echo $department ?></div>
            </div>
        </header>
        <div class="mb-3">
            <div class="d-flex justify-content-between">
                <h3>Time In - Out</h3>
                <div>
                    <select class="form-select" id="timeStatus">
                        <option value="day">Last 7 Days</option>
                        <option value="month">Month</option>
                        <option value="year" selected>Year</option>
                    </select>
                </div>
            </div>
            <div style="height: 289px;">
                <canvas id="chart1"></canvas>
            </div>
        </div>
        <h5>Pending Accounts for Verification</h5>
        <div class="row row-cols-3 g-3 mb-4">
            <div class="col">
                <div class="p-4 text-bg-dark shadow-sm">
                    <h3>Student</h3>
                    <div class="display-3 text-end" id="pendingStudents">0</div>
                </div>
            </div>
            <div class="col">
                <div class="p-4 text-bg-dark shadow-sm">
                    <h3>Employee</h3>
                    <div class="display-3 text-end" id="pendingEmployees">0</div>
                </div>
            </div>
            <div class="col">
                <div class="p-4 text-bg-dark shadow-sm">
                    <h3>Visitor</h3>
                    <div class="display-3 text-end" id="pendingVisitors">0</div>
                </div>
            </div>
        </div>

        <!-- APPOINTMENTS -->
        <h5>Pending Appointments</h5>
        <div class="row row-cols-3 g-3">
            <div class="col">
                <div class="p-4 text-bg-dark shadow-sm">
                    <h3>Student</h3>
                    <div class="display-3 text-end" id="pendingApptStudents">0</div>
                </div>
            </div>
            <div class="col">
                <div class="p-4 text-bg-dark shadow-sm">
                    <h3>Employee</h3>
                    <div class="display-3 text-end" id="pendingApptEmployees">0</div>
                </div>
            </div>
            <div class="col">
                <div class="p-4 text-bg-dark shadow-sm">
                    <h3>Visitor</h3>
                    <div class="display-3 text-end" id="pendingApptVisitors">0</div>
                </div>
            </div>
        </div>

    </div>
</body>

<!-- Javascript -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="../js/adminDashboard.js"></script>

</html>
