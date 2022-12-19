$(document).ready(function () {
    $("#errorAlert").hide();
    $("#successAlert").hide();
    $("#registerSpinner").hide();

    $("#errorAlert2").hide();
    $("#successAlert2").hide();
    $("#registerSpinner2").hide();
    $(".unshowBtn").hide();

    $("#errorAlert3").hide();
    $("#fPSpinner3").hide();

    $(".addBtn").click(function (e) { 
        e.preventDefault();
        $("#formModal").modal("show");
    });
    $(".showBtn").click(function (e) { 
        e.preventDefault();
        var id = $(this).data("id");
        $("#confirmForm").data("id", id);
        $("#confirmModal").modal("show");
    });
    $(".unshowBtn").click(function (e) { 
        e.preventDefault();
        var id = $(this).data("id");
        var dot = $(this).data("dot");
        $("#passcont"+id).html(dot);
        $("#unshowBtn"+id).hide();
        $("#showBtn"+id).show();
    });

    $(".archiveBtn").click(function (e) { 
        e.preventDefault();
        var id = $(this).data("id");
        var user = $(this).data("user");
        var status = $(this).data("status");

        $("#status").html(status);
        $("#archiveBtnModal").data("id", id);
        $("#archiveBtnModal").data("user", user);
        $("#archiveBtnModal").data("status", status);
        

        $("#archiveModal").modal("show");
    });
    // $(".confirmBtn").click(function (e) { 
    //     e.preventDefault();
    //     var id = $(this).data("id");
    //     console.log(id);
    //     $.ajax({
    //         type:"POST",
    //         url: "../function/toeditAdmin.php",
    //         data: {getadmindetails: id},
    //         dataType: "json",
    //         success: function (response) {
    //             console.log(response);
    //             $("#passcont"+id).html(response.pass);
    //             $(".showBtn").hide();
    //             $(".unshowBtn").show();
    //             // $("#username2").val(response.user);
    //         }, error: function (response) {
    //             console.error(response);
    //             // $("#errorAlert").html(response.responseText);
    //             // $("#errorAlert").fadeIn();
    //         }
    //     });
    // });
    
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
        console.log(data);
        $.ajax({
            type: "POST",
            url: "../function/toeditAdmin.php",
            data: data,
            dataType: 'json',
            success: function (response) {
                console.log(response);
                if (response.status) {
                    $("#passcont"+id).html(response.pass);
                    $("#confirmForm").trigger("reset");
                    $("#showBtn"+id).hide();
                    $("#unshowBtn"+id).show();
                    $("#confirmModal").modal("hide");
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

    $("#archiveBtnModal").click(function (e) { 
        e.preventDefault();
        var id = $(this).data("id");
        var user = $(this).data("user");
        var status = $(this).data("status");
        var location = "../function/toarchiveadmin.php";

        $.ajax({
            type: "POST",
            url: location,
            data: { 
                archiveUser: true,
                id: id,
                user: user,
                status: status,
            },
            dataType: "JSON",
            success: function (response) {
                console.log(response);
                if (response.status) {
                    $("#archiveBtnModal").modal("hide");
                    $("#fPSpinner3").hide();
                    // $("#successAlert").fadeIn();
                    // $("#AdminForm").trigger("reset");
                    window.location.reload();
                } else {
                    $("#errorAlert").html("An error has occurred during the process");
                    $("#errorAlert").fadeIn();
                }
            },error: function (response) {
                console.error(response);
            },beforeSend: function() {
                $("#fPSpinner3").show();
            }
        });
    });
});