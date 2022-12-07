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
        <table class="table shadow-sm table-striped table-hover display compact" id="timeinoutTable">
            <h2 style="padding-top: 60px; padding-bottom:20px;">Time In and Out</h2>
            <div class="d-flex justify-content-end" style="margin-bottom:10px;"><button type="button" class="btn btn-primary btn-sm d-print-none" onclick="window.print()">Print Records</button></div>
            
            <thead>
                <tr style="background-color: #4F4F4B; color:white;">
                    <th class="text-center">Account Number</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Account Type</th>
                    <th class="text-center">In/Out</th>
                    <th class="text-center">Date & Time</th>
                    <th class="text-center">Reason</th>
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
    </div>
</body>
</html>