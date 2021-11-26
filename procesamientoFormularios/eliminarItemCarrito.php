<?php
    session_start();
    $idProducto = $_POST['idProducto'];
    $indice = array_search($idProducto,$_SESSION['carrito']);
    unset($_SESSION['carrito'][$indice]);
    header('Location: ../carrito.php');
?>
