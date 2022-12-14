$(document).ready(function () {
    $("#fPSpinner").hide();
    $("#errorAlert").hide();
    $("#errorAlertFP").hide();
    $("#successAlertFP").hide();

    $("#loginForm").submit(function (event) {
        event.preventDefault();
        var data = $(this).serializeArray();
        $.ajax({
            type: "POST",
            url: "../function/toLogin-sadmin.php",
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
