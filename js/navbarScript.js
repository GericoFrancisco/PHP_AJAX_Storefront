$(document).ready(function(){
    $('.cart-icon').mouseover(function(){
        var position = $('.cart-icon').offset();

        $('.cart-icon').css({
            ':hover' : 'red',
        })
        xhrviewCart = new XMLHttpRequest();
        xhrviewCart.onreadystatechange = () =>{
            if(xhrviewCart.readyState == 4 && xhrviewCart.status == 200){
                $(".cart-hover").css({
                    'left' :position.left/1.2,
                    'top' :position.top +30,
                }).html(xhrviewCart.responseText).slideToggle(100);
            }
        }
        xhrviewCart.open("GET", "php/hoverCart.php", true);
        xhrviewCart.send();
    });
    $(".cart-hover").mouseleave(function(){
        $(".cart-hover").slideToggle(200);
    });
    $('.wish-icon').mouseover(function(){
        var position = $('.wish-icon').offset();

        xhrviewCart = new XMLHttpRequest();
        xhrviewCart.onreadystatechange = () =>{
            if(xhrviewCart.readyState == 4 && xhrviewCart.status == 200){
                $(".wish-hover").css({
                    'left' :position.left/1.2,
                    'top' :position.top +30
                }).html(xhrviewCart.responseText).slideToggle(100);
            }
        }
        xhrviewCart.open("GET", "php/hoverWishlist.php", true);
        xhrviewCart.send();
    });
    $(".wish-hover").mouseleave(function(){
        $(".wish-hover").slideToggle(200);
    });
});
