<table class="table">
    <h2 style="padding-top: 60px; padding-bottom:20px;"> Appointment Request</h2>
    <thead>
        <tr style="background-color: #4F4F4B; color:white;">
            <th>Account Number</th>
            <th>Name</th>
            <th>Type</th>
            <th>Reason</th>
            <th>Date of Appointment</th>
            <th>Action</th>
        </tr>
    </thead>
        
    <tbody>
        <?php
            //connect to database
            require_once "function/connect.php";
            
            //read all row from database table
            $select = "SELECT * FROM user_account WHERE req_status = 'pending'";
            $result = mysqli_query($connect,$select);

            if(!$result){
                die("Invalid query: ".$connect->connect_error);
            }
            
            $count = 0;
            while($row = mysqli_fetch_assoc($result)){
                echo ("
                        <tr>
                            <td>".$row["acc_no"]."</td>
                            <td>".$row["first"]." ".$row["middle"].". ".$row["last"]."</td>
                            <td>".$row["type"]."</td>
                            <td>".$row["reason"]."</td>
                            <td>".$row["date_apt"]."</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='function/toapt_Approve.php?id=".$row['acc_no']."'>Approve</a>
                                <a class='btn btn-danger btn-sm' href='function/toapt_Denied.php?id=".$row['acc_no']."'>Denied</a>
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