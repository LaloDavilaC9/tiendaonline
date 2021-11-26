<!DOCTYPE html>
<html lang="en" style="background-color: black;">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilos/estilo_tabla.css">
    <link rel="stylesheet" type="text/css" href="estilos/estilos.css">
    <title>Document</title>
</head>

<body style="background-color: black;">
    <?php
        include("metodos.php");
        encabezado();
        echo"<br><br><br><br><br><br><br><br>";
        $busqueda=$_POST['busqueda'];
        
        $sql = "SELECT * FROM producto WHERE nombre_Producto LIKE '%$busqueda%'";
        paginaPrincipal($sql)
        
        
            /*$conexion = conectarMysql();
            if(!$conexion){
                echo "ERROR";
            }
            else{
                $sql = "SELECT * FROM producto WHERE nombre_Producto LIKE '%$busqueda%'";
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
                    ."<br><hr width=97%><br>";
                }
            }
            else{
                echo "0 resultados";
            }
            //mysqli_stmt_close($stmt);
            mysqli_close($conexion);*/
    ?>
</body>
</html>