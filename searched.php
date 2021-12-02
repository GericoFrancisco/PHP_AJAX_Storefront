<?php
session_start();
if(empty($_SESSION['username'])){
    header("Location: index.php");
}
$_SESSION['searchPagesCount'] = 1;
?>

<html>
    <head>  
        <title>Document</title>
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <script
            src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>
        <script src="js/navbarScript.js"></script>
    </head>
    <body onload="getSearchedItems('<?php if(isset($_GET['keyword'])) echo  $_GET['keyword'] ;?>')">
    <div class="search-result-main">
        <?php include_once 'header.php';?>
            <div class="search-item-main-cont">
                <div class="search-result-cont">
                    <div class='search-title-item-cont'>Search Result</div>
                    <div id="search-item-container">No results found.</div>
                </div>
            </div>
        <?php include_once 'messaging.php' ?>
    </div>
    </body>
    <script src="js/search.js"></script>
    <script src="js/men-women-sale.js"></script>
</html>