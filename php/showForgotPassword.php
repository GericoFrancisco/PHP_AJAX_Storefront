<?php
echo "
<div class= form-close>
    <label id='close-form' class='close-btn' onclick='closeForgotForm(); return false'>&times;</label>
</div>
<div class='forgot-title'>
    <label id='form-label'>FORGOT PASSWORD</label>
</div>
<form id ='forgot-form'>
    <div class='username-cont'>
        <label>Username: </label>
        <input type='text' class='forgot-text-input' name='username' id='forgot_user' autocomplete = 'off'>
    </div>
    
    <input type='button' value='Submit' name='Register' id='button' class='forgot-submit-btn' onclick='checkUSN();'>
</form>";

// <div class='security-cont'>
//         <label>Choose a Security Question (dropdown dito)</label>
//         <input type='text' class='forgot-text-input' name='questions' id='sec-question' autocomplete = 'off'>
//     </div>
//     <div class='answer-cont'>
//         <label>Answer</label>
//         <input type='text' class='forgot-text-input' name='answer' autocomplete = 'off'>
//     </div>
//     <div class='pass-cont'>
//         <label>New Password: </label>
//         <input type='password' class='forgot-text-input' name='password'>
//     </div>
//     <div class='confirm-pass-cont'>
//         <label>Confirm Password: </label>
//         <input type='password' class='forgot-text-input' name='cpassword'>
//     </div>