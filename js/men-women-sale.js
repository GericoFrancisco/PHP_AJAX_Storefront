d = document;

function getMenProducts(){
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            d.getElementById("men-item-container").innerHTML = xhr.responseText;      
        }
    }
    xhr.open("GET", "php/getMenProducts.php", true);
    xhr.send();
}

function getWomenProducts(){
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            d.getElementById("women-item-container").innerHTML = xhr.responseText;      
        }
    }
    xhr.open("GET", "php/getWomenProducts.php", true);
    xhr.send();
}

function getSaleProducts(){
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            d.getElementById("sale-item-container").innerHTML = xhr.responseText;      
        }
    }
    xhr.open("GET", "php/getSaleProducts.php", true);
    xhr.send();
}

function addToCart(code){
    var div = d.getElementById(code).getElementsByTagName("select");
    var qty = d.getElementById(code).getElementsByTagName("input");

    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            //sweet alert   
            Swal.fire({
                icon: 'success',
                title: 'Added',
                text: 'To cart',
              })
            console.log(xhr.responseText); 
           
        }
    }
    xhr.open("GET", "php/addToCart.php?productCode="+code+"&color="+div[0].value+"&size="+div[1].value+"&quantity="+qty[0].value, true);
    xhr.send();
}

function addToWishlist(code){
    var div = d.getElementById(code).getElementsByTagName("select");
    
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            //sweet alert  
            Swal.fire({
                icon: 'success',
                title: 'Added',
                text: 'To wishlist',
              })  
            console.log(xhr.responseText); 
           
        }
    }
    xhr.open("GET", "php/addToWishlist.php?productCode="+code+"&color="+div[0].value+"&size="+div[1].value, true);
    xhr.send();
}

// function nextMenPage(page){
//     xhr = new XMLHttpRequest();  
//     xhr.onreadystatechange = () =>{    
//         if(xhr.readyState == 4 && xhr.status == 200){
//             getMenProducts();
//         }
//     }
//     xhr.open("GET", "php/nextPage.php", true);
//     xhr.send();
// }

// function nextWomenPage(page){
//     xhr = new XMLHttpRequest();  
//     xhr.onreadystatechange = () =>{    
//         if(xhr.readyState == 4 && xhr.status == 200){
//             getWomenProducts();
//         }
//     }
//     xhr.open("GET", "php/nextPage.php", true);
//     xhr.send();
// }

function getProducts(){
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            d.getElementById("shop_container").innerHTML = xhr.responseText;      
            // d.getElementById("shop_container").innerHTML = xhr.responseText;      
        }
    }
    xhr.open("GET", "php/getProducts.php", true);
    xhr.send();
}

d.getElementById("btn_search").addEventListener("click", goSearch);

function goSearch(e){
    e.preventDefault();
    var searchWord = d.getElementById("search_bar").value;
    window.location = "searched.php?keyword="+searchWord;
}

function autoSuggest(key){
    // console.log(key);
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            d.getElementById("auto-suggested").innerHTML = xhr.responseText;      
        }
    }
    xhr.open("GET", "php/autoSuggest.php?key="+key, true);
    xhr.send();
}

function singleDisplay(code){
    // console.log("code is: "+code);
    window.location = "single-display.php?code="+code;
    
}

function logout(username){
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            if(xhr.responseText == 'true'){
                //sweet alert
                window.location = "index.php";
            }
        }
    }
    xhr.open("GET", "php/account-logout.php?username="+username, true);
    xhr.send();
}

function nextMenPage(page){
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            getMenProducts();
        }
    }
    xhr.open("GET", "php/nextMenPage.php?page="+page, true);
    xhr.send();
}

function backMenPage(page){
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            getMenProducts();
        }
    }
    xhr.open("GET", "php/backMenPage.php?page="+page, true);
    xhr.send();
}

function nextWomenPage(page){
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            getWomenProducts();
        }
    }
    xhr.open("GET", "php/nextWomenPage.php?page="+page, true);
    xhr.send();
}

function backWomenPage(page){
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            getWomenProducts();
        }
    }
    xhr.open("GET", "php/backWomenPage.php?page="+page, true);
    xhr.send();
}

function nextProdPage(page){
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            getProducts();
        }
    }
    xhr.open("GET", "php/nextProductPage.php?page="+page, true);
    xhr.send();
}

function backProdPage(page){
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            getProducts();
        }
    }
    xhr.open("GET", "php/backProductPage.php?page="+page, true);
    xhr.send();
}


function setMenPage(page){
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            getMenProducts();
        }
    }
    xhr.open("GET", "php/setMenPage.php?page="+page, true);
    xhr.send();
}

function setWomenPage(page){
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            getWomenProducts();
        }
    }
    xhr.open("GET", "php/setWomenPage.php?page="+page, true);
    xhr.send();
}

function setProdPage(page){
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            getProducts();
        }
    }
    xhr.open("GET", "php/setProdPage.php?page="+page, true);
    xhr.send();
}