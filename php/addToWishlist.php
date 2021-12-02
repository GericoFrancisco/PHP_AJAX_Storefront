<?php
session_start();
$activeUser = $_SESSION['username'];
$products = new DOMDocument();
$products->load("../XML/products.xml");

$productCode = $_GET["productCode"];


$productList = $products->getElementsByTagName("product");

foreach ($productList as $product){
    $code = $product->getAttribute("productCode");
    $user = $product->getAttribute("username");
    if($code == $productCode){
        // addToWishlist($product);
        checkInstances($product);
        // addToCart($product);
        break;
    }
}

function checkInstances($product){
    $activeUser = $_SESSION['username'];
    $color = $_GET["color"];
    $size = $_GET["size"];

    $productCode = $_GET["productCode"]."-".$size."-".$color;
    $wishlist = new DOMDocument();
    $wishlist->load("../XML/wishlist.xml");

    $items = $wishlist->getElementsByTagName("wishlist");

    if(count($items) == 0) addToWishlist($product);
    else{

        $contains = [];
        foreach($items as $item){
            $itemCode = $item->getAttribute("productCode");
            $username = $item->getAttribute("username");
            array_push($contains, $itemCode."-".$username);
        }

        if(!in_array($productCode."-".$activeUser, $contains)){
            addToWishlist($product);
        }
    }
}

function addToWishlist($product){
    $activeUser = $_SESSION['username'];
    $color = $_GET["color"];
    $size = $_GET["size"];
    $cart = new DOMDocument();
    $cart->load("../XML/wishlist.xml");

    // <itemName></itemName> 
    $name = $product->getElementsByTagName("itemName")[0]->nodeValue;
    // <itemPrize></itemPrize>
    $price = $product->getElementsByTagName("price")[0]->nodeValue;
    // <itemDescription></itemDescription>
    $desc = $product->getElementsByTagName("description")[0]->nodeValue;
    // <itemImage></itemImage>
    $image = $product->getElementsByTagName("imagePaths")[0]->getElementsByTagName("imagePath")[0]->nodeValue;

    $productCode = $product->getAttribute("productCode");

    $cartItem = $cart->createElement("wishlist");
    $itemName = $cart->createElement("itemName", $name);
    $itemPrice = $cart->createElement("itemPrice", $price);
    $itemColor = $cart->createElement("itemColor", $color);
    $itemSize = $cart->createElement("itemSize", $size);
    $itemDesc = $cart->createElement("itemDescription", $desc);
    $itemImage = $cart->createElement("itemImage", $image);

    $id = $productCode."-".$size."-".$color;

    $cartItem->setAttribute("productCode",$id);
    $cartItem->setAttribute("username",$activeUser);

    $cartItem->appendChild($itemName);
    $cartItem->appendChild($itemColor);
    $cartItem->appendChild($itemSize);
    $cartItem->appendChild($itemPrice);
    $cartItem->appendChild($itemDesc);
    $cartItem->appendChild($itemImage);

    $cart->getElementsByTagName("wishlists")[0]->appendChild($cartItem);
    $cart->save("../XML/wishlist.xml");
    // echo "added";
}