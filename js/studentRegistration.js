$(document).ready(function () {
    $("#step2").hide();
    $("#step3").hide();
    $("#errorAlert").hide();
    $("#successAlert").hide();
    $("#registerSpinner").hide();
    $(".alertWarning").hide();
    var progress = 33.33;
    $(".nextBtn-1").click(function (e) {
        e.preventDefault();
        var ctr = $(this).data("ctr");
        $(".alertWarning").hide()
        console.log($("#registrationForm"));
        var form = $("#registrationForm")[0];
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
                                    var cont = $("#contactNumber").val();
                                    if (!isNaN(cont)) {
                                        if (form[6].checkValidity()) {
                                            if (form[7].checkValidity()) {
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
                                        $(".alertWarning").html("Please Input a valid contact number.");
                                        $(".alertWarning").fadeIn();
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

    $(".nextBtn-2").click(function (e) {
        e.preventDefault();
        var ctr = $(this).data("ctr");
        $(".alertWarning").hide()
        var form = $("#registrationForm")[0];
        if (form[9].checkValidity()) {
            $.ajax({
                type: "POST",
                url: "../../function/validateInput.php",
                data: { checkDuplicateIDNo: $("#studentNo").val() },
                dataType: "json",
                success: function (response) {
                    if (response.status) {
                        $(".alertWarning").html(response.msg);
                        $(".alertWarning").fadeIn();
                    } else {
                        if (form[10].checkValidity()) {
                            if (form[11].checkValidity()) {
                                if (form[12].checkValidity()) {
                                    if (form[13].checkValidity()) {
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
                    }
                }, error: function (response) {
                    console.error(response);
                }
            });
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

    $("#password").keyup(function () { 
        var str = 0;
        lower = false;
        upper = false;
        number = false;
        var password = $("#password").val();
        if (password.match(/[a-z]+/)){
            str++;
            lower = true;
        }
        if (password.match(/[A-Z]+/)){
            str++;
            upper = true;
        }
        if (password.match(/[0-9]+/)){
            str++;
            number = true;
        }
        if (password.length == 0){
            str = 0;
        }
        
        switch(str){
            case 0:
                $("#str-label").html("");
                break;
            case 1:
                $("#str-label").html("Very Weak");
                $("#str-label").css("color", '#ff3e36');
                break;
            case 2:
                $("#str-label").html("Weak");
                $("#str-label").css("color", '#ffda36');
                break;
            case 3:
                $("#str-label").html("Strong");
                $("#str-label").css("color", '#0be881');
                break;
        }
        $("#registrationForm").data("check1", lower);
        $("#registrationForm").data("check2", upper);
        $("#registrationForm").data("check3", number);
    });
    $("#registrationForm").submit(function (e) {
        e.preventDefault();
        var check1 = $(this).data("check1");
        var check2 = $(this).data("check2");
        var check3 = $(this).data("check3");
        $("#errorAlert").fadeOut();
        var password = $("#password").val();
        var confirmPassword = $("#confirmPassword").val();
        if(check1 == true && check2 == false && check3 == false){
            $("#errorAlert").html("Password must have uppercase letters and numbers");
            $("#errorAlert").fadeIn();
        }
        else if (check1 == false && check2 == true && check3 == false){
            $("#errorAlert").html("Password must have lowercase letters and numbers");
            $("#errorAlert").fadeIn();
        }
        else if(check1 == false && check2 == false && check3 == true){
            $("#errorAlert").html("Password must have lowercase letters and uppercase letters");
            $("#errorAlert").fadeIn();
        }
        else if(check1 == true && check2 == true && check3 == false){
            $("#errorAlert").html("Password must have numbers");
            $("#errorAlert").fadeIn();
        }
        else if(check1 == true && check2 == false && check3 == true){
            $("#errorAlert").html("Password must have uppercase letters");
            $("#errorAlert").fadeIn();
        }
        else if(check1 == false && check2 == true && check3 == true){
            $("#errorAlert").html("Password must have lowercase letters");
            $("#errorAlert").fadeIn();
        }
        else{
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
        }
    });
});
