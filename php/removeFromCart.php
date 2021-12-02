<?php
session_start();
$activeUser = $_SESSION['username'];
$xml = new DOMDocument();
$xml->load("../XML/cart.xml");

$productCode = $_GET["productCode"];

$items = $xml->getElementsByTagName("cart-item");

foreach ($items as $item){
    $code = $item->getAttribute("productCode");
    $user = $item->getAttribute("username");
    if($code == $productCode && $user == $activeUser){
        $xml->getElementsByTagName("cart-items")[0]->removeChild($item);
        $xml->save("../XML/cart.xml");
        break;
    }
}