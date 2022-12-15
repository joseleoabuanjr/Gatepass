$(document).ready(function () {
    
    //count pending students
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

    //count pending employees
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

    $.ajax({
        type: "POST",
        url: "../function/dashboardSAProcess.php",
        data: {getPendingVisitors: true},
        success: function (response) {
            $("#pendingVisitors").html(response);
        }
    });
});