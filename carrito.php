<?php
    session_unset();
    //session_start();
    $_SESSION['login']="";
    $_SESSION['carrito'][0] = 1;
    $_SESSION['carrito'][1] = 2;
?>
<html>
    <head>
        <title>Carrito</title>
        <link rel="stylesheet" type="text/css" href="estilos/estilos.css">
    </head>
    <body>
        <?php
            include ("metodos.php");
            encabezado();
            foreach($_SESSION['carrito'] as $i){
                itemCarrito($i);
            }
        ?>
        
        
    </body>
</html>
