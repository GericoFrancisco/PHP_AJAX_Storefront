d = document;

function getSearchedItems(keyword){
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            // reset();
            d.getElementById("search-item-container").innerHTML = xhr.responseText;
        }
    }
    xhr.open("GET", "php/search.php?keyword="+keyword, true);
    xhr.send();
}

// function reset(){
//     xhr = new XMLHttpRequest();  
//     xhr.onreadystatechange = () =>{    
//         if(xhr.readyState == 4 && xhr.status == 200){
//         }
//     }
//     xhr.open("GET", "php/resetSearch.php", true);
//     xhr.send();
// }


function nextSearchPage(page, search){
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            console.log(xhr.responseText);
            getSearchedItems(search);
        }
    }
    xhr.open("GET", "php/nextSearchPage.php?page="+page, true);
    xhr.send();
}

function backSearchPage(page, search){
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            getSearchedItems(search);
        }
    }
    xhr.open("GET", "php/backSearchPage.php?page="+page, true);
    xhr.send();
}