<html style="background-color: black;">
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
                                <h3>HEXAGON <br> GAMES<h3>
                            </TD>
                            <TD width=10% ALIGN=left>
                                <h3><a href='principal.php'>Inicio</a></h3>
                            </TD>
                            </TD>
                            <TD width=7% ALIGN=center>
                                <h3><a href='carrito.php'>Carrito</a></h3>
                            </TD>
                            <TD width=25% ALIGN=center>
                                <h3><a href='datosUsuarios.php'>Perfil</a></h3>
                            </TD>
                            <TD width=25% ALIGN=left>
                                <h3><a href='cerrarSesion.php'>Cerrar sesión</a></h3>
                            </TD>
                            <TD>
                                <form action='busquedaFiltradaBDD.php' method='post'>
                                    <TABLE>
                                        <TR>
                                            <TD style='color: white; font-size: 22px;'>
                                                <b>Buscar:</b>
                                            </TD>
                                            <TD>
                                                <input class='camposBusquedaDesign' type='text' name='busqueda' required>
                                            </TD>
                                            <TD>
                                                <input class='botonBusquedaDesign' type='submit' value=''>
                                            </TD>
                                        </TR>
                                    </TABLE>
                                </form>
                            </TD>
                            <TD>
                                <form action='busquedaFiltradaPorCategoriaBDD.php' method='post'>
                                    <TABLE>
                                        <TR>
                                            <TD style='color: white; font-size: 22px;'>
                                                <b>Categorias:</b>
                                            </TD>
                                            <TD>
                                                <select class='camposBusquedaDesign' name='categoria' size='1'>
                                                    <option>Acción</option>
                                                    <option>Rol</option>
                                                    <option>Estrategia</option>
                                                    <option>Aventura</option>
                                                    <option>Simulación</option>
                                                    <option>Deportes</option>
                                                </select>
                                            </TD>
                                            <TD>
                                                <input class='botonBusquedaDesign' type='submit' value=''>
                                            </TD>
                                        </TR>
                                    </TABLE>
                                </form>
                            </TD>
                        </TR>
                    </TABLE>";
            }
            
            function paginaPrincipal(){
                $conexion = conectarMysql();
                if(!$conexion){
                    echo "ERROR";
                }
                else{
                    $sql = "SELECT * FROM producto WHERE estrellas_Producto='5'";
                    $result = $conexion->query($sql);
                }
                echo "<br><hr width=97%><br>";
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        $id = $row['id_Producto'];
                        echo "<table align=center class='tabla-c-bordes2' width=97%>"
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
                                                    ."<a href='producto.php?id=$id'>"
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
                            ."</table>"
                        ."<br>";
                        echo "<hr width=97%><br>";
                    }
                }
                else{
                    echo "0 resultados";
                }
                //mysqli_stmt_close($stmt);
                mysqli_close($conexion);
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
                    echo "<hr width=97%><br>";
                    while($row = $result->fetch_assoc()){
                        $id = $row['id_Producto'];
                        echo "<table align=center class='tabla-c-bordes2' width=97%>"
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
                                                    ."<a href='producto.php?id=$id'>"
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
                            ."</table>"
                        ."<br>";
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
                                                            ."<form name='form' action='crearCuentaBDD.php' method='post'>"
                                                                ."<h2>Descripción:</h2>"
                                                                ."<h3><p>".$row['descripcion_Producto']."</p></h3>"
                                                                ."<br><br><hr><br><br>"
                                                                ."<h2>Caracaterísticas</h2><br>"
                                                                ."<h3>Precio: <input value='$".$row['precioUnitario_Producto']."' disabled class='camposDesign' type='text' name='ciudad' required><br><br></h3>"
                                                                ."<h3>Stock: <input value='".$row['stock_Producto']." unidades' disabled class='camposDesign' type='text' name='calle' required><br><br></h3>"
                                                                ."<h3>Categoría: <input value='".$row['categoria_Producto']."' disabled class='camposDesign' type='text' name='noCalle' required><br><br></h3>"
                                                                ."<br><br><hr><br>"
                                                                ."<h2>Calificación</h2><br>";
                                                                for($j=0;$j<$row['estrellas_Producto'];$j++){
                                                                    echo"<img src='Recursos/iconos/estrella.png'>";
                                                                }
                                                                echo "<br><br><hr><br>"
                                                                ."<img src='Recursos/iconos/carrito.PNG'>"
                                                                ." </div><button class='botonDesign'>Añadir al carrito</button>"
                                                                ."<br><br><hr><br><br>"
                                                            ."</form>"
                                                        ."</div>"
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
                else{
                    echo "0 resultados";
                }
                
                //mysqli_stmt_close($stmt);
                mysqli_close($conexion);
            }
        ?>
    </body>
</html>
