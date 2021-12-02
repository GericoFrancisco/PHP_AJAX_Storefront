<?php
session_start();
unset($_SESSION['username']);
session_destroy();

$username = $_GET['username'];

$xml = new DOMDocument();
$xml->load('../XML/users.xml');

$users = $xml->getElementsByTagName('user');

foreach($users as $user){
        $usn = $user->getAttribute('username');
        if($usn == $username){
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
                $newUser->appendChild($xml->createElement("status","offline"));
        
                $xml->getElementsByTagName("users")[0]->replaceChild($newUser, $user);
                $xml->save("../XML/users.xml");
                break;
    }
}
echo $username;