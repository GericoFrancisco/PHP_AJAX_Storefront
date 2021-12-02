bannerSlideshow = document.querySelectorAll(".header-img-container .banner-img");
transition = 3000;
imageCounter = 0;

bannerSlideshow[imageCounter].style.opacity = 1;

setInterval(nextImage, transition);

function nextImage(){
    bannerSlideshow[imageCounter].style.opacity = 0;
    imageCounter = (imageCounter+1) % bannerSlideshow.length;
    bannerSlideshow[imageCounter].style.opacity = 1;
}

/*let imgArray = [
    'img/banner.jpg',
    'img/banner2.jpg',
    'img/banner3.jpg',
    'img/banner4.jpg'
];

let pic = $('.banner-img');
let i = 0;

setInterval(function(){
    $(document).ready(function(){
        i = (i + 1) % imgArray.length

        pic.fadeOut(3000, () => {
            pic.attr('src', imgArray[i]);
            pic.fadeIn(3000);
        });
    });    
});*/
