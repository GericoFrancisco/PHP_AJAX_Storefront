<?php
session_start();
$username = $_SESSION['check_username'];

$password = $_GET['password'];

$xml = new DOMDocument();
$xml->load("../XML/users.xml");

$users = $xml->getElementsByTagName("user");

foreach ($users as $user){
    // user username="admin" password="password"><firstName>admin</firstName><lastName>admin</lastName><email>samples@example.com</email><question>1</question><answer>sample school</answer><status>offline</status></user>

    $usn = $user->getAttribute("username");
    if($username == $usn){
        $fname = $user->getElementsByTagName("firstName")[0]->nodeValue;
        $lname = $user->getElementsByTagName("lastName")[0]->nodeValue;
        $email = $user->getElementsByTagName("email")[0]->nodeValue;
        $question = $user->getElementsByTagName("question")[0]->nodeValue;
        $answer = $user->getElementsByTagName("answer")[0]->nodeValue;

        $new_user = $xml->createElement("user");
        $new_user->setAttribute("username", $usn);
        $new_user->setAttribute("password", $password);
        $new_user->appendChild($xml->createElement("firstName", $fname));
        $new_user->appendChild($xml->createElement("lastName", $lname));
        $new_user->appendChild($xml->createElement("email", $email));
        $new_user->appendChild($xml->createElement("question", $question));
        $new_user->appendChild($xml->createElement("answer", $answer));
        $new_user->appendChild($xml->createElement("status", "offline"));

        $xml->getElementsByTagName("users")[0]->replaceChild($new_user, $user);
        $xml->save("../XML/users.xml");
        echo "success";
        break;
        
    }
}