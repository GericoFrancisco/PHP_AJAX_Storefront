<?php
session_start();
$_SESSION['menPagesCount'] = 1;
$_SESSION['womenPagesCount'] = 1;
$_SESSION['salePagesCount'] = 1;
$_SESSION['prodPagesCount'] = 1;
$_SESSION['searchPagesCount'] = 1;

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
        <div class="main-home-container home">
            <div class="main-content-container">
                <div class="main-nav-container">
                    <?php include_once 'header.php';?>
                </div>
                <div class="body-content-container">
                    <div class="header-container">
                        <div class="header-img-container">
                            <img src="img/banner.jpg" alt="" class="banner-img">
                            <img src="img/banner3.jpg" alt="" class="banner-img">
                            <img src="img/banner2.jpg" alt="" class="banner-img">
                        </div>
                        <div class="header-content-container">
                            <div class="header-logo-content">
                                <img src="img/logo1.png" alt="">
                            </div>
                            <div class="header-txt-content">
                                <h2>Get up to 30% Off</h2>
                                <h4>The ultimate clothing to see the world in.</h4>
                                <a href="shop.php" class="btn-shop-now">SHOP NOW</a>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <?php include_once 'messaging.php' ?>
        <script src="js/headerScript.js" type="text/javascript"></script>
    </body>
</html>