<?php
$check = $_GET["username"];

$xml = new DOMDocument();
$xml->load("../XML/users.xml");

$users = $xml->getElementsByTagName("user");

$usernames = [];

foreach ($users as $user){
    array_push($usernames,$user->getAttribute("username"));
}

$response = "unused";
if(count($usernames) > 0){
    if(in_array($check, $usernames)){
        $response = "taken";
    }
}

echo $response;