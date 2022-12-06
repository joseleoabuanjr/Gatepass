<?php
$select = "SELECT * FROM user_account Where acc_no = $id";
$result = mysqli_query($connect, $select);
$count =  mysqli_num_rows($result);

if ($count == 1) {
	while ($row = mysqli_fetch_assoc($result)) {
		$type = $row['type'];
	}
}
?>
<nav class="navbar navbar-expand-lg sticky-top navbar-dark " style="background-color: #763435; height: 50px">
    <div class="container d-flex justify-content-between">
        <div class="navbar-brand" style="width:400px;"><span class="init">B</span>ULACAN <span class="init"> S</span>TATE <span class="init"> U</span>NIVERSITY <span class="init">[</span>GATEPASS<span class="init">]</span></div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="dashboard.php" id="ta1">Dashboard</a>
                <a class="nav-link" href="profile.php" id="ta2">Profile</a>
                <?php 
                    if($type == 'student') { 
                        
                    }
                    else if($type == 'employee') { 
                        
                    }
                    else{
                        echo ('<a class="nav-link" href="appointment.php" id="ta3">Appointments</a>');
                    }
                ?>
                <a class="nav-link" href="function/toLogout.php">Logout</a>
            </div>
        </div>
    </div>
</nav>
