d = document

//function for showing registration form
/*function showRegistrationForm(){   
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            // document.getElementById("registration-form").style.display = "block";
            d.getElementById("registration-form").innerHTML = xhr.responseText;        
        }
    }
    xhr.open("GET", "php/showRegistration.php", true);
    xhr.send();
}*/

//function for showing forgot password form
function showForgotPasswordForm(){   
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            // document.getElementById("registration-form").style.display = "block";
            d.getElementById("forgotpass-form").innerHTML = xhr.responseText;        
        }
    }
    xhr.open("GET", "php/showForgotPassword.php", true);
    xhr.send();
}

// function closeRegistrationForm(){
//     document.getElementById("reg-container").classList.remove("open-reg-modal");
//     document.getElementById("reg-container").classList.add("close-reg-modal");
//     // document.getElementById("registration-form").style.display = "none";
// }

// function openRegModal() {
//     document.getElementById("reg-container").classList.remove("close-reg-modal");
//     document.getElementById("reg-container").classList.add("open-reg-modal");
// }*/

function closeForgotForm(){
    document.getElementById("forgot-container").classList.remove("open-forgot-modal");
    document.getElementById("forgot-container").classList.add("close-forgot-modal");
    // document.getElementById("registration-form").style.display = "none";
}

function openForgotModal() {
    document.getElementById("forgot-container").classList.remove("close-forgot-modal");
    document.getElementById("forgot-container").classList.add("open-forgot-modal");
}

$(function(){
    $('#sign-up').click(function(){
             $('.login-form-container').hide();
             $('#registration-form').show();
             return false;
    });
    $('#sign-in').click(function(){
        $('#registration-form').hide();
        $('.login-form-container').show();
        // $('.captcha-container').show();
        return false;
    });
        
});

d.getElementById("login-form").addEventListener("submit",login);

function showPass() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }


const changeTextBtn = document.querySelector('.changeText') ;
const changeTextBtn2 = document.querySelector('.changeText2') ;
const readTextBtn = document.querySelector('.readText') ;
const code = document.querySelector('#code') ;
const code_ = document.querySelector('#code_') ;
const input = document.getElementById('captcha_input_1') ;
const input2 = document.getElementById('captcha_input_2') ;

const submitBtn = document.querySelector('#button') ;

changeTextBtn.addEventListener('click' , () => {
    code.textContent = createCaptcha() ;
}) ;
changeTextBtn2.addEventListener('click' , () => {
    code_.textContent = createCaptcha() ;
}) ;
window.addEventListener('load' , () => {
    code.textContent = createCaptcha() ;
}) ;
window.addEventListener('load' , () => {
    code_.textContent = createCaptcha() ;
}) ;

function createCaptcha()  {
    let letters = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
    'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z', '0','1','2','3','4','5','6','7','8','9'];
    let a = letters[Math.floor(Math.random() * letters.length)] ;
    let b = letters[Math.floor(Math.random() * letters.length)] ;
    let c = letters[Math.floor(Math.random() * letters.length)] ;
    let d = letters[Math.floor(Math.random() * letters.length)] ;
    let e = letters[Math.floor(Math.random() * letters.length)] ;
    let f = letters[Math.floor(Math.random() * letters.length)] ;
    let g = letters[Math.floor(Math.random() * letters.length)] ;
    let code = a + b + c + d + e + f + g ;
    return code ;
} 
 
readTextBtn.addEventListener('click', () => {
    let text = code.textContent ;
    responsiveVoice.speak(text,{rate:0.8});
})

function login(e){
    e.preventDefault();

    var user = d.getElementById("user").value;
    var password = d.getElementById("password").value;

    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            if(xhr.responseText == "true"){
                // submitBtn.addEventListener('click',() => {
                    let val = input.value ;
                    if(val == '') {
                        alert('Please Enter The code') ;
                        // login("none");
                    }
                    else if(val === code.textContent) {
                        // alert('Valid input') ;
                        window.location = "home.php";
                    }
                    else {
                        alert('invalid input !') ;
                        // login("incorrect");
                    }
                // })
                
            }else if(xhr.responseText == "false"){
                //needs sweet alert
                alert("Incorrect");
            }
        }
    }
    xhr.open("GET", "php/account-login.php?usn="+user+"&password="+password, true);
    xhr.send();
}

