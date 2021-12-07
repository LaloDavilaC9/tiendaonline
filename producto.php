<?php
    if(!isset($_SESSION)) {session_start(); } 
?>

<html>
    <head>
        <title>Producto</title>
        <link rel="stylesheet" type="text/css" href="estilos/estilos.css">
    </head>
    <body style="background-color:black">
        <?php
            $id = $_GET['id'];
            include ("metodos.php");
            encabezado();
            echo"<br><br><br><br><br>";
            generarProducto($id);
        ?>
    </body>
</html>



