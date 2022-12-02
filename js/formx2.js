var username2 = document.querySelector('#username2');
var pass2 = document.querySelector('#pass2');
var cpass2 = document.querySelector('#cpass2');
var email2 = document.querySelector('#email2');
var emp2 = document.querySelector('#emp2');
var fst2 = document.querySelector('#fst2');
var mid2 = document.querySelector('#mid2');
var lst2 = document.querySelector('#lst2');
var img2 = document.querySelector('#img2');
var btn2 = document.querySelector('#reg2');

var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

var msg10 = document.querySelector('#message10');
var msg11 = document.querySelector('#message11');
var msg12 = document.querySelector('#message12');
var msg13 = document.querySelector('#message13');
var msg14 = document.querySelector('#message14');
var msg15 = document.querySelector('#message15');
var msg16 = document.querySelector('#message16');
var msg17 = document.querySelector('#message17');
var msg18 = document.querySelector('#message18');

//onsubmit event form 2
btn2.addEventListener('click', function(){
    if (fst2.value == ""){
        fst2.style.border = '1px solid red';
        msg10.innerHTML="Please Enter First Name";
        return false; 
    }
    else {
        fst2.style.border = '1px solid green';
        msg10.innerHTML="";
    }
})
btn2.addEventListener('click', function(){
    if (mid2.value == ""){
        mid2.style.border = '1px solid red';
        msg11.innerHTML="Please Enter Middle Initial";
        return false; 
    }
    else {
        mid2.style.border = '1px solid green';
        msg11.innerHTML="";
    }
})
btn2.addEventListener('click', function(){
    if (lst2.value == ""){
        lst2.style.border = '1px solid red';
        msg12.innerHTML="Please Enter Last Name";
        return false; 
    }
    else {
        lst2.style.border = '1px solid green';
        msg12.innerHTML="";
    }
})
btn2.addEventListener('click', function(){
    if (emp2.value == ""){
        emp2.style.border = '1px solid red';
        msg13.innerHTML="Please Enter Student Number";
        return false; 
    }
    else {
        emp2.style.border = '1px solid green';
        msg13.innerHTML="";
    }
})
btn2.addEventListener('click', function(){
    if (username2.value == ""){
        username2.style.border = '1px solid red';
        msg14.innerHTML="Please Enter Username";
        return false; 
    }
    else {
        username2.style.border = '1px solid green';
        msg14.innerHTML="";
    }
})
btn2.addEventListener('click', function(){
    if (pass2.value == ""){
        pass2.style.border = '1px solid red';
        msg15.innerHTML="Please Enter Password";
        return false; 
    }
    else {
        pass2.style.border = '1px solid green';
        msg15.innerHTML="";
    }
})
btn2.addEventListener('click', function(){
    if (cpass2.value == ""){
        cpass2.style.border = '1px solid red';
        msg16.innerHTML="Please Enter Confirm Password";
        return false; 
    }
    else {
        cpass2.style.border = '1px solid green';
        msg16.innerHTML="";
    }
})
btn2.addEventListener('click', function(){
    if (email2.value == ""){
        email2.style.border = '1px solid red';
        msg17.innerHTML="Please Enter Email Address";
        return false; 
    }
    else {
        email2.style.border = '1px solid green';
        msg17.innerHTML="";
    }
})
btn2.addEventListener('click', function(){
    if (img2.value == ""){
        img2.style.border = '1px solid red';
        msg18.innerHTML="Please Upload Picture";
        return false; 
    }
    else {
        img2.style.border = '1px solid green';
        msg18.innerHTML="";
    }
})

