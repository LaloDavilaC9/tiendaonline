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
    <body style="background-color:black">
        <?php
            include ("metodos.php");
            encabezado();
            echo"<br><br><br><br><br>";
            generarProducto($_SESSION['id']);
        ?>
        
        
    </body>
</html>
