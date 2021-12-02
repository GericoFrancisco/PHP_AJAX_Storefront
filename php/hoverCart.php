<?php
session_start();
$activeUser = $_SESSION['username'];
$xml = new DOMDocument();
$xml->load('../XML/cart.xml');

$items = $xml->getElementsByTagName('cart-item');

$html = "";

foreach ($items as $item){
    $user = $item->getAttribute("username");
    if($user == $activeUser){
        $code = $item->getAttribute('productCode');
        $name = $item->getElementsByTagName('itemName')[0]->nodeValue;
        $price = $item->getElementsByTagName('itemPrice')[0]->nodeValue;
        $qty = $item->getElementsByTagName('itemQty')[0]->nodeValue;
        $color = $item->getElementsByTagName('itemColor')[0]->nodeValue;
        $size = $item->getElementsByTagName('itemSize')[0]->nodeValue;
        $img = $item->getElementsByTagName('itemImage')[0]->nodeValue;
    
        
        
        $total = $qty * $price;
        
        $html .= "<div class='product-container'>
        <div class='product-img-container'>
        <img src='$img'>
        </div>
        <div class='product-desc-container'>
        <h5>$name - ($color)</h5>
        <h6>PHP $price</h6>
        </div>
    </div>";
    }
}

if(count($items) == 0){
    $html .= "<a href='shop.php' class='view-prod-link'>Click here to view our products.</a>";
}
$html.= "<div class='go-to-cart'><a href='cart.php'>Go to Cart</a></div>";
echo $html;