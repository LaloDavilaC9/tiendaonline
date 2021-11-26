<?php
    session_start();
?>

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
                   $precio =0;
                        foreach(array_reverse($_SESSION['carrito']) as $i){
                         $sql = "SELECT precioUnitario_Producto FROM producto WHERE id_Producto = ".$i;
                         $result = $conexion->query($sql);
                            while($row = $result->fetch_assoc()){
                                $precio += $row['precioUnitario_Producto'];
                           }
                        }
                        if($precio!=0){
                            echo "<p style='color:white;'>TOTAL A PAGAR: $".$precio.".00 MXN + ENVÍO GRATIS</p><br>";
                            echo "<form method='POST' action='generarTicket.php'><input type='hidden' name='precio' value='".$precio."'><input type='submit' value='Finalizar Compra' class='btnFinalizarCompra'></form>";
                        }
                   
                    
                }
                mysqli_close($conexion);
            }
            
            function imprimirDatosCliente(){
                $conexion = conectarMysql();
                if(!$conexion){
                    echo "ERROR";
                }
                else{
                    $sql = "SELECT * FROM cliente WHERE id_Cliente=".$_SESSION['idCliente'];
                    $result = $conexion->query($sql);
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            echo "<p style='color:white;'>Nombre del cliente: ".$row['nombre_Cliente']."<br>"
                            .    "Apellidos: ".$row['apPaterno_Cliente']." ".$row['apMaterno_Cliente']."<br>"
                            .    "Ciudad: ".$row['ciudad_Cliente']."<br>"
                            .    "Colonia: ".$row['colonia_Cliente']."<br>"
                            .    "Calle: ".$row['calle_Cliente']."<br>"
                            .    "Número de calle: ".$row['noCalle_Cliente']."<br>"
                            .    "Código postal: ".$row['cPostal_Cliente']."<br>"
                            .    "Número de tarjeta: ".$row['tarjeta_Cliente']."<br>"
                                    . "</p>";
                        }
                    }
                }
                mysqli_close($conexion);
            }
            
            function actualizarStock(){
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
            
            
            function imprimirListaCompra(){
                 $conexion = conectarMysql();
                if(!$conexion){
                    echo "ERROR";
                }
                else{
                    echo "<table border='1' class='tablaLista'><tr>"
                    . "<td>Producto</td>"
                    . "<td>Precio Unitario</td>"        
                    . "<td>Categoría</td>"       
                            . "</tr>";
                    foreach(array_reverse($_SESSION['carrito']) as $i){
                         $sql = "SELECT nombre_Producto,precioUnitario_Producto, categoria_Producto FROM producto WHERE id_Producto = ".$i;
                         $result = $conexion->query($sql);
                            while($row = $result->fetch_assoc()){
                                echo "<tr>"
                               . "<td>".$row['nombre_Producto']."</td>"
                               . "<td>".$row['precioUnitario_Producto']."</td>"
                               . "<td>".$row['categoria_Producto']."</td>"
                                        . "</tr>";
                           }
                    }
                    echo "</table>";
                  
                }
                 mysqli_close($conexion);
            }
            
            function vaciarCarrito(){
                unset($_SESSION['carrito']);
                $_SESSION['carrito'] = array();
            }
        ?>
        
    </body>
</html>
