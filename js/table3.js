$(document).ready(function () {
    $(".fPSpinner").hide();
    $(".errorAlert").hide();
    $(".successAlert").hide();

    $(".statusBtn").click(function (e) {
        e.preventDefault();
        var accNo = $(this).data("accno");
        var status = $(this).data("status");
        var reqid = $(this).data("reqid");
        console.log($(".statusBtnModal"));
        console.log(status);
        console.log(reqid);
        $(".accNoModalApp").html(accNo);
        $(".status").html(status);
        $(".statusBtnModal").data("accno", accNo);
        $(".statusBtnModal").data("status", status);
        $(".statusBtnModal").data("reqid", reqid);
        $("#statusModal").modal("show");
        $(".statusBtnModal").show();
    });
    $(".statusBtnModal").click(function (e) {
        e.preventDefault();
        var accno = $(this).data("accno");
        var status = $(this).data("status");
        var reqid = $(this).data("reqid");
        $.ajax({
            type: "post",
            url: "../function/toapt_Status.php",
            data: {
                accno: accno,
                status: status,
                reqid: reqid
            },
            dataType: "JSON",
            success: function (response) {
                console.log(response);
                if (response.status) {
                    $(".successAlert").fadeIn();
                    $(".errorAlert").hide();
                    $("#dropBtnModal").hide();
                }
                else {
                    $(".errorAlert").fadeIn();
                    // $(".errorAlertFP").html(response.msg);
                    $(".successAlert").hide();

                }
                $(".fPSpinner").hide();
            }, error: function (err) {
                console.error(err);
            }, beforeSend: function () {
                $(".fPSpinner").show();
            }
        });
    });

    // Deny ---------
    $(".denyBtn").click(function (e) {
        e.preventDefault();
        var accNo = $(this).data("accno");
        $("#acccNoModal").html(accNo);
        $("#denyBtnModal").data("accno", accNo);
        $("#denyModal").modal("show");
        $("#denyBtnModal").show();
    });

    $("#denyBtnModal").click(function (e) {
        e.preventDefault();
        var accno = $(this).data("accno");
        $.ajax({
            type: "post",
            url: "../function/tofv_Denied.php",
            data: { accno: accno },
            dataType: "JSON",
            success: function (response) {
                if (response.status) {
                    $(".successAlertD").fadeIn();
                    $(".errorAlertD").hide();
                    $("#denyBtnModal").hide();
                }
                else {
                    $(".errorAlertD").fadeIn();
                    // $("#errorAlertFP").html(response.msg);
                    $(".successAlertD").hide();

                }
                $(".fPSpinnerD").hide();

            }, error: function (err) {
                console.error(err);
            }, beforeSend: function () {
                $(".fPSpinnerD").show();
            }
        });
    });
});
