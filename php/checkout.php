<?php
session_start();
$username = $_SESSION['username'];

date_default_timezone_set("Asia/Manila");

$dateTime = date("Y/m/d h:i:sa");

$cart = new DOMDocument();
$cart->load("../XML/cart.xml");

$items = $cart->getElementsByTagName("cart-item");




if(count($items) > 0){

    $purchased = [];
    foreach ($items as $item){
        $usn = $item->getAttribute("username");
        if($usn == $username){
            array_push($purchased, $item);
            
        }
    }
    

    
    
    
    $xml = new DOMDocument();
    $xml->load("../XML/history.xml");   
    
$str ="";
    foreach ($purchased as $p){
        $cart->getElementsByTagName("cart-items")[0]->removeChild($p);
    $cart->save("../XMl/cart.xml");
        $name = $p->getElementsByTagName("itemName")[0]->nodeValue;
        $price = $p->getElementsByTagName("itemPrice")[0]->nodeValue;
        $qty = $p->getElementsByTagName("itemQty")[0]->nodeValue;
        $color = $p->getElementsByTagName("itemColor")[0]->nodeValue;
        $size = $p->getElementsByTagName("itemSize")[0]->nodeValue;
        $img = $p->getElementsByTagName("itemImage")[0]->nodeValue;
    
        $str .= $name."\n";
    
        $purchase = $xml->createElement("purchases");
        $purchase->setAttribute("username", $username);
        $purchase->appendChild($xml->createElement("itemName", $name));
        $purchase->appendChild($xml->createElement("itemPrice", $price));
        $purchase->appendChild($xml->createElement("itemQty", $qty));
        $purchase->appendChild($xml->createElement("itemColor", $color));
        $purchase->appendChild($xml->createElement("itemSize", $size));
        $purchase->appendChild($xml->createElement("itemImage", $img));
        $purchase->appendChild($xml->createElement("dateTime", $dateTime));
    
        $xml->getElementsByTagName("purchases")[0]->appendChild($purchase);
        $xml->save("../XMl/history.xml");
    }
    // echo $str;
    echo "save";
}else{
    echo "empty";
}
