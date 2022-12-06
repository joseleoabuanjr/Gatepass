<table class="table shadow-sm table-striped table-hover display compact" id="appointmentRequestTable">
    <h2 style="padding-top: 60px; padding-bottom:20px;">Appointment Request</h2>
    <thead>
        <tr style="background-color: #4F4F4B; color:white;">
            <th>Account Number</th>
            <th>Name</th>
            <th>Account Type</th>
            <th>Purpose of Appointment</th>
            <th>Date of Appointment</th>
            <th>Actions</th>
        </tr>
    </thead>
        
    <tbody>
        <?php
            //connect to database
            require_once "../function/connect.php";
            
            //read all row from database table
            $select = "SELECT * FROM appointment WHERE  status = 'pending'";
            $result = mysqli_query($connect,$select);

            if(!$result){
                die("Invalid query: ".$connect->connect_error);
            }
            
            $count = 0;
            while($row = mysqli_fetch_assoc($result)){
                $reqid = $row['req_id'];
                echo ("
                        <tr>
                            <td>".$row["acc_no"]."</td>
                            <td class='text-capitalize'>".$row["name"]."</td>
                            <td class='text-capitalize'>".$row["type"]."</td>
                            <td>".$row["reason"]."</td>
                            <td>".$row["date"]."</td>
                            <td>
                            <button type='button' class='btn btn-success statusBtn btn-sm' data-status='approved' data-accno='" . $row['acc_no'] . "' data-reqid='".$reqid."'>Approve</button>
                            <button type='button' class='btn btn-danger statusBtn btn-sm' data-status='none' data-accNo='" . $row['acc_no'] . "' data-reqid='".$reqid."'>Deny</button>
                            </td>
                        </tr>");
                    
                //read 10 row of data from database table
                // if($count ==9){
                //     break;
                // }
                // $count +=1;
            }
        ?>
    </tbody>
</table>

<!-- Status Modal -->
<div class="modal fade" id="statusModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to <span class="status"></span> Account No. <span class="accNoModalApp">asd</span>?</p>
                <div class="alert alert-success my-1 successAlert" role="alert" id="">
                    User has been successfully <span class="status"></span>.
                </div>
                <div class="alert alert-danger my-1 errorAlert" role="alert" id="">
                <span class="status text-capitalize"></span> Failed.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success statusBtnModal">
                <span class="status text-capitalize"></span>
                    <div class="fPSpinner spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </button>
            </div>
        </div>
    </div>
</div><!-- Status modal -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="../js/table3.js"></script>
