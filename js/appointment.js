$(document).ready(function () {
    $("#appointmentTable").DataTable();
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
        console.log(reqid);
        $.ajax({
            type: "post",
            url: "../function/toapt_Status.php",
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
