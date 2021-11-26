<!DOCTYPE html>

<html lang="en" style="background-color: black;">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/estilo_tabla.css">
    <link rel="stylesheet" type="text/css" href="../estilos/estilos.css">
    <title>TICKET DE COMPRA</title>
</head>

<body style="background-color: black;">
    <?php
        include("metodos.php");
        encabezado();
        echo"<br><br><br><br><br><br><br><br>";
        if( count($_SESSION['carrito'])!=0){
              
            $precio = $_POST['precio'];
            echo "<p style='color:white;'>Detalles del cliente: </p><br>";
            //Se mandan a imprimir los datos del cliente
            imprimirDatosCliente();
            echo "<br>";
            //Se mandan a imprimir los items de la compra
            imprimirListaCompra();
             echo "<p style='color:white;'>TOTAL PAGADO: $".$precio.".00 MXN Envío: $0.00 MXN</p>";
            echo "<p style='color:white;'>GRACIAS POR COMPRAR EN HEXAGON GAMES</p>";
            //Se vacía el carrito porque ya finalizó la compra
            
            actualizarStock();
            vaciarCarrito();

             //Sigue proceso para mandar el correo al administrador
        }
        else{
             echo "<p style='color:white;'>UPS! no debería de estar aquí</p>";
        }

    ?>
    
</body>
</html>


