<?php
session_start();
$page = $_SESSION['prodPagesCount'];

$xml = new DOMDocument();
$xml->load("../XML/products.xml");

$products = $xml->getElementsByTagName("product");

$mult = "";
switch($page){
    case 1:
        $mult = 0;
        break;
    case 2:
        $mult = 6;
        break;
    case 3:
        $mult = 12;
        break;
    case 4:
        $mult = 18;
        break;
    case 5:
        $mult = 24;
        break;
}

$html = "<div class='all-title-item-cont'>All Products</div><table><tr>";

for ($i = 0; $i < 6; $i++) { 
    $product = $products[$i + $mult];
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
        <div class='allprod-sec-img' onclick='singleDisplay(\"$productCode\")'>
            <img src='$imagePath'>
        </div>
        <div class='allprod-sec-desc'>
            <h3 onclick='singleDisplay(\"$productCode\")'>$itemName</h3>
            <b>PHP $price</b>
            <h6>PHP $description</h6>
        </div>
        </div></td>";
    }else if($i == 3){
        $html .= "</tr><tr><td><div class='product-cont' id='$productCode' onclick='singleDisplay(\"$productCode\")'>
        <div class='allprod-sec-img' onclick='singleDisplay(\"$productCode\")'>
            <img src='$imagePath'>
        </div>
        <div class='allprod-sec-desc'>
            <h3 onclick='singleDisplay(\"$productCode\")'>$itemName</h3>
            <b>PHP $price</b>
            <h6>PHP $description</h6>
        </div>
        </div></td>";
    }else{
        $html .= "<td><div class='product-cont' id='$productCode' onclick='singleDisplay(\"$productCode\")'>
        <div class='allprod-sec-img' onclick='singleDisplay(\"$productCode\")'>
            <img src='$imagePath'>
        </div>
        <div class='allprod-sec-desc'>
            <h3 onclick='singleDisplay(\"$productCode\")'>$itemName</h3> 
            <b>PHP $price</b>
            <h6>PHP $description</h6>
        </div>
        </div></td>";
    }
}
$nextPage = $page + 1;
$backPage = $page - 1;

$html .= "</tr></table>
            <div class='pagination-btn'>
            <button class='prev-btn' onclick='backProdPage(\"$backPage\");'><i class='fas fa-arrow-left'></i></button>";

            for ($i=1; $i < 6; $i++) { 
                if($i == $page){
                    // $html .= "<input type='text' id='page-number' class='pageNo' value='$i' readonly></input>";
                    $html .= "<input type='text' id='selected-page-number' class='pageNo' value='$i' readonly></input>";
                }else{
                    $html .= "<input type='text' id='page-number' class='pageNo' value='$i' onclick='setProdPage(\"$i\")'  readonly></input>";
                }
            }

$html .= " <button class='next-btn' onclick='nextProdPage(\"$nextPage\");'><i class='fas fa-arrow-right'></i></button>
</div>";

// $html .= "</tr></table>
// <div class='pagination-btn'>
//     <button class='prev-btn' onclick='backProdPage(\"$backPage\");'><i class='fas fa-arrow-left'></i></button>
//     <input type='text' id='page-number' class='pageNo' value='$page' readonly></input>
//     <button class='next-btn' onclick='nextProdPage(\"$nextPage\");'><i class='fas fa-arrow-right'></i></button>
// </div>";

echo $html;
// $html = "";

// foreach($products as $product){
//     $productCode = $product->getAttribute("productCode");
//     $itemName = $product->getElementsByTagName("itemName")[0]->nodeValue;
//     $price = $product->getElementsByTagName("price")[0]->nodeValue;
//     $sizes = $product->getElementsByTagName("size");
//     $colors = $product->getElementsByTagName("color");
//     $description = $product->getElementsByTagName("description")[0]->nodeValue;
//     $imagePaths = $product->getElementsByTagName("imagePaths");
//     $path = $product->getElementsByTagName("imagePath")[0]->nodeValue;
    
//     $imagePath = $product->getElementsByTagName("imagePath")[0]->nodeValue;
    
//     $html .= "<div class='$productCode' id='$productCode' onclick='singleDisplay(\"$productCode\")'>
//         <img src='$imagePath' height='250px'><br>Code: <b>$productCode</b> Name: <b>$itemName</b> Price: <b>$price</b> </br>
//         </div><br><hr>";
// }

// echo $html;