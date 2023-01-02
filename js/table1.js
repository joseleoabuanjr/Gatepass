$(document).ready(function () {
    $("#fPSpinner").hide();
    $("#errorAlert").hide();

    $(".statusBtn").click(function (e) {
        e.preventDefault();
        var accno = $(this).data("accno");
        var status = $(this).data("status");
        var qrstatus = $(this).data("qr");
        $("#accNoModal").html(accno);
        $(".status").html(status);
        $("#statusBtnModal").data("accno", accno);
        $("#statusBtnModal").data("status", status);
        $("#statusBtnModal").data("qrstatus", qrstatus);
        $("#statusModal").modal("show");
    });
    $("#statusBtnModal").click(function (e) {
        e.preventDefault();
        var accno = $(this).data("accno");
        var status = $(this).data("status");
        var qrstatus = $(this).data("qrstatus");
        console.log(accno);
        console.log(qrstatus);
        $.ajax({
            type: "post",
            url: "../function/toUpdateStatus.php",
            data: {
                SET_USER_STATUS: true,
                accno: accno,
                status: status,
                qrstatus: qrstatus
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

    var users = [];
    $.ajax({
        type: "POST",
        url: "../function/getUser.php",
        data: { admin: true },
        dataType: "json",
        success: function (response) {
            users = response;
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
            var action = ``;
            if (val.verification == "unverified") {
                    action = ``;
                } else if (val.verification == "pending") {
                    action = ``;
            } else {
                if (val.verification == "blocked") {
                    action = `<button class='btn btn-secondary btn-sm statusBtn' data-status='unblock' data-qr='granted' data-accno='${val.accNo}'>Unblock</button>`
                } else {
                    action = `<button class='btn btn-danger btn-sm statusBtn' data-status='block' data-qr='blocked' data-accno='${val.accNo}'>Block</button>`;
                }
            }
            content += `
            <tr>
                <td>${val.accNo}</td>
                <td class='text-capitalize'>${val.fullName}</td>
                <td class='text-capitalize'>${val.type}</td>
                <td class='text-capitalize'>${val.verification}</td>
                <td class='text-capitalize'>${val.course}</td>
                <td class='text-capitalize'>${val.year}</td>
                <td class='text-capitalize'>${action}</td>
            </tr>    
             `;

        });
        if ($.fn.DataTable.isDataTable("#userAccountsTable")) {
            $('#userAccountsTable').DataTable().clear().destroy();
        }
        $("#userAccountsTableContent").html(content);
        $("#userAccountsTable").DataTable();
    }
});
