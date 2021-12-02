<?php

$key = $_GET['key'];

$productList = [];
array_push($productList,"00001 Jaws Men T-Shirt Graphic Tees White");
array_push($productList,"00002 Skateboard Men T-Shirt Graphic Tees Black");
array_push($productList,"00003 Rick and Morty Men T-Shirt Graphic Tees Black");
array_push($productList,"00004 The Rolling Stones Men T-Shirt Graphic Tees Black");
array_push($productList,"00005 Basketball Hoop Men T-Shirt Graphic Tees Black");
array_push($productList,"00006 Wide Awake Men T-Shirt Graphic Tees White");
array_push($productList,"00007 Cotton Polo Shirt Men Polo Shirt Cotton Light Blue Mint Green Navy Blue");
array_push($productList,"00008 Pima Cotton Polo Shirt Men Polo Shirt Pima Cotton Cream Grey");
array_push($productList,"00009 Printed Polo Shirt Men Polo Shirt Printed White Dark Beige Navy Blue");
array_push($productList,"00010 Silk-Blend Polo Shirt Men Polo Shirt Silk-Blend Navy Blue Grey");
array_push($productList,"00011 Slim Fit COOLMAX polo shirt Men Polo Shirt COOLMAX Slim Fit Mint Green Light Blue Light Grey");
array_push($productList,"00012 Slim Fit Polo Shirt Men Polo Shirt Slim Fit White Black Steel Grey");
array_push($productList,"00013 Britney Spears Women T-Shirt Graphic Tees White");
array_push($productList,"00014 Clueless Women T-Shirt Graphic Tees Oversized Cream");
array_push($productList,"00015 Pink Floyd Women T-Shirt Graphic Tees Dark Grey");
array_push($productList,"00016 Ramones Women T-Shirt Graphic Tees Dark Grey");
array_push($productList,"00017 The Rolling Stones Women T-Shirt Graphic Tees Black");
array_push($productList,"00018 UCLA Women T-Shirt Graphic Tees Cream");
array_push($productList,"00019 Cotton T-Shirt Women T-Shirt Cotton Black Dark Brown Light Grey-blue");
array_push($productList,"00020 Cropped T-Shirt Women T-Shirt Cropped Light Yellow Light Green Light Beige");
array_push($productList,"00021 Fine-knit T-Shirt Women T-Shirt Fine-knit Black Light Grey Light Yellow");
array_push($productList,"00022 Linen Jersey T-Shirt Women T-Shirt Linen Jersey Light Beige Light Grey Light Greige");
array_push($productList,"00023 Slub Knit Top Women T-Shirt Slub-knit Light Beige Brown");
array_push($productList,"00024 Straight Style T-Shirt Women T-Shirt Straight Style Black White");
array_push($productList,"00025 NASA Graphic T-Shirt Sale Men T-Shirt Relaxed Fit Black Grey");
array_push($productList,"00026 Regular Fit Running Top Sale Men T-Shirt Regular Fit Running Top Dark Grey Turquoise");
array_push($productList,"00027 Relaxed Fit T-Shirt Sale Men T-Shirt Relaxed Fit Black Light Blue Navy Blue");
array_push($productList,"00028 Coca-Cola T-Shirt Sale Women T-Shirt Oversized Dark Turquoise");
array_push($productList,"00029 Sprite T-Shirt Sale Women T-Shirt Jersey Dark Grey");
array_push($productList,"00030 Star Wars T-Shirt Sale Women T-Shirt Oversized Light Beige");

$searchedList = [];
foreach ($productList as $product){
    if(str_contains(strtolower($product), strtolower($key))) array_push($searchedList, $product);
}

$codes = [];
foreach ($searchedList as $s){
    array_push($codes, substr($s,0, 5));
}

$xml = new DOMDocument();
$xml->load("../XML/products.xml");

$products = $xml->getElementsByTagName("product");


$autoSuggest = [];

foreach ($products as $product){
    $productCode = $product->getAttribute("productCode");
    if(in_array($productCode, $codes)){
        if(count($autoSuggest) < 5){
            array_push($autoSuggest, $product);
        }
    }
}

$html = "";

foreach ($autoSuggest as $item){
    $code = $item->getAttribute("productCode");
    $name = $item->getElementsByTagName("itemName")[0]->nodeValue;
    $price = $item->getElementsByTagName("price")[0]->nodeValue;
    $path = $item->getElementsByTagName("imagePath")[0]->nodeValue;

    $html .= "<li onclick='singleDisplay(\"$code\")'><img src='$path' height='100px'> <b>$name</b> $price</li><hr> <br>";
}

if($key == "") $html = "";

echo $html;