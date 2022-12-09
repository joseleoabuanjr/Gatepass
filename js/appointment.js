$(document).ready(function () {
    $("#appointmentTable").DataTable();
    $("#fPSpinner").hide();
    $("#errorAlert").hide();

    $(".statusBtn").click(function (e) {
        e.preventDefault();
        var accno = $(this).data("accno");
        var status = $(this).data("status");
        var reqid = $(this).data("reqid");
        $("#accNoModal").html(accno);
        $(".status").html(status);
        $("#statusBtnModal").data("accno", accno);
        $("#statusBtnModal").data("status", status);
        $("#statusBtnModal").data("reqid", reqid);
        $("#statusModal").modal("show");
    });
    $("#statusBtnModal").click(function (e) {
        e.preventDefault();
        var accno = $(this).data("accno");
        var status = $(this).data("status");
        var reqid = $(this).data("reqid");
        var location = "../function/toapt_Status.php";
        if (status == "cancel") {
            location = "function/toapt-cancel.php";
        }

        console.log(location);
        console.log(status);
        $.ajax({
            type: "post",
            url: location,
            data: {
                // SET_USER_STATUS: true,
                accno: accno,
                status: status,
                reqid: reqid
            },
            dataType: "JSON",
            success: function (response) {
                console.log(response);
                if (response.status) {
                    $("#successAlert").fadeIn();
                    $("#errorAlert").hide();
                    $("#dropBtnModal").hide();
                    $("#statusModal").modal("hide");
                    window.location.reload();
                }
                else {
                    $("#errorAlert").fadeIn();
                    // $("#errorAlertFP").html(response.msg);
                }
                $("#fPSpinner").hide();
            }, error: function (err) {
                console.error(err);
            }, beforeSend: function () {
                $("#fPSpinner").show();
            }
        });
    });

    var inputs = document.querySelectorAll('[name="reason[]"]')
    var radioForCheckboxes = document.getElementById('radio-for-checkboxes')
    function checkCheckboxes () {
        var isAtLeastOneCheckboxSelected = false;
        for(var i = inputs.length-1; i >= 0; --i) {
            if (inputs[i].checked) isAtLeastOneCheckboxSelected = true;
        }
        radioForCheckboxes.checked = isAtLeastOneCheckboxSelected
    }
    for(var i = inputs.length-1; i >= 0; --i) {
        inputs[i].addEventListener('change', checkCheckboxes)
    }

    $("#txt-1").hide();
    $("#check8").click(function() {
        if($(this).is(":checked")) {
            $("#txt-1").show();
            $("#txt-1").prop('required',true);
        } else {
            $("#txt-1").hide();
        }
    });
});
