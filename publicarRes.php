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
    header('Location: principal.php');
?>