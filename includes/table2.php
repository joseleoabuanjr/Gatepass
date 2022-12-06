<table class="table shados-sm table-striped table-hover" id="accountVerificationTable">
    <h2 style="padding-top: 60px; padding-bottom:20px;">Account Verification</h2>
    <thead>
        <tr style="background-color: #4F4F4B; color:white;">
            <th>Account Number</th>
            <th>Name</th>
            <th>Account Type</th>
            <th>Certificate of Registration</th>
            <th>Valid ID Card</th>
            <th>Vaccination Card</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php
        //connect to database
        require_once "../function/connect.php";

        //read all row from database table
        $select = "SELECT * FROM user_account WHERE verification = 'pending'";
        $result = mysqli_query($connect, $select);

        if (!$result) {
            die("Invalid query: " . $connect->connect_error);
        }

        $count = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $cor = $row["cor"];
            $vax = $row["vax"];
            $v_id = $row["valid_id"];
            echo ("
                        <tr>
                            <td>" . $row["acc_no"] . "</td>
                            <td class='text-capitalize'>" . $row["first"] . " " . $row["middle"] . ". " . $row["last"] . "</td>
                            <td class='text-capitalize'>" . $row["type"] . "</td>
                    ");
            if ($row["type"] == "student") {
                if ($cor == "" || NULL && $vax == "" || NULL) {
                    echo ("
                            <td>N/A</td><td>N/A</td><td>N/A</td>
                        ");
                } else {
                    if ($cor == "" || NULL && !($vax == "" || NULL)) {
                        echo ("
                                <td>N/A</td>
                                <td>N/A</td>
                                <td><a class='btn btn-secondary' target='_blank' href='../viewvax.php?id=" . $row["acc_no"] . "'>View</a></td>
                            ");
                    } else if ($vax == "" || NULL && !($cor == "" || NULL)) {
                        echo ("
                                <td><a class='btn btn-secondary' target='_blank' href='../viewcor.php?id=" . $row["acc_no"] . "'>View</a></td>
                                <td>N/A</td>
                                <td>N/A</td>
                            ");
                    } else {
                        echo ("
                                <td><a class='btn btn-secondary' target='_blank' href='../viewcor.php?id=" . $row["acc_no"] . "'>View</a></td>
                                <td>N/A</td>
                                <td><a class='btn btn-secondary' target='_blank' href='../viewvax.php?id=" . $row["acc_no"] . "'>View</a></td>
                            ");
                    }
                }
            } else if ($row["type"] == "employee" || "visitor") {
                if ($v_id == "" || NULL && $vax == "" || NULL) {
                    echo ("
                            <td>N/A</td><td>N/A</td><td>N/A</td>
                        ");
                } else {
                    if ($v_id == "" || NULL && !($vax == "" || NULL)) {
                        echo ("
                                <td>N/A</td>
                                <td>N/A</td>
                                <td><a class='btn btn-secondary' target='_blank' href='../viewvax.php?id=" . $row["acc_no"] . "'>View</a></td>
                            ");
                    } else if ($vax == "" || NULL && !($v_id == "" || NULL)) {
                        echo ("
                                <td>N/A</td>
                                <td><a class='btn btn-secondary' target='_blank' href='../view_vid.php?id=" . $row["acc_no"] . "'>View</a></td>
                                <td>N/A</td>
                            ");
                    } else {
                        echo ("
                                <td>N/A</td>
                                <td><a class='btn btn-secondary' target='_blank' href='../view_vid.php?id=" . $row["acc_no"] . "'>View</a></td>
                                <td><a class='btn btn-secondary' target='_blank' href='../viewvax.php?id=" . $row["acc_no"] . "'>View</a></td>
                            ");
                    }
                }
            }
            echo "<td>
                        <a class='btn btn-primary btn-sm' href='../function/tofv_Approve.php?id=" . $row['acc_no'] . "'>Approve</a>
                        <!-- Button trigger modal -->
                        <button type='button' class='btn btn-danger denyBtn btn-sm' data-accNo='" . $row['acc_no'] . "'>Deny</button>

                        <a class='d-none btn btn-danger btn-sm' href='../function/tofv_Denied.php?id=" . $row['acc_no'] . "'>Deny</a>
                    </td>
                </tr>";

            //read 10 row of data from database table
            if ($count == 9) {
                break;
            }
            $count += 1;
        }
        ?>


        <!-- Forgot Password Modal -->
        <div class="modal fade" id="denyModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to deny <span id="acccNoModal"></span>?</p>
                        <div class="alert alert-success my-1" role="alert" id="successAlertFP">
                            User has been successfully denied.
                        </div>
                        <div class="alert alert-danger my-1" role="alert" id="errorAlertFP">
                            Denied Failed.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" id="denyBtnModal">
                            Deny
                            <div id="fPSpinner" class="spinner-border spinner-border-sm" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </button>
                    </div>
                </div>
            </div> 
        </div><!-- Forgot Password modal -->
        </div>
    </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="../js/table2.js"></script>