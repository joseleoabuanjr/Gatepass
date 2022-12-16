<?php
session_start();
if (!isset($_SESSION["useradmin"]) && !isset($_SESSION["passadmin"])) {
	header("Location: ../superadmin/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BulSU Gatepass - SuperAdmin</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <!-- Date Filter -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>
<body>
    <?php require_once '../includes/navbar-sadmin.php'; ?>
        <div class="container" style="padding-bottom:20px;">
            <header class="pb-3 mb-4 border-bottom mt-5">
                <div class="d-flex align-items-center text-dark text-decoration-none">
                    <span class="fs-3">Time In and Out</span>
                </div>
            </header>
            <div class="card">
                <div class="card-header" style="background-color: #4F4F4B; color:white;">
                    <div class="row align-items-center">
                        <div class="col col-sm-8 ps-5 py-2"></div>
                        <div class="col col-sm-3">
                            <input type="text" id="daterange" class="form-control form-control-sm" readonly />
                        </div>
                        <div class="col col-sm-auto p-0"><button type="button" class="btn btn-primary btn-sm d-print-none" onclick="window.print()">Print Records</button></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table">
                        <table class="table pt-2 shadow table-striped table-hover display compact" id="timeinoutTable">
                            <thead>
                                <tr class="text-bg-warning" style="background-color: #4F4F4B; color:white;">
                                    <th class="text-center">Account Number</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Account Type</th>
                                    <th class="text-center">In/Out</th>
                                    <th class="text-center">Date & Time</th>
                                    <th class="text-center">Reason</th>
                                </tr>
                            </thead>
                            <tbody class="text-center"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="../js/daterange.js"></script>
    <script>

$(document).ready(function(){

    fetch_data();

    var sale_chart;

    function fetch_data(start_date = '', end_date = '')
    {
        var dataTable = $('#timeinoutTable').DataTable({
            "processing" : true,
            "serverSide" : true,
            "order" : [],
            "ajax" : {
                url:"../includes/action.php",
                type:"POST",
                data:{action:'fetch', start_date:start_date, end_date:end_date}
            }
        });
    }

    $('#daterange_textbox').daterangepicker({
        ranges:{
            'Today' : [moment(), moment()],
            'Yesterday' : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            'Last 30 Days' : [moment().subtract(29, 'days'), moment()],
            'This Month' : [moment().startOf('month'), moment().endOf('month')],
            'Last Month' : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        format : 'YYYY-MM-DD'
    }, function(start, end){

        $('#timeinoutTable').DataTable().destroy();

        fetch_data(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));

    });

});

</script>
</body>

</html>