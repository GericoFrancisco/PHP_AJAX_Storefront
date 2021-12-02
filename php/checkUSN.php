<?php
session_start();
$username = $_GET['username'];
$_SESSION['check_username'] = $username;

$xml = new DOMDocument();
$xml->load("../XML/users.xml");

$users = $xml->getElementsByTagName("user");

$response = "false";
foreach ($users as $user){
    $usn = $user->getAttribute("username");
    if($usn == $username) $response = "true";
}
echo $response;