<?php

   function conectarMysql(){
        $servername = "Localhost";
        $database = "tiendita";
        $username = "root";
        $password = "";

        $conn = mysqli_connect($servername,$username,$password,$database);
        if(!$conn){
            die("ERROR, LA CONEXIÓN NO SE REALIZÓ CORRECTAMENTE ". mysqli_connect_error());
        }
        //echo "Conexión correcta";
        //echo "<p>";
        $cbd = mysqli_select_db($conn, $database);
        if(!$cbd){
            die("ERROR DE CONEXIÓN CON LA BASE DE DATOS");
        }
        //echo "Conexión a ".$database." correcta";
        //echo "</p>";
        return $conn;
   }

   function encabezado(){
        echo "<TABLE BORDER= 0 ALIGN=LEFT WIDTH=100% CELLSPACING=0 CELLPADDING=7 BGCOLOR=#0000FF background='ImagenUAAPrincipal.jpg' class='tablaMenuDerechos'>
                <TR>
                    <TD width=25% ALIGN=right>
                       <a style='color: white;' href='Pagina principal.html' class='clase2'>Inicio</a>
                    </TD>
                    <TD width=10% ALIGN=center>
                        <a href='OfertaEducativa.html' class='clase2'>Oferta Educativa</a>
                    </TD>
                    </TD>
                    <TD width=5%>
                        <a href='https://www.uaa.mx/nu/mapas/campuscentral.pdf' class='clase2'>Mapa</a>
                    </TD>
                    <TD width=7% ALIGN=left>
                        <a href='https://aulavirtual.uaa.mx/login/index.php' class='clase2'>Aula Virtual</a>
                    </TD>
                    <TD width=25% ALIGN=left>
                        <a href='https://esiima.uaa.mx/' class='clase2'>E-SIIMA</a>
                    </TD>
                </TR>
            </TABLE>";
    }
    
   function itemCarrito($i){
        $conexion = conectarMysql();
        if(!$conexion){
          echo "ERROR";
        }
        else{
            $sql = "SELECT * FROM producto WHERE id_Producto=$i";
            $result = $conexion->query($sql);
        }
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<div class='itemCarrito'>"
                    . "<img src='Recursos/fotosProductos/".$row['imagen_Producto']."'>"
                    . "<p>".$row['nombre_Producto']."</p><br>"
                    . "<p>Disfruta de un sandbox super divertido xd</p><br>"
                    . "<p>".$row['precioUnitario_Producto']."</p><br>"
                    . "</div>";
            }
        }
        else{
            echo "0 resultados";
        }
        //mysqli_stmt_close($stmt);
       mysqli_close($conexion);
       
    }
    
     function generarProducto($i){
        $conexion = conectarMysql();
        if(!$conexion){
          echo "ERROR";
        }
        else{
            $sql = "SELECT * FROM producto WHERE id_Producto=$i";
            $result = $conexion->query($sql);
        }
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo "<div id='carrusel'>
                    <img src='Recursos/fotosProductos/".$row['imagen_Producto']."' width='100px' heigth='100px'>
                </div>

                <p>".$row['nombre_Producto']."</p><br>
                <p>".$row['precioUnitario_Producto']."</p><br>
                <p>VENDIDO POR: Wishin</p>
                <p>
                    Minecraft is an open world sandbox video game originally made by Markus 'Notch' Persson. It was run by a company called Mojang before being sold to Microsoft in 2014 for USD $2.5 billion.[18] It is the best-selling video game of all time, and over 200 million copies of the game have been sold.[19]
                    In Minecraft, players explore a blocky world filled with various 3D items. Many of these items are cubes, called 'blocks'. These include basic terrain and resources such as dirt, stone, wood, and sand. There are also items the player can use, such as crafting tables and furnaces. Players can use these to make new items such as tools and armor, as well as different kinds of blocks.[20] Players can then build structures using these blocks, such as buildings, statues, pixel art, and more.
                    Minecraft has two versions, Java and Bedrock. Java is the original version of Minecraft, but Bedrock is now more used due to it being multi-platform. Bedrock Edition is written in C++ but Java Edition is written in Java.
                </p>";
                echo " <div id='estrellas'>";
                for($j=0;$j<$row['estrellas_Producto'];$j++){
                    
                    echo    "<img src='Recursos/iconos/estrella.png' width='100px' height='100px'>";
                   
                }
                
               
                echo " </div><button><img src='Recursos/iconos/carrito.PNG'></button>";

            }
        }
        else{
            echo "0 resultados";
        }
        //mysqli_stmt_close($stmt);
       mysqli_close($conexion);
       
    }
    
?>
