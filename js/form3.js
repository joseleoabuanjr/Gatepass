var btn3 = document.querySelector('#reg3');
var username3 = document.querySelector('#username3');
var pass3 = document.querySelector('#pass3');
var cpass3 = document.querySelector('#cpass3');
var email3 = document.querySelector('#email3');
var fst3 = document.querySelector('#fst3');
var mid3 = document.querySelector('#mid3');
var lst3 = document.querySelector('#lst3');
var img3 = document.querySelector('#img3');

var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

var msg19 = document.querySelector('#message19');
var msg20 = document.querySelector('#message20');
var msg21 = document.querySelector('#message21');
var msg22 = document.querySelector('#message22');
var msg23 = document.querySelector('#message23');
var msg24 = document.querySelector('#message24');
var msg25 = document.querySelector('#message25');
var msg26 = document.querySelector('#message26');

//onsubmit event form 3
btn3.addEventListener('click', function(){
    if (fst3.value == ""){
        fst3.style.border = '1px solid red';
        msg19.innerHTML="Please Enter First Name";
        return false; 
    }
    else {
        fst3.style.border = '1px solid green';
        msg19.innerHTML="";
    }
})
btn3.addEventListener('click', function(){
    if (mid3.value == ""){
        mid3.style.border = '1px solid red';
        msg20.innerHTML="Please Enter Middle Initial";
        return false; 
    }
    else {
        mid3.style.border = '1px solid green';
        msg20.innerHTML="";
    }
})
btn3.addEventListener('click', function(){
    if (lst3.value == ""){
        lst3.style.border = '1px solid red';
        msg21.innerHTML="Please Enter Last Name";
        return false; 
    }
    else {
        lst3.style.border = '1px solid green';
        msg21.innerHTML="";
    }
})
btn3.addEventListener('click', function(){
    if (username3.value == ""){
        username3.style.border = '1px solid red';
        msg22.innerHTML="Please Enter Username";
        return false; 
    }
    else {
        username3.style.border = '1px solid green';
        msg22.innerHTML="";
    }
})
btn3.addEventListener('click', function(){
    if (pass3.value == ""){
        pass3.style.border = '1px solid red';
        msg23.innerHTML="Please Enter Password";
        return false; 
    }
    else {
        pass3.style.border = '1px solid green';
        msg23.innerHTML="";
    }
})
btn3.addEventListener('click', function(){
    if (cpass3.value == ""){
        cpass3.style.border = '1px solid red';
        msg24.innerHTML="Please Enter Confirm Password";
        return false; 
    }
    else {
        cpass3.style.border = '1px solid green';
        msg24.innerHTML="";
    }
})
btn3.addEventListener('click', function(){
    if (email3.value == ""){
        email3.style.border = '1px solid red';
        msg25.innerHTML="Please Enter Email Address";
        return false; 
    }
    else {
        email3.style.border = '1px solid green';
        msg25.innerHTML="";
    }
})
btn3.addEventListener('click', function(){
    if (img3.value == ""){
        img3.style.border = '1px solid red';
        msg26.innerHTML="Please Upload Picture";
        return false; 
    }
    else {
        img3.style.border = '1px solid green';
        msg26.innerHTML="";
    }
})

