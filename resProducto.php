<html>
    <head>
        <title>Reseña de Producto</title>
        <link rel="stylesheet" type="text/css" href="estilos/estilos.css">
    </head>
    <body>
        <?php
            session_start();
            include ("metodos.php");
            encabezado();
            echo"<br><br><br><br><br>";
            $idProd = $_GET['id'];
            $_SESSION['idRes'] = $idProd;
            $idClient = $_SESSION['idCliente'];
            $usuario = $_SESSION['user'];
            $conexion = conectarMysql();
            if(!$conexion){
                echo "ERROR";
            }
            else{
                $sql = "SELECT * FROM producto WHERE id_Producto=$idProd";
                $result = $conexion->query($sql);
            }
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $nombre = $row['nombre_Producto'];
                    echo "<br><br><br><p align='center'><img src='Recursos/fotosProductos/".$row['imagen_Producto']."' alt='IMAGEN NO DISPONIBLE'></p>";
                    echo "<TABLE class='estandarTablaDesign2' CELLSPACING=0 CELLPADDING=7>"
                            ."<TR>"
                                ."<TD width=100% align='center'>"
                                    ."<TABlE>"
                                        ."<TR>"
                                            ."<TD width=100% align='center' class='formDesign' class='imagenLogin'>"
                                                ."<div style='text-align: center;'>"
                                                    ."<br>"
                                                    ."<div tabindex='0' id='inicio'><H2>"
                                                    .$row['nombre_Producto']
                                                    ."</H2></div>"
                                                    ."<HR><br><br></HR>"
                                                    ."<div>"
                                                        ."<!--Creamos el form que captura los datos de inicios sesion y los manda a-->"
                                                        ."<!--otra pagina que valida que sean correctos los datos.-->"
                                                        ."<form name='form' action='publicarRes.php' method='post'>"
                                                            ."<h3><p>".$row['descripcion_Producto']."</p></h3>"
                                                            ."<br><br><hr><br><br>"
                                                            ."<h2>Publicar reseña</h2><br>"
                                                            ."<h3>Usuario:</h3> $usuario"
                                                            ."<h3>Calificación: "
                                                                ."<select class='camposDesign' name='calif' size='1' required>"
                                                                    ."<option>5</option>"
                                                                    ."<option>4</option>"
                                                                    ."<option>3</option>"
                                                                    ."<option>2</option>"
                                                                    ."<option>1</option>"
                                                                ."</select>"
                                                            ."</h3>"
                                                            ."<textarea name='res' placeholder='¿Qué opinas del juego?' size='200' maxlength='200' rows='20' cols='60' style='border: 1px solid #FFFFFF; background-color: #282828; color:white; border-radius: 13px; font-size: 14px;' required></textarea>"
                                                            ."</div>"
                                                            ."<br><br>";
                                                            if($row['stock_Producto']){
                                                                echo "<input class='btnQuitarDelCarrito' type='submit' value='Publicar'>"
                                                                ."<br><br><hr><br><br>"
                                                                ."</form>";
                                                            }else{
                                                                echo "<h3 style='color:red;'>Stock no disponible</h3>";
                                                            }
                                                    echo "</div>"
                                                ."</div>"
                                            ."</TD>"
                                            ."<TD>"
                                                ."&nbsp&nbsp"
                                            ."</TD>"
                                        ."</TR>"
                                    ."</TABlE>"
                                ."</TD>"
                            ."</TR>"
                    ."</TABLE>";
                }
            }
        ?>
    </body>
</html>
