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
            $("#adminAccountsTable").DataTable({
                "ordering": false
            });
        });
    </script>
</head>

<body>
    <?php require_once '../includes/navbar-sadmin.php'; ?>
    <div class="container" style="padding-bottom:20px;">
        <header class="pb-3 mb-4 border-bottom mt-5">
            <div class="d-flex align-items-center text-dark text-decoration-none">
                <span class="fs-3">Admin Management</span>
            </div>
        </header>
        <div class="card">
            <div class="card-header" style="background-color: #4F4F4B; color:white;">
            <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-start align-items-center">
                        <div class="w-auto mx-2 rounded-1" style=" padding: 5px 10px; width: 100%">
                        </div>
                    </div>
                    <div class="col col-sm-auto p-0 "><button type="button" class="btn btn-primary btn-sm addBtn">Add Admin</button></div>
                </div>
            </div>
            <div class="card-body">
                <div class="table">
                <table class="table pt-2 shadow table-striped table-hover display compact" id="adminAccountsTable">
                    <thead>
                        <tr class="text-bg-warning" style="background-color: #4F4F4B; color:white;">
                            <th class="text-center">Username</th>
                            <th class="text-center">Password</th>
                            <th class="text-center">Type</th>
                            <th class="text-center">Department</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        //connect to database
                        require_once "../function/connect.php";

                        //read all row from database table
                        $select = "SELECT * FROM admin_account WHERE type = 'admin'AND archived ='false' ORDER by id DESC";
                        $result = mysqli_query($connect, $select);

                        if (!$result) {
                            die("Invalid query: " . $connect->connect_error);
                        }

                        $count = 0;
                        while ($row = mysqli_fetch_assoc($result)) {

                            $id = $row['id'];
                            $user = $row['username'];
                            $pass = $row["password"];
                            $count = strlen($pass);
            
                            $passdot = "";
                            for($x = 0; $x < $count; $x++) {
                                $passdot .= "*";
                            }
                            echo ("
                                    <tr>
                                        <td class='text-capitalize'>" . $row["username"] . "</td>
                                        <td class=''> 
                                            <span class='text-center' id='passcont$id'>" .$passdot." </span>
                                        </td>
                                        <td class='text-capitalize'>" . $row["type"] . "</td>
                                        <td class='text-capitalize'>" . $row["department"] . "</td>
                                        <td>
                                            <div class='btn-group' role='group'>
                                                <button type='button' class='btn btn-outline-dark showBtn btn-sm' data-id='$id' id='showBtn$id'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-eye-fill' viewBox='0 0 16 16'>
                                                <path d='M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z'/>
                                                <path d='M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z'/>
                                                </svg></button>
                                                <button type='button' class='btn btn-outline-dark unshowBtn btn-sm' data-id='$id' data-dot='$passdot' id='unshowBtn$id'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-slash' viewBox='0 0 16 16'>
                                                <path d='M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z'/>
                                                <path d='M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z'/>
                                                <path d='M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z'/>
                                                </svg></button>
                                                <button type='button' class='btn btn-danger archiveBtn btn-sm' id='archiveBtn$id' data-status='archive' data-user='$user' data-id='$id'>Archive
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
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
        </div>
    </div>

    <!-- Status Modal -->
    <div class="modal fade py-5" tabindex="-1" id="formModal">
        <div class="modal-dialog">
            <form id="AdminForm">
                <div class="modal-content rounded-3">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Admin Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                            <div class="row ">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">College</label>
                                        <select class="form-select mb-3 required" name="college" id="col-s" required>
                                            <option value="" selected disabled>Select College</option>
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
                    <div class="modal-footer flex-nowrap p-0">
                        <button class="btn btn-primary me-md-2 px-5" type="submit">
                            <span>Register</span>
                            <div id="registerSpinner" class="spinner-border spinner-border-sm" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade py-5" tabindex="-1" id="confirmModal">
        <div class="modal-dialog">
            <form id="confirmForm">  
            <div class="query"></div>
                <div class="modal-content rounded-3">
                    <div class="modal-header">
                        <h5 class="modal-title">Show Admin Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="row ">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="password" class="w-100">Enter Superadmin Password</label>
                                    <input type="password" class="form-control" name="pass" id="password2" required minlength="8">
                                    <!-- <small class="text-secondary">Password must be at least 8 characters </small> -->
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-danger" role="alert" id="errorAlert2">
                            {{ errorMessage }}
                        </div>
                    </div>
                    
                    <div class="modal-footer flex-nowrap p-0">
                        <button class="btn btn-primary confirmBtn me-md-2 px-5" data-id='0' type="submit">
                            <span>Show</span>
                            <div id="registerSpinner2" class="spinner-border spinner-border-sm" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade py-5" tabindex="-1" id="archiveModal">
        <div class="modal-dialog">
            <div class="modal-content rounded-3">
                <div class="modal-body p-4 text-center">
                    <h5 class="">Confirmation</h5>
                    <p class="mb-1">Are you sure you want to <span class="status" id="status"></span> <span id="userModal"></span>Account?</p>
                    <!-- <p class="mb-0 text-danger fw-bolder">*This action is cannot be undone!</p> -->
                    <div class="alert alert-danger my-1" role="alert" id="errorAlert3">
                        <span class="status text-capitalize"></span> Failed.
                    </div>
                </div>
                <div class="modal-footer flex-nowrap p-0">
                    <button type="button" id="archiveBtnModal" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-end"><strong>Yes</strong>
                        <div id="fPSpinner3" class="spinner-border spinner-border-sm" role="status">
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
    <script src="../js/admin.js"></script>
</body>

</html>