function register(e){
    // e.preventDefault();
    var username = d.getElementById("reg_username").value;
    var password = d.getElementById("reg_password").value;
    var conpassword = d.getElementById("conpassword").value;

    if(password == conpassword){
        xhr = new XMLHttpRequest();  
        xhr.onreadystatechange = () =>{    
            if(xhr.readyState == 4 && xhr.status == 200){
                
                let val = input2.value ;
                if(val == '') {
                    alert('Please Enter The code') ;
                }
                else if(val === code_.textContent) {
                    // alert('Valid input') ;
                    if(xhr.responseText == "unused") {
                        saveAccount();
                    }
                    else if(xhr.responseText == "taken"){
                        //needs sweet alert
                        alert("Username already taken");
                    }
                }
                else {
                    alert('invalid input !') ;
                    // login("incorrect");
                }
                
            }
        }
        xhr.open("GET", "php/checkAccount.php?username="+username, true);
        xhr.send();
    }else{
        //needs sweet alert
        alert("Passwords do not match!");
    }
}

function saveAccount(){
    var username = d.getElementById("reg_username").value;
    var password = d.getElementById("reg_password").value;
    var fname = d.getElementById("firstName").value;
    var lname = d.getElementById("lastName").value;
    var email = d.getElementById("reg_email").value;
    var q = d.getElementById("questions").getElementsByTagName("select");
    var question = q[0].value;
    var answer = d.getElementById("answer").value;

    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            //needs sweet alert
            alert(xhr.responseText); 
            /** */
            $('#registration-form').hide();
            $('.login-form-container').show();
            // closeRegistrationForm();    
        }
    }
    xhr.open("POST", "php/account-register.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("username="+username+"&password="+password+"&fname="+fname+"&lname="+lname+"&email="+email+"&question="+question+"&answer="+answer);
}

function checkUSN(){
    var usn = d.getElementById("forgot_user").value;
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            if(xhr.responseText == "true"){
                showSecretQuestions(usn);
            }else{
                //needs sweet alert 
                alert("Username does not exist!");
                closeForgotForm();
            }     
        }
    }
    xhr.open("GET", "php/checkUSN.php?username="+usn, true);
    xhr.send();
}

function showSecretQuestions(username){
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            d.getElementById("forgotpass-form").innerHTML = xhr.responseText;  
        }
    }
    xhr.open("GET", "php/showSecretQuestion.php?username="+username, true);
    xhr.send();
}

function checkAnswer(){
    var answer = d.getElementById("forgot_answer").value;
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            console.log(xhr.responseText)
            if(xhr.responseText == "correct") {
                showChangePass();
            }else if(xhr.responseText == "wrong"){
                alert("Incorrect answer!");
            }
        }
    }
    xhr.open("GET", "php/checkAnswer.php?answer="+answer, true);
    xhr.send();
}

function showChangePass(){
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            console.log("you are now in show change password");
            d.getElementById("forgotpass-form").innerHTML = xhr.responseText;        
        }
    }
    xhr.open("GET", "php/showChangePassword.php", true);
    xhr.send();
}

function changePassword(){
    var password = d.getElementById("changepassword").value;
    var conpassword = d.getElementById("changeconpassword").value;

    if(conpassword == password){
        xml = new XMLHttpRequest();  
        xml.onreadystatechange = () =>{    
            if(xml.readyState == 4 && xml.status == 200){
                console.log(xml.responseText);
                if(xml.responseText == "success"){
                    //needs sweet alert
                    alert("Password changed successfully");
                    closeForgotForm();
                }    
            }
        }
        xml.open("GET", "php/changePassword.php?password="+password, true);
        xml.send();
    }
    else{
        //needs sweet alert
        alert("Passwords do not match!");
    }
}


