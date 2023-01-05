$(document).ready(function () {
    $(".fPSpinner").hide();
    $(".errorAlert").hide();

    var courses = getCourseByDepartment($("#collegeDept").val());
    $.each(courses, function (indexInArray, val) {
        $('#courseFilter').append($('<option>', {
            value: val,
            text: val
        }));
    });

    $("#statusFilter").change(function (e) {
        e.preventDefault();
        var userType = $("#userTypeFilter").val();
        var course = $("#courseFilter").val();
        var status = $("#statusFilter").val();
        displayUser(userType, course, status);
    });

    $("#courseFilter").change(function (e) {
        e.preventDefault();
        var userType = $("#userTypeFilter").val();
        var course = $("#courseFilter").val();
        var status = $("#statusFilter").val();
        displayUser(userType, course, status);
    });

    $("#userTypeFilter").change(function (e) {
        e.preventDefault();
        var userType = $("#userTypeFilter").val();
        var course = $("#courseFilter").val();
        var status = $("#statusFilter").val();
        displayUser(userType, course, status);
    });

    $(".statusBtnModal").click(function (e) {
        e.preventDefault();
        var accno = $(this).data("accno");
        var status = $(this).data("status");
        var qrstatus = $(this).data("qrstatus");
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
                    $(".errorAlert").hide();
                    $("#dropBtnModal").hide();
                    $("#statusModal").modal("hide");
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
        url: "../function/getUser.php",
        data: { admin: true },
        dataType: "json",
        success: function (response) {
            users = response;
            var userType = $("#userTypeFilter").val();
            var course = $("#courseFilter").val();
            var status = $("#statusFilter").val();
            displayUser(userType, course, status);
        }, error: function (response) {
            console.error(response);
            $("#error").html(response.responseText);
        }
    });

    function displayUser(userType, course, status) {
        var filtered = users.filter(function (x) {
            var u = true, c = true, s = true;
            u = userType == "all" ? true : userType == x.type;
            c = course == "all" ? true : course == x.course;
            s = status == "all" ? true : status == x.verification;
            return u && c && s;
        });

        var content = ``;
        $.each(filtered, function (indexInArray, val) {
            var action = ``;
            if (val.verification == "rejected") {
                action = ``;
            } else if (val.verification == "unverified") {
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

        $(".statusBtn").click(function (e) {
            e.preventDefault();
            var accno = $(this).data("accno");
            var status = $(this).data("status");
            var qrstatus = $(this).data("qr");
            $(".accNoModal").html(accno);
            $(".status").html(status);
            if (status == "block") {
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

    function getCourseByDepartment(department) {
        var x = {
            "College of Architecture and Fine Arts (CAFA)": [
                "Bachelor of Science in Architecture",
                "Bachelor of Landscape Architecture",
                "Bachelor of Fine Arts Major in Visual Communication",
            ],
            "College of Arts and Letters (CAL)": [
                "Bachelor of Arts in Broadcasting",
                "Bachelor of Arts in Journalism",
                "Bachelor of Performing Arts (Theater Track)",
                "Batsilyer ng Sining sa Malikhaing Pagsulat",
            ],
            "College of Business Administration (CBA)": [
                "Bachelor of Science in Business Administration Major in Business Economics",
                "Bachelor of Science in Business Administration Major in Financial Management",
                "Bachelor of Science in Business Administration Major in Marketing Management",
                "Bachelor of Science in Entrepreneurship",
                "Bachelor of Science in Accountancy",
            ],
            "College of Criminal Justice Education (CCJE)": [
                "Bachelor of Arts in Legal Management",
                "Bachelor of Science in Criminology",
            ],
            "College of Hospitality and Tourism Management (CHTM)": [
                "Bachelor of Science in Hospitality Management",
                "Bachelor of Science in Tourism Management",
            ],
            "College of Information and Communications Technology (CICT)": [
                "Bachelor of Science in Information Technology",
                "Bachelor of Library and Information Science",
                "Bachelor of Science in Information System",
            ],
            "College of Industrial Technology (CIT)": [
                "Bachelor of Industrial Technology with specialization in Automotive",
                "Bachelor of Industrial Technology with specialization in Computer",
                "Bachelor of Industrial Technology with specialization in Drafting",
                "Bachelor of Industrial Technology with specialization in Electrical",
                "Bachelor of Industrial Technology with specialization in Electronics & Communication Technology",
                "Bachelor of Industrial Technology with specialization in Electronics Technology",
                "Bachelor of Industrial Technology with specialization in Food Processing Technology",
                "Bachelor of Industrial Technology with specialization in Mechanical",
                "Bachelor of Industrial Technology with specialization in Heating, Ventilation, Air Conditioning and Refrigeration Technology (HVACR)",
                "Bachelor of Industrial Technology with specialization in Mechatronics Technology",
                "Bachelor of Industrial Technology with specialization in Welding Technology",
            ],
            "College of Law (CLAw)": [
                "Bachelor of Laws",
                "Juris Doctor",
            ],
            "College of Nursing (CN)": [
                "Bachelor of Science in Nursing",
            ],
            "College of Engineering (COE)": [
                "Bachelor of Science in Civil Engineering",
                "Bachelor of Science in Computer Engineering",
                "Bachelor of Science in Electrical Engineering",
                "Bachelor of Science in Electronics Engineering",
                "Bachelor of Science in Industrial Engineering",
                "Bachelor of Science in Manufacturing Engineering",
                "Bachelor of Science in Mechanical Engineering",
                "Bachelor of Science in Mechatronics Engineering",
            ],
            "College of Education (COED)": [
                "Bachelor of Elementary Education",
                "Bachelor of Early Childhood Education",
                "Bachelor of Secondary Education Major in English minor in Mandarin",
                "Bachelor of Secondary Education Major in Filipino",
                "Bachelor of Secondary Education Major in Sciences",
                "Bachelor of Secondary Education Major in Mathematics",
                "Bachelor of Secondary Education Major in Social Studies",
                "Bachelor of Secondary Education Major in Values Education",
                "Bachelor of Physical Education",
                "Bachelor of Technology and Livelihood Education Major in Industrial Arts",
                "Bachelor of Technology and Livelihood Education Major in Information and Communication Technology",
                "Bachelor of Technology and Livelihood Education Major in Home Economics",
            ],
            "College of Science (CS)": [
                "Bachelor of Science in Biology",
                "Bachelor of Science in Environmental Science",
                "Bachelor of Science in Food Technology",
                "Bachelor of Science in Math with Specialization in Computer Science",
                "Bachelor of Science in Math with Specialization in Applied Statistics",
                "Bachelor of Science in Math with Specialization in Business Applications",
            ],
            "College of Sports, Exercise and Recreation (CSER)": [
                "Bachelor of Science in Exercise and Sports Sciences with specialization in Fitness and Sports Coaching",
                "Bachelor of Science in Exercise and Sports Sciences with specialization in Fitness and Sports Management Certificate of Physical Education",
            ],
            "College of Social Sciences and Philosophy (CSSP)": [
                "Bachelor of Public Administration",
                "Bachelor of Science in Social Work",
                "Bachelor of Science in Psychology",
            ],
            "Graduate School (GS)": [
                "Doctor of Education",
                "Doctor of Philosophy",
                "Doctor of Public Administration",
                "Master in Physical Education",
                "Master in Public Administration",
                "Master of Arts in Education",
                "Master of Engineering Program",
                "Master of Industrial Technology Management",
                "Master of Science in Civil Engineering",
                "Master of Science in Computer Engineering",
                "Master of Science in Electronics and Communications Engineering",
                "Master of Information Technology",
                "Master of Manufacturing Engineering",
            ]
        };
        return x[department];
    }
});
