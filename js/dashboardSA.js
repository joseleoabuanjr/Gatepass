$(document).ready(function () {
    displayTimeInOutChart($("#timeStatus").val());

    $("#timeStatus").change(function (e) {
        e.preventDefault();
        var filterDate = $("#timeStatus").val();
        displayTimeInOutChart(filterDate);
    });

    function displayTimeInOutChart(filter) {
        $.ajax({
            type: "POST",
            url: "../function/dashboardSAProcess.php",
            data: { getTimeInOut: true },
            dataType: "JSON",
            success: function (response) {
                let label = [];
                let labelChart = [];
                let timeIn = [];
                let timeOut = [];
                if (filter == 'day') {
                    for (i = 0; i < 7; i++) {
                        let day = moment().subtract(i, 'days');
                        label.push(day.format('ll'));
                        labelChart = label;
                    }
                } else if (filter == 'month') {
                    for (i = 0; i < 12; i++) {
                        let day = moment().subtract(i, 'months');
                        label.push(day.format('ll'));
                        labelChart.push(day.format('MMMM'));
                    }
                }
                else if (filter == 'year') {
                    for (i = 0; i < 5; i++) {
                        let day = moment().subtract(i, 'years');
                        label.push(day.format('ll'));
                        labelChart.push(day.format('YYYY'));
                    }
                }
                $.each(label, function (indexInArray, lab) {
                    let inCtr = 0;
                    let outCtr = 0;
                    $.each(response, function (indexInArray, val) {
                        var date = moment(val.time).format("ll");
                        if (moment(lab).isSame(date, filter)) {
                            if (val.in_out.toUpperCase() == "TIME IN") {
                                inCtr++;
                            } else {
                                outCtr++;
                            }
                        }
                    });
                    timeIn.push(inCtr);
                    timeOut.push(outCtr);
                });
                chart1.data.labels = labelChart.reverse();
                chart1.data.datasets[0].data = timeIn.reverse();
                chart1.data.datasets[1].data = timeOut.reverse();
                chart1.update();
            }, error: function (response) {
                console.error(response);
            }
        });
    }

    //count pending students for verification
    $.ajax({
        type: "POST",
        url: "../function/dashboardSAProcess.php",
        data: { getPendingStudents: true },
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
        data: { getPendingEmployees: true },
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
        data: { getPendingVisitors: true },
        success: function (response) {
            $("#pendingVisitors").html(response);
        }
    });



    //APPOINTMENT
    // count students
    $.ajax({
        type: "POST",
        url: "../function/dashboardSAProcess.php",
        data: { getAppointmentStudents: true },
        success: function (response) {
            $("#pendingApptStudents").html(response);
        }
    });

    // count employees
    $.ajax({
        type: "POST",
        url: "../function/dashboardSAProcess.php",
        data: { getAppointmentEmployees: true },
        success: function (response) {
            $("#pendingApptEmployees").html(response);
        }
    });
    // count vsitors
    $.ajax({
        type: "POST",
        url: "../function/dashboardSAProcess.php",
        data: { getAppointmentVisitors: true },
        success: function (response) {
            $("#pendingApptVisitors").html(response);
        }
    });

    var ctxChart1 = document.getElementById('chart1').getContext('2d');
    var chart1 = new Chart(ctxChart1, {
        type: 'line',
        plugins: [ChartDataLabels],
        data: {
            labels: [],
            datasets: [{
                label: ["IN"],
                data: [87, 97, 76, 84, 67, 84, 94],
                backgroundColor: ['#eeb90282'],
                // borderColor: 'gray',
                fill: true,
                tension: 0.4
            }, {
                label: ["OUT"],
                data: [67, 94, 36, 64, 37, 94, 14],
                backgroundColor: ['#30303082'],
                // borderColor: 'gray',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                title: {
                    display: false
                },
                datalabels: {
                    display: false
                    // anchor: 'start',
                    // align: 'bottom',
                    // color: 'black'
                }
            },
            scales: {
                y: {
                    min: 0,
                }
            },
            pointBackgroundColor: "#eeb902",
            radius: 5,
        },
    });
});
