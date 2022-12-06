$(document).ready(function () {
    $("#fPSpinner").hide();
    $("#errorAlert").hide();
    $("#successAlert").hide();
    // Approve----------------
    $(".dropBtn").click(function (e) {
        e.preventDefault();
        var accNo = $(this).data("accno");
        $("#accNoModalApp").html(accNo);
        $("#dropBtnModal").data("accno", accNo);
        $("#statusModal").modal("show");
        $("#dropBtnModal").show();
    });
    $("#dropBtnModal").click(function (e) {
        e.preventDefault();
        var accno = $(this).data("accno");
        $.ajax({
            type: "post",
            url: "../function/toblock.php",
            data: { accno: accno },
            dataType: "JSON",
            success: function (response) {
                if (response.status) {
                    $("#successAlert").fadeIn();
                    $("#errorAlert").hide();
                    $("#dropBtnModal").hide();
                }
                else {
                    $("#errorAlert").fadeIn();
                    // $("#errorAlertFP").html(response.msg);
                    $("#successAlert").hide();

                }
                $("#fPSpinnerA").hide();
            }, error: function (err) {
                console.error(err);
            }, beforeSend: function () {
                $("#fPSpinner").show();
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
