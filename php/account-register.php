<?php
$username = $_POST['username'];
$password = $_POST['password'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$question = $_POST['question'];
$answer = $_POST['answer'];

$xml = new DOMDocument();
$xml->load("../XML/users.xml");
$status = "offline";

$user = $xml->createElement("user");
$fname = $xml->createElement("firstName",$fname);
$lname = $xml->createElement("lastName",$lname);
$email = $xml->createElement("email",$email);
$question = $xml->createElement("question",$question);
$answer = $xml->createElement("answer",$answer);
$status = $xml->createElement("status",$status);

$user->setAttribute("username", $username);
$user->setAttribute("password", $password);
$user->appendChild($fname);
$user->appendChild($lname);
$user->appendChild($status);
$user->appendChild($email);
$user->appendChild($question);
$user->appendChild($answer);

$xml->getElementsByTagName("users")[0]->appendChild($user);
$xml->save("../XML/users.xml");
echo "Account created successfully!";