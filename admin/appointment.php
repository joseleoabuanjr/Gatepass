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
                                        <a class='btn btn-primary btn-sm' href='../function/toapt_Approved.php?id=".$row['acc_no']."&reqid=".$reqid."'>Approve</a>
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
    </div>
</body>
</html>