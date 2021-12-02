<html>
    <head>  
        <title>Document</title>
        <link rel="stylesheet" href="css/style.css">
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    </head>
    <!-- <body onload="getActiveUsers('<?php echo $_SESSION['username'] ?>');"> -->
    <body>
        <div id="box-for-message" onclick="openUsersList();"><b>Messages</b></div>
        <div id="active-users-list">
            <div id="active-users-header"><span><b>Active Users</b></span><span id="close-users-list" onclick="closeUsersList();"><b>&times;</b></span> </div>
            <div id="usersList"></div>
        </div>
        <div id="messages">
            <div id="messages-header"><span><b id="message-receiver">Active Users</b></span><span id="close-users-list" onclick="closeMessages();"><b>&times;</b></span> </div>
            <div id="convo-messages"></div>
            <div id="message-input">
                <input type="text" name="message-box" id="message-box" placeholder="Type a message here...">
                <button id="send-message" onclick="sendMessage();"></button>
            </div>
        </div>
        <script src="js/messaging.js"></script>
    </body>
</html>

