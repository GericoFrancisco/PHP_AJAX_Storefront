<?php
session_start();
if(isset($_SESSION['username'])){
    header("Location: home.php");
}
?>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <script
            src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>
        <script src="js/navbarScript.js"></script>
        <style>
            .captcha-container{
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="main-container">
            <div class="login-container">
                <div class="login-form-container">
                    <div class="login-logo-container">
                        <img src="img/logo1.png"></img>
                    </div>
                    <form id="login-form">
                        <div class="username-container">
                            <label class="username-label">Username</label>
                            <input type="text" class="text-input" name="user" id="user" autocomplete = 'off'>
                        </div>
                        <div class="password-container">
                            <label class="password-label">Password</label>
                            <input type="password" class="text-input" name="password" id="password" autocomplete = 'off'>
                            <div class="forgot-pass">
                                <a href="#" onclick="openForgotModal();showForgotPasswordForm(); return false">Forgot Password?</a>
                            </div>
                            <!-- Password checkbox -->
                            <input type="checkbox" onclick="showPass()"><label for="checkbox"> Show Password</label>
                        </div>
                        <div class="captcha-container">
                            <div class="header">Security Check</div>
                            <div class="securityCode">
                                <p id="code" onmousedown='return false;' onselectstart='return false;'></p>
                                <div class="icons">
                                    <span class="readText">
                                        <i class="fas fa-headphones"></i>
                                    </span>
                                    <span class="changeText">
                                        <i class="fas fa-sync-alt"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="userInput">
                                <input type="text" id="captcha_input_1" placeholder="Type the text here" >
                                <!-- <button type="submit" class="btn">Submit</button> -->
                            </div>
                    </div>
                        <input type="submit" value="Login" name="login" id = "button" class="login-btn">
                    </form>
                    <div class="register-link-container">
                        <label class="sign-up-label">Don't have an account? <a href="#" id="sign-up">Sign up</a></label>
                    </div>
                </div>
                

                <div class="registration-form" id="registration-form">
                    <div class="login-logo-container">
                        <img src="img/logo1.png"></img>
                    </div>
                    <form id ='reg-form'>
                        <div class='username-cont'>
                            <label>Username: </label>
                            <input type='text' class='reg-text-input' name='username' id='reg_username' autocomplete = 'off'>
                        </div>
                        <div class='reg-password-container'>
                            <div class='pass-cont'>
                                <label>Password: </label>
                                <input type='password' class='reg-text-input' name='password' id='reg_password'>
                            </div>
                            <div class='confirm-pass-cont'>
                                <label>Confirm Password: </label>
                                <input type='password' class='reg-text-input' name='cpassword' id='conpassword'>
                            </div>
                        </div>
                        <div class='name-container'>
                            <div class='firstname-cont'>
                                <label>First Name: </label>
                                <input type='text' class='reg-text-input' name='firstName' id='firstName' autocomplete = 'off'>
                            </div>
                            <div class='lastname-cont'>
                                <label>Last Name: </label>
                                <input type='text' class='reg-text-input' name='lastName' id='lastName' autocomplete = 'off'>
                            </div>
                        </div>
                        
                        <div class='email-cont'>
                            <label>Email Address</label>
                            <input type='text' class='reg-text-input' name='email' id='reg_email' autocomplete = 'off'>
                        </div>
                        <div class='security-cont' id='questions'>
                            <label for='sec-question'>Choose a Security Question</label>
                            <select id='sec-question' name='sec-question' class='reg-text-input'>
                                <option value='1'>What primary school did you attend?</option>
                                <option value='2'>In what town or city did your parents meet?</option>
                                <option value='3'>What is your grandmother's maiden name?</option>
                                <option value='4'>In what town or city was your first full time job?</option>
                                <option value='5'>What was the house number and street name you lived in as a child?</option>
                            </select>
                        </div>
                        <div class='answer-cont'>
                            <label>Answer</label>
                            <input type='text' class='reg-text-input' name='answer' id='answer' autocomplete = 'off'>
                        </div>
                        <div class='captcha-cont'>
                            <label>Captcha</label>
                            <div class="captcha-container">
                                <div class="header">Security Check</div>
                                <div class="securityCode">
                                    <p id="code_" onmousedown='return false;' onselectstart='return false;'></p>
                                    <div class="icons">
                                        <span class="readText">
                                            <i class="fas fa-headphones"></i>
                                        </span>
                                        <span class="changeText2">
                                            <i class="fas fa-sync-alt"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="userInput">
                                    <input type="text" id="captcha_input_2" placeholder="Type the text here" >
                                    <!-- <button type="submit" class="btn">Submit</button> -->
                                </div>
                            </div>
                        </div>
                        <input type='button' value='Submit' name='Register' id='button_login' class='register-btn'  onclick='register();'>
                    </form>
                    <div class="register-link-container">
                        <label class="sign-up-label">Already have an account? <a href="#" id="sign-in">Sign in</a></label>
                    </div>
                </div>
            </div>
            <div class="login-img-container">
                <img src="img/image.jpg"></img>
            </div>
            <div id="forgot-container" class="forgot-container close-reg-modal">
                <div class="forgotpass-form" id="forgotpass-form">
                    
                </div>
            </div>
        </div>
    </body>
    <script src ="js/login.js"></script>
    <!-- <script src ="js/captcha.js"></script> -->
</html>