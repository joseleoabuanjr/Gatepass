var btn1 = document.querySelector('#reg1');
var username1 = document.querySelector('#username1');
var pass1 = document.querySelector('#pass1');
var cpass1 = document.querySelector('#cpass1');
var email1 = document.querySelector('#email1');
var stud1 = document.querySelector('#stud1');
var fst1 = document.querySelector('#fst1');
var mid1 = document.querySelector('#mid1');
var lst1 = document.querySelector('#lst1');
var img1 = document.querySelector('#img1');

var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

var msg1 = document.querySelector('#message1');
var msg2 = document.querySelector('#message2');
var msg3 = document.querySelector('#message3');
var msg4 = document.querySelector('#message4');
var msg5 = document.querySelector('#message5');
var msg6 = document.querySelector('#message6');
var msg7 = document.querySelector('#message7');
var msg8 = document.querySelector('#message8');
var msg9 = document.querySelector('#message9');

//onsubmit event form1
btn1.addEventListener('click', function(){
    if (fst1.value == ""){
        fst1.style.border = '1px solid red';
        msg1.innerHTML="Please enter first name";
        return false; 
    }
    else {
        fst1.style.border = '1px solid green';
        msg1.innerHTML="";
    }
})
btn1.addEventListener('click', function(){
    if (mid1.value == ""){
        mid1.style.border = '1px solid red';
        msg2.innerHTML="Please enter middle name";
        return false; 
    }
    else {
        mid1.style.border = '1px solid green';
        msg2.innerHTML="";
    }
})
btn1.addEventListener('click', function(){
    if (lst1.value == ""){
        lst1.style.border = '1px solid red';
        msg3.innerHTML="Please enter last name";
        return false; 
    }
    else {
        lst1.style.border = '1px solid green';
        msg3.innerHTML="";
    }
})
btn1.addEventListener('click', function(){
    if (stud1.value == ""){
        stud1.style.border = '1px solid red';
        msg4.innerHTML="Please enter student number";
        return false; 
    }
    else {
        stud1.style.border = '1px solid green';
        msg4.innerHTML="";
    }
})
btn1.addEventListener('click', function(){
    if (username1.value == ""){
        username1.style.border = '1px solid red';
        msg5.innerHTML="Please enter username";
        return false; 
    }
    else {
        username1.style.border = '1px solid green';
        msg5.innerHTML="";
    }
})
btn1.addEventListener('click', function(){
    if (pass1.value == ""){
        pass1.style.border = '1px solid red';
        msg6.innerHTML="Please enter password";
        return false; 
    }
    else {
        pass1.style.border = '1px solid green';
        msg6.innerHTML="";
    }
})
btn1.addEventListener('click', function(){
    if (cpass1.value == ""){
        cpass1.style.border = '1px solid red';
        msg7.innerHTML="Please enter confirm password";
        return false; 
    }
    else {
        cpass1.style.border = '1px solid green';
        msg7.innerHTML="";
    }
})
btn1.addEventListener('click', function(){
    if (email1.value == ""){
        email1.style.border = '1px solid red';
        msg8.innerHTML="Please enter email";
        return false; 
    }
    else if (!(email1.value.match(validRegex))){
        email1.style.border = '1px solid red';
        msg8.innerHTML="Invalid email";
        return false; 
    }
    else {
        email1.style.border = '1px solid green';
        msg8.innerHTML="";
    }
})
btn1.addEventListener('click', function(){
    if (img1.value == ""){
        img1.style.border = '1px solid red';
        msg9.innerHTML="Please upload picture";
        return false; 
    }
    else {
        img1.style.border = '1px solid green';
        msg9.innerHTML="";
    }
})

