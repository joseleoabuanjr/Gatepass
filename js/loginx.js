var btnlg = document.querySelector('#logbtn');
var userlg = document.querySelector('#userlog');
var passlg = document.querySelector('#passlog');
var msguser = document.querySelector('#msguser');
var msgpass = document.querySelector('#msgpass');
var msgboth = document.querySelector('#msgboth');

userlg.addEventListener('keyup', function(){
    if (userlg.value.length == 0){
        userlg.style.border = '1px solid red';
        msguser.innerHTML="Please Enter Username";
    }
    else {
        userlg.style.border = '1px solid green';
        msguser.innerHTML="";
    }
})
passlg.addEventListener('keyup', function(){
    if (passlg.value.length == 0){
        passlg.style.border = '1px solid red';
        msgpass.innerHTML="Please Enter Password";
    }
    else {
        passlg.style.border = '1px solid green';
        msgpass.innerHTML="";
    }
})

btnlg.addEventListener('click', function(){
    if (userlg.value.length == 0){
        userlg.style.border = '1px solid red';
        msguser.innerHTML="Please Enter Username";
        msgboth.innerHTML="";

    }
    if(passlg.value.length == 0){
        passlg.style.border = '1px solid red';
        msgpass.innerHTML="Please Enter Password";
        msgboth.innerHTML="";
    }
    else {
        userlg.style.border = '1px solid green';
        msguser.innerHTML="";
        passlg.style.border = '1px solid green';
        msgpass.innerHTML="";
        msgboth.innerHTML="";
    }
    
})

function validate(){
    if (userlg.value.length == 0){
        return false; 
    }
    if(passlg.value.length == 0){
        return false; 
    }
    else {
        return true;
    }
}