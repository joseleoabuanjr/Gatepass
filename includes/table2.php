<table class="table shadow-sm table-striped table-hover display compact" id="accountVerificationTable">
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
                            <td class='text-capitalize'>" . $row["first"] . " " . $row["middle"].". " . $row["last"] . "</td>
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
                                <td><a class='btn btn-secondary btn-sm' target='_blank' href='../viewvax.php?id=" . $row["acc_no"] . "'>View</a></td>
                            ");
                    } else if ($vax == "" || NULL && !($cor == "" || NULL)) {
                        echo ("
                                <td><a class='btn btn-secondary btn-sm' target='_blank' href='../viewcor.php?id=" . $row["acc_no"] . "'>View</a></td>
                                <td>N/A</td>
                                <td>N/A</td>
                            ");
                    } else {
                        echo ("
                                <td><a class='btn btn-secondary btn-sm' target='_blank' href='../viewcor.php?id=" . $row["acc_no"] . "'>View</a></td>
                                <td>N/A</td>
                                <td><a class='btn btn-secondary btn-sm' target='_blank' href='../viewvax.php?id=" . $row["acc_no"] . "'>View</a></td>
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
                                <td><a class='btn btn-secondary btn-sm' target='_blank' href='../viewvax.php?id=" . $row["acc_no"] . "'>View</a></td>
                            ");
                    } else if ($vax == "" || NULL && !($v_id == "" || NULL)) {
                        echo ("
                                <td>N/A</td>
                                <td><a class='btn btn-secondary btn-sm' target='_blank' href='../view_vid.php?id=" . $row["acc_no"] . "'>View</a></td>
                                <td>N/A</td>
                            ");
                    } else {
                        echo ("
                                <td>N/A</td>
                                <td><a class='btn btn-secondary btn-sm' target='_blank' href='../view_vid.php?id=" . $row["acc_no"] . "'>View</a></td>
                                <td><a class='btn btn-secondary btn-sm' target='_blank' href='../viewvax.php?id=" . $row["acc_no"] . "'>View</a></td>
                            ");
                    }
                }
            }
            echo "<td>
                        <!-- Button trigger modal -->
                        <button type='button' class='btn btn-success approveBtn btn-sm' data-accno='" . $row['acc_no'] . "'>Approve</button>
                        <button type='button' class='btn btn-danger denyBtn btn-sm' data-accNo='" . $row['acc_no'] . "'>Deny</button>
                    </td>
                </tr>";

            //read 10 row of data from database table
            if ($count == 9) {
                break;
            }
            $count += 1;
        }
        ?>

        <!-- Approve Modal -->
        <div class="modal fade" id="approveModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to approve Account No. <span id="accNoModalApp"></span>?</p>
                        <div class="alert alert-success my-1" role="alert" id="successAlertA">
                            User has been successfully approve.
                        </div>
                        <div class="alert alert-danger my-1" role="alert" id="errorAlertA">
                        Approve Failed.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="approveBtnModal">
                            Approve
                            <div id="fPSpinnerA" class="spinner-border spinner-border-sm" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </button>
                    </div>
                </div>
            </div> 
        </div><!-- Approve modal -->

        <!-- Deny Modal -->
        <div class="modal fade" id="denyModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to deny Account No. <span id="acccNoModal"></span>?</p>
                        <div class="alert alert-success my-1" role="alert" id="successAlertD">
                            User has been successfully denied.
                        </div>
                        <div class="alert alert-danger my-1" role="alert" id="errorAlertD">
                            Denied Failed.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" id="denyBtnModal">
                            Deny
                            <div id="fPSpinnerD" class="spinner-border spinner-border-sm" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </button>
                    </div>
                </div>
            </div> 
        </div><!-- Deny modal -->
    </div>
    </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="../js/table2.js"></script>