//onkeyup event form 3
fst3.addEventListener('keyup', function(){
    if (fst3.value.length == 0){
        fst3.style.border = '1px solid red';
        msg19.innerHTML="Please Enter First Name";
        return false; 
    }
    else {
        fst3.style.border = '1px solid green';
        msg19.innerHTML="";
    }
})
mid3.addEventListener('keyup', function(){
    if (mid3.value.length == 0){
        mid3.style.border = '1px solid red';
        msg20.innerHTML="Please Enter Middle Initial";
        return false; 
    }
    else {
        mid3.style.border = '1px solid green';
        msg20.innerHTML="";
    }
})
lst3.addEventListener('keyup', function(){
    if (lst3.value.length == 0){
        lst3.style.border = '1px solid red';
        msg21.innerHTML="Please Enter Last Name";
        return false; 
    }
    else {
        lst3.style.border = '1px solid green';
        msg21.innerHTML="";
    }
})
username3.addEventListener('keyup', function(){
    if (username3.value.length == 0){
        username3.style.border = '1px solid red';
        msg22.innerHTML="Please Enter Username";
        return false; 
    }
    else if(username3.value.length < 4){
        username3.style.border = '1px solid red';
        msg22.innerHTML="Username Must Be At Least 4 Characters";
        return false; 
    }
    else {
        username3.style.border = '1px solid green';
        msg22.innerHTML="";
    }
})
pass3.addEventListener('keyup', function(){
    if (pass3.value.length == 0){
        pass3.style.border = '1px solid red';
        msg23.innerHTML="Please Enter Password";
        return false; 
    }
    else if(pass3.value.length < 4){
        pass3.style.border = '1px solid red';
        msg23.innerHTML="Password Must Be At Least 4 Characters";
        if(cpass3.value.match(pass3.value)){
            cpass3.style.border = '1px solid green';
            msg24.innerHTML="";
        }
        else {
            cpass3.style.border = '1px solid red';
            msg24.innerHTML="Password Did Not Match";
            return false; 
        }
    }
    else {
        pass3.style.border = '1px solid green';
        msg23.innerHTML="";
        if(cpass3.value.match(pass3.value)){
            cpass3.style.border = '1px solid green';
            msg24.innerHTML="";
        }
        else {
            cpass3.style.border = '1px solid red';
            msg24.innerHTML="Password Did Not Match";
            return false; 
        }
    }
})
cpass3.addEventListener('keyup', function(){
    if (cpass3.value.length == 0){
        cpass3.style.border = '1px solid red';
        msg24.innerHTML="Password Did Not Match";
        return false; 
    }
    else if (pass3.value.length == 0){
        cpass3.style.border = '1px solid red';
        msg24.innerHTML="Password Did Not Match";
        return false; 
    }
    else if(cpass3.value.match(pass3.value)){
        cpass3.style.border = '1px solid green';
        msg24.innerHTML="";
    }
    else {
        cpass3.style.border = '1px solid red';
        msg24.innerHTML="Password Did Not Match";
        return false; 
    }
})
email3.addEventListener('keyup', function(){
    if (email3.value.length == 0){
        email3.style.border = '1px solid red';
        msg25.innerHTML="Please Enter Email Address";
    }
    else if(email3.value.match(validRegex)){
        email3.style.border = '1px solid green';
        msg25.innerHTML="";
    }
    else {
        email3.style.border = '1px solid red';
        msg25.innerHTML="Invalid Email Address";
        return false; 
    }
})

function checkImage3(){
    if (!allowedExtensions.exec(img3.value)) {
        img3.style.border = '1px solid red';
        msg26.innerHTML="Invalid File Format";
        return false;
    }
    else if (img3.value.length ==0){
        img3.style.border = '1px solid red';
        msg26.innerHTML="Please Upload Picture";
        return false;
    }
    else{
        img3.style.border = '1px solid green';
        msg26.innerHTML="";
    }
}

function tocheck3() {

    //validate input fields
    if(username3.value.length == 0 || username3.value.length < 4) {
        return false; 
    }
    else if(pass3.value.length == 0 || pass3.value.length < 4) {
        return false; 
    }
    else if(cpass3.value.length == 0 || cpass3.value.length < 4) {
        return false; 
    } 
    else if(email3.value.length == 0) {
        return false; 
    }
    else if(fst3.value.length == 0) {
        return false; 
    } 
    else if(mid3.value.length == 0) {
        return false; 
    } 
    else if(lst3.value.length == 0) {
        return false; 
    } 
    else if(img3.value.length == 0) {
        return false; 
    }
    else if(!(email3.value.match(validRegex))) {
        return false; 
    }
    else if(!(cpass3.value.match(pass3.value))) {
        return false; 
    }
    else {
        return true;
    }  
}      