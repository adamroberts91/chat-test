<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chat</title>
    <link rel="stylesheet" href="style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>
<body>

<?php
session_start();
$_SESSION['username'] = "Adam Roberts";
?>


<div id="wrapper">
    <div class="chat_wrapper">
        <div id="chat"></div>
        <form action="" method="post" id="messageForm">
            <textarea name="message" cols="30" rows="7" class="textarea"></textarea>
        </form>
    </div>
</div>

<script>
    loadChat();
    function loadChat() {
        $.post("handlers/messages.php?action=getMessages", (response) => {
            $('#chat').html(response);
        });
    }

    $('.textarea').keyup(function(e) {
        if(e.which == 13) {
            $('form').submit();
        }
    });

    $('form').submit(() => {
        let message = $('textarea').val();
        $.post('handlers/messages.php?action=sendMessage&message=' + message, function(response){
            if(response === true) {

                document.getElementById('messageForm').reset();
            }
        });
        return false;
    })


</script>

</body>
</html>