var fst1 = document.querySelector('#fname');
var lst1 = document.querySelector('#lname');
var mid1 = document.querySelector('#mname');
var username1 = document.querySelector('#username');
var pass1 = document.querySelector('#pass');
var email1 = document.querySelector('#email1');
var v_id1 = document.querySelector('#v_id1');
var vaxx = document.querySelector('#vax1');

var btn1 = document.querySelector('#btn1');

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
    if (username1.value == ""){
        username1.style.border = '1px solid red';
        msg4.innerHTML="Please enter username";
        return false; 
    }
    else {
        username1.style.border = '1px solid green';
        msg4.innerHTML="";
    }
})
btn1.addEventListener('click', function(){
    if (pass1.value == ""){
        pass1.style.border = '1px solid red';
        msg5.innerHTML="Please enter password";
        return false; 
    }
    else {
        pass1.style.border = '1px solid green';
        msg5.innerHTML="";
    }
})

btn1.addEventListener('click', function(){
    if (email1.value == ""){
        email1.style.border = '1px solid red';
        msg6.innerHTML="Please enter email";
        return false; 
    }
    else if (!(email1.value.match(validRegex))){
        email1.style.border = '1px solid red';
        msg6.innerHTML="Invalid email";
        return false; 
    }
    else {
        email1.style.border = '1px solid green';
        msg6.innerHTML="";
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

username1.addEventListener('keyup', function(){
    if (username1.value.length == 0){
        username1.style.border = '1px solid red';
        msg4.innerHTML="Please enter username";
        return false; 
    }
    else if(username1.value.length < 4){
        username1.style.border = '1px solid red';
        msg4.innerHTML="Username must be at least 4 characters";
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
        msg5.innerHTML="Please enter password";
        return false; 
    }
    else if(pass1.value.length < 4){
        pass1.style.border = '1px solid red';
        msg6.innerHTML="Password must be at least 4 characters";
        if(cpass1.value.match(pass1.value)){
            cpass1.style.border = '1px solid green';
            msg5.innerHTML="";
        }
        else {
            cpass1.style.border = '1px solid red';
            msg5.innerHTML="Password not match";
            return false; 
        }
    }
    else {
        pass1.style.border = '1px solid green';
        msg6.innerHTML="";
        if(pass1.value.match(pass1.value)){
            pass1.style.border = '1px solid green';
            msg5.innerHTML="";
        }
        else {
            cpass1.style.border = '1px solid red';
            msg5.innerHTML="Password not match";
            return false; 
        }
    }
})

email1.addEventListener('keyup', function(){
    if (email1.value.length == 0){
        email1.style.border = '1px solid red';
        msg6.innerHTML="Please enter email";
        return false; 
    }
    else if(email1.value.match(validRegex)){
        email1.style.border = '1px solid green';
        msg6.innerHTML="";
    }
    else {
        email1.style.border = '1px solid red';
        msg6.innerHTML="Invalid Email";
        return false; 
    }
})

function checkImage1(){
    if (!allowedExtensions.exec(v_id1.value)) {
        v_id1.style.border = '1px solid red';
        msg7.innerHTML="Invalid file type";
        return false;
    }
    else if (v_id1.value.length ==0){
        v_id1.style.border = '1px solid red';
        msg7.innerHTML="Please upload picture";
        return false;
    }
    else{
        v_id1.style.border = '1px solid green';
        msg7.innerHTML="";
    }
}

function checkImage2(){

    if (!allowedExtensions.exec(vaxx.value)) {
        vaxx.style.border = '1px solid red';
        msg8.innerHTML="Invalid file type";
        return false;
    }
    else if (cor.value.length ==0){
        vaxx.style.border = '1px solid red';
        msg8.innerHTML="Please upload picture";
        return false;
    }
    else{
        vaxx.style.border = '1px solid green';
        msg8.innerHTML="";
    }
}




function toCheck(){
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