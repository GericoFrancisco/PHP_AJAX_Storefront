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
        
        $qty_id = "qty-".$code;


        $html .= "<div class='product-container'>
        <div class='product-img-container'>
        <img src='$img'>
        </div>
        <div class='product-desc-container'>
        <p class='remove-item' onclick='removeFromCart(\"$code\");'>&times;</p>
        <h5>$name - ($color)</h5>
        <h6>PHP $price</h6>
        <br>
        <ul>
        <li><label>Quantity</label><span><input type='number' id='$qty_id' min='1' max='10' value='$qty' oninput='onChange(\"$code\");' onchange='onChange(\"$code\");'></span></li>
        <li><label>Color</label><span>$color</span></li>
        <li><label>Size</label><span>$size</span></li>
                <li><label>Total</label><span>PHP $total</span></li>
            </ul>
        </div>
    </div>";
    }
}

if(count($items) == 0){
    $html .= "<a href='shop.php'>Click here to view our products.</a>";
}
echo $html;