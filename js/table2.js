$(document).ready(function () {
    $("#fPSpinnerA").hide();
    $("#errorAlertA").hide();
    $("#successAlertA").hide();
    $("#fPSpinnerD").hide();
    $("#errorAlertD").hide();
    $("#successAlertD").hide();
    // Approve----------------
    $(".approveBtn").click(function (e) {
        e.preventDefault();
        var accNo = $(this).data("accno");
        $("#accNoModalApp").html(accNo);
        $("#approveBtnModal").data("accno", accNo);
        $("#approveModal").modal("show");
        $("#approveBtnModal").show();
    });
    $("#approveBtnModal").click(function (e) {
        e.preventDefault();
        var accno = $(this).data("accno");
        $.ajax({
            type: "post",
            url: "../function/tofv_Approved.php",
            data: { accno: accno },
            dataType: "JSON",
            success: function (response) {
                if (response.status) {
                    $("#successAlertA").fadeIn();
                    $("#errorAlertA").hide();
                    $("#approveBtnModal").hide();
                }
                else {
                    $("#errorAlertA").fadeIn();
                    // $("#errorAlertFP").html(response.msg);
                    $("#successAlertA").hide();

                }
                $("#fPSpinnerA").hide();
            }, error: function (err) {
                console.error(err);
            }, beforeSend: function () {
                $("#fPSpinnerA").show();
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
                    $("#successAlertD").fadeIn();
                    $("#errorAlertD").hide();
                    $("#denyBtnModal").hide();
                }
                else {
                    $("#errorAlertD").fadeIn();
                    // $("#errorAlertFP").html(response.msg);
                    $("#successAlertD").hide();

                }
                $("#fPSpinnerD").hide();

            }, error: function (err) {
                console.error(err);
            }, beforeSend: function () {
                $("#fPSpinnerD").show();
            }
        });
    });
});
