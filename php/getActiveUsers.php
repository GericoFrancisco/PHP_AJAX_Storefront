<?php
session_start();
$username = $_SESSION['username'];
// $username = $_GET['username'];

$xml = new DOMDocument();
$xml->load("../XML/users.xml");

$users = $xml->getElementsByTagName("user");

$html = "";

foreach ($users as $user){
    $usn = $user->getAttribute("username");
    if($usn != $username){
        $status = $user->getElementsByTagName("status")[0]->nodeValue;
        if($status == "online"){
            $name = $user->getElementsByTagName("firstName")[0]->nodeValue . " " .$user->getElementsByTagName("lastName")[0]->nodeValue;
            $html .= "<li class='active-user' onclick='openChat(\"$usn\", \"$name\")'>$name</li> <hr>";
        }
    }
}

if($html == "") $html = "<li class='active-user'>No one seems to be online.</li>";

echo $html;