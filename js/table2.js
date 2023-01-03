$(document).ready(function () {
    $(".fPSpinner").hide();
    $(".errorAlert").hide();

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
        $(".statusBtnModal").data("accno", accno);
        $(".statusBtnModal").data("status", status);
        $("#statusModal").modal("show");
    });
    $(".statusBtnModal").click(function (e) {
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

    $("#blockForm").submit(function (e) {
        e.preventDefault();
        var data = $(this).serializeArray();  // Form Data
        data.push({ name: 'SET_USER_STATUS', value: true });
        $.ajax({
            type: "post",
            url: "../function/toUpdateStatus.php",
            data: data,
            dataType: "JSON",
            success: function (response) {
                console.log(response);
                if (response.status) {
                    $("#successAlert").fadeIn();
                    $(".errorAlert").hide();
                    $("#dropBtnModal").hide();
                    $("#blockModal").modal("hide");
                    location.reload();
                }
                else {
                    $(".errorAlert").fadeIn();
                    // $("#errorAlertFP").html(response.msg);
                }
                $(".fPSpinner").hide();
            }, error: function (err) {
                console.error(err);
            }, beforeSend: function () {
                $(".fPSpinner").show();
            }
        });
    });

    var users = [];
    $.ajax({
        type: "POST",
        url: "../function/getVerification.php",
        data: { admin: true },
        dataType: "json",
        success: function (response) {
            users = response;
            console.log(response);
            displayUser($("#userType").val())
        }, error: function (response) {
            console.error(response);
            $("#error").html(response.responseText);
        }
    });

    $("#userType").change(function (e) {
        e.preventDefault();
        displayUser($(this).val());
    });

    function displayUser(filter) {
        var filtered = users.filter(function (x) {
            if (filter == "all") return true;
            return filter == x.type;
        });
        
        var content = ``;
        $.each(filtered, function (indexInArray, val) {
            var typeFiles = `
            <td class='text-capitalize'><button class='btn btn-secondary btn-sm previewCORBtn' data-id='${val.accNo}'>View</button></td>
            <td class='text-capitalize'><button class='btn btn-secondary btn-sm previewVIDBtn' data-id='${val.accNo}'>View</button></td>
            <td class='text-capitalize'><button class='btn btn-secondary btn-sm previewVAXBtn' data-id='${val.accNo}'>View</button></td>
            `;
            if(val.type != 'student') {
                typeFiles = `
                <td></td>
                <td class='text-capitalize'><button class='btn btn-secondary btn-sm previewVIDBtn' data-id='${val.accNo}'>View</button></td>
                <td class='text-capitalize'><button class='btn btn-secondary btn-sm previewVAXBtn' data-id='${val.accNo}'>View</button></td>
                `;
            }
            content += `
            <tr>
                <td>${val.accNo}</td>
                <td class='text-capitalize'>${val.fullName}</td>
                <td class='text-capitalize'>${val.type}</td>
                <td class='text-capitalize'>${val.studentNo}</td>
                <td class='text-capitalize'>${val.empNo}</td>
                <td class='text-capitalize'>${val.contactNo}</td>
                <td class='text-capitalize'><button class='btn btn-secondary btn-sm previewImageBtn' data-id='${val.accNo}'>View</button></td>
                ${typeFiles}
                <td>
                    <div class='btn-group' role='group'>
                        <button type='button' class='btn btn-primary statusBtn btn-sm' data-status='approve' data-accno='${val.accNo}'>Approve</button>
                        <button type='button' class='btn btn-danger statusBtn btn-sm' data-status='reject' data-accno='${val.accNo}'>Reject</button>
                    </div>
                </td>
            </tr>    
             `;

        });
        if ($.fn.DataTable.isDataTable("#accountVerificationTable")) {
            $('#accountVerificationTable').DataTable().clear().destroy();
        }
        $("#accountVerificationTableContent").html(content);
        $("#accountVerificationTable").DataTable();

        $(".statusBtn").click(function (e) {
            e.preventDefault();
            var accno = $(this).data("accno");
            var status = $(this).data("status");
            var qrstatus = $(this).data("qr");
            $(".accNoModal").html(accno);
            $(".status").html(status);
            if (status == "reject") {
                $("#accno").val(accno);
                $("#status").val(status);
                $("#qrstatus").val(qrstatus);
                $("#blockModal").modal("show");
            } else {
                $(".statusBtnModal").data("accno", accno);
                $(".statusBtnModal").data("status", status);
                $(".statusBtnModal").data("qrstatus", qrstatus);
                $("#statusModal").modal("show");
            }
        });
    }

});
