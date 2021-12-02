<?php
session_start();
$sender = $_SESSION['username'];
// $sender = $_GET['sender'];
$receiver = $_GET['receiver'];
$messageBody = $_GET['message'];

date_default_timezone_set("Asia/Manila");

$dateTime = date("Y/m/d h:i:sa");

$xml = new DOMDocument();
$xml->load("../XML/messages.xml");

$message = $xml->createElement("message");
$message->setAttribute("sender", $sender);
$message->setAttribute("receiver", $receiver);
$message->appendChild($xml->createElement("messageBody", $messageBody));
$message->appendChild($xml->createElement("dateTime", $dateTime));

$xml->getElementsByTagName("messages")[0]->appendChild($message);
$xml->save("../XML/messages.xml");
// echo "saved";