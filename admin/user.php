<?php
session_start();
if (!isset($_SESSION["useradmin"]) && !isset($_SESSION["passadmin"])) {
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BulSU Gatepass - Admin</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#userAccountsTable, #accountVerificationTable, #appointmentRequestTable, #timeinoutTable").DataTable();
        });
    </script>
</head>
<body>
    <?php require_once '../includes/navbar-admin.php'; ?>
    <div class="container table-responsive">
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
                    if($row['verification'] == "blocked"){
                        echo "<td>
                            <a class='btn btn-secondary btn-sm' href='../function/touserunblock.php?id=".$row['acc_no']."'>unblock</a>
                        </td>
                    </tr>";
                    }else{
                        echo "<td>
                            <a class='btn btn-danger btn-sm' href='../function/touserblock.php?id=".$row['acc_no']."'>Block</a>
                        </td>
                    </tr>";
                    }
                    
                        
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
</body>
</html>