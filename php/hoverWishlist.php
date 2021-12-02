<?php
session_start();
$activeUser = $_SESSION['username'];
$xml = new DOMDocument();
$xml->load("../XML/wishlist.xml");

$items = $xml->getElementsByTagName("wishlist");

$html = "";

foreach ($items as $item){
    $user = $item->getAttribute("username");
    if($user == $activeUser){
        $name = $item->getElementsByTagName("itemName")[0]->nodeValue;
        $color = $item->getElementsByTagName("itemColor")[0]->nodeValue;
        $size = $item->getElementsByTagName("itemSize")[0]->nodeValue;
        $price = $item->getElementsByTagName("itemPrice")[0]->nodeValue;
        $desc = $item->getElementsByTagName("itemDescription")[0]->nodeValue;
        $img = $item->getElementsByTagName("itemImage")[0]->nodeValue;
    
        $code = $item->getAttribute("productCode");
        // $id = substr($code,0,5);
    
        $html .= "<div class='wishlist-product-container'>
        <div class='wishlist-product-img-container'>
            <img src='$img'>
        </div>
        <div class='wishlist-product-desc-container'>
            <h5 class='wishlist-prod-name'>$name - ($color)</h5>
            <h6 class='wishlist-prod-desc'>$desc</h6>
            <h6 class='wishlist-prod-price'>PHP $price</h6>
        </div>
    </div>";
    }
}

if(count($items) == 0){
    $html .= "<a href='shop.php' class='view-prod-link'>Click here to view our products.</a>";
}
$html.= "<div class='go-to-wishlist'><a href='wishlist.php'>Go to Wish List</a></div>";
echo $html;
