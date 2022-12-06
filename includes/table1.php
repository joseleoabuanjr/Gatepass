<div class="table-responsive">
    <table class="table shadow-sm table-striped table-hover display compact" id="userAccountsTable">
        <h2 style="padding-top: 60px; padding-bottom:20px;">User Accounts</h2>
        <!-- <div class="searchbar">
            <input type="text" name="s_name" id="s_n" placeholder="Name">
        </div> -->
        <thead>
            <tr style="background-color: #4F4F4B; color:white;">
                <th>Account Number</th>
                <th>Name</th>
                <th>Account Type</th>
                <th>Status</th>
                <th>Course</th>
                <th>Year</th>
                <th>Section</th>
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
                $studno = $row['stud_no'];
                $empno = $row['emp_no'];
                $course = $row['course'];
                $section = $row['section'];
                $year = $row['year'];
                echo ("
                        <tr>
                            <td>".$row["acc_no"]."</td>
                            <td class='text-capitalize'>".$row["first"]." ".$row["middle"].". ".$row["last"]."</td>
                            <td class='text-capitalize'>".$row["type"]."</td>
                            <td class='text-capitalize'>".$row["verification"]."</td>
                    ");
                if ($row["type"] == "student"){
                    echo "
                            <td class='text-capitalize'>".$row["course"]."</td>
                            <td class='text-capitalize'>".$row["year"]."</td>
                            <td class='text-capitalize'>".$row["section"]."</td>";

                }else{
                    echo "
                            <td>N/A</td>
                            <td>N/A</td>
                            <td>N/A</td>";
                }
                    // <a class='btn btn-danger btn-sm' href='function/toUserdel.php?id=".$row['acc_no']."'>Archive</a>
                echo "<td>
                        <a class='btn btn-secondary btn-sm' href='../function/toblock.php?id=".$row['acc_no']."'>Block</a>
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
