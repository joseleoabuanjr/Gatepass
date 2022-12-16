$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "../function/dashboardAdminProcess.php",
        data: { getPendingStudents: true },
        success: function (response) {
            $("#pendingStudents").html(response);
        }, error: function (error) {
            console.error(error);
        }
    });

    $.ajax({
        type: "POST",
        url: "../function/dashboardAdminProcess.php",
        data: { getPendingEmployees: true },
        success: function (response) {
            $("#pendingEmployees").html(response);
        }, error: function (error) {
            console.error(error);
        }
    });

    $.ajax({
        type: "POST",
        url: "../function/dashboardAdminProcess.php",
        data: { getPendingVisitors: true },
        success: function (response) {
            $("#pendingVisitors").html(response);
        }, error: function (error) {
            console.error(error);
        }
    });

    //APPOINTMENT
    // count students
    $.ajax({
        type: "POST",
        url: "../function/dashboardAdminProcess.php",
        data: { getAppointmentStudents: true },
        success: function (response) {
            $("#pendingApptStudents").html(response);
        }
    });

    // count employees
    $.ajax({
        type: "POST",
        url: "../function/dashboardAdminProcess.php",
        data: { getAppointmentEmployees: true },
        success: function (response) {
            $("#pendingApptEmployees").html(response);
        }
    });
    // count vsitors
    $.ajax({
        type: "POST",
        url: "../function/dashboardAdminProcess.php",
        data: { getAppointmentVisitors: true },
        success: function (response) {
            $("#pendingApptVisitors").html(response);
        }
    });
});