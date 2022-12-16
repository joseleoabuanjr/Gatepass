$(document).ready(function () {
    $("#step2").hide();
    $("#step3").hide();
    $("#errorAlert").hide();
    $("#successAlert").hide();
    $("#registerSpinner").hide();
    var progress = 33.33;
    $(".nextBtn-1").click(function (e) {
        e.preventDefault();
        var contact = document.forms["formReg"]["contactNumber"].value;
        if (isNaN(contact)) {
            alert("Please Input a valid contact number.");
            return false;
        }
        console.log($("#registrationForm"));
        var form = $("#registrationForm")[0];
        if (form[1].checkValidity()) {
            if (form[3].checkValidity()) {
                if (form[4].checkValidity()) {
                    if (form[5].checkValidity()) {
                        if (form[6].checkValidity()) {
                            if (form[7].checkValidity()) {
                                var ctr = $(this).data("ctr");
                                $("#step" + ctr).hide();
                                $("#step" + (parseInt(ctr) + 1)).fadeIn();
                                $(".progress-bar").width((progress += 33.33) + "%");
                            } else {
                                form[7].reportValidity()
                            }
                        } else {
                            form[6].reportValidity()
                        }
                    } else {
                        form[5].reportValidity()
                    }
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

    $(".nextBtn-2").click(function (e) {
        e.preventDefault();
        console.log($("#registrationForm"));
        var form = $("#registrationForm")[0];
        if (form[9].checkValidity()) {
            if (form[10].checkValidity()) {
                if (form[11].checkValidity()) {
                    if (form[12].checkValidity()) {
                        if (form[13].checkValidity()) {
                            var ctr = $(this).data("ctr");
                            $("#step" + ctr).hide();
                            $("#step" + (parseInt(ctr) + 1)).fadeIn();
                            $(".progress-bar").width((progress += 33.33) + "%");

                        } else {
                            form[13].reportValidity()
                        }
                    } else {
                        form[12].reportValidity()
                    }
                } else {
                    form[11].reportValidity()
                }
            } else {
                form[10].reportValidity()
            }
        } else {
            form[9].reportValidity()
        }

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
                        $("#registrationForm").trigger("reset");
                        $("#registerSpinner").hide();
                    } else {
                        $("#errorAlert").html(response.msg);
                        $("#errorAlert").fadeIn();
                        $("#registerSpinner").hide();
                    }
                }, error: function (response) {
                    console.error(response.responseText);
                    // $("#errorAlert").html(response.msg);
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
