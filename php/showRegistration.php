<?php
echo "
<div class= form-close><label id='close-form' class='close-btn' onclick='closeRegistrationForm(); return false'>&times;</label></div>
<div class='reg-logo-container'>
    <img src='img/logo.png'></img>
</div>
<div class='register-title'><label id='form-label'>SIGN UP</label></div>
<form id ='reg-form'>
    <div class='username-cont'>
        <label>Username: </label>
        <input type='text' class='reg-text-input' name='username' id='reg_username' autocomplete = 'off'>
    </div>
    <div class='pass-cont'>
        <label>Password: </label>
        <input type='password' class='reg-text-input' name='password' id='reg_password'>
    </div>
    <div class='confirm-pass-cont'>
        <label>Confirm Password: </label>
        <input type='password' class='reg-text-input' name='cpassword' id='conpassword'>
    </div>
    <div class='username-cont'>
        <label>First Name: </label>
        <input type='text' class='reg-text-input' name='firstName' id='firstName' autocomplete = 'off'>
    </div>
    <div class='username-cont'>
        <label>Last Name: </label>
        <input type='text' class='reg-text-input' name='lastName' id='lastName' autocomplete = 'off'>
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
    </div>
    <input type='button' value='Submit' name='Register' id='button' class='register-btn'  onclick='register();'>
</form>";