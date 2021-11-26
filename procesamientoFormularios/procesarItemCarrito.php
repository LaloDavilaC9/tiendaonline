<?php
    session_start();
    
    $idProducto = $_GET['idProducto'];
    array_push($_SESSION['carrito'],$idProducto);
    //echo "El id es: ".$idProducto;
    header('Location: ../carrito.php');

?>