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
                                        <th>No.</th>
                                        <th>Purpose of Appointment</th>
                                        <th>Date of Appointment</th>
                                        <th>Appointment Status</th>
                                        <th>QR CODE</th>
                                        <th>Actions</th>
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

                                        echo (" 
                                            <tr>
                                                <td>" . ($count + 1) . "</td>
                                                <td>" . $row["reason"] . "</td>
                                                <td>" . $row["date"] . "</td>
                                                <td>" . $row["status"] . "</td>
                                        ");
                                        if ($row['qr'] != NULL || "") {
                                            echo ("<td><a class='btn btn-secondary' target='_blank' href='viewqr.php?id=" . $row["acc_no"] . "&reqid=" . $row["req_id"] . "'>View</a></td>");
                                        } else {
                                            echo ("<td>N/A</td>");
                                        }
                                        echo "<td>
                                            <a class='btn btn-danger' href='function/toapt-cancel.php?id=" . $row['acc_no'] . "&req=" . $row["req_id"] . "'>Cancel</a>
                                        </td>
                                    </tr>";

                                        //read 10 row of data from database table
                                        if ($count == 9) {
                                            break;
                                        }

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
                                <input type="date" min="<?php echo $mindate; ?>" name="date" id="date1" class="form-control">
                                <label>Date of Appointment:</label>
                                <div class="msg" id="msguser"></div>
                            </div>
                            <h4>Purpose of Appointment:</h4>
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
                            <div class="form-check">
                                <input class="form-check-input" name="reason[]" type="checkbox" value="Other" id="check8">
                                <label class="form-check-label" for="check8">
                                    Other
                                </label>
                            </div>
                            <div class="cont-p--hidden" id="txt-1" style="margin-top: 10px;">
                                <div class="form-floating">
                                    <textarea class="form-control" name="othertxt" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Other</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="reg1" style=" width:100%; margin-top: 20px;">Submit Request</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<!-- Javascripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="js/appointment.js"></script>
</body>
</html>

