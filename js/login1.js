$(document).ready(function () {
    $("#fPSpinner").hide();
    $("#errorAlert").hide();
    $("#errorAlertFP").hide();
    $("#successAlertFP").hide();

    $('#forgotPasswordModal').on('show.bs.modal', function (e) {
        // let userType = $("[name='userType']:checked").val();
        $("#errorAlertFP").hide();
        $("#successAlertFP").hide();
        // $("#modalUserType").html(userType);
        $("#forgotPasswordForm").trigger("reset");
    })

    $("#forgotPasswordForm").submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: "function/toforgotpass.php",
            type: "POST",
            data: {
                email: $("#fpEmail").val(),
                'forgot-password': true
            },
            dataType: "JSON",
            beforeSend: function () {
                $("#fPSpinner").show();
                $("#forgotbtn").attr("disabled", "disabled");
            },
            success: function (response) {
                console.log(response);
                if (response.status) {
                    $("#successAlertFP").fadeIn();
                    // $("#successAlertFP").html(response.msg);
                    $("#errorAlertFP").hide();
                    $("#forgotPasswordForm").trigger("reset");
                } else {
                    $("#errorAlertFP").fadeIn();
                    $("#errorAlertFP").html(response.msg);
                    $("#successAlertFP").hide();
                }
                $("#fPSpinner").hide();
                $("#forgotbtn").removeAttr("disabled");
            }, error: function (response) {
                console.error(response);
            }
        });
    });

    $("#loginForm").submit(function (event) {
        event.preventDefault();
        var data = $(this).serializeArray();
        $.ajax({
            type: "POST",
            url: "function/toLogin.php",
            data: data,
            dataType: "JSON",
            success: function (response) {
                $("#errorAlert").fadeOut();
                if (response.status) {
                    window.location.href = response.location;
                } else {
                    $("#errorAlert").html(response.msg);
                    $("#errorAlert").fadeIn();
                }
            },
            error: function (response) {
                $("#errorAlert").html(response.responseText);
                // $("#errorAlert").html("We encounter a problem when logging your account. Contact developer for more info");
                $("#errorAlert").show();
                console.log(response);
            }
        });
    });
});
