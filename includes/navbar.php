<?php
$select = "SELECT * FROM user_account Where acc_no = $id";
$result = mysqli_query($connect, $select);
$count =  mysqli_num_rows($result);

if ($count == 1) {
    while ($row = mysqli_fetch_assoc($result)) {
        $type = $row['type'];
        $stats = $row['verification'];
    }
    if ($stats == "blocked") {
        $disable2 = 'disabled';
        $disable = "";
    } else if ($stats == "pending") {
        $disable = 'disabled';
        $disable2 = '';
    } else if ($stats == "unverified") {
        $disable = 'disabled';
        $disable2 = '';
    } else {
        $disable2 = "";
        $disable = "";
    }
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-0 sticky-top">
    <div class="glass-effect w-100 navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="resources/bulsulogo.png" class="mb-2" width="30" height="30">
                <span class="d-none d-md-inline text-light"><span class="init">B</span>ULACAN <span class="init"> S</span>TATE <span class="init"> U</span>NIVERSITY <span class="init">[</span>GATEPASS<span class="init">]</span></span>
                <span class="d-inline d-md-none text-light"><span class="init">B</span>UL<span class="init">S</span><span class="init">U</span> <span class="init">[</span>GATEPASS<span class="init">]</span></span>
            </a>
            <button class="navbar-toggler text-bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExample03">
                <ul class="navbar-nav ms-auto mb-2 mb-sm-0">
                    <div class="navbar-nav">
                        <a class="nav-link text-light <?php echo $disable2 ?>" href="dashboard.php" id="ta1">Dashboard</a>
                        <a class="nav-link text-light<?php echo $disable2 ?>" href="profile.php" id="ta2">Profile</a>
                        <div style="border-right: 1px darkgray solid;margin-right:5px;padding-right:5px;">
                            <?php
                            if ($type == 'student') {
                            } else if ($type == 'employee') {
                            } else {
                                echo ('<a class="nav-link text-light ' . $disable2 .= $disable . '" href="appointment.php" id="ta3">Appointments</a>');
                            }
                            ?>
                        </div>
                        <a class="nav-link text-light" href="function/toLogout.php">Logout</a>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</nav>
