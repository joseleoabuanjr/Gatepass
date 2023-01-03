<?php
session_start();
if (!isset($_SESSION["useradmin"]) && !isset($_SESSION["passadmin"])) {
    header("Location: ../admin/login.php");
}
$_SESSION["notif1"] = "seen";
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
    <script>
        $(document).ready(function() {
            $("#userAccountsTable, #accountVerificationTable, #appointmentRequestTable, #timeinoutTable").DataTable();
        });
    </script>
</head>

<body>
    <?php require_once '../includes/navbar-admin.php'; ?>
    <div class="container" style="padding-bottom:20px;">
        <header class="pb-3 mb-4 border-bottom mt-5">
            <div class="d-flex align-items-center text-dark text-decoration-none">
                <span class="fs-3">Verification of Accounts</span>
            </div>
        </header>
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
                <div class="container table-responsive">
                    <table class="table pt-2 shadow table-striped table-hover display compact" id="accountVerificationTable">
                        <thead>
                            <tr class="text-bg-warning" style="background-color: #4F4F4B; color:white;">
                                <th class="text-center">Account Number</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Account Type</th>
                                <th class="text-center">Student Number</th>
                                <th class="text-center">Employee Number</th>
                                <th class="text-center">Contact Number</th>
                                <th class="text-center">Profile Picture</th>
                                <th class="text-center">Certificate of Registration</th>
                                <th class="text-center">Valid ID</th>
                                <th class="text-center">Vaccination Card</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            //connect to database
                            require_once "../function/connect.php";

                            $col = $_SESSION["department"];

                            //read all row from database table
                            $select = "SELECT * FROM user_account WHERE verification = 'pending' AND college ='$col' AND type = 'student'";
                            $result = mysqli_query($connect, $select);

                            if (!$result) {
                                die("Invalid query: " . $connect->connect_error);
                            }

                            $count = 0;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $cor = $row["cor"];
                                $vax = $row["vax"];
                                $v_id = $row["valid_id"];
                                echo ("
                                                <tr class='text-center'>
                                                    <td>" . $row["acc_no"] . "</td>
                                                    <td class='text-capitalize'>" . $row["first"] . " " . $row["middle"] . ". " . $row["last"] . "</td>
                                                    <td class='text-capitalize'>" . $row["type"] . "</td>
                                            ");
                                if ($row["type"] == "student") {
                                    echo ("
                                                <td>" . $row['stud_no'] . "</td>
                                                <td>N/A</td>
                                                <td>" . $row["contact_no"] . "</td>
                                                <td><button class='btn btn-secondary btn-sm previewImageBtn' data-id='" . $row["acc_no"] . "'>View</button></td>
                                                <td><button class='btn btn-secondary btn-sm previewCORBtn' data-id='" . $row["acc_no"] . "'>View</button></td>
                                                <td><button class='btn btn-secondary btn-sm previewVIDBtn' data-id='" . $row["acc_no"] . "'>View</button></td>
                                                <td><button class='btn btn-secondary btn-sm previewVAXBtn' data-id='" . $row["acc_no"] . "'>View</button></td>
                                            ");
                                } else if ($row["type"] == "employee" || "visitor") {
                                    echo "<td>N/A</td>";
                                    if ($row["type"] == "employee") {
                                        echo "<td>" . $row['emp_no'] . "</td>";
                                    } else {
                                        echo "<td>N/A</td>";
                                    }
                                    echo "    
                                                <td>" . $row["contact_no"] . "</td>
                                                <td><button class='btn btn-secondary btn-sm previewImageBtn' data-id='" . $row["acc_no"] . "'> </td>
                                        ";
                                    if ($v_id == "" || NULL && $vax == "" || NULL) {
                                        echo ("
                                                    <td>N/A</td><td>N/A</td><td>N/A</td>
                                                ");
                                    } else {
                                        if ($v_id == "" || NULL && !($vax == "" || NULL)) {
                                            echo ("
                                                        <td>N/A</td>
                                                        <td>N/A</td>
                                                        <td><button class='btn btn-secondary btn-sm previewVAXBtn' data-id='" . $row["acc_no"] . "'>View</button></td>
                                                    ");
                                        } else if ($vax == "" || NULL && !($v_id == "" || NULL)) {
                                            echo ("
                                                        <td>N/A</td>
                                                        <td><button class='btn btn-secondary btn-sm previewVIDBtn' data-id='" . $row["acc_no"] . "'>View</button></td>
                                                        <td>N/A</td>
                                                    ");
                                        } else {
                                            echo ("
                                                        <td>N/A</td>
                                                        <td><button class='btn btn-secondary btn-sm previewVIDBtn' data-id='" . $row["acc_no"] . "'>View</button></td>
                                                        <td><button class='btn btn-secondary btn-sm previewVAXBtn' data-id='" . $row["acc_no"] . "'>View</button></td>
                                                    ");
                                        }
                                    }
                                }
                                echo "<td>
                                                <!-- Button trigger modal -->
                                                <div class='btn-group' role='group'>
                                                    <button type='button' class='btn btn-primary statusBtn btn-sm' data-status='approve' data-accno='" . $row['acc_no'] . "'>Approve</button>
                                                    <button type='button' class='btn btn-danger statusBtn btn-sm' data-status='reject' data-accno='" . $row['acc_no'] . "'>Reject</button>
                                                </div>
                                            </td>
                                        </tr>";
                            }
                            ?>
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
                    <p class="mb-1">Are you sure you want to <span class="status text-info"></span> the account verification of Account No. <span id="accNoModal"></span>?</p>
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

    <!-- Reject Modal -->
    <div class="modal fade py-5" tabindex="-1" id="rejectModal">
        <div class="modal-dialog">
            <div class="modal-content rounded-3">
                <div class="modal-body p-4 text-center">
                    <h5 class="">Reject Account</h5>
                    
                    <div class="alert alert-danger my-1" role="alert" id="errorAlert">
                        <span class="status text-capitalize"></span> Failed.
                    </div>
                </div>
                <div class="modal-footer flex-nowrap p-0">
                    <button type="button" id="statusBtnModal" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-end"><strong>Reject</strong>
                        <div id="fPSpinner" class="spinner-border spinner-border-sm" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </button>
                    <button type="button" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="previewFile">
        <div class="modal-dialog modal-lg bg-dark">
            <div class="modal-content">
                <div class="modal-body vh-100">
                    <embed type="application/pdf" id="previewFileContent" src="" width="100%" height="100%">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="previewImage">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-dark">
                <div class="modal-body h-auto mx-auto">
                    <img src="" id="previewImageContent" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="../js/table2.js"></script>
</body>

</html>
