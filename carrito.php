<?php
    session_unset();
    //session_start();
    $_SESSION['login']="";
    $_SESSION['carrito'][0] = 1;
    $_SESSION['carrito'][1] = 2;
    $_SESSION['carrito'][2] = 3;
    $_SESSION['carrito'][3] = 4;
    $_SESSION['carrito'][4] = 5;
    $_SESSION['carrito'][5] = 6;
    $_SESSION['carrito'][6] = 7;
    $_SESSION['carrito'][7] = 8;
?>
<html>
    <head>
        <title>Carrito</title>
        <link rel="stylesheet" type="text/css" href="estilos/estilos.css">
    </head>
    <body class="fondoCarrito" style="overflow-x: hidden;">
        <?php
            include ("metodos.php");
            encabezado();
            echo"<br><br><br><br><br>";
            foreach($_SESSION['carrito'] as $i){
                itemCarrito($i);
            }
        ?>
    </body>
</html>
