<?php
$color = $_GET['color'];
$code = $_GET['code'];

$xml = new DOMDocument();
$xml->load("../XML/products.xml");

$products = $xml->getElementsByTagName("product");
// echo count($products);
$colors = [];

foreach ($products as $product){
    $pCode = $product->getAttribute("productCode");
    if($pCode == $code){
        $colors = $product->getElementsByTagName("imagePath");
        break;
    }
}


$selected = [];


$str = "_".str_replace(" ","_",$color);
$txt = "";
foreach ($colors as $c){
    $img = $c->nodeValue;
    if(str_contains($img, $str)){
        array_push($selected,$img);
    }
}

$txt = $selected[0];
echo $txt;