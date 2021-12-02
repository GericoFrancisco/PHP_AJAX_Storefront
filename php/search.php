<?php

session_start();

$page = $_SESSION['searchPagesCount'];

$searched = $_GET['keyword'];

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
    if(str_contains(strtolower($product), strtolower($searched))) {
        array_push($searchedList, $product);
    }
}

$excess = 0;

$_SESSION["search_page_limit"] = count($searchedList)/6;
if(count($searchedList) % 6 != 0){
    $_SESSION["search_page_limit"] += 1;
    $excess = count($searchedList) % 6;
}
$_SESSION["search_page_limit"] = round($_SESSION["search_page_limit"], 0);

$codes = [];
foreach ($searchedList as $s){
    array_push($codes, substr($s,0, 5));
}

$xml = new DOMDocument();
$xml->load("../XML/products.xml");

$products = $xml->getElementsByTagName("product");

$html = "";


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


// echo "page limit: ".$_SESSION["search_page_limit"]."<br>excess: ".$excess."<br>count: ".count($searchedList)%6;

$limit = 0;
for ($ctr=0; $ctr < 30; $ctr++) { 
    if($_SESSION["search_page_limit"] == $page && $excess != 0){
        if($limit == $excess) break;
    }else{
        if($limit == 6) break;
    }
    
    $product = $products[$ctr + $mult];
    if($ctr + $mult < 30){

        $productCode = $product->getAttribute("productCode");
        if(in_array($productCode, $codes)){
            $limit++;
            $itemName = $product->getElementsByTagName("itemName")[0]->nodeValue;
    
            $price = $product->getElementsByTagName("price")[0]->nodeValue;
    
            $sizes = $product->getElementsByTagName("size");
            $size = "";
            for ($i=0; $i < count($sizes); $i++) { 
                $size .= $sizes[$i]->nodeValue . " ";
            }
    
            $colors = $product->getElementsByTagName("color");
            $color = "";
            for ($i=0; $i < count($colors); $i++){
                $color .= $colors[$i]->nodeValue . " ";
            }
    
            $description = $product->getElementsByTagName("description")[0]->nodeValue;
    
            $imagePath = $product->getElementsByTagName("imagePath")[0]->nodeValue;
    
            $html .= "<div class='search-result' id='$productCode'>
            <div class='search-result-img' onclick='singleDisplay(\"$productCode\")'>
                <img src='$imagePath'>
            </div>
            <div class='search-result-desc'>
                <h3 onclick='singleDisplay(\"$productCode\")'>$itemName</h3> 
                <b>PHP $price</b>
                <h6>$description</h6>
            </div>
            </div>";
        }
    }
}
$nextPage = $page + 1;
$backPage = $page - 1;

if($html == "") $html = "No results found for \"" .$searched."\".";
else{
    $html .= "<div class='search-pagination-btn'>
<button class='prev-btn' onclick='backSearchPage(\"$backPage\",\"$searched\");'><i class='fas fa-arrow-left'></i></button>
<input type='text' id='page-number' class='pageNo' value='$page' readonly></input>
<button class='next-btn' onclick='nextSearchPage(\"$nextPage\",\"$searched\");'><i class='fas fa-arrow-right'></i></button>
</div>";
}
echo $html;
