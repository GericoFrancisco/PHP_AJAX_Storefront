<?php
session_start();
$username = $_GET['usn'];
$password = $_GET['password'];

$xml = new DOMDocument();
$xml->load('../XML/users.xml');

$users = $xml->getElementsByTagName('user');

$response = "";

foreach ($users as $user){
    $userUSN = $user->getAttribute('username');
    $userPW = $user->getAttribute('password');

    if(($userUSN == $username) && ($userPW == $password)){
        $_SESSION['name'] = $user->getElementsByTagName('firstName')[0]->nodeValue." ".$user->getElementsByTagName('lastName')[0]->nodeValue;
        $_SESSION['username'] = $username;
        $response = "true";
        setOnline();    
        break;
    }else{
        $response = "false";
    }
}
echo $response;

function setOnline(){
    $username = $_GET['usn'];

    $xml = new DOMDocument();
    $xml->load('../XML/users.xml');

    $users = $xml->getElementsByTagName('user');

    foreach($users as $user){
        $usn = $user->getAttribute('username');
        if($usn == $username){
            // echo "helllllooooooooooooo";
            $password = $user->getAttribute('password');
            $fname = $user->getElementsByTagName('firstName')[0]->nodeValue;
            $lname = $user->getElementsByTagName('lastName')[0]->nodeValue;
            $email = $user->getElementsByTagName('email')[0]->nodeValue;
            $question = $user->getElementsByTagName('question')[0]->nodeValue;
            $answer = $user->getElementsByTagName('answer')[0]->nodeValue;

            $newUser = $xml->createElement('user');
            $newUser->setAttribute('username', $usn);
            $newUser->setAttribute('password', $password);
            $newUser->appendChild($xml->createElement("firstName",$fname));
            $newUser->appendChild($xml->createElement("lastName",$lname));
            $newUser->appendChild($xml->createElement("email",$email));
            $newUser->appendChild($xml->createElement("question",$question));
            $newUser->appendChild($xml->createElement("answer",$answer));
            $newUser->appendChild($xml->createElement("status","online"));

            $xml->getElementsByTagName("users")[0]->replaceChild($newUser, $user);
            $xml->save("../XML/users.xml");
            break;
        }
    }
}