<?php
    session_unset();
    //session_start();
    $_SESSION['login']="";
    $_SESSION['id']=2;

?>

<html>
    <head>
        <title>Producto</title>
        <link rel="stylesheet" type="text/css" href="estilos/estilos.css">
    </head>
    <body>
        <?php
            include ("metodos.php");
            encabezado();
            generarProducto($_SESSION['id']);
        ?>
        
        
    </body>
</html>