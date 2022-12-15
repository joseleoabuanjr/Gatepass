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
?>
<nav class="navbar navbar-expand-lg sticky-top navbar-dark " style="background-color: #763435; height: 50px">
<div class="glass-effect w-100">
    <div class="container d-flex justify-content-between">
        <div class="navbar-brand" style="width:400px;"><span class="init">B</span>ULACAN <span class="init"> S</span>TATE <span class="init"> U</span>NIVERSITY <span class="init">[</span>GATEPASS<span class="init">]</span></div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="user.php" id="tl1">Users</a>
                <a class="nav-link" href="verification.php" id="tl2">Verification</a>
                <a class="nav-link" href="appointment.php" id="tl3">Appointments</a>
                <a class="nav-link" href="time_inout.php" id="tl4">Time-in/out</a>
                <?php 
                    if($type == 'superadmin') { 
                        echo ('
                        <div class="nav-item dropdown" style="border-right: 1px gray solid; margin-right:5px;padding-right:5px;">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                More
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../scanner.php">QR-Scanner</a></li>
                            </ul>
                        </div>');
                    }
                ?>
                <a class="nav-link" href="../function/toLogout-admin.php">Logout</a>
            </div>
            
        </div>
    </div>
</div>
</nav>
