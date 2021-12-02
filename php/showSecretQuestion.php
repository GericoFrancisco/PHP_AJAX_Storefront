<?php

$username = $_GET['username'];

$xml = new DOMDocument();
$xml->load("../XML/users.xml");

$users = $xml->getElementsByTagName("user");

$html = "";

foreach ($users as $user){
    $usn = $user->getAttribute("username");
    if($usn == $username) {
        $value = $user->getElementsByTagName("question")[0]->nodeValue;
        switch($value){
            case 1:
                $question = "What primary school did you attend?";
                break;
            case 2:
                $question = "In what town or city did your parents meet?";
                break;
            case 3:
                $question = "What is your grandmother's maiden name?";
                break;
            case 4:
                $question = "In what town or city was your first full time job?";
                break;
            case 5:
                $question = "What was the house number and street name you lived in as a child?";
                break;
        }
        $html .= 
        "<div class= form-close>
             <label id='close-form' class='close-btn' onclick='closeForgotForm(); return false'>&times;</label>
        </div>
        <div class='forgot-title'>
            <label id='form-label'>SECURITY QUESTION</label>
        </div>
        <form id ='forgot-form'>
        <div class='username-cont'>
            <label>$question</label><br><br>
            <label>Your answer: </label>
            <input type='text' class='forgot-text-input' name='answer' id='forgot_answer' autocomplete = 'off'>
        </div>
            <input type='button' value='Submit' name='Register' id='button' class='forgot-submit-btn' onclick='checkAnswer();'>
        </form>"
        ;
        break;
    }
}


echo $html;