d = document;

window.onload =  function(){
    getCartItems();
}

function getCartItems(){
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            d.getElementById("cart-product-container").innerHTML = xhr.responseText; 
            cartSummary();
        }
    }
    xhr.open("GET", "php/getCartItems.php", true);
    xhr.send();
}

function removeFromCart(code){
    /*xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            //needs sweet alert
            getCartItems();
        }
    }
    xhr.open("GET", "php/removeFromCart.php?productCode="+code, true);
    xhr.send();*/

    Swal.fire({
        icon: 'warning',
        text: 'Are you sure you want to remove this item?',
        showCancelButton: true,
        confirmButtonColor: '#3D84A8',
        cancelButtonColor: '#D83A56',
        confirmButtonText: 'Yes'
      }).then((result) => {
        if (result.isConfirmed) {
            xhr = new XMLHttpRequest();  
            xhr.onreadystatechange = () =>{ 
                if(xhr.readyState == 4 && xhr.status == 200){
                    Swal.fire({
                        icon: 'success',
                        text: 'Product removed from cart',
                        showConfirmButton: false,
                        timer: 1500
                    }
                    ).then(() =>{
                        getCartItems();
                    })
                }
            }
            xhr.open("GET", "php/removeFromCart.php?productCode="+code, true);
            xhr.send();
        }
    })
}

function cartSummary(){
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            d.getElementById("cart-sidebar-content").innerHTML = xhr.responseText;
            setTotalPrice();
        }
    }
    xhr.open("GET", "php/cartSummary.php", true);
    xhr.send();
}

function setTotalPrice(){
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            d.getElementById("cart-sidebar-total").innerHTML = xhr.responseText;
        }
    }
    xhr.open("GET", "php/setTotalPrice.php", true);
    xhr.send();
}

function checkout(){
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            console.log(xhr.responseText);
            if(xhr.responseText == "save"){
                //sweet alert
                Swal.fire({
                    icon: "question",
                    title: 'Do you want to place your order?',
                    showDenyButton: true,
                    confirmButtonText: `YES`,
                    denyButtonText: `NO`,
                  }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                      Swal.fire('THANK YOU FOR YOUR PURCHASE!', '', 'success')
                    } else if (result.isDenied) {
                      Swal.fire('YOUR ITEM IS NOT PURCHASE', '', 'error')
                    }
                  }).then(() =>{
                getCartItems();
            })
            }else{
                 //sweet alert
                 Swal.fire({
                    icon: 'warning',
                    title: 'YOUR CART IS EMPTY'
                  })
            }
        }
    }
    xhr.open("GET", "php/checkout.php", true);
    xhr.send();
}

function onChange(code){
    var qty = d.getElementById("qty-"+code).value;
    if(qty != ""){
        xhr = new XMLHttpRequest();  
        xhr.onreadystatechange = () =>{    
            if(xhr.readyState == 4 && xhr.status == 200){
                getCartItems();
            }
        }
        xhr.open("GET", "php/changeQTY.php?QTY="+qty+"&code="+code, true);
        xhr.send();
    }else if(qty == ''){
        d.getElementById("qty-"+code).value = 1;
    }
}