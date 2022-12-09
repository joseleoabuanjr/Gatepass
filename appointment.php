<?php
session_start();
if (!isset($_SESSION["accno"])) {
	header("Location: index.php");
}
require_once "function/connect.php";
$id = $_SESSION['accno'];
// //read data from database table
// $select = "SELECT * FROM user_account WHERE acc_no =$id";
// $result = mysqli_query($connect, $select);

// while ($row = mysqli_fetch_assoc($result)) {
//     $status = $row['verification'];
// }
// if ($status == "verified") {
//     require_once "includes/request.php";
// } else if ($status == "unverified") {
//     echo ('<script type="text/javascript" src="js/profilebtn.js"></script>');
//     require_once "includes/nf_verified.php";
// } else if ($status == "pending") {
//     require_once "includes/nf_verified.php";
// } else {
//     echo "<script>alert(Error)</script>";
// }
?>
<!doctype html>
<html>

<head>
	<title>Account Information</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!----------- CSS ------------>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/navbar.css">
	<link rel="stylesheet" href="css/appointment.css">

    <!----------- Javascript ------------>

</head>
<body>
	<?php require_once 'includes/navbar.php'; ?>
	<div class="container" style="height: auto;">
        <div class="container d-flex justify-content-center align-items-center flex-column pt-4" style="height:auto;">
            <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100%; width:100%;">
                <div class="card" style="width:100%; padding:40px;margin-bottom:40px;">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="d-flex justify-content-between">
                                <h2 style="padding-bottom:20px;">Appointments Requests</h2>
                                <div>
                                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#requestModal">Request an Appointment</button>
                                </div>
                            </div>
                            <table class="table pt-2 shadow-sm table-striped table-hover display compact" id="appointmentTable">
                                <thead>
                                    <tr style="background-color: #4F4F4B; color:white;">
                                        <th class='text-center'>No.</th>
                                        <th>Purpose of Appointment</th>
                                        <th class='text-center'>Date of Appointment</th>
                                        <th class='text-center'>Appointment Status</th>
                                        <th class='text-center'>QR CODE</th>
                                        <th class='text-center'>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //connect to database
                                    require_once "function/connect.php";

                                    $accno = $_SESSION["accno"];
                                    //Get Current Time
                                    $tz = 'Asia/Manila';
                                    $timestamp = time();
                                    $dt = new DateTime("now", new DateTimeZone($tz));
                                    $dt->setTimestamp($timestamp);
                                    $curdate = $dt->format('Y-m-d');
                                    $mindate = date('Y-m-d', strtotime($curdate . ' + 1 days'));

                                    //read all row from database table
                                    $select = "SELECT * FROM appointment WHERE acc_no ='$accno'";
                                    $result = mysqli_query($connect, $select);

                                    if (!$result) {
                                        die("Invalid query: " . $connect->connect_error);
                                    }

                                    $count = 0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $reason = $row['reason'];
                                        $exploded = explode(',', $reason);
                                        echo (" 
                                            <tr>
                                                <td class='text-center text-bold'>" . ($count + 1) . "</td>");
                                        echo '<td>';
                                        foreach ($exploded as $reason) {
                                            echo "<ul><li>" . $reason . "</li></ul>";
                                        }
                                        echo '</td>';
                                        echo ("
                                                <td class='text-center'>" . $row["date"] . "</td>
                                                <td class='text-center'> " . $row["status"] . "</td>
                                        ");
                                        if ($row['qr'] != NULL || "") {
                                            echo ("<td><a class='btn btn-secondary' target='_blank' href='viewqr.php?id=" . $row["acc_no"] . "&reqid=" . $row["req_id"] . "'>View</a></td>");
                                        } else {
                                            echo ("<td>N/A</td>");
                                        }
                                        echo "<td class='text-center'>
                                            <button type='button' class='btn btn-danger statusBtn btn-sm' data-status='cancel' data-accno='" . $row['acc_no'] . "' data-reqid='" . $row["req_id"] . "'>Cancel</button>
                                        </td>
                                    </tr>";

                                        //read 10 row of data from database table
                                        // if ($count == 9) {
                                        //     break;
                                        // }

                                        $count += 1;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Request Modal -->
        <div class="modal fade" id="requestModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <h1 class="modal-title fs-3">Appointment Request</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="p-3" method="post" action="function/toRequest.php?id=<?php echo ("$id"); ?>" enctype="multipart/form-data">
                            <div class="form-floating" style="margin-bottom: 10px;">
                                <input type="date" min="<?php echo $mindate; ?>" name="date" id="date1" class="form-control" required>
                                <label>Date of Appointment:</label>
                                <div class="msg" id="msguser"></div>
                            </div>
                            <div class="options">
                            <h4>Purpose of Appointment:</h4>
                                <input id="radio-for-checkboxes" type="radio" name="radio-for-required-checkboxes" required style="position: absolute;margin: 0;top: 0;left: 0;width: 305px;height: 160px; -webkit-appearance: none;pointer-events: none; border: none; background: none;">
                                <div class="form-check">
                                    <input class="form-check-input" name="reason[]" type="checkbox" value="Request of Transcript of Records (TOR)" id="check1">
                                    <label class="form-check-label" for="check1">
                                        Request of Transcript of Records (TOR)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="reason[]" type="checkbox" value="Claiming of Graduation Picture" id="check2">
                                    <label class="form-check-label" for="check2">
                                        Claiming of Graduation Picture
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="reason[]" type="checkbox" value="Request of Form 137" id="check3">
                                    <label class="form-check-label" for="check3">
                                        Request of Form 137
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="reason[]" type="checkbox" value="Request of Good Moral Certificate" id="check4">
                                    <label class="form-check-label" for="check4">
                                        Request of Good Moral Certificate
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="reason[]" type="checkbox" value="Request for Dry Seal of Documents" id="check5">
                                    <label class="form-check-label" for="check5">
                                        Request for Dry Seal of Documents
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="reason[]" type="checkbox" value="Payment to University Cashier" id="check6">
                                    <label class="form-check-label" for="check6">
                                        Payment to University Cashier
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="reason[]" type="checkbox" value="Inquiries to Registrar\'s Office" id="check7">
                                    <label class="form-check-label" for="check7">
                                        Inquiries to Registrar's Office
                                    </label>
                                </div>
                                <div class="form-check" id="other">
                                    <input class="form-check-input" name="reason[]" type="checkbox" value="Other" id="check8">
                                    <label class="form-check-label" for="check8">
                                        Other
                                    </label>
                                </div>
                            </div>
                            <div class="cont-p" id="txt-1" style="margin-top: 10px;">
                                <div class="form-floating">
                                    <textarea class="form-control" name="othertxt" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Type your reason here</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="reg1" style=" width:100%; margin-top: 20px;">Submit Request</button>
                        </form>
                    </div>
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
                    <p class="mb-1">Are you sure you want to <span class="status"></span> account No. <span id="accNoModal"></span></span>?</p>
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

	<!-- Javascripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript" src="js/appointment.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
</body>
</html>

