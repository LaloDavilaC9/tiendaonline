<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="./estilos/estilo_tabla.css">
    </head>
    <body>
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
                echo "<TABLE BORDER= 0 ALIGN=LEFT WIDTH=99% CELLSPACING=0 CELLPADDING=7 BGCOLOR=#0000FF' class='tabla-c-bordes'>
                        <TR>
                            <TD width=25% ALIGN=left>
                               Hexagon <br> Games
                            </TD>
                            <TD width=10% ALIGN=center>
                                <a href='carrito.php'>Inicio</a>
                            </TD>
                            </TD>
                            <TD width=5%>
                                <a href='carrito.php'>Categorías</a>
                            </TD>
                            <TD width=7% ALIGN=left>
                                <a href='carrito.php'>Carrito</a>
                            </TD>
                            <TD width=25% ALIGN=left>
                                <a href='carrito.php'>Perfil</a>
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
                    echo "<br><hr><br>";
                    while($row = $result->fetch_assoc()){
                        echo "<table align=center class='tabla-c-bordes2' width=99%>"
                                ."<tr>"
                                    ."<td align='center'>"
                                    ."<H3>"
                                    ."$".$row['precioUnitario_Producto']
                                    ."</H3>"
                                    ."</td>"
                                    ."<td align='left'>"
                                        ."<table align=center class='bordes3' width=99% style='background-color:RGBA(0,0,0,0.3)'>"
                                            ."<tr>"
                                                ."<td style='border-radius: 3px;' align='center'>"
                                                    ."<H3>"
                                                    ."<a href='producto.php'>"
                                                    .$row['nombre_Producto']
                                                    ."</a>"
                                                    ."</H3>"
                                                ."</td>"
                                            ."</tr>"
                                        ."</table>"
                                    ."</td>"
                                ."</tr>"
                                ."<tr>"
                                    ."<td width=1%>"
                                        ."<img src='Recursos/fotosProductos/".$row['imagen_Producto']."' width=200>"
                                    ."</td>"
                                    ."<td align='left'>"
                                        ."<table align=center class='bordes3' width=99% style='background-color:RGBA(0,0,0,0.5)'>"
                                            ."<tr>"
                                                ."<td style='border-radius: 3px;' align='center'>"
                                                    ."<H3>"
                                                    .$row['descripcion_Producto']
                                                    ."</H3>"
                                                ."</td>"
                                            ."</tr>"
                                        ."</table>"
                                    ."</td>"
                                ."</tr>"
                            ."</table>";
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

                            echo"<img src='Recursos/iconos/estrella.png'>";

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
    </body>
</html>
