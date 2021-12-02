<?php
    //Parametros de conexion.
    session_start();
    $servername = "localhost";
    $database = "tiendita";
    $username = "root";
    $password = "";
    $idProd = $_SESSION['idRes'];
    //Crear la conexion.
    $conexion = mysqli_connect($servername, $username, $password, $database);
    //Revisar si se realizo la conexion.
    if(!$conexion) {
        die("ERROR: La conexion no se realizó correctamente." . mysqli_connect_error());
    }
    $cbd = mysqli_select_db($conexion, $database);
    if(!$cbd) {
        die("ERROR DE CONEXION CON LA BASE DE DATOS");
    }
    $query = "SELECT resena.descripcion_Resena, resena.calificacion_Resena,cliente.nombre_Cliente "
            . "FROM tiendita.resena INNER JOIN cliente ON cliente.id_Cliente=resena.id_Cliente where id_Producto = '$idProd';";
    $result = $conexion->query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<h3>Usuario</h3> ".$row['nombre_Cliente'];
            echo"<br><br>";
            echo "<h3>Comentario</h3> ".$row['descripcion_Resena'];
            echo"<br><br>";
            echo "<h3>Calificación</h3> ";
                for($j=0;$j<$row['calificacion_Resena'];$j++){
                    echo"<img src='Recursos/iconos/estrella.png' width='32' height='32'>";
                }
            echo"<br>";
            echo "<br><br><hr><br>";
        }
    }else{
        echo "0 resultados";
    }
    //mysqli_stmt_close($stmt);
    mysqli_close($conexion);
?>