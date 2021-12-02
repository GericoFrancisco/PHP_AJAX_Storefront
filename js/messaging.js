d = document;

setInterval(function() {
    getActiveUsers();
}, 3000);

setInterval(function() {
    getMessage();
}, 2000);


var receiver;

function openUsersList(username){
    d.getElementById("box-for-message").style.display = "none";
    d.getElementById("active-users-list").style.display = "block";
    getActiveUsers();
}

function closeUsersList(){
    d.getElementById("active-users-list").style.display = "none";
    d.getElementById("box-for-message").style.display = "block";
    d.getElementById("messages").style.borderTopRightRadius = "20px";
    d.getElementById("messages-header").style.borderTopRightRadius = "20px";
}

function getActiveUsers(){
    x = new XMLHttpRequest();  
    x.onreadystatechange = () =>{    
        if(x.readyState == 4 && x.status == 200){
            d.getElementById("usersList").innerHTML = x.responseText;
        }
    }
    x.open("GET", "php/getActiveUsers.php", true);
    x.send();
}

function openChat(usn, name){
    receiver = usn;
    d.getElementById("messages").style.display = "block";
    d.getElementById("messages").style.borderTopRightRadius = "0";
    d.getElementById("messages-header").style.borderTopRightRadius = "0";
    d.getElementById("active-users-list").style.borderTopLeftRadius = "0";
    d.getElementById("active-users-header").style.borderTopLeftRadius = "0";
    
    d.getElementById("message-receiver").innerHTML = name;
    getMessage();
}

function closeMessages(){
    d.getElementById("messages").style.display = "none";
}

function sendMessage(){
    message = d.getElementById("message-box").value;
    xhr = new XMLHttpRequest();  
    xhr.onreadystatechange = () =>{    
        if(xhr.readyState == 4 && xhr.status == 200){
            d.getElementById("message-box").value = "";
            getMessage();
        }
    }
    xhr.open("GET", "php/sendMessage.php?receiver="+receiver+"&message="+message, true);
    xhr.send();
}

function getMessage(){
    xh = new XMLHttpRequest();  
    xh.onreadystatechange = () =>{    
        if(xh.readyState == 4 && xh.status == 200){
            d.getElementById("convo-messages").innerHTML = xh.responseText;
        }
    }
    xh.open("GET", "php/getMessage.php?receiver="+receiver, true);
    xh.send();
}