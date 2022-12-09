<?php
session_start();
if (!isset($_SESSION["useradmin"]) && !isset($_SESSION["passadmin"])) {
    header("Location: ../index.php");
}
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
    <div class="container table-responsive">
        <table class="table shadow-sm table-striped table-hover display compact" id="userAccountsTable">
            <h2 style="padding-top: 60px; padding-bottom:20px;">User Accounts</h2>
            <!-- <div class="searchbar">
                <input type="text" name="s_name" id="s_n" placeholder="Name">
            </div> -->
            <thead>
                <tr style="background-color: #4F4F4B; color:white;">
                    <th class="text-center">Account Number</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Account Type</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Course</th>
                    <th class="text-center">Year</th>
                    <th class="text-center">Section</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //connect to database
                require_once "../function/connect.php";

                //read all row from database table
                $select = "SELECT * FROM user_account";
                $result = mysqli_query($connect, $select);

                if (!$result) {
                    die("Invalid query: " . $connect->connect_error);
                }

                $count = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $studno = $row['stud_no'];
                    $empno = $row['emp_no'];
                    $course = $row['course'];
                    $section = $row['section'];
                    $year = $row['year'];
                    echo ("
                            <tr>
                                <td>" . $row["acc_no"] . "</td>
                                <td class='text-capitalize'>" . $row["first"] . " " . $row["middle"] . ". " . $row["last"] . "</td>
                                <td class='text-capitalize'>" . $row["type"] . "</td>
                                <td class='text-capitalize'>" . $row["verification"] . "</td>
                        ");
                    if ($row["type"] == "student") {
                        echo "
                                <td class='text-capitalize'>" . $row["course"] . "</td>
                                <td class='text-capitalize'>" . $row["year"] . "</td>
                                <td class='text-capitalize'>" . $row["section"] . "</td>";
                    } else {
                        echo "
                                <td>N/A</td>
                                <td>N/A</td>
                                <td>N/A</td>";
                    }
                    // <a class='btn btn-danger btn-sm' href='function/toUserdel.php?id=".$row['acc_no']."'>Archive</a>
                    if ($row['verification'] == "blocked") {
                        echo "<td>
                            <button class='btn btn-secondary btn-sm statusBtn' data-status='verified' data-qr='granted' data-accno='" . $row['acc_no'] . "'>Unblock</button>
                        </td>
                        </tr>";
                    } else {
                        echo "<td>
                            <button class='btn btn-danger btn-sm statusBtn' data-status='blocked' data-qr='blocked' data-accno='" . $row['acc_no'] . "'>Block</button>
                        </td>
                    </tr>";
                    }


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

    <!-- Status Modal -->
    <div class="modal fade py-5" tabindex="-1" id="statusModal">
        <div class="modal-dialog">
            <div class="modal-content rounded-3">
                <div class="modal-body p-4 text-center">
                    <h5 class="">Confirmation</h5>
                    <p class="mb-1">Are you sure you want to <span class="status"></span> account No. <span id="accNoModal"></span></span>?</p>
                    <p class="mb-0 text-danger fw-bolder">*This action is cannot be undone!</p>
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
</body>

</html>
