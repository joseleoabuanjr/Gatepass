<?php
session_start();
if (!isset($_SESSION["useradmin"]) && !isset($_SESSION["passadmin"])) {
    header("Location: ../admin/login.php");
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
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


</head>

<body>
    <?php require_once '../includes/navbar-admin.php'; ?>
    <div class="container" style="padding-bottom:20px;">
        <header class="pb-3 mb-4 border-bottom mt-5">
            <div class="d-flex align-items-center text-dark text-decoration-none">
                <span class="fs-3">Time In and Out</span>
            </div>
        </header>
        <div class="card">
            <div class="card-header bg-dark">

                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex justify-content-start align-items-center">
                        <h6 class="text-white m-0">Filter by Date & Time</h6>
                        <div id="reportrange" class="w-auto mx-2 rounded-1" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                            <i class="fa fa-calendar"></i>&nbsp;
                            <span></span> <i class="fa fa-caret-down"></i>
                        </div>
                    </div>
                    <div class="col col-sm-auto p-0"><button type="button" class="btn btn-primary btn d-print-none" onclick="window.print()">Print Records</button></div>
                </div>
            </div>
            <div class="card-body">
                <div class="container table-responsive">
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

                        <tbody id="timeInOutTableContent">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Javascript -->

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('#reportrange span').html(start.format('ll') + ' - ' + end.format('ll'));
                displayTimeInOutTable(start.format("L"), end.format("L"));
            }

            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);

            cb(start, end);

            function displayTimeInOutTable(start, end) {
                $.ajax({
                    type: "POST",
                    url: "../function/getTimeInOut.php",
                    dataType: "JSON",
                    success: function(response) {
                        var filtered = response.filter(function(x) {
                            return dateCheck(start, end, moment(x.time).format("L"));
                        });
                        var content = ``;
                        $.each(filtered, function(indexInArray, val) {
                            var reason = `<ul>`;
                            $.each(val.reason, function(indexInArray, res) {
                                reason += `<li>${res}<li>`;
                            });
                            reason += `</ul>`;
                            content += `
                            <tr>
                                <td class='text-center'>${val.account_no}</td>
                                <td class='text-capitalize text-center'>${val.name}</td>
                                <td class='text-capitalize text-center'>${val.type}</td>
                                <td class='text-capitalize text-center'>${val.in_out}</td>
                                <td class='text-center'>${moment(val.time).format("llll")}</td>
                                <td class='text-center'>${reason}</td>
                            </tr>
							`;
                        });
                        if ($.fn.DataTable.isDataTable("#timeinoutTable")) {
                            $('#timeinoutTable').DataTable().clear().destroy();
                        }
                        $("#timeInOutTableContent").html(content);
                        $("#timeinoutTable").DataTable();
                    },
                    error: function(response) {
                        console.error(response);
                    }
                });
            }

            function dateCheck(from, to, check) {
                var fDate, lDate, cDate;
                fDate = Date.parse(from);
                lDate = Date.parse(to);
                cDate = Date.parse(check);
                if ((cDate <= lDate && cDate >= fDate)) {
                    return true;
                }
                return false;
            }
        });
    </script>
</body>

</html>
