<table class="table" id="timeinoutTable">
    <h2 style="padding-top: 60px; padding-bottom:20px;">Time In and Out</h2>
    <thead>
        <tr style="background-color: #4F4F4B; color:white;">
            <th>Account Number</th>
            <th>Name</th>
            <th>Account Type</th>
            <th>In/Out</th>
            <th>Date & Time</th>
            <th>Reason</th>
        </tr>
    </thead>
        
    <tbody>
        <?php
            //connect to database
            require_once "../function/connect.php";
            
            //read all row from database table
            $select = "SELECT * FROM time_inout";
            $result = mysqli_query($connect,$select);

            if(!$result){
                die("Invalid query: ".$connect->connect_error);
            }
            
            $count = 0;
            while($row = mysqli_fetch_assoc($result)){
                echo ("
                        <tr>
                            <td>".$row["account_no"]."</td>
                            <td class='text-capitalize'>".$row["name"]."</td>
                            <td class='text-capitalize'>".$row["type"]."</td>
                            <td>".$row["in_out"]."</td>
                            <td>".$row["time"]."</td>
                            <td>".$row["reason"]."</td>
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