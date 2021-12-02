<?php
session_start();
$page = $_SESSION['salePagesCount'];

$xml = new DOMDocument();
$xml->load("../XML/products.xml");

$products = $xml->getElementsByTagName("product");

$menProducts = [];

foreach ($products as $product){
    $categories = $product->getElementsByTagName("category");
    foreach ($categories as $category){
        $value = $category->nodeValue;
        if($value == "Sale"){
            array_push($menProducts,$product);
            break;
        }
    }
}

$mult = 0;
$limit = 6;

$html = "<div class='sale-title-item-cont'>Sale Items</div><table><tr>";

for ($i = 0; $i < $limit; $i++) { 
    $product = $menProducts[$i + $mult];
    $productCode = $product->getAttribute("productCode");
    $itemName = $product->getElementsByTagName("itemName")[0]->nodeValue;
    $price = $product->getElementsByTagName("price")[0]->nodeValue;
    $sizes = $product->getElementsByTagName("size");
    $colors = $product->getElementsByTagName("color");
    $description = $product->getElementsByTagName("description")[0]->nodeValue;
    $imagePaths = $product->getElementsByTagName("imagePaths");
    $path = $product->getElementsByTagName("imagePath")[0]->nodeValue;
    
    $imagePath = $product->getElementsByTagName("imagePath")[0]->nodeValue;

    if($i < 3){
        $html .= "<td><div class='product-cont' id='$productCode'>
        <div class='sale-sec-img' onclick='singleDisplay(\"$productCode\")'>
            <img src='$imagePath'>
        </div>
        <div class='sale-sec-desc'>
            <h3 onclick='singleDisplay(\"$productCode\")'>$itemName</h3> 
            <b>PHP $price</b>
            <h6>PHP $description</h6>
        </div>
        </div></td>";
    }else if($i == 3){
        $html .= "</tr><tr><td><div class='product-cont' id='$productCode' onclick='singleDisplay(\"$productCode\")'>
        <div class='sale-sec-img' onclick='singleDisplay(\"$productCode\")'>
            <img src='$imagePath'>
        </div>
        <div class='sale-sec-desc'>
            <h3 onclick='singleDisplay(\"$productCode\")'>$itemName</h3>  
            <b>PHP $price</b>
            <h6>PHP $description</h6>
        </div>
        </div></td>";
    }else{
        $html .= "<td><div class='product-cont' id='$productCode' onclick='singleDisplay(\"$productCode\")'>
        <div class='sale-sec-img' onclick='singleDisplay(\"$productCode\")'>
            <img src='$imagePath'>
        </div>
        <div class='sale-sec-desc'>
            <h3 onclick='singleDisplay(\"$productCode\")'>$itemName</h3>  
            <b>PHP $price</b>
            <h6>PHP $description</h6>
        </div>
        </div></td>";
    }
}
$html .= "</tr></table>";

echo $html;