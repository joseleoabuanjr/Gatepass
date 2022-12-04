function updateClock(){
    var clock = new Date();
    var dname = clock.getDay();
    var mo = clock.getMonth();
    var dnum = clock.getDate();
    var yr = clock.getFullYear();
    var hou = clock.getHours();
    var min = clock.getMinutes();
    var sec = clock.getSeconds();
    var pe = "AM";

    if(hou == 0){
        hou = 12;
    }
    if(hou > 12){
        hou = hou - 12;
        pe = "PM";
    }

    Number.prototype.pad = function(digits){
        for(var n = this.toString(); n.length < digits; n = 0 + n);
        return n;
    }

    var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
    var week = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    var ids = ["dayname","month","daynum","year","hour","minutes","seconds","period"];
    var values = [week[dname],months[mo],dnum.pad(2),yr,hou.pad(2),min.pad(2),sec.pad(2),pe];

    for(var i = 0; i < ids.length; i++){
        document.getElementById(ids[i]).firstChild.nodeValue = values[i];
    }

    setInterval(reloadtime,1000);
}
function reloadtime(){
    updateClock();
    window.setInterval("updateClock()", 1);
}