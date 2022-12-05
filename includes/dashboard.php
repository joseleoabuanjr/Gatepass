<div class="container">
    <?php
    $accno = $_SESSION["accno"];
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

            $tempbday = date_create($bday);
            $bday = date_format($tempbday, "F d, Y");
            if ($status == "unverified") {
                echo '
                    <div class="w-100 pt-4">
                        <div class="alert text-center fw-bold alert-warning shadow-sm" role="alert">
                            Your account is not yet fully verified. Please <a href="">verify</a> now.
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
                    echo '
                    <div class="col d-flex align-items-center">
                        <div class="text-center">
                            <img src="Images/' . $qr . '" class="img-fluid mx-auto">
                            <a href="Images/' . $qr . '" class="btn btn-sm btn-dark" download>Download</a>
                        </div>
                    </div>
                    ';
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
                        <div class="col">Birthdate: </div>
                        <div class="col"><?php echo $bday; ?></div>
                    </div>
                </div>
            </div>
            <?php if ($type == "visitor") { ?>
                <div class="col-md-6">
                    <div class="h-100 p-5 bg-light border rounded-3 shadow-sm">
                        <h2>Appointment Summary</h2>
                        <?php
                        $select = "SELECT * FROM appointment WHERE acc_no = $accno";
                        $result = mysqli_query($connect, $select);

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
                            echo '<button type="button" class="btn btn-outline-secondary" id="appointmentBtn">Set an Appointment</button>';
                        }
                        ?>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>


</div>

<footer class="py-4 mt-5 text-bg-dark text-center">
</footer>
