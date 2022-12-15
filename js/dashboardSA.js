$(document).ready(function () {
    
    //count pending students for verification
    $.ajax({
        type: "POST",
        url: "../function/dashboardSAProcess.php",
        data: {getPendingStudents: true},
        success: function (response) {
            
            $("#pendingStudents").html(response);
        }, error: function (error) {
            console.error(error);
        }
    });

    //count pending employees for verification
    $.ajax({
        type: "POST",
        url: "../function/dashboardSAProcess.php",
        data: {getPendingEmployees: true},
        success: function (response) {
            $("#pendingEmployees").html(response);
        }, error: function (error) {
            console.error(error);
        }
    });

    //count pending visitors for verification
    $.ajax({
        type: "POST",
        url: "../function/dashboardSAProcess.php",
        data: {getPendingVisitors: true},
        success: function (response) {
            $("#pendingVisitors").html(response);
        }
    });



    //APPOINTMENT
    // count students
    $.ajax({
        type: "POST",
        url: "../function/dashboardSAProcess.php",
        data: {getAppointmentStudents: true},
        success: function (response) {
            $("#pendingApptStudents").html(response);
        }
    });

    // count employees
    $.ajax({
        type: "POST",
        url: "../function/dashboardSAProcess.php",
        data: {getAppointmentEmployees: true},
        success: function (response) {
            $("#pendingApptEmployees").html(response);
        }
    });
    // count vsitors
    $.ajax({
        type: "POST",
        url: "../function/dashboardSAProcess.php",
        data: {getAppointmentVisitors: true},
        success: function (response) {
            $("#pendingApptVisitors").html(response);
        }
    });
});