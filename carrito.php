<?php
    //session_start();
    //$_SESSION['carrito'][0] = 1;
    //$_SESSION['carrito'][1] = 2;
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
            echo"<br><br><br><br><br><br><br><br>";
            echo "<hr width=97%><br>";
            echo "<table align=center class='tabla-c-bordes2' width=97%>"
                . "<tr>"
                    . "<td align='center'>"
                        . "<H2>"
                            . "CARRITO"
                        . "</H2>"
                    . "</td>"
                . "</tr>"
            . "</table>";
            echo "<br>";
            $x=0;
            totalCarrito();
            foreach(array_reverse($_SESSION['carrito']) as $i){
                itemCarrito($i);
                $x++;
            }
            if($x==0){
                echo "<p style='color:white;'> CARRITO VACÍO</p>";
            }
       
        ?>
    </body>
</html>
