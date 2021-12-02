<?php

session_start();
$username = $_SESSION['check_username'];

$answer = $_GET['answer'];

$xml = new DOMDocument();
$xml->load("../XML/users.xml");

$users = $xml->getElementsByTagName("user");

$response = "";

foreach ($users as $user){
    $usn = $user->getAttribute("username");

    if($username == $usn){
        $user_answer = $user->getElementsByTagName("answer")[0]->nodeValue;
        if($answer == $user_answer){
            $response = "correct";
        }else{
            $response = "wrong";
        }
        break;
    }
}

echo $response;