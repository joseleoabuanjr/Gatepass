<?php
include '../function/connect.php';
$select = "SELECT * FROM admin_account Where type = 'superadmin'";
$result = mysqli_query($connect, $select);
$count =  mysqli_num_rows($result);

if ($count == 1) {
	while ($row = mysqli_fetch_assoc($result)) {
		$type = $row['type'];
	}
}

//read all row from database table
$select = "SELECT * FROM appointment WHERE status = 'pending'";
$result = mysqli_query($connect, $select);
$count =  mysqli_num_rows($result);
//read all row from database table
$s = "SELECT * FROM user_account WHERE verification = 'unverified'";
$r = mysqli_query($connect, $s);
$c =  mysqli_num_rows($r);
?>
<nav class="navbar navbar-expand-lg sticky-top navbar-dark" style=" height: 50px">
    <div class="glass-effect w-100">
        <div class="container d-flex justify-content-between">
            <div class="navbar-brand" style="width:400px;"><span class="init">B</span>ULACAN <span class="init"> S</span>TATE <span class="init"> U</span>NIVERSITY <span class="init">[</span>GATEPASS<span class="init">]</span></div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="dashboard.php" id="tl1">Dashboard</a>
                    <a class="nav-link" href="user.php" id="tl1">Users</a>
                    <a class="nav-link position-relative" href="verification.php" id="tl2">Verifications<?php 
                    if(!isset($_SESSION["notif1"])){
                        if($c != 0){
                                echo '<span class="position-absolute top-25 start-100 translate-middle badge rounded-pill bg-danger">
                                '.$c.'</span>';
                            } 
                    }?></a>
                    <a class="nav-link position-relative" href="appointment.php" id="tl3">Appointments
                        <?php 
                        if(!isset($_SESSION["notif2"])){
                            if($count != 0){
                                echo '<span class="position-absolute top-25 start-100 translate-middle badge rounded-pill bg-danger">
                                '.$count.'</span>';
                            } 
                        }?>
                        </a>
                    <a class="nav-link" href="time_inout.php" id="tl4">Time-in/out</a>
                    <?php 
                        if($type == 'superadmin') { 
                            echo ('
                            <div class="nav-item dropdown" style="border-right: 1px gray solid; margin-right:5px;padding-right:5px;">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    More
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="admin.php">Manage Admin</a></li>
                                    <li><a class="dropdown-item" href="../scanner.php">QR Scanner</a></li>
                                </ul>
                            </div>');
                        }
                    ?>
                    <a class="nav-link" href="../function/toLogout-sadmin.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
</nav>
