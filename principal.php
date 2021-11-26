<?php
    //session_start();
?>
<html>
    <head>
        <title>Hexagon Games</title>
        <link rel="stylesheet" type="text/css" href="estilos/estilos.css">
    </head>
    <body class="fondoCarrito" style="overflow-x: hidden;">
        <?php
            include ("metodos.php");
            encabezado();
            echo"<br><br><br><br><br>";
            echo "<div id='banner2'>"
                ."<br><br>"
                ."<img src='Recursos/BANNER HEXAGON GAMES.jpg' id='img_banner2'>"
            ."</div>";
            paginaPrincipal();
        ?>
    </body>
</html>