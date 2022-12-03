$(document).ready(function () {
    $("#step2").hide();
    $("#step3").hide();
    var progress = 20;
    $(".nextBtn").click(function (e) { 
        e.preventDefault();
        var ctr = $(this).data("ctr");
        $("#step"+ctr).hide();
        $("#step"+(parseInt(ctr)+1)).fadeIn();
        $(".progress-bar").width((progress += 20) + "%");
    });
});