//onkeyup event form 2
fst2.addEventListener('keyup', function(){
    if (fst2.value.length == 0){
        fst2.style.border = '1px solid red';
        msg10.innerHTML="Please Enter First Name";
        return false; 
    }
    else {
        fst2.style.border = '1px solid green';
        msg10.innerHTML="";
    }
})
mid2.addEventListener('keyup', function(){
    if (mid2.value.length == 0){
        mid2.style.border = '1px solid red';
        msg11.innerHTML="Please Enter Middle Initial";
        return false; 
    }
    else {
        mid2.style.border = '1px solid green';
        msg11.innerHTML="";
    }
})
lst2.addEventListener('keyup', function(){
    if (lst2.value.length == 0){
        lst2.style.border = '1px solid red';
        msg12.innerHTML="Please Enter Last Name";
        return false; 
    }
    else {
        lst2.style.border = '1px solid green';
        msg12.innerHTML="";
    }
})
emp2.addEventListener('keyup', function(){
    if (emp2.value.length == 0){
        emp2.style.border = '1px solid red';
        msg13.innerHTML="Please Enter Student Number";
        return false; 
    }
    else if (isNaN(emp2.value)){
        emp2.style.border = '1px solid red';
        msg13.innerHTML="Please Enter Numbers Only";
        return false; 
    }
    else {
        emp2.style.border = '1px solid green';
        msg13.innerHTML="";
    }
})
username2.addEventListener('keyup', function(){
    if (username2.value.length == 0){
        username2.style.border = '1px solid red';
        msg14.innerHTML="Please Enter Username";
        return false; 
    }
    else if(username2.value.length < 4){
        username1.style.border = '1px solid red';
        msg14.innerHTML="Username Must Be At Least 4 Characters";
        return false; 
    }
    else {
        username2.style.border = '1px solid green';
        msg14.innerHTML="";
    }
})
pass2.addEventListener('keyup', function(){
    if (pass2.value.length == 0){
        pass2.style.border = '1px solid red';
        msg15.innerHTML="Please Enter Password";
        return false; 
    }
    else if(pass2.value.length < 4){
        pass2.style.border = '1px solid red';
        msg15.innerHTML="Password Must Be At Least 4 Characters";
        if(cpass2.value.match(pass2.value)){
            cpass2.style.border = '1px solid green';
            msg16.innerHTML="";
        }
        else {
            cpass2.style.border = '1px solid red';
            msg16.innerHTML="Password Did Not Match";
            return false;
        }
    }
    else {
        pass2.style.border = '1px solid green';
        msg15.innerHTML="";
        if(cpass2.value.match(pass2.value)){
            cpass2.style.border = '1px solid green';
            msg16.innerHTML="";
        }
        else {
            cpass1.style.border = '1px solid red';
            msg16.innerHTML="Password Did Not Match";
            return false; 
        }
    }
})
cpass2.addEventListener('keyup', function(){
    if (cpass2.value.length == 0){
        cpass2.style.border = '1px solid red';
        msg16.innerHTML="Password Did Not Match";
        return false; 
    }
    else if (pass2.value.length == 0){
        cpass2.style.border = '1px solid red';
        msg16.innerHTML="Password Did Not Match";
        return false; 
    }
    else if(cpass2.value.match(pass2.value)){
        cpass2.style.border = '1px solid green';
        msg16.innerHTML="";
    }
    else {
        cpass2.style.border = '1px solid red';
        msg16.innerHTML="Password Did Not Match";
        return false; 
    }
})
email2.addEventListener('keyup', function(){
    if (email2.value.length == 0){
        email2.style.border = '1px solid red';
        msg17.innerHTML="Please Enter Email Address";
        return false; 
    }
    else if(email2.value.match(validRegex)){
        email2.style.border = '1px solid green';
        msg17.innerHTML="";
    }
    else {
        email2.style.border = '1px solid red';
        msg17.innerHTML="Invalid Email Address";
        return false; 
    }
})

function checkImage2(){
    if (!allowedExtensions.exec(img2.value)) {
        img2.style.border = '1px solid red';
        msg18.innerHTML="Invalid File Format";
        return false;
    }
    else if (img2.value.length ==0){
        img2.style.border = '1px solid red';
        msg18.innerHTML="Please Upload Picture";
        return false;
    }
    else{
        img2.style.border = '1px solid green';
        msg18.innerHTML="";
    }
}

function tocheck2() {
    //validate input fields
    if(username2.value.length == 0 || username2.value.length < 4) {
        return false; 
    }
    else if(pass2.value.length == 0 || pass2.value.length < 4) {
        return false; 
    }
    else if(cpass2.value.length == 0 || cpass2.value.length < 4) {
        return false; 
    } 
    else if(email2.value.length == 0) {
        return false; 
    } 
    else if(emp2.value.length == 0) {
        return false; 
    } 
    else if(fst2.value.length == 0) {
        return false; 
    } 
    else if(mid2.value.length == 0) {
        return false; 
    } 
    else if(lst2.value.length == 0) {
        return false; 
    } 
    else if(img2.value.length == 0) {
        return false; 
    }
    else if(!(email2.value.match(validRegex))) {
        return false; 
    }
    else if(!(cpass2.value.match(pass2.value))) {
        return false; 
    }
    else {
        return true;
    }  
}
