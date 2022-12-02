var fst1 = document.querySelector('#fname1');
var lst1 = document.querySelector('#lname1');
var mid1 = document.querySelector('#mname1');
var stud1 = document.querySelector('#studno1');
var username1 = document.querySelector('#username1');
var pass1 = document.querySelector('#pass1');
var email1 = document.querySelector('#email1');
var cor = document.querySelector('#cor1');
var vaxx = document.querySelector('#vax1');
//STUDENTS ID'S (COLLEGE/COURSE/YEAR/SECTION)
var col = document.querySelector('#col-s');
var course = document.querySelector('#course-s');
var year = document.querySelector('#year-s');
var section = document.querySelector('#section-s');

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
var msg9 = document.querySelector('#message9');
var msg10 = document.querySelector('#message10');
var msg11 = document.querySelector('#message11');
var msg12= document.querySelector('#message12');
var msg13 = document.querySelector('#message13');

btn1.addEventListener('click', function(){
    if (fst1.value == ""){
        fst1.style.border = '1px solid red';
        msg1.innerHTML="Please Enter First Name";
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
        msg2.innerHTML="Please Enter Middle Initial";
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
        msg3.innerHTML="Please Enter Last Name";
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
        msg4.innerHTML="Please Enter Student Number";
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
        msg5.innerHTML="Please Enter Username";
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
        msg6.innerHTML="Please Enter Password";
        return false; 
    }
    else {
        pass1.style.border = '1px solid green';
        msg6.innerHTML="";
    }
})
btn1.addEventListener('click', function(){
    if (email1.value == ""){
        email1.style.border = '1px solid red';
        msg8.innerHTML="Please Enter Email Address";
        return false; 
    }
    else if (!(email1.value.match(validRegex))){
        email1.style.border = '1px solid red';
        msg8.innerHTML="Invalid Email Address";
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
        msg9.innerHTML="Please Upload Picture";
        return false; 
    }
    else {
        img1.style.border = '1px solid green';
        msg9.innerHTML="";
    }
})

btn1.addEventListener('click', function(){
    if (col.value == "Default"){
        col.style.border = '1px solid red';
        msg10.innerHTML="Please Select College";
        return false; 
    }
    else {
        col.style.border = '1px solid green';
        msg10.innerHTML="";
    }
})

btn1.addEventListener('click', function(){
    if (course.value == "0"){
        course.style.border = '1px solid red';
        msg11.innerHTML="Please Select Course";
        return false; 
    }
    else {
        course.style.border = '1px solid green';
        msg11.innerHTML="";
    }
})

btn1.addEventListener('click', function(){
    if (year.value == "0"){
        year.style.border = '1px solid red';
        msg12.innerHTML="Please Select Year";
        return false; 
    }
    else {
        year.style.border = '1px solid green';
        msg12.innerHTML="";
    }
})

btn1.addEventListener('click', function(){
    if (section.value == "0"){
        section.style.border = '1px solid red';
        msg13.innerHTML="Please Select Section";
        return false; 
    }
    else {
        section.style.border = '1px solid green';
        msg13.innerHTML="";
    }
})


//onkeyup event form 1
fst1.addEventListener('keyup', function(){
    if (fst1.value.length == 0){
        fst1.style.border = '1px solid red';
        msg1.innerHTML="Please Enter First Name";
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
        msg2.innerHTML="Please Enter Middle Initial";
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
        msg3.innerHTML="Please Enter Last Name";
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
        msg4.innerHTML="Please Enter Student Number";
        return false; 
    }
    else if (isNaN(stud1.value)){
        stud1.style.border = '1px solid red';
        msg4.innerHTML="Please Enter Numbers Only";
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
        msg5.innerHTML="Please Enter Username";
        return false; 
    }
    else if(username1.value.length < 4){
        username1.style.border = '1px solid red';
        msg5.innerHTML="Username Must Be At Least 4 Characters";
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
        msg6.innerHTML="Please Enter Password";
        return false; 
    }
    else if(pass1.value.length < 4){
        pass1.style.border = '1px solid red';
        msg6.innerHTML="Password Must Be At Least 4 Characters";
    }
    else {
        pass1.style.border = '1px solid green';
        msg6.innerHTML="";
    }
})
email1.addEventListener('keyup', function(){
    if (email1.value.length == 0){
        email1.style.border = '1px solid red';
        msg8.innerHTML="Please Enter Email Address";
        return false; 
    }
    else if(email1.value.match(validRegex)){
        email1.style.border = '1px solid green';
        msg8.innerHTML="";
    }
    else {
        email1.style.border = '1px solid red';
        msg8.innerHTML="Invalid Email Address";
        return false; 
    }
})

function checkImage1(){
    if (!allowedExtensions.exec(cor.value)) {
        cor.style.border = '1px solid red';
        msg8.innerHTML="Invalid File Format";
        return false;
    }
    else if (cor.value.length ==0){
        cor.style.border = '1px solid red';
        msg8.innerHTML="Please Upload Picture";
        return false;
    }
    else{
        cor.style.border = '1px solid green';
        msg8.innerHTML="";
    }
}

function checkImage2(){

    if (!allowedExtensions.exec(vaxx.value)) {
        vaxx.style.border = '1px solid red';
        msg9.innerHTML="Invalid File Format";
        return false;
    }
    else if (cor.value.length ==0){
        vaxx.style.border = '1px solid red';
        msg9.innerHTML="Please Upload Picture";
        return false;
    }
    else{
        vaxx.style.border = '1px solid green';
        msg9.innerHTML="";
    }
}



function toCheck(){
    if(username1.value.length == 0 || username1.value.length < 4) {
        return false; 
    }
    else if(pass1.value.length == 0 || pass1.value.length < 4) {
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
    else if(col.value== "") {
        return false; 
    }
    else if(course.value== "") {
        return false; 
    }
    else if(year.value== "") {
        return false; 
    }
    else if(section.value== "") {
        return false; 
    }
    else {
        return true;
    }  
}