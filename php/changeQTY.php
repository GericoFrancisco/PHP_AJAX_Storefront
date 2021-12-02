<?php
session_start();
$usn = $_SESSION['username'];
$code = $_GET['code'];
$qty = $_GET['QTY'];

$xml = new DOMDocument();
$xml->load("../XML/cart.xml");

$items = $xml->getElementsByTagName("cart-item");

foreach ($items as $item){
    $itemCode = $item->getAttribute("productCode");
    $username = $item->getAttribute("username");


    if($itemCode == $code && $usn == $username){

        $itemName = $item->getElementsByTagName("itemName")[0]->nodeValue;
        $itemPrice = $item->getElementsByTagName("itemPrice")[0]->nodeValue;
        // $itemQty = $item->getElementsByTagName("itemQty")[0]->nodeValue;
        $itemColor = $item->getElementsByTagName("itemColor")[0]->nodeValue;
        $itemSize = $item->getElementsByTagName("itemSize")[0]->nodeValue;
        $itemImage = $item->getElementsByTagName("itemImage")[0]->nodeValue;
        // echo $itemName;
        // break;

        $updated = $xml->createElement("cart-item");
        $updated->setAttribute("productCode", $code);
        $updated->setAttribute("username", $usn);
        $updated->append($xml->createElement("itemName", $itemName));
        $updated->append($xml->createElement("itemPrice", $itemPrice));
        $updated->append($xml->createElement("itemQty", $qty));
        $updated->append($xml->createElement("itemColor", $itemColor));
        $updated->append($xml->createElement("itemSize", $itemSize));
        $updated->append($xml->createElement("itemImage", $itemImage));

        $xml->getElementsByTagName("cart-items")[0]->replaceChild($updated, $item);
        $xml->save("../XML/cart.xml");
        echo "saved";
    }
}