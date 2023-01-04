$(document).ready(function () {
    // $("#appointmentTable").DataTable();
    $("#fPSpinner").hide();
    $("#errorAlert").hide();

    $(".statusBtn").click(function (e) {
        e.preventDefault();
        var accno = $(this).data("accno");
        var status = $(this).data("status");
        var reqid = $(this).data("reqid");
        $("#accNoModal").html(accno);
        $(".status").html(status);
        $("#statusBtnModal").data("accno", accno);
        $("#statusBtnModal").data("status", status);
        $("#statusBtnModal").data("reqid", reqid);
        $("#statusModal").modal("show");
    });
    $("#statusBtnModal").click(function (e) {
        e.preventDefault();
        var accno = $(this).data("accno");
        var status = $(this).data("status");
        var reqid = $(this).data("reqid");
        var location = "../function/toapt_Status.php";
        if (status == "cancel") {
            location = "function/toapt-cancel.php";
        }

        console.log(location);
        console.log(status);
        $.ajax({
            type: "post",
            url: location,
            data: {
                // SET_USER_STATUS: true,
                accno: accno,
                status: status,
                reqid: reqid
            },
            dataType: "JSON",
            success: function (response) {
                console.log(response);
                if (response.status) {
                    $("#successAlert").fadeIn();
                    $("#errorAlert").hide();
                    $("#dropBtnModal").hide();
                    $("#statusModal").modal("hide");
                    window.location.reload();
                }
                else {
                    $("#errorAlert").fadeIn();
                    // $("#errorAlertFP").html(response.msg);
                }
                $("#fPSpinner").hide();
            }, error: function (err) {
                console.error(err);
            }, beforeSend: function () {
                $("#fPSpinner").show();
            }
        });
    });

    var inputs = document.querySelectorAll('[name="reason[]"]')
    var radioForCheckboxes = document.getElementById('radio-for-checkboxes')
    function checkCheckboxes() {
        var isAtLeastOneCheckboxSelected = false;
        for (var i = inputs.length - 1; i >= 0; --i) {
            if (inputs[i].checked) isAtLeastOneCheckboxSelected = true;
        }
        radioForCheckboxes.checked = isAtLeastOneCheckboxSelected
    }
    for (var i = inputs.length - 1; i >= 0; --i) {
        inputs[i].addEventListener('change', checkCheckboxes)
    }

    $("#txt-1").hide();
    $("#check8").click(function () {
        if ($(this).is(":checked")) {
            $("#txt-1").show();
            $("#txt-1").prop('required', true);
        } else {
            $("#txt-1").hide();
        }
    });

    var start = moment().subtract(29, 'days');
    var end = moment();

    $("#userTypeFilter").change(function (e) {
        e.preventDefault();
        var userType = $("#userTypeFilter").val();
        var range = $('#reportrange span').html().split(" - ");
        displayTimeInOutTable(moment(range[0]).format("L"), moment(range[1]).format("L"), userType);
    });

    function cb(start, end) {
        $('#reportrange span').html(start.format('ll') + ' - ' + end.format('ll'));
        var userType = $("#userTypeFilter").val();
        displayTimeInOutTable(start.format("L"), end.format("L"), userType);
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

    function displayTimeInOutTable(start, end, userType) {
        $.ajax({
            type: "POST",
            url: "../function/getAppointment.php",
            data: {
                superadmin: true
            },
            dataType: "JSON",
            success: function (response) {
                var filtered = response.filter(function (x) {
                    var u = userType == "all" ? true : userType == x.type;
                    return dateCheck(start, end, moment(x.date).format("L")) && u;
                });
                var content = ``;
                $.each(filtered, function (indexInArray, val) {
                    content += `
                            <tr>
                                <td class='text-center'>${val.accNo}</td>
                                <td class='text-capitalize text-center'>${val.name}</td>
                                <td class='text-capitalize text-center'>${val.type}</td>
                                <td class='text-capitalize text-center'>${val.reason}</td>
                                <td class='text-center'>${moment(val.date).format("ll")}</td>
                                <td>
                                    <div class='btn-group' role='group'>
                                        <button type='button' class='btn btn-primary statusBtn btn-sm' data-status='approve' data-accno='" . $row['acc_no'] . "' data-reqid='" . $reqid . "'>Approve</button>
                                        <button type='button' class='btn btn-danger statusBtn btn-sm' data-status='reject' data-accno='" . $row['acc_no'] . "' data-reqid='" . $reqid . "'>Reject</button>
                                    </div>
                                </td>
                            </tr>
							`;
                });
                if ($.fn.DataTable.isDataTable("#appointmentRequestTable")) {
                    $('#appointmentRequestTable').DataTable().clear().destroy();
                }
                $("#appointmentRequestTableContent").html(content);
                $("#appointmentRequestTable").DataTable({
                    "ordering": false
                });
            },
            error: function (response) {
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
