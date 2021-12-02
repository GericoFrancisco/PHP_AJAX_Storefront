<?php
echo "
<div class= form-close>
    <label id='close-form' class='close-btn' onclick='closeForgotForm(); return false'>&times;</label>
</div>
<div class='forgot-title'>
    <label id='form-label'>CHANGE PASSWORD</label><br>
</div>
<form id ='change-pass-form'>
<div class='pass-cont'>
         <label>New Password: </label>
         <input type='password' class='forgot-text-input' id='changepassword' name='password'>
     </div>
     <div class='confirm-pass-cont'>
         <label>Confirm Password: </label>
         <input type='password' class='forgot-text-input' id='changeconpassword' name='cpassword'>
     </div>
    
    <input type='button' value='Submit' name='Register' id='changePasswordButton' class='forgot-submit-btn' onclick='changePassword();'>
</form>";