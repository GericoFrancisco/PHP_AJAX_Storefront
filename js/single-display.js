d = document;

function setDisplay(code){
    // console.log("singleDisplayCode: "+code);
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            d.getElementById("single-item-container").innerHTML = xhr.responseText;      
        }
    }
    xhr.open("GET", "php/setDisplay.php?code="+code, true);
    xhr.send();
}

function changeImg(color, code){
    // console.log(color);
    // single_display_image
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            d.getElementById("single_display_image").src = xhr.responseText; 
            changeImg2(color, code);
            // console.log(xhr.responseText)     
        }
    }
    xhr.open("GET", "php/changeImg.php?color="+color+"&code="+code, true);
    xhr.send();
}

function changeImg2(color, code){
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            d.getElementById("small_display_image").src = xhr.responseText; 
            // console.log(xhr.responseText)     
        }
    }
    xhr.open("GET", "php/changeImg2.php?color="+color+"&code="+code, true);
    xhr.send();
}

function swap(){
    var img = d.getElementById("single_display_image").src;
    var img2 = d.getElementById("small_display_image").src;

    d.getElementById("single_display_image").src = img2;
    d.getElementById("small_display_image").src = img;
}

function onInput(value){
    console.log(value);
    if(value == ''){
        d.getElementById("single_display_quantity").value = 1;
    }
}
