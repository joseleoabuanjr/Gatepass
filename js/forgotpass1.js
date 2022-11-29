var btn1 = document.querySelector('#submitbut');
var pass1 = document.querySelector('#pass1');
var cpass1 = document.querySelector('#cpass');

var msg1 = document.querySelector('#message1');
var msg2 = document.querySelector('#message2');

btn1.addEventListener('click', function(){
    if (pass1.value == ""){
        pass1.style.border = '1px solid red';
        msg1.innerHTML="Please enter password";
        return false; 
    }
    else if(pass1.value.length < 4){
        pass1.style.border = '1px solid red';
        msg1.innerHTML="Password must be at least 4 characters";
        if(cpass1.value.match(pass1.value)){
            cpass1.style.border = '1px solid green';
            msg2.innerHTML="";
            return false;
        }
        else {
            cpass1.style.border = '1px solid red';
            msg2.innerHTML="Password not match";
            return false; 
        }
    }
    else {
        pass1.style.border = '1px solid green';
        msg1.innerHTML="";
    }
})
btn1.addEventListener('click', function(){
    if (cpass1.value == ""){
        cpass1.style.border = '1px solid red';
        msg2.innerHTML="Please enter confirm password";
        return false; 
    }
    else if (pass1.value.length != cpass1.value.length){
        cpass1.style.border = '1px solid red';
        msg2.innerHTML="Password not match";
        return false; 
    }
    else if(cpass1.value.match(pass1.value)){
        cpass1.style.border = '1px solid green';
        msg2.innerHTML="";
    }
    else {
        cpass1.style.border = '1px solid red';
        msg2.innerHTML="Password not match";
        return false; 
    }
})


pass1.addEventListener('keyup', function(){
    if (pass1.value.length == 0){
        pass1.style.border = '1px solid red';
        msg1.innerHTML="Please enter password";
        return false; 
    }
    else if(pass1.value.length < 4){
        pass1.style.border = '1px solid red';
        msg1.innerHTML="Password must be at least 4 characters";
        if(cpass1.value.match(pass1.value)){
            cpass1.style.border = '1px solid green';
            msg2.innerHTML="";
        }
        else {
            cpass1.style.border = '1px solid red';
            msg2.innerHTML="Password not match";
            return false; 
        }
    }
    else {
        pass1.style.border = '1px solid green';
        msg1.innerHTML="";
        if(cpass1.value.match(pass1.value)){
            cpass1.style.border = '1px solid green';
            msg2.innerHTML="";
        }
        else {
            cpass1.style.border = '1px solid red';
            msg2.innerHTML="Password not match";
            return false; 
        }
    }
})
cpass1.addEventListener('keyup', function(){
    if (cpass1.value.length == 0){
        cpass1.style.border = '1px solid red';
        msg2.innerHTML="Password not match";
        return false; 
    }
    else if (pass1.value.length == 0){
        cpass1.style.border = '1px solid red';
        msg2.innerHTML="Password not match";
        return false; 
    }
    else if (pass1.value.length != cpass1.value.length){
        cpass1.style.border = '1px solid red';
        msg2.innerHTML="Password not match";
        return false; 
    }
    else if(cpass1.value.match(pass1.value)){
        cpass1.style.border = '1px solid green';
        msg2.innerHTML="";
    }
    else {
        cpass1.style.border = '1px solid red';
        msg2.innerHTML="Password not match";
        return false; 
    }
})


function toCheck(){

    if(pass1.value.length == 0 || pass1.value.length < 4) {
        return false; 
    }
    else if(cpass1.value.length == 0 || cpass1.value.length < 4) {
        return false; 
    } 
    else if(!(cpass1.value.match(pass1.value))) {
        return false; 
    }

    else if (pass1.value.length != cpass1.value.length){
        return false;
    }
    else {
        return true;
    }  
}