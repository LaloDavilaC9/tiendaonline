
<?php
         if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Chat</title>
	<meta charset="UTF-8">
        
        <link rel="stylesheet" type="text/css" href="estilos/estilos.css">
	<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="ajaxProceso.js"></script>
</head>
<body>
    <?php
        include ("metodos.php");
        encabezado();
    ?>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
   
    <?php 
        echo "<input type='hidden' id='user' value='".    $_SESSION['user']."'>'";
    ?>
    
    <input type="text" autofocus id="message" placeholder="your message!">
    <button onclick="send()">Send</button><br><br>
    <div id="mensajes" style="color:white;"></div>
    
    
     <script type="text/javascript">
        var comet = new AjaxPush('listenerChat.php', 'senderChat.php');
        var n = new Function("return (Math.random()*190).toFixed(0)");
        // Color aleatorio al nombre de los usuarios
        var c = "rgb(" + n() + ", " + n() + "," + n() + ")";
        var template = "<strong style='color: " + c + "'>" + document.getElementById("user").value + "</strong>: ";

        // listener
        comet.connect(function(data) { $("#mensajes").append(data.message) + "<br>"; });

        // sender
        var send = function() {
            comet.doRequest({ user: template + $("#user").val() + "<br>", message: template + $("#message").val() + "<br>" }, function(){
                    $("#message").val('').focus();
            })
        }
    </script>
</body>
</html>