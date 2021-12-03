
<?php
    if(!isset($_SESSION)) {session_start();} 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Chat</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="estilos/estilosChat.css">
    <link rel="stylesheet" type="text/css" href="estilos/estilos.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="ajaxProceso.js"></script>
</head>
<body>
    <?php
        include ("metodos.php");
        encabezado();
        
        echo"<br><br><br><br><br><br><br><br>";
        echo "<hr width=97%><br>";
        echo "<table align=center class='tabla-c-bordes2' width=97%>"
              . "<tr>"
                  . "<td align='center'>"
                      . "<H2>"
                          . "CHAT DE SOPORTE TÉCNICO"
                      . "</H2>"
                  . "</td>"
              . "</tr>"
          . "</table>";
        echo "<br>";  
    ?>

   
    <?php
        if(isset($_SESSION['user'])){
            echo " <input type='hidden' id='user' value='".$_SESSION['user']."'>";
    ?>
            
  
    <div id="formChat" class="bordes3">
        <br>
        <div id="mensajes" style="color:white;"></div>
        <br><br>
        <div>
            <input type="text" autofocus id="message" placeholder="Ingresa tu mensaje">
            <button onclick="send()">ENVIAR</button><br><br>
        </div>
    </div>
          
    
  
    <?php   }
        else{
             mensajeInicieSesion();
        }

    ?>
   
   
     <script type="text/javascript">
        var comet = new AjaxPush('listenerChat.php', 'senderChat.php');
        var n = new Function("return (Math.random()*190+85).toFixed(0)");
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
    
 
</html>