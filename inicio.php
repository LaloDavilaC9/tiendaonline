<?php
    session_start();
    $_SESSION['login']="";
    $_SESSION['id']=2;
?>

<html>
    <head>
        <title>INICIO</title>
    </head>
    <body>
       <?php 
            include ("metodos.php");
            encabezado();
       ?>
        
        
    </body>
</html>
