$(document).ready(function () {
    $("#fPSpinner").hide();
    $("#errorAlert").hide();

    $(".previewImageBtn").click(function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        $.ajax({
            type: "POST",
            url: "../viewpfp.php",
            data: { getImage: true, id: id },
            success: function (response) {
                $("#previewImageContent").attr("src", "data:image;base64," + response);
                $("#previewImage").modal("show");
            },error: function (response) {
                console.error(response);
            }
        });
    });

    $(".previewVIDBtn").click(function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        $.ajax({
            type: "POST",
            url: "../viewpfp.php",
            data: { getVID: true, id: id },
            success: function (response) {
                $("#previewImageContent").attr("src", "../files/" + response);
                $("#previewImage").modal("show");
            },error: function (response) {
                console.error(response);
            }
        });
    });

    $(".previewVAXBtn").click(function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        $.ajax({
            type: "POST",
            url: "../viewpfp.php",
            data: { getVAX: true, id: id },
            success: function (response) {
                $("#previewImageContent").attr("src", "../files/" + response);
                $("#previewImage").modal("show");
            },error: function (response) {
                console.error(response);
            }
        });
    });

    $(".previewCORBtn").click(function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        $.ajax({
            type: "POST",
            url: "../viewpfp.php",
            data: { getCOR: true, id: id },
            success: function (response) {
                $("#previewFileContent").attr("src", "../files/" + response);
                $("#previewFile").modal("show");
            }
        });
    });


    $(".statusBtn").click(function (e) {
        e.preventDefault();
        var accno = $(this).data("accno");
        var status = $(this).data("status");
        $("#accNoModal").html(accno);
        $(".status").html(status);
        $("#statusBtnModal").data("accno", accno);
        $("#statusBtnModal").data("status", status);
        $("#statusModal").modal("show");
    });
    $("#statusBtnModal").click(function (e) {
        e.preventDefault();
        var accno = $(this).data("accno");
        var status = $(this).data("status");
        console.log(accno);
        $.ajax({
            type: "post",
            url: "../function/toUpdateStatus.php",
            data: {
                SET_USER_STATUS: true,
                accno: accno,
                status: status,
            },
            dataType: "JSON",
            success: function (response) {
                console.log(response);
                if (response.status) {
                    $("#successAlert").fadeIn();
                    $("#errorAlert").hide();
                    $("#dropBtnModal").hide();
                    $("#statusModal").modal("hide");
                    location.reload();
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

});
