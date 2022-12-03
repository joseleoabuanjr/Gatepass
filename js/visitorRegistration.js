$(document).ready(function () {
    $("#step2").hide();
    $("#step3").hide();
    var progress = 33.33;
    $(".nextBtn").click(function (e) { 
        e.preventDefault();
        var ctr = $(this).data("ctr");
        $("#step"+ctr).hide();
        $("#step"+(parseInt(ctr)+1)).fadeIn();
        $(".progress-bar").width((progress += 33.33) + "%");
    });

    $(".prevBtn").click(function (e) { 
        e.preventDefault();
        var ctr = $(this).data("ctr");
        $("#step"+ctr).hide();
        $("#step"+(parseInt(ctr)-1)).fadeIn();
        $(".progress-bar").width((progress -= 33.33) + "%");
    });
});
