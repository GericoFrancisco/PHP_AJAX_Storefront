<?php
session_start();

$products = new DOMDocument();
$products->load("../XML/products.xml");

$productCode = $_GET["productCode"];
$productList = $products->getElementsByTagName("product");

foreach ($productList as $product){
    $code = $product->getAttribute("productCode");
    if($code == substr($productCode, 0, 5)){
        checkInstances($product);
        // addToCart($product);
        break;
    }
}

function checkInstances($product){
    $activeUser = $_SESSION['username'];
    $color = $_GET["color"];
    $size = $_GET["size"];
    $code = $product->getAttribute("productCode");
    $productCode = substr($code, 0, 5)."-".$size."-".$color;
    
    $cart = new DOMDocument();
    $cart->load("../XML/cart.xml");

    $items = $cart->getElementsByTagName("cart-item");
    foreach($items as $item){
        $code = $item->getAttribute("productCode");
        $user = $item->getAttribute("username");
        if($productCode == $code && $user == $activeUser){
            $qty = $item->getElementsByTagName("itemQty")[0]->nodeValue;
        }
    }

    $flag = 0;

    for ($i=0; $i <= count($items); $i++) { 
        if($flag == 0){
            if(count($items) == $i){
                addToCart($product);
            }else{
                $itemCode = $items[$i]->getAttribute("productCode");
                if($itemCode == $productCode) {
                    $flag = 1;
                    modify($items[$i], $product);
                }
            }
        }
    }
}


function addToCart($product){
    $activeUser = $_SESSION['username'];
    $color = $_GET["color"];
    $size = $_GET["size"];
    $qty = 1;

    if(isset($_GET["quantity"]))$qty = $_GET["quantity"];

    $cart = new DOMDocument();
    $cart->load("../XML/cart.xml");

    $name = $product->getElementsByTagName("itemName")[0]->nodeValue;
    $price = $product->getElementsByTagName("price")[0]->nodeValue;


    $str = "_".str_replace(" ","_",$color);
    $image = "";

    $images = $product->getElementsByTagName("imagePath");

    foreach ($images as $img){
        $txt = $img->nodeValue;
        if(str_contains($txt, $str)){
            $image = $txt;
            break;
        }
    }

    $productCode = $product->getAttribute("productCode");


    $cartItem = $cart->createElement("cart-item");
    $itemName = $cart->createElement("itemName", $name);
    $itemPrice = $cart->createElement("itemPrice", $price);
    $itemQty = $cart->createElement("itemQty", $qty);
    $itemColor = $cart->createElement("itemColor", $color);
    $itemSize = $cart->createElement("itemSize", $size);
    $itemImage = $cart->createElement("itemImage", $image);

    $id = $productCode."-".$size."-".$color;

    $cartItem->setAttribute("productCode",$id);
    $cartItem->setAttribute("username",$activeUser);

    $cartItem->appendChild($itemName);
    $cartItem->appendChild($itemPrice);
    $cartItem->appendChild($itemQty);
    $cartItem->appendChild($itemColor);
    $cartItem->appendChild($itemSize);
    $cartItem->appendChild($itemImage);

    $cart->getElementsByTagName("cart-items")[0]->appendChild($cartItem);
    $cart->save("../XML/cart.xml");
    echo "added";
}

function modify($oldNode, $newNode){
    $qty = 1;
    $activeUser = $_SESSION['username'];
    if(isset($_GET["quantity"]))$qty = $_GET["quantity"];

    $cart = new DOMDocument();
    $cart->load("../XML/cart.xml");

    $items = $cart->getElementsByTagName("cart-item");

    $productCode = $oldNode->getAttribute("productCode");

    foreach ($items as $item){
        $itemCode = $item->getAttribute("productCode");
        if($itemCode == $productCode){
            $old = $item;
            break;
        }
    }

    $productName = $old->getElementsByTagName("itemName")[0]->nodeValue;
    $productPrice = $old->getElementsByTagName("itemPrice")[0]->nodeValue;
    $productQty = $old->getElementsByTagName("itemQty")[0]->nodeValue;
    $productQty += $qty;
    $productColor = $old->getElementsByTagName("itemColor")[0]->nodeValue;
    $productSize = $old->getElementsByTagName("itemSize")[0]->nodeValue;
    $productImage = $old->getElementsByTagName("itemImage")[0]->nodeValue;

    $updated = $cart->createElement("cart-item");
    $updated->setAttribute("productCode", $productCode);
    $updated->setAttribute("username", $activeUser);
    $updated->append($cart->createElement("itemName", $productName));
    $updated->append($cart->createElement("itemPrice", $productPrice));
    $updated->append($cart->createElement("itemQty", $productQty));
    $updated->append($cart->createElement("itemColor", $productColor));
    $updated->append($cart->createElement("itemSize", $productSize));
    $updated->append($cart->createElement("itemImage", $productImage));

    $cart->getElementsByTagName("cart-items")[0]->replaceChild($updated, $old);
    $cart->save("../XML/cart.xml");
    echo "modified\n";
}

