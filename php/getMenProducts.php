<?php
session_start();
$page = $_SESSION['menPagesCount'];

$xml = new DOMDocument();
$xml->load("../XML/products.xml");

$products = $xml->getElementsByTagName("product");

$menProducts = [];

foreach ($products as $product){
    $categories = $product->getElementsByTagName("category");
    foreach ($categories as $category){
        $value = $category->nodeValue;
        if($value == "Men"){
            array_push($menProducts,$product);
            break;
        }
    }
}

$mult = "";
$limit = 6;
switch($page){
    case 1:
        $mult = 0;
        break;
    case 2:
        $mult = 6;
        break;
    case 3:
        $mult = 12;
        $limit = 3;
        break;
}

$html = "<div class='men-title-item-cont'>Men Section</div><table><tr>";

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
    $imagePath1 = $product->getElementsByTagName("imagePath")[1]->nodeValue;

    if($i < 3){
        $html .= "<td><div class='product-cont' id='$productCode'>
        <div class='men-sec-img' onclick='singleDisplay(\"$productCode\")'>
            <img src='$imagePath'>
        </div>
        <div class='men-sec-desc'>
            <h3 onclick='singleDisplay(\"$productCode\")'>$itemName</h3> 
            <b>PHP $price</b>
            <h6>PHP $description</h6>
        </div>
        </div></td>";
    }else if($i == 3){
        $html .= "</tr><tr><td><div class='product-cont' id='$productCode'>
        <div class='men-sec-img' onclick='singleDisplay(\"$productCode\")'>
            <img src='$imagePath'>
        </div>
        <div class='men-sec-desc'>
            <h3 onclick='singleDisplay(\"$productCode\")'>$itemName</h3>  
            <b>PHP $price</b>
            <h6>PHP $description</h6>
        </div>
        </div></td>";
    }else{
        $html .= "<td><div class='product-cont' id='$productCode' onclick='singleDisplay(\"$productCode\")'>
        <div class='men-sec-img' onclick='singleDisplay(\"$productCode\")'>
            <img src='$imagePath'>
        </div>
        <div class='men-sec-desc'>
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
            <button class='prev-btn' onclick='backMenPage(\"$backPage\");'><i class='fas fa-arrow-left'></i></button>";

            for ($i=1; $i < 4; $i++) { 
                if($i == $page){
                    // $html .= "<input type='text' id='page-number' class='pageNo' value='$i' readonly></input>";
                    $html .= "<input type='text' id='selected-page-number' class='pageNo' value='$i' readonly></input>";
                }else{
                    $html .= "<input type='text' id='page-number' class='pageNo' value='$i' onclick='setMenPage(\"$i\")'  readonly></input>";
                }
            }

$html .= " <button class='next-btn' onclick='nextMenPage(\"$nextPage\");'><i class='fas fa-arrow-right'></i></button>
</div>";

// $html .= "</tr></table>
// <div class='pagination-btn'>
//     <button class='prev-btn' onclick='backMenPage(\"$backPage\");'><i class='fas fa-arrow-left'></i></button>
//     <input type='text' id='page-number' class='pageNo' value='$page' readonly></input>
//     <button class='next-btn' onclick='nextMenPage(\"$nextPage\");'><i class='fas fa-arrow-right'></i></button>
// </div>";

echo $html;