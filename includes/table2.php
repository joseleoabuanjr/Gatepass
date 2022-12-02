<table class="table">
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
            $select = "SELECT * FROM user_account WHERE verified = 'pending'";
            $result = mysqli_query($connect,$select);

            if(!$result){
                die("Invalid query: ".$connect->connect_error);
            }
            
            $count = 0;
            while($row = mysqli_fetch_assoc($result)){
                $cor = $row["cor"];
                $vax = $row["vax"];
                $v_id = $row["valid_id"];
                echo ("
                        <tr>
                            <td>".$row["acc_no"]."</td>
                            <td>".$row["first"]." ".$row["middle"].". ".$row["last"]."</td>
                            <td>".$row["type"]."</td>
                    ");
                if($row["type"] == "student"){
                    if($cor == "" || NULL && $vax == "" || NULL){
                        echo ("
                            <td></td><td></td><td></td>
                        ");
                    }
                    else{
                        if($cor == "" || NULL && !($vax == "" || NULL) ){
                            echo ("
                                <td></td>
                                <td></td>
                                <td><a class='btn btn-secondary' target='_blank' href='viewvax.php?id=".$row["acc_no"]."'>View</a></td>
                            ");
                        }
                        else if($vax == "" || NULL && !($cor== "" || NULL)){
                            echo ("
                                <td><a class='btn btn-secondary' target='_blank' href='viewcor.php?id=".$row["acc_no"]."'>View</a></td>
                                <td></td>
                                <td></td>
                            ");
                        }
                        else{
                            echo ("
                                <td><a class='btn btn-secondary' target='_blank' href='viewcor.php?id=".$row["acc_no"]."'>View</a></td>
                                <td></td>
                                <td><a class='btn btn-secondary' target='_blank' href='viewvax.php?id=".$row["acc_no"]."'>View</a></td>
                            ");
                        }
                    }
                }
                else if($row["type"] == "employee" || "visitor"){
                    if($v_id == "" || NULL && $vax == "" || NULL){
                        echo ("
                            <td></td><td></td><td></td>
                        ");
                    }
                    else{
                        if($v_id == "" || NULL && !($vax == "" || NULL) ){
                            echo ("
                                <td></td>
                                <td></td>
                                <td><a class='btn btn-secondary' target='_blank' href='viewvax.php?id=".$row["acc_no"]."'>View</a></td>
                            ");
                        }
                        else if($vax == "" || NULL && !($v_id == "" || NULL)){
                            echo ("
                                <td></td>
                                <td><a class='btn btn-secondary' target='_blank' href='view_vid.php?id=".$row["acc_no"]."'>View</a></td>
                                <td></td>
                            ");
                        }
                        else{
                            echo ("
                                <td></td>
                                <td><a class='btn btn-secondary' target='_blank' href='view_vid.php?id=".$row["acc_no"]."'>View</a></td>
                                <td><a class='btn btn-secondary' target='_blank' href='viewvax.php?id=".$row["acc_no"]."'>View</a></td>
                            ");
                        }
                    }
                }
                echo "<td>
                        <a class='btn btn-primary btn-sm' href='function/tofv_Approve.php?id=".$row['acc_no']."'>Approve</a>
                        <a class='btn btn-danger btn-sm' href='function/tofv_Denied.php?id=".$row['acc_no']."'>Deny</a>
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