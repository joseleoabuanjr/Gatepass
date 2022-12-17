$(document).ready(function () {
    $("#errorAlert").hide();
    $("#successAlert").hide();
    $("#registerSpinner").hide();
    $("#errorAlert2").hide();
    $("#successAlert2").hide();
    $("#registerSpinner2").hide();
    $(".unshowBtn").hide();

    $(".addBtn").click(function (e) { 
        e.preventDefault();
        $("#formModal").modal("show");
    });
    $(".showBtn").click(function (e) { 
        e.preventDefault();
        var id = $(this).data("id");
        $(".confirmBtn").data("id", id);
        $("#editModal").modal("show");
    });
    $(".unshowBtn").click(function (e) { 
        e.preventDefault();
        var id = $(this).data("id");
        var dot = $(this).data("dot");
        $("#passcont"+id).html(dot);
        $(".showBtn").show();
        $("#unshowBtn").hide();
    });
    $(".confirmBtn").click(function (e) { 
        e.preventDefault();
        var id = $(this).data("id");
        console.log(id);
        $.ajax({
            type:"POST",
            url: "../function/toeditAdmin.php",
            data: {getadmindetails: id},
            dataType: "json",
            success: function (response) {
                console.log(response);
                $("#passcont"+id).html(response.pass);
                $(".showBtn").hide();
                $(".unshowBtn").show();
                // $("#username2").val(response.user);
            }, error: function (response) {
                console.error(response);
                // $("#errorAlert").html(response.responseText);
                // $("#errorAlert").fadeIn();
            }
        });
    });
    
    $("#AdminForm").submit(function (e) {
        e.preventDefault();
        $("#errorAlert").fadeOut();
        var password = $("#password").val();
        var confirmPassword = $("#confirmPassword").val();
        var data = $(this).serializeArray();
        if (password == confirmPassword) {
            $.ajax({
                type: "POST",
                url: "../function/toaddAdmin.php",
                data: data,
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    if (response.status) {
                        // $("#successAlert").fadeIn();
                        // $("#AdminForm").trigger("reset");
                        // $("#registerSpinner").hide();
                        location.reload();
                    } else {
                        $("#errorAlert").html("An error has occurred during the registration process");
                        $("#errorAlert").fadeIn();
                    }
                }, error: function (response) {
                    console.error(response.responseText);
                    // $("#errorAlert").html(response.responseText);
                    // $("#errorAlert").fadeIn();
                }, beforeSend: function() {
                    $("#registerSpinner").show();
                }
            });
        } else {
            $("#errorAlert").html("Password and Confirm Password doesn't match");
            $("#errorAlert").fadeIn();
        }
    });

    $("#confirmForm").submit(function (e) {
        e.preventDefault();
        $("#errorAlert").fadeOut();
        var id = $(this).data("id");
        var data = $(this).serializeArray();
        data.push({ name: 'getadmindetails', value: id });
        $.ajax({
            type: "POST",
            url: "../function/toeditAdmin.php",
            data: data,
            dataType: 'json',
            success: function (response) {
                console.log(response);
                if (response.status) {
                    $("#passcont"+id).html(response.pass);
                    $(".showBtn").hide();
                    $(".unshowBtn").show();
                    // $("#successAlert").fadeIn();
                    // $("#AdminForm").trigger("reset");
                    // $("#registerSpinner").hide();
                    // location.reload();
                } else {
                    $("#errorAlert").html("An error has occurred during the registration process");
                    $("#errorAlert").fadeIn();
                }
            }, error: function (response) {
                console.error(response.responseText);
                // $("#errorAlert").html(response.responseText);
                // $("#errorAlert").fadeIn();
            }, beforeSend: function() {
                // $("#registerSpinner").show();
            }
        });
    });
});