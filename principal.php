<?php
    if(!isset($_SESSION)) {session_start(); }
    if(!isset($_SESSION['gusto'])){
        $_SESSION['gusto'] = '';
    }
?>
<html>
    <head>
        <title>Hexagon Games</title>
        <link rel="stylesheet" type="text/css" href="estilos/estilos.css">
    </head>
    <body class="fondoCarrito" style="overflow-x: hidden;">
    <?php
        include ("metodos.php");
        //Conectamos a la base de datos
        $conexion = conectarMysql();
        if(!$conexion){
            echo "ERROR";
        }
        else{
            $sql = "SELECT * FROM avisos WHERE idavisos='1'";
            $result = $conexion->query($sql);
        }
        //Obtenemos los avisos existentes
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $titulo=$row['tituloAviso'];
                $descripcion=$row['descripcionAviso'];
                $genero=$row['generoAviso'];
            }
        }
        //Se pintan los avisos existentes dependiendo de los gustos del usuario
            if ($_SESSION['gusto']==$genero && $_SESSION['aviso']==1) {
                echo"<dialog id='DialogoNotificacion' class='formDesign'>"
                    ."<h2 align='center'> $titulo </h2>"
                    ."<hr>"
                    ."<p align='center' style='font-size: 18px;'><b> $descripcion </b></p>"
                    ."<br>"
                    ."<form action='' class='formDesign'>"
                        ."<button class='botonLoginDesign' type='submit'>Cerrar</button>"
                    ."</form>"
                ."</dialog>"
                ."<script language='JavaScript'>"
                    ."var dialogo = document.getElementById('DialogoNotificacion');"
                    ."dialogo.showModal();"
                    ."dialogo.addEventListener('click', function(){"
                    ."dialogo.close();"
                    ."});"
                ."</script>";
                $_SESSION['aviso']=0;
            }
    ?>
        <?php
            //Se pinta el encabezado y los juegos mejor calificados
            encabezado();
            echo"<br><br><br><br><br><br>";
            echo "<div id='banner2'>"
                ."<br><br>"
                ."<img src='Recursos/BANNER HEXAGON GAMES.jpg' id='img_banner2'>"
            ."</div>";
            paginaPrincipal("","JUEGOS MEJOR CALIFICADOS");
        ?>
    </body>
</html>

