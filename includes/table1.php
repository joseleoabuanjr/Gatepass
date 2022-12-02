<div class="table-responsive">
    <table class="table">
        <h2 style="padding-top: 60px; padding-bottom:20px;"> User Accounts</h2>
        <!-- <div class="searchbar">
            <input type="text" name="s_name" id="s_n" placeholder="Name">
        </div> -->
        <thead>
            <tr style="background-color: #4F4F4B; color:white;">
                <th>Account Number</th>
                <th>Name</th>
                <th>Type</th>
                <th>Verified</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            //connect to database
            require_once "../function/connect.php";

            //read all row from database table
            $select = "SELECT * FROM user_account";
            $result = mysqli_query($connect,$select);

            if(!$result){
                die("Invalid query: ".$connect->connect_error);
            }
            
            $count = 0;
            while($row = mysqli_fetch_assoc($result)){
                $cor = $row["cor"];
                $vax = $row["vax"];
                $v_id = $row["valid_id"];
                $req = $row["req_status"];
                echo ("
                        <tr>
                            <td>".$row["acc_no"]."</td>
                            <td>".$row["first"]." ".$row["middle"].". ".$row["last"]."</td>
                            <td>".$row["type"]."</td>
                            <td>".$row["verified"]."</td>
                    ");
                echo "<td>
                        <a class='btn btn-danger btn-sm' href='function/toUserdel.php?id=".$row['acc_no']."'>Archive</a>
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