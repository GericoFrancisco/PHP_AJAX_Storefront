<?php
$username = $_SESSION['username'];
?>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <link rel="stylesheet" 
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" 
            integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" 
            crossorigin="anonymous" 
            referrerpolicy="no-referrer" />
        <script src="js/navbarScript.js"></script>
        
    </head>
    <body>
        <div class="navigation-main-container" id="navbar">
            <div class="nav-logo-section">
                <a href="#"><img src="img/logo2.png" alt=""></a>
            </div>
            <div class="nav-link-section">
                <ul>
                    <li class="nav-link"><a href="home.php">Home</a></li>
                    <li class="nav-link"><a href="women.php">Women</a></li>
                    <li class="nav-link"><a href="men.php">Men</a></li>
                    <li class="nav-link"><a href="sale.php">Sale</a></li>
                    <li class="nav-link"><a href="shop.php">Shop</a></li>
                </ul>
            </div>
            <div class="nav_search">
                <form id="form_search" class="search-form">
                    <input type="text" name="search_bar" id="search_bar" class="search-bar" placeholder="Search" onkeyup="autoSuggest(this.value)">
                    <span><button type="submit" name="btn_search" id="btn_search" class="btn-search"><i class="fas fa-search"></i></button></span><br />
                    <div id="auto-suggested" class="auto-suggested"></div>
                </form>
            </div>
            <div class="nav-user-section">
                <ul>
                    <li class="cart-icon"><a href="cart.php"><i class="fas fa-shopping-bag"></i></a></li>
                    <li class="wish-icon"><a href="wishlist.php"><i class="fas fa-heart"></i></a></li>
                    <!-- <li><a href=""><img src="img/user.png"></a></li> -->
                    <li><a href="index.php" onclick='logout("<?php echo $username ?>");'><i class="fas fa-sign-out-alt"></i></a></li>
                </ul>
            </div>
        </div>
        <div class = 'cart-hover'></div>
        <div class = 'wish-hover'></div>
        <script>
            function changeBG(){
                var navbar = document.getElementById('navbar');
                var scrollValue = window.scrollY;
                //current = window.location.pathname;
                console.log(scrollValue);

                if(scrollValue < 70){
                    navbar.classList.remove('bgColor');
                } else {
                    navbar.classList.add('bgColor');
                }
            }
            window.addEventListener('scroll', changeBG);
        </script>
        <script src="js/single-display.js"></script>
        <script src="js/men-women-sale.js"></script>
    </body>
</html>