$(document).ready(function () {
    $("#step2").hide();
    $("#step3").hide();
    $("#errorAlert").hide();
    $("#successAlert").hide();
    $("#registerSpinner").hide();
    var progress = 33.33;
    $(".nextBtn").click(function (e) {
        e.preventDefault();
        var ctr = $(this).data("ctr");
        $("#step" + ctr).hide();
        $("#step" + (parseInt(ctr) + 1)).fadeIn();
        $(".progress-bar").width((progress += 33.33) + "%");
    });

    $(".prevBtn").click(function (e) {
        e.preventDefault();
        var ctr = $(this).data("ctr");
        $("#step" + ctr).hide();
        $("#step" + (parseInt(ctr) - 1)).fadeIn();
        $(".progress-bar").width((progress -= 33.33) + "%");
    });

    $("#registrationForm").submit(function (e) {
        e.preventDefault();
        $("#errorAlert").fadeOut();
        var password = $("#password").val();
        var confirmPassword = $("#confirmPassword").val();
        if (password == confirmPassword) {
            $.ajax({
                type: "POST",
                url: "../../function/toRegister.php",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    if (response.status) {
                        $("#successAlert").fadeIn();
                        $("#registrationForm").reset();
                    } else {
                        $("#errorAlert").html("An error has occurred during the registration process");
                        $("#errorAlert").fadeIn();
                    }
                }, error: function (response) {
                    console.error(response.responseText);
                    $("#errorAlert").html(response.responseText);
                    $("#errorAlert").fadeIn();
                }, beforeSend: function() {
                    $("#registerSpinner").show();
                }
            });
        } else {
            $("#errorAlert").html("Password and Confirm Password doesn't match");
            $("#errorAlert").fadeIn();
        }
    });
});
