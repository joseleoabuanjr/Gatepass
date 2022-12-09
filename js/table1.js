$(document).ready(function () {
    $("#fPSpinner").hide();
    $("#errorAlert").hide();

    $(".statusBtn").click(function (e) {
        e.preventDefault();
        var accno = $(this).data("accno");
        var status = $(this).data("status");
        var qrstatus = $(this).data("qr");
        $("#accNoModal").html(accno);
        $(".status").html(status);
        $("#statusBtnModal").data("accno", accno);
        $("#statusBtnModal").data("status", status);
        $("#statusBtnModal").data("qrstatus", qrstatus);
        $("#statusModal").modal("show");
    });
    $("#statusBtnModal").click(function (e) {
        e.preventDefault();
        var accno = $(this).data("accno");
        var status = $(this).data("status");
        var qrstatus = $(this).data("qrstatus");
        console.log(accno);
        console.log(qrstatus);
        $.ajax({
            type: "post",
            url: "../function/toUpdateStatus.php",
            data: {
                SET_USER_STATUS: true,
                accno: accno,
                status: status,
                qrstatus : qrstatus
            },
            dataType: "JSON",
            success: function (response) {
                console.log(response);
                if (response.status) {
                    $("#successAlert").fadeIn();
                    $("#errorAlert").hide();
                    $("#dropBtnModal").hide();
                    $("#statusModal").modal("hide");
                    location.reload();
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

});
