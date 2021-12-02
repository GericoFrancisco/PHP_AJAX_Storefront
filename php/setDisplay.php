<?php
$code = $_GET['code'];

$xml = new DOMDocument();
$xml->load("../XML/products.xml");

$products = $xml->getElementsByTagName("product");

foreach ($products as $product){
    $productCode = $product->getAttribute("productCode");
    if($productCode == $code){
        $name = $product->getElementsByTagName("itemName")[0]->nodeValue;
        $price = $product->getElementsByTagName("price")[0]->nodeValue;
        $sizes = $product->getElementsByTagName("size");
        $colors = $product->getElementsByTagName("color");
        $description = $product->getElementsByTagName("description")[0]->nodeValue;
        // <imagePaths>
        //     <imagePath>img/Items/Boys/Graphic/jaws.jpg</imagePath>
        //     <imagePath>img/Items/Boys/Graphic/jawsModel.jpg</imagePath>
        // </imagePaths>
        $imagePath = $product->getElementsByTagName("imagePath")[0]->nodeValue;
        $imagePath2 = $product->getElementsByTagName("imagePath")[1]->nodeValue;

        $html = "<div class='single-item-display'>
        <div class='selected-item' id='$productCode'>
        <div class='single-item-img'>
            <img id='single_display_image' src='$imagePath' width='100%'>
        </div>
        <div class='single-item-desc'>
            <b class='itemName'>$name</b>
            <em class='itemDesc'>$description</em>
            <em class='itemPrice'>PHP <b>$price</b></em>
            </br>
            <div class='item-variety'>
                <div class='choose-color'>
                    <label for='color'>Choose a color:</label>
                    <select name='color' id='color' class='itemColor' onchange='changeImg(this.value,\"$productCode\" )'>";
                    for ($i=0; $i < count($colors); $i++){
                        $color = $colors[$i]->nodeValue;
                        $html .= "<option value='$color'>$color</option>";
                    }
                    $html .= "</select></br>
                </div>
                <div class='choose-size'>
                    <label for='size'>Choose size:</label>
                    <select name='size' id='size' class='itemSize' >";
                    for ($i=0; $i < count($sizes); $i++) { 
                        $size = $sizes[$i]->nodeValue;
                        $html .= "<option value='$size'>$size</option>";
                    }
                    $html .= "</select></br>
                </div>
            </div>
            <label>Quantity:</label> <input type='number' id='single_display_quantity' min='1' max='10' value='1' class='itemQty' oninput='onInput(this.value);'>
            <img id='small_display_image' src='$imagePath2' height='100px' onclick='swap();'>
            <input class='addToWish-btn' type='button' value='Add to wishlist' onclick='addToWishlist(\"$productCode\");'>
            <input class='addToCart-btn' type='button' value='Add to cart' onclick='addToCart(\"$productCode\");'>
            </div><br>
        </div>
        </div>";
        echo $html;
    }
}