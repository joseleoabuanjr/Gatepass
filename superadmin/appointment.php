<?php
session_start();
if (!isset($_SESSION["useradmin"]) && !isset($_SESSION["passadmin"])) {
    header("Location: ../superadmin/login.php");
}
$_SESSION["notif2"] = "seen";
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
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- Javascript -->
    
</head>

<body>
    <?php require_once '../includes/navbar-sadmin.php'; ?>
    <div class="container" style="padding-bottom:20px;">
        <header class="pb-3 mb-4 border-bottom mt-5">
            <div class="d-flex align-items-center text-dark text-decoration-none">
                <span class="fs-3">Appointment Requests</span>
            </div>
        </header>
        <div class="card">
            <div class="card-header" style="background-color: #4F4F4B; color:white;">
                <div class="d-flex justify-content-start">
                    <div class="d-flex justify-content-start align-items-center">
                        <h6 class="mx-2 my-0 text-white">Account Type</h6>
                        <div>
                            <select id="userTypeFilter" class="form-select w-auto">
                                <option value="all">All</option>
                                <option value="student">Student</option>
                                <option value="employee">Employee</option>
                                <option value="visitor">Visitor</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-start align-items-center">
                            <h6 class="text-white mx-2 m-0">Filter by Date & Time</h6>
                            <div id="reportrange" class="w-auto mx-2 rounded-1" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                <i class="fa fa-calendar"></i>&nbsp;
                                <span class="text-dark"></span> <i class="fa fa-caret-down"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="container table-responsive">
                    <table class="table pt-2 shadow table-striped table-hover display compact" id="appointmentRequestTable">
                        <thead>
                            <tr class="text-bg-warning" style="background-color: #4F4F4B; color:white;">
                                <th class="text-center">Account Number</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Account Type</th>
                                <th class="text-center">Purpose of Appointment</th>
                                <th class="text-center">Date of Appointment</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="text-center" id="appointmentRequestTableContent">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Status Modal -->
    <div class="modal fade py-5" tabindex="-1" id="statusModal">
        <div class="modal-dialog">
            <div class="modal-content rounded-3">
                <div class="modal-body p-4 text-center">
                    <h5 class="">Confirmation</h5>
                    <p class="mb-1">Are you sure you want to <span class="status text-info"></span> Account No. <span id="accNoModal"></span>?</p>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    
    <script src="../js/appointment.js"></script>
</body>

</html>
