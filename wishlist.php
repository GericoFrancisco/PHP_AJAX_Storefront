<?php
session_start();
if(empty($_SESSION['username'])){
    header("Location: index.php");
}
?>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <script
            src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>
        <script src="js/navbarScript.js"></script>
    </head>
    <body>
        <div class="main-home-container">
            <div class="main-content-container">
                <div class="main-nav-container">
                    <?php include_once 'header.php';?>
                </div>
                <div class="main-wishlist-container">
                    <div class="wishlist-title-container">
                        <h2>Wish List</h2>
                    </div>
                    <div class="wishlist-content-container">
                        <div id="wishlist-product-main-container" class="wishlist-product-main-container">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once 'messaging.php' ?>
    </body>
    <script src="js/wishlist.js"></script>
</html>