$(document).ready(function () {
    $("#fPSpinner").hide();
    $("#errorAlert").hide();
    $("#errorAlertFP").hide();
    $("#successAlertFP").hide();

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
            data: {accno: accno},
            dataType: "JSON",
            success: function (response) {
                if (response.status) {
                    $("#successAlertFP").fadeIn();
                    $("#errorAlertFP").hide();
                    $("#denyBtnModal").hide();
                }
                else {
                    $("#errorAlertFP").fadeIn();
                    // $("#errorAlertFP").html(response.msg);
                    $("#successAlertFP").hide();
                    
                }
                $("#fPSpinner").hide();
                
            }, error: function (err) {
                console.error(err);
            }, beforeSend: function() {
                $("#fPSpinner").show();
            }
        });
    });
});
