var ppse = document.querySelector('#purpose-s');
var text1 = document.querySelector('#txt-1');
ppse.addEventListener('change', function(){
    if (ppse.value == "Other"){
        text1.classList.remove("cont-p--hidden");
        text1.classList.add("cont-p");
    }
    else{
        text1.classList.remove("cont-p");
        text1.classList.add("cont-p--hidden");
    }
})