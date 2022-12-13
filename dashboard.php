<?php
session_start();
if (!isset($_SESSION["accno"])) {
	header("Location: index.php");
}
require_once "function/connect.php";
$id = $_SESSION['accno'];
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
	<link rel="stylesheet" href="css/dashboard.css">


    <!----------- Javascript ------------>

</head>
<body>
	<?php require_once 'includes/navbar.php'; ?>
	<div class="container">
    <?php
        $accno = $_SESSION["accno"];
        
        $select = "SELECT*FROM appointment WHERE date =(SELECT MIN(date) FROM appointment WHERE acc_no = $accno AND status = 'approved')";
        $result = mysqli_query($connect,$select); 
        while($row = mysqli_fetch_assoc($result)){
            $req_id = $row['req_id'];
            $qrv = $row['qr'];
        }

        $select = "SELECT * FROM user_account WHERE acc_no = $accno";
        $result = mysqli_query($connect, $select);

        if (mysqli_num_rows($result) > 0) {
            if ($row = mysqli_fetch_assoc($result)) {
                $qr = $row["qr"];
                $img = $row["image"];
                $type = $row["type"];
                $bday = $row["birthday"];
                $add = $row["address"];
                $idNum = $row["acc_no"];
                $studno = $row["stud_no"];
                $empno = $row["emp_no"];
                $first = $row["first"];
                $mid = $row["middle"];
                $last = $row["last"];
                $col = $row["college"];
                $course = $row["course"];
                $year = $row["year"];
                $section = $row["section"];
                $contactNo = $row["contact_no"];
                $email = $row["email"];

                $status = $row['verification'];
                $statusColor = "text-bg-success";
                if ($status != "verified") {
                    $statusColor = "text-bg-warning";
                }
                if ($status == "unverified") {
                    $statusColor = "text-bg-danger";
                }
                if ($status == "blocked") {
                    $statusColor = "text-bg-secondary";
                }

                $tempbday = date_create($bday);
                $bday = date_format($tempbday, "F d, Y");
                if ($status == "unverified") {
                    echo '
                        <div class="w-100 pt-4">
                            <div class="alert text-center fw-bold alert-danger shadow-sm" role="alert">
                                Your account is not yet fully verified. Please <a href="profile.php">verify</a> now.
                            </div>
                        </div>
                        ';
                } else if ($status == "pending") {
                    echo '
                        <div class="w-100 pt-4">
                            <div class="alert text-center fw-bold alert-warning shadow" role="alert">
                                Your account verification status is pending. Please wait until your account is fully verified.
                            </div>
                        </div>
                        ';
                }
                else if ($status == "blocked") {
                    echo '
                        <div class="w-100 pt-4">
                            <div class="alert text-center fw-bold alert-dark shadow" role="alert">
                                Your account has been blocked by the admin.
                            </div>
                        </div>
                        ';
                }
            }
        }
        ?>

        <div class="py-4">
            <header class="pb-3 mb-4 border-bottom">
                <div class="d-flex align-items-center text-dark text-decoration-none">
                    <span class="fs-4">My Dashboard</span>
                </div>
            </header>

            <div class="p-5 mb-4 bg-light shadow-sm rounded-3">
                <div class="row g-2">
                    <div class="col-10">
                        <div class="row">
                            <div class="col-12 col-md-4 d-flex align-items-center">
                                <img src="data:image;base64,<?php echo $img; ?>" class="img-fluid rounded-circle">
                            </div>
                            <div class="col-12 col-md-8 d-flex align-items-center">
                                <div class="container-fluid py-5">
                                    <small class="fw-bold text-secondary"><?php echo $idNum; ?></small> <span class="badge <?php echo $statusColor; ?> text-capitalize"><?php echo $status; ?></span>
                                    <h1 class="display-5 fw-bold text-capitalize"><?php echo $first . ' ' . $last; ?></h1>
                                    <h6><i class="fas fa-phone me-3"></i><?php echo $contactNo; ?></h6>
                                    <h6><i class="fas fa-envelope me-3"></i><?php echo $email; ?></h6>
                                    <h6 class="text-uppercase"><i class="fas fa-users me-3"></i><?php echo $type; ?></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($status == "verified") {
                        if ($type == "visitor"){
                            $select = "SELECT * FROM appointment WHERE acc_no = $accno AND status = 'approved'";
                            $result = mysqli_query($connect, $select);
                            if (mysqli_num_rows($result) > 0) {
                                echo '
                                <div class="col d-flex align-items-center">
                                    <div class="text-center">
                                        <img src="Images/' . $qrv . '" class="img-fluid mx-auto">
                                        <a href="Images/' . $qrv . '" class="btn btn-sm btn-dark" download>Download</a>
                                    </div>
                                </div>
                                ';
                            }
                        }
                        else{
                            echo '
                            <div class="col d-flex align-items-center">
                                <div class="text-center">
                                    <img src="Images/' . $qr . '" class="img-fluid mx-auto">
                                    <a href="Images/' . $qr . '" class="btn btn-sm btn-dark" download>Download</a>
                                </div>
                            </div>
                            ';
                        }
                    }
                    ?>

                </div>
            </div>

            <div class="row align-items-md-stretch">
                <div class="col">
                    <div class="h-100 p-5 text-bg-dark rounded-3 shadow-sm">
                        <h2>Profile Summary</h2>
                        <div class="row row-cols-1 row-cols-md-2">
                            <div class="col">Contact Number: </div>
                            <div class="col"><?php echo $contactNo; ?></div>
                            <div class="col">Email Address: </div>
                            <div class="col"><?php echo $email; ?></div>
                            <div class="col">Address: </div>
                            <div class="col"><?php echo $add; ?></div>
                            <div class="col">Date of Birth: </div>
                            <div class="col"><?php echo $bday; ?></div>
                        </div>
                    </div>
                </div>
                <?php if ($type == "visitor") { ?>
                    <div class="col-md-6">
                        <div class="h-100 p-5 bg-light border rounded-3 shadow-sm">
                            <h2>Appointment Summary</h2>
                            <?php
                            $select = "SELECT*FROM appointment WHERE date =(SELECT MIN(date) FROM appointment WHERE acc_no = $accno AND status = 'approved')";
                            $result = mysqli_query($connect,$select); 

                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $date = $row["date"];
                                    $reason = $row["reason"];
                                    $temp = date_create($date);
                                    $date = date_format($temp, "l, F d, Y");
                                }
                                $exploded = explode(',', $reason);

                                echo '<h4 class="text-primary">'. $date .'</h4>
                                <ul>';
                                foreach ($exploded as $reason) {
                                    echo "<li>" . $reason . "</li>";
                                }
                                echo '</ul>';
                            } else {
                                echo '<a href="appointment.php" class="btn btn-outline-secondary mt-3 '.$disable.'" id="appointmentBtn">Set an Appointment</a>';
                            }
                            ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <footer class="py-4 mt-5 text-bg-dark text-center"></footer>

	<!-- Javascripts -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
