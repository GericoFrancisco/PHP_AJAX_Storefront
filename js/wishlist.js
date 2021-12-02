d = document;

window.onload = function(){
    getWishlist();
}

function getWishlist(){
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            d.getElementById("wishlist-product-main-container").innerHTML = xhr.responseText;
        }
    }
    xhr.open("GET", "php/getWishlist.php", true);
    xhr.send();
}

function removeWishlist(code){
   /*xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            //needs sweet alert
            getWishlist();
        }
    }
    xhr.open("GET", "php/removeWishlist.php?productCode="+code, true);
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
                        text: 'Product removed from wishlist',
                        showConfirmButton: false,
                        timer: 1500
                    }
                    ).then(() =>{
                        getWishlist();
                    })
                }
            }
            xhr.open("GET", "php/removeWishlist.php?productCode="+code, true);
            xhr.send();
        }
    })
}

function addToCart(code, size, color){
    Swal.fire({
        title: 'Do you want to add in your cart?',
        showDenyButton: true,
        confirmButtonText: `YES`,
        denyButtonText: `NO`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            xhr = new XMLHttpRequest();  
            xhr.onreadystatechange = () =>{    
                if(xhr.readyState == 4 && xhr.status == 200){
                    //SWEET ALERT
                    
                    console.log(xhr.responseText); 
                }
            }
            xhr.open("GET", "php/addToCart.php?productCode="+code+"&size="+size+"&color="+color, true);
            xhr.send();
            Swal.fire('YOUR ITEM IS ADDED TO CART!', '', 'success')

        } else if (result.isDenied) {
          Swal.fire('YOUR ITEM IS NOT ADDED TO CART', '', 'error')
        }
      })
    
}