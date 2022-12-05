<table class="table shadow-sm table-striped table-hover display compact" id="timeinoutTable">
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
                $temp = date_create($row["time"]);
                $dt = date_format($temp, "F d, Y H:i A");
                echo ("
                        <tr>
                            <td>".$row["account_no"]."</td>
                            <td class='text-capitalize'>".$row["name"]."</td>
                            <td class='text-capitalize'>".$row["type"]."</td>
                            <td class='text-capitalize'>".$row["in_out"]."</td>
                            <td>".$dt."</td>
                            <td>".$row["reason"]."</td>
                        </tr>");
                    
                //read 10 row of data from database table
            }
        ?>
    </tbody>
</table>
