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
            function paginaPrincipal($sql=""){
                $conexion = conectarMysql();
                if(!$conexion){
                    echo "ERROR";
                }
                else{
                    if($sql==""){
                        $sql = "SELECT * FROM producto WHERE estrellas_Producto='5'";
                    }
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
                                    ."</td>";
                                if($row['stock_Producto']!=0){
                                    echo "<td align'right'>"
                                    . "<form method='GET' action='procesamientoFormularios/procesarItemCarrito.php' >"
                                    . "<input name='idProducto' id='idProducto' type='hidden' value='".$id."'>"
                                    . "<input type='image' src='Recursos/iconos/carrito.png' class='anadirCarrito'>"
                                    . "</form></td>";
                                }
                                else{
                                    echo "<br><td>No disponible</td>";
                                }
                                echo "</tr>"
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
                                                ."</td>".
                                                "<td><form method='POST' action='procesamientoFormularios/eliminarItemCarrito.php' ><input type='hidden' name='idProducto' id='idProducto' value='".$id."'><input class='btnQuitarDelCarrito' type='submit' value='Quitar del carrito'></form></td>"
                                            ."</tr>"
                                        ."</table>"
                                    ."</td>"
                                ."</tr>"
                            ."</table>"
                        ."<br>";
                    }
                }
                else{
                    echo "<p style='color:white;'> 0 resultados</p>";
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
                                                            .""
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
                                                                echo "<br><br>";
                                                                echo "<a href='resProducto.php?id=$i' class='linkRes'>Calificar producto</a>";
                                                                echo "<br><br><hr><br>"
                                                                ." </div>";
                                                                if($row['stock_Producto']){
                                                                    echo "<img src='Recursos/iconos/carrito.PNG'><form method='GET' action='procesamientoFormularios/procesarItemCarrito.php' >"
                                                                    . "<input name='idProducto' id='idProducto' type='hidden' value='".$i."'>"
                                                                    . "<input type='submit' value='Añadir al carrito' class='botonDesign'>"
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
                else{
                    echo "0 resultados";
                }
                //mysqli_stmt_close($stmt);
                mysqli_close($conexion);
            }
            function totalCarrito(){
                $conexion = conectarMysql();
                if(!$conexion){
                    echo "ERROR";
                }
                else{
                    if ($_SESSION['admin'] == 1) {
                        $precio =0;
                        foreach(array_reverse($_SESSION['carrito']) as $i){
                        $sql = "SELECT precioUnitario_Producto FROM producto WHERE id_Producto = ".$i;
                        $result = $conexion->query($sql);
                            while($row = $result->fetch_assoc()){
                                $precio += $row['precioUnitario_Producto'];
                            }
                        }
                        if($precio!=0){
                            echo "<TABLE style='background-color: rgb(20, 20, 20)' class='bordes3' width=97% align=center CELLSPACING=0 CELLPADDING=7>"
                                ."<TR>"
                                    ."<TD width=90%>"
                                        ."<form method='POST' action='generarTicket.php'>"
                                            ."<H3 style='color:white;' align=center>TOTAL A PAGAR: $".$precio.".00 MXN + ENVÍO GRATIS</H3><br>"
                                            ."<input type='hidden' name='precio' value='".$precio."'>"
                                            ."<H3 style='color: white' align=center><u>No puedes comprar productos con una cuenta administrador</u></H3>"
                                        ."</form>"
                                    ."</TD>"
                                ."</TR>"
                            ."</TABLE>"
                            ."<br>";
                        }
                    } else {
                        $precio =0;
                        foreach(array_reverse($_SESSION['carrito']) as $i){
                        $sql = "SELECT precioUnitario_Producto FROM producto WHERE id_Producto = ".$i;
                        $result = $conexion->query($sql);
                            while($row = $result->fetch_assoc()){
                                $precio += $row['precioUnitario_Producto'];
                            }
                        }
                        if($precio!=0){
                            echo "<TABLE style='background-color: rgb(20, 20, 20)' class='bordes3' width=97% align=center CELLSPACING=0 CELLPADDING=7>"
                                ."<TR>"
                                    ."<TD width=90%>"
                                        ."<form method='POST' action='generarTicket.php' align=center>"
                                            ."<H3 style='color:white;' align=center>TOTAL A PAGAR: $".$precio.".00 MXN + ENVÍO GRATIS</H3><br>"
                                            ."<input type='hidden' name='precio' value='".$precio."'>"
                                            ."<input align=center type='submit' value='Finalizar Compra' class='btnQuitarDelCarrito'>"
                                        ."</form>"
                                    ."</TD>"
                                ."</TR>"
                            ."</TABLE>"
                            ."<br>";
                        }
                    }
                }
                mysqli_close($conexion);
            }
            function imprimirDatosCliente(){
                session_start();
                $conexion = conectarMysql();
                if(!$conexion){
                    echo "ERROR";
                }
                else{
                    $sql = "SELECT * FROM cliente WHERE id_Cliente=".$_SESSION['idCliente'];
                    $result = $conexion->query($sql);
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            echo "<TABLE style='background-color: rgb(20, 20, 20)' class='bordes3' width=97% align=center CELLSPACING=0 CELLPADDING=7>"
                                ."<TR>"
                                    ."<TD width=90%>"
                                        ."<form name='form' action='crearCuentaAdminBDD.php' method='post' align=center>"
                                            ."<h2>DATOS DEL CLIENTE<br></h2>"
                                            ."<h3><u>Nombre del cliente:</u> ".$row['nombre_Cliente']."<br></h3>"
                                            ."<h3><u>Apellidos:</u> ".$row['apPaterno_Cliente']."".$row['apMaterno_Cliente']."<br></h3>"
                                            ."<h3><u>Ciudad:</u> ".$row['ciudad_Cliente']."<br></h3>"
                                            ."<h3><u>Colonia:</u> ".$row['colonia_Cliente']."<br></h3>"
                                            ."<h3><u>Calle:</u> ".$row['calle_Cliente']."<br></h3>"
                                            ."<h3><u>Numero de calle:</u> ".$row['noCalle_Cliente']."<br></h3>"
                                            ."<h3><u>Código postal:</u> ".$row['cPostal_Cliente']."<br></h3>"
                                            ."<h3><u>Número de tarjeta:</u> ".$row['tarjeta_Cliente']."<br></h3>"
                                            ."<br><br><hr><br><br>"
                                        ."</form>"
                                    ."</TD>"
                                ."</TR>"
                            ."</TABLE>"
                            ."<br>";
                        }
                    }
                }
                mysqli_close($conexion);
            }
            function actualizarStock(){
                session_start();
                $conexion = conectarMysql();
                $stock=0;
                foreach(array_reverse($_SESSION['carrito']) as $i){
                  //Se calcula el stock actual
                    $sql = "SELECT stock_Producto FROM producto WHERE id_Producto=".$i;
                    $result = $conexion->query($sql);
                    while($row = $result->fetch_assoc()){
                        $stock=$row['stock_Producto'];
                    }
                  //Se hace el update del stock
                    $sql = "UPDATE producto SET stock_Producto=".($stock-1)." WHERE id_Producto=".$i;
                    mysqli_query($conexion, $sql);
                    $stock = 0;
                }
            }
            
            function updateVenta(){
                session_start();
                $conexion = conectarMysql();
                if(!$conexion){
                    echo "ERROR";
                }
                $id = $_SESSION['idCliente'];
                $sql = "INSERT INTO venta (id_Cliente, fecha_Venta) VALUES ($id,now())";
                $result = $conexion->query($sql);
            }
            
            function imprimirListaCompra(){
                session_start();
                $conexion = conectarMysql();
                if(!$conexion){
                    echo "ERROR";
                }
                else{
                    foreach(array_reverse($_SESSION['carrito']) as $i){
                        $sql = "SELECT nombre_Producto,precioUnitario_Producto, categoria_Producto FROM producto WHERE id_Producto = ".$i;
                        $result = $conexion->query($sql);
                            while($row = $result->fetch_assoc()){
                                echo "<TABLE style='background-color: rgb(20, 20, 20)' class='bordes3' width=97% align=center CELLSPACING=0 CELLPADDING=7>"
                                        ."<TR align=center>"
                                            . "<td width=33%><h3>Producto</h3></td>"
                                            . "<td width=33%><h3>Precio Unitario</h3></td>"
                                            . "<td width=33%><h3>Categoría</h3></td>"
                                        ."</TR>"
                                        ."<TR align=center>"
                                            ."<TD>"
                                                ."<hr>"
                                            ."</TD>"
                                            ."<TD>"
                                                ."<hr>"
                                            ."</TD>"
                                            ."<TD>"
                                                ."<hr>"
                                            ."</TD>"
                                        ."</TR>"
                                        ."<TR align=center>"
                                            . "<td><h3>".$row['nombre_Producto']."</h3></td>"
                                            . "<td><h3>$".$row['precioUnitario_Producto']."</h3></td>"
                                            . "<td><h3>".$row['categoria_Producto']."</h3></td>"
                                        ."</TR>"
                                    ."</TABLE>"
                                    ."<br>";
                            }
                    }
                    echo "</table>";
                }
                mysqli_close($conexion);
            }
            function vaciarCarrito(){
                session_start();
                unset($_SESSION['carrito']);
                $_SESSION['carrito'] = array();
            }
        ?>

</body>

</html>