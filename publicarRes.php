<?php
    session_start();
    //Guardando datos del formulario
    $cal = $_POST['calif'];
    $res = $_POST['res'];
    $idProd = $_SESSION['idRes'];
    $idClient = $_SESSION['idCliente'];
    //Creamos la conexion.
    include ("sqlConn.php");
    $conexion = conectar();
    //Query para subir reseña a la bdd
    $query = "INSERT INTO resena (descripcion_Resena, calificacion_Resena, id_Producto, id_Cliente) "
            ."VALUES ('$res',$cal,$idProd,$idClient)";
    //Se publica la reseña
    $result = $conexion->query($query);
    unset($_SESSION['idRes']);
    //Se actualizan las estrellas
    $query = "SELECT * FROM producto WHERE id_Producto = '$idProd'";
    $result = $conexion->query($query);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $estrellas = $row['estrellas_Producto'];
        }
    }
    //Sacando el valor de la reseña actual
    $aux = $estrellas + $cal;
    $aux2 = $aux/2;
    $califActual = round($aux2);
    //Haciendo UPDATE de la calificación del producto
    $query = "UPDATE producto SET estrellas_Producto = '$califActual' WHERE id_Producto = '$idProd'";
    $result = $conexion->query($query);
    header('Location: principal.php');
?>