$(document).ready(function () {
    $("#step2").hide();
    $("#step3").hide();
    $("#errorAlert").hide();
    $("#successAlert").hide();
    $("#registerSpinner").hide();
    $(".alertWarning").hide();

    var progress = 50;
    $(".nextBtn").click(function (e) {
        e.preventDefault();
        var ctr = $(this).data("ctr");
        $(".alertWarning").hide()
        var form = $("#registrationForm")[0];
        console.log($("#registrationForm"));
        if (form[1].checkValidity()) {
            if (form[3].checkValidity()) {
                if (form[4].checkValidity()) {
                    $.ajax({
                        type: "POST",
                        url: "../../function/validateInput.php",
                        data: { checkDuplicateEmail: $("#email").val() },
                        dataType: "json",
                        success: function (response) {
                            if (response.status) {
                                $(".alertWarning").html(response.msg);
                                $(".alertWarning").fadeIn();
                            } else {
                                if (form[5].checkValidity()) {
                                    if (form[6].checkValidity()) {
                                        if (form[7].checkValidity()) {
                                            $("#step" + ctr).hide();
                                            $("#step" + (parseInt(ctr) + 1)).fadeIn();
                                            $(".progress-bar").width((progress += 50) + "%");
                                        } else {
                                            form[7].reportValidity()
                                        }
                                    } else {
                                        form[6].reportValidity()
                                    }
                                } else {
                                    form[5].reportValidity()
                                }
                            }
                        }, error: function (response) {
                            console.error(response);
                        }
                    });

                } else {
                    form[4].reportValidity()
                }
            } else {
                form[3].reportValidity()
            }
        } else {
            form[1].reportValidity()
        }

    });

    $(".prevBtn").click(function (e) {
        e.preventDefault();
        var ctr = $(this).data("ctr");
        $("#step" + ctr).hide();
        $("#step" + (parseInt(ctr) - 1)).fadeIn();
        $(".progress-bar").width((progress -= 50) + "%");
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
                        $("#registrationForm").trigger("reset");
                        $("#registerSpinner").hide();
                    } else {
                        $("#errorAlert").html("An error has occurred during the registration process");
                        $("#errorAlert").fadeIn();
                    }
                }, error: function (response) {
                    console.error(response.responseText);
                    // $("#errorAlert").html(response.responseText);
                    // $("#errorAlert").fadeIn();
                }, beforeSend: function () {
                    $("#registerSpinner").show();
                }
            });
        } else {
            $("#errorAlert").html("Password and Confirm Password doesn't match");
            $("#errorAlert").fadeIn();
        }
    });
});
