var ppse = document.querySelector('#check8');
var text1 = document.querySelector('#txt-1');
ppse.addEventListener('click', function () {
    if (ppse.checked == true) {
        text1.classList.remove("cont-p--hidden");
        text1.classList.add("cont-p");
    }
    else {
        text1.classList.remove("cont-p");
        text1.classList.add("cont-p--hidden");
    }
})

$(document).ready(function () {
    $("#appointmentTable").DataTable();
});
