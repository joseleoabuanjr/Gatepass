<div class="container d-flex justify-content-center align-items-center flex-column" style="height:auto;padding-top:100px;">
    <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100%; width:100%;">
    <div class="card" style="width:100%; padding:40px;margin-bottom:40px;">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <h2 style="padding-bottom:20px;">Appointments Requests</h2>
                    <!-- <div class="searchbar">
                        <input type="text" name="s_name" id="s_n" placeholder="Name">
                    </div> -->
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

                        $accno= $_SESSION["accno"];

                        //read all row from database table
                        $select = "SELECT * FROM appointment WHERE acc_no ='$accno'";
                        $result = mysqli_query($connect,$select);

                        if(!$result){
                            die("Invalid query: ".$connect->connect_error);
                        }
                        
                        $count = 0;
                        while($row = mysqli_fetch_assoc($result)){
                        
                            echo (" 
                                    <tr>
                                        <td>".($count+1)."</td>
                                        <td>".$row["reason"]."</td>
                                        <td>".$row["date"]."</td>
                                        <td>".$row["status"]."</td>
                                ");
                                if($row['qr']!=NULL || ""){
                                    echo ("<td><a class='btn btn-secondary' target='_blank' href='viewqr.php?id=".$row["acc_no"]."&reqid=".$row["req_id"]."'>View</a></td>");
                                }
                                else{
                                    echo ("<td>N/A</td>");
                                }
                            echo "<td>
                                    <a class='btn btn-danger' href='function/toapt-cancel.php?id=".$row['acc_no']."&req=".$row["req_id"]."'>Cancel</a>
                                </td>
                            </tr>";
                                
                            //read 10 row of data from database table
                            if($count ==9){
                                break;
                            }
                            
                            $count +=1;
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        <form class="border rounded-3" method="post" action="function/toRequest.php?id=<?php echo ("$id"); ?>" enctype="multipart/form-data" style="width: 100%; padding:40px">
            <h1 style="margin-bottom: 20px;">Appointment Request</h1>
            <div class="form-floating"  style="margin-bottom: 10px;">
                <input type="date" min="2022-12-03" name="date" id="date1" class="form-control">
                <label>Date of Appointment:</label>
            <div class="msg" id="msguser"></div>
            </div>
            <!-- <div class="form-floating">
                <select class="form-select" name="purpose" id="purpose-s">
                    <option selected disabled>Select Purpose</option>
                    <option value="Request of Transcript of Records (TOR)">Request of Transcript of Records (TOR)</option>
                    <option value="Claiming of Graduation Picture">Claiming of Graduation Picture</option>
                    <option value="Request of Form 137">Request of Form 137</option>
                    <option value="Request of Good Moral Certificate">Request of Good Moral Certificate</option>
                    <option value="Request for Dry Seal">Request for Dry Seal of Documents</option>
                    <option value="Payment">Payment to University Cashier</option>
                    <option value="Inquiries">Inquiries to Registrar's Office</option>
                    <option value="Other">Other</option>
                </select>
                <label for="floatingSelect">Purpose of Appointment:</label>
            </div> -->
            <h4>Purpose of Appointment:</h4>
            <div class="form-check">
                <input class="form-check-input" name="reason[]" type="checkbox" value="Request of Transcript of Records (TOR)" id="check1">
                <label class="form-check-label" for="flexCheckDefault">
                    Request of Transcript of Records (TOR)
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="reason[]" type="checkbox" value="Claiming of Graduation Picture" id="check2">
                <label class="form-check-label" for="flexCheckDefault">
                    Claiming of Graduation Picture
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="reason[]" type="checkbox" value="Request of Form 137" id="check3">
                <label class="form-check-label" for="flexCheckDefault">
                    Request of Form 137
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="reason[]" type="checkbox" value="Request of Good Moral Certificate" id="check4">
                <label class="form-check-label" for="flexCheckDefault">
                    Request of Good Moral Certificate
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="reason[]" type="checkbox" value="Request for Dry Seal of Documents" id="check5">
                <label class="form-check-label" for="flexCheckDefault">
                    Request for Dry Seal of Documents
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="reason[]" type="checkbox" value="Payment to University Cashier" id="check6">
                <label class="form-check-label" for="flexCheckDefault">
                    Payment to University Cashier
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="reason[]" type="checkbox" value="Inquiries to Registrar\'s Office" id="check7">
                <label class="form-check-label" for="flexCheckDefault">
                    Inquiries to Registrar's Office
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="reason[]" type="checkbox" value="Other" id="check8">
                <label class="form-check-label" for="flexCheckDefault">
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