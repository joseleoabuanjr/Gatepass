<table class="table">
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
                            <td>".$row["name"]."</td>
                            <td>".$row["type"]."</td>
                            <td>".$row["reason"]."</td>
                            <td>".$row["date"]."</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='../function/toapt_Approve.php?id=".$row['acc_no']."&reqid=".$reqid."'>Approve</a>
                                <a class='btn btn-danger btn-sm' href='../function/toapt_Denied.php?id=".$row['acc_no']."&reqid=".$reqid."'>Deny</a>
                            </td>
                        </tr>");
                    
                //read 10 row of data from database table
                if($count ==9){
                    break;
                }
                $count +=1;
            }
        ?>
    </tbody>
</table>