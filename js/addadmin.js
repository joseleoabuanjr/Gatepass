$(document).ready(function () {
    $("#errorAlert").hide();
    $("#successAlert").hide();
    $("#registerSpinner").hide();

    $(".addBtn").click(function (e) { 
        e.preventDefault();
        $("#formModal").modal("show");
    });
    $("#AdminForm").submit(function (e) {
        e.preventDefault();
        $("#errorAlert").fadeOut();
        var password = $("#password").val();
        var confirmPassword = $("#confirmPassword").val();
        if (password == confirmPassword) {
            $.ajax({
                type: "POST",
                url: "../function/toaddAdmin.php",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    if (response.status) {
                        $("#successAlert").fadeIn();
                        setTimeout(function() {
                            $("#successAlert").hide();
                            $( "#userAccountsTable" ).load(location.href + " #userAccountsTable" );
                        }, 3000);
                        $("#AdminForm").trigger("reset");
                        $("#registerSpinner").hide();
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
});