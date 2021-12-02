<?php
session_start();
$sender = $_SESSION['username'];
// $sender = $_GET['sender'];
$receiver = $_GET['receiver'];

$xml = new DOMDocument();
$xml->load("../XML/messages.xml");

$messages = $xml->getElementsByTagName("message");

$response = "";

foreach ($messages as $message){
    $rcvr = $message->getAttribute("receiver");
    $sndr = $message->getAttribute("sender");
    $msgText = $message->getElementsByTagName("messageBody")[0]->nodeValue;
    $dateTime = $message->getElementsByTagName("dateTime")[0]->nodeValue;
    $msgDateTime = substr($dateTime, 11, 5) . " " . substr($dateTime,19,2);
    if($rcvr == $receiver && $sndr == $sender){
        $response .= "<div class='sender'>" . $msgText . "<br><br><div class='dateTime'>" . $msgDateTime. "</div></div>";
    }
    if($sndr == $receiver && $rcvr == $sender){
        $response .= "<div class='receiver'>" . $msgText . "<br><br><div class='dateTime'>" . $msgDateTime. "</div></div>";
    }
}

echo $response;