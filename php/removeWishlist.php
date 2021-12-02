<?php
session_start();
$activeUser = $_SESSION['username'];
$xml = new DOMDocument();
$xml->load("../XML/wishlist.xml");

$productCode = $_GET["productCode"];

$items = $xml->getElementsByTagName("wishlist");

foreach ($items as $item){
    $code = $item->getAttribute("productCode");
    echo $code . "\n";
    $user = $item->getAttribute("username");
    if($code == $productCode && $user == $activeUser){
        $xml->getElementsByTagName("wishlists")[0]->removeChild($item);
        $xml->save("../XML/wishlist.xml");
        break;
    }
}