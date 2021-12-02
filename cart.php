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
                <div class="main-cart-container">
                    <div class="cart-title-container">
                        <h2>Shopping Cart</h2>
                    </div>
                    <div class="cart-content-container">
                        <div id="cart-product-container" class="cart-product-container">
                            
                        </div>
                        <div class="cart-sidebar-container">
                            <div class="cart-sidebar-title">
                                <h4>Cart Summary</h4>
                            </div>
                            <div id="cart-sidebar-content" class="cart-sidebar-content">
                                <ul>
                                    <li><span>Order Value</span><span>&#36; 15.98</span></li>
                                    <li><span>Shipping Fee</span><span>Free</span></li>
                                </ul>
                            </div>
                            <div id="cart-sidebar-total" class="cart-sidebar-total">
                                <h4>Total</h4><span>&#36; 15.98</span>
                            </div>
                            <div class="cart-sidebar-checkout">
                                <button class="checkout-btn" onclick="checkout();">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once 'messaging.php' ?>
    </body>
    <script src="js/cart.js"></script>
</html>