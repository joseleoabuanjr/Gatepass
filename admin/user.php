<?php
session_start();
if (!isset($_SESSION["useradmin"]) && !isset($_SESSION["passadmin"])) {
    header("Location: ../admin/login.php");
}
$college = $_SESSION['department'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BulSU Gatepass - Admin</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <?php require_once '../includes/navbar-admin.php'; ?>
    <div id="error"></div>
    <input type="hidden" id="collegeDept" value="<?php echo $college; ?>">
    <div class="container" style="padding-bottom:20px;">
        <header class="pb-3 mb-4 border-bottom mt-5">
            <div class="d-flex align-items-center text-dark text-decoration-none">
                <span class="fs-3">User Accounts</span>
            </div>
        </header>
        <div class="card">
            <div class="card-header" style="background-color: #4F4F4B; color:white;">
                <div class="d-flex justify-content-start">
                    <div class="d-flex justify-content-start align-items-center">
                        <h6 class="mx-2 my-0">Account Type</h6>
                        <div>
                            <select id="userTypeFilter" class="form-select w-auto">
                                <option value="all">All</option>
                                <option value="student">Student</option>
                                <option value="employee">Employee</option>
                                <option value="visitor">Visitor</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-start align-items-center">
                        <h6 class="mx-2 my-0">Course</h6>
                        <div>
                            <select class="form-select" id="courseFilter" style="width: 200px;" required>
                                <option value="all">All</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-start align-items-center">
                        <h6 class="mx-2 my-0">Status</h6>
                        <div>
                            <select id="statusFilter" class="form-select w-auto">
                                <option value="all">All</option>
                                <option value="verified">Verified</option>
                                <option value="unverified">Unverified</option>
                                <option value="pending">Pending</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="container table-responsive">
                    <table class="table pt-2 shadow table-striped table-hover display compact" id="userAccountsTable">
                        <thead>
                            <tr class="text-bg-warning" style="background-color: #4F4F4B; color:white;">
                                <th class="text-center">Account Number</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Account Type</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Course</th>
                                <th class="text-center">Year & Section</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center" id="userAccountsTableContent">

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
                    <p class="mb-1">Are you sure you want to <span class="status"></span> Account No. <span class="accNoModal"></span>?</p>
                    <!-- <p class="mb-0 text-danger fw-bolder">*This action is cannot be undone!</p> -->
                    <div class="alert alert-danger my-1 errorAlert" role="alert">
                        <span class="status text-capitalize"></span> Failed.
                    </div>
                </div>
                <div class="modal-footer flex-nowrap p-0">
                    <button type="button" class="statusBtnModal btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-end"><strong>Yes</strong>
                        <div class="spinner-border spinner-border-sm fPSpinner" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </button>
                    <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade py-5" tabindex="-1" id="blockModal">
        <div class="modal-dialog">
            <div class="modal-content rounded-3">
                <form id="blockForm">
                    <div class="modal-body p-4 text-center">
                        <h5 class="">Confirmation</h5>
                        <p class="mb-1">Are you sure you want to <span class="status"></span> Account No. <span class="accNoModal"></span>?</p>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a reason here" name="reason" id="reasonTextarea" style="height: 150px" required></textarea>
                            <label for="reasonTextarea">*Reason for Block</label>
                        </div>
                        <div class="alert alert-danger my-1 errorAlert" role="alert">
                            <span class="status text-capitalize"></span> Failed.
                        </div>
                    </div>
                    <div class="modal-footer flex-nowrap p-0">
                        <input type="hidden" id="accno" name="accno">
                        <input type="hidden" id="status" name="status">
                        <input type="hidden" id="qrstatus" name="qrstatus">
                        <button type="submit" class="blockBtnModal btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-end"><strong>Block</strong>
                            <div class="spinner-border spinner-border-sm fPSpinner" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </button>
                        <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="../js/table1.js"></script>
</body>

</html>