//onkeyup event form 1
fst1.addEventListener('keyup', function(){
    if (fst1.value.length == 0){
        fst1.style.border = '1px solid red';
        msg1.innerHTML="Please enter first name";
        return false; 
    }
    else {
        fst1.style.border = '1px solid green';
        msg1.innerHTML="";
    }
})
mid1.addEventListener('keyup', function(){
    if (mid1.value.length == 0){
        mid1.style.border = '1px solid red';
        msg2.innerHTML="Please enter middle name";
        return false; 
    }
    else {
        mid1.style.border = '1px solid green';
        msg2.innerHTML="";
    }
})
lst1.addEventListener('keyup', function(){
    if (lst1.value.length == 0){
        lst1.style.border = '1px solid red';
        msg3.innerHTML="Please enter last name";
        return false; 
    }
    else {
        lst1.style.border = '1px solid green';
        msg3.innerHTML="";
    }
})
stud1.addEventListener('keyup', function(){
    if (stud1.value.length == 0){
        stud1.style.border = '1px solid red';
        msg4.innerHTML="Please enter student number";
        return false; 
    }
    else if (isNaN(stud1.value)){
        stud1.style.border = '1px solid red';
        msg4.innerHTML="Please enter number only";
        return false; 
    }
    else {
        stud1.style.border = '1px solid green';
        msg4.innerHTML="";
    }
})
username1.addEventListener('keyup', function(){
    if (username1.value.length == 0){
        username1.style.border = '1px solid red';
        msg5.innerHTML="Please enter username";
        return false; 
    }
    else if(username1.value.length < 4){
        username1.style.border = '1px solid red';
        msg5.innerHTML="Username must be at least 4 characters";
        return false; 
    }
    else {
        username1.style.border = '1px solid green';
        msg5.innerHTML="";
    }
})
pass1.addEventListener('keyup', function(){
    if (pass1.value.length == 0){
        pass1.style.border = '1px solid red';
        msg6.innerHTML="Please enter password";
        return false; 
    }
    else if(pass1.value.length < 4){
        pass1.style.border = '1px solid red';
        msg6.innerHTML="Password must be at least 4 characters";
        if(cpass1.value.match(pass1.value)){
            cpass1.style.border = '1px solid green';
            msg7.innerHTML="";
        }
        else {
            cpass1.style.border = '1px solid red';
            msg7.innerHTML="Password not match";
            return false; 
        }
    }
    else {
        pass1.style.border = '1px solid green';
        msg6.innerHTML="";
        if(cpass1.value.match(pass1.value)){
            cpass1.style.border = '1px solid green';
            msg7.innerHTML="";
        }
        else {
            cpass1.style.border = '1px solid red';
            msg7.innerHTML="Password not match";
            return false; 
        }
    }
})
cpass1.addEventListener('keyup', function(){
    if (cpass1.value.length == 0){
        cpass1.style.border = '1px solid red';
        msg7.innerHTML="Password not match";
        return false; 
    }
    else if (pass1.value.length == 0){
        cpass1.style.border = '1px solid red';
        msg7.innerHTML="Password not match";
        return false; 
    }
    else if(cpass1.value.match(pass1.value)){
        cpass1.style.border = '1px solid green';
        msg7.innerHTML="";
    }
    else {
        cpass1.style.border = '1px solid red';
        msg7.innerHTML="Password not match";
        return false; 
    }
})
email1.addEventListener('keyup', function(){
    if (email1.value.length == 0){
        email1.style.border = '1px solid red';
        msg8.innerHTML="Please enter email";
        return false; 
    }
    else if(email1.value.match(validRegex)){
        email1.style.border = '1px solid green';
        msg8.innerHTML="";
    }
    else {
        email1.style.border = '1px solid red';
        msg8.innerHTML="Invalid Email";
        return false; 
    }
})

function checkImage1(){
    if (!allowedExtensions.exec(img1.value)) {
        img1.style.border = '1px solid red';
        msg9.innerHTML="Invalid file type";
        return false;
    }
    else if (img1.value.length ==0){
        img1.style.border = '1px solid red';
        msg9.innerHTML="Please upload picture";
        return false;
    }
    else{
        img1.style.border = '1px solid green';
        msg9.innerHTML="";
    }
}
function tocheck1() {
    //validate input fields
    if(username1.value.length == 0 || username1.value.length < 4) {
        return false; 
    }
    else if(pass1.value.length == 0 || pass1.value.length < 4) {
        return false; 
    }
    else if(cpass1.value.length == 0 || cpass1.value.length < 4) {
        return false; 
    } 
    else if(email1.value.length == 0) {
        return false; 
    } 
    else if(stud1.value.length == 0) {
        return false; 
    } 
    else if(fst1.value.length == 0) {
        return false; 
    } 
    else if(mid1.value.length == 0) {
        return false; 
    } 
    else if(lst1.value.length == 0) {
        return false; 
    } 
    else if(img1.value.length == 0) {
        return false; 
    }
    else if(!(email1.value.match(validRegex))) {
        return false; 
    }
    else if(!(cpass1.value.match(pass1.value))) {
        return false; 
    }
    else {
        return true;
    }  
}