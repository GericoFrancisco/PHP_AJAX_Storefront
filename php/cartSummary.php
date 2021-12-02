<?php
session_start();

$username = $_SESSION['username'];
$xml = new DOMDocument();
$xml->load('../XML/cart.xml');

$items = $xml->getElementsByTagName('cart-item');

$html = "<ul>";
$total = 0;
foreach ($items as $item){
    $usn = $item->getAttribute('username');
    if($username == $usn){
        $itemName = $item->getElementsByTagName("itemName")[0]->nodeValue;
        $itemPrice = $item->getElementsByTagName("itemPrice")[0]->nodeValue;
        $itemQty = $item->getElementsByTagName("itemQty")[0]->nodeValue;
    
        $price = $itemPrice * $itemQty;
    
        $total += $price;
    
        $html .= "<li><span>$itemName</span><span>PHP $price</span></li>";
    }

}
if(count($items) == 0){
    $html .= "<li><span>Item Name</span><span>PHP 0</span></li>";
    $_SESSION["total-price"] = 0;
}else{
    $vat = $total * 0.12;
    $total += $vat;
    $html .= "<li><span>VAT(12%)</span><span>PHP $vat</span></li>";
    $html .= "<li><span>Shipping Fee</span><span>Free</span></li></ul>";
    $_SESSION["total-price"] = $total;
}
echo $html;