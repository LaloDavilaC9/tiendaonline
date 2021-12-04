
<?php
    if(!isset($_SESSION)) {session_start(); } 
?>
<!DOCTYPE html>

<html lang="en" style="background-color: black;">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/estilo_tabla.css">
    <link rel="stylesheet" type="text/css" href="estilos/estilos.css">
    <title>TICKET DE COMPRA</title>
</head>

<body style="background-color: black;">
    <?php
        include("metodos.php");
        encabezado();
        updateVenta();
        echo"<br><br><br><br><br><br><br>";
        echo "<hr width=97%><br>";
        echo "<table align=center class='tabla-c-bordes2' width=97%>"
              . "<tr>"
                  . "<td align='center'>"
                      . "<H2>"
                          . "TICKET DE COMPRA"
                      . "</H2>"
                  . "</td>"
              . "</tr>"
          . "</table>";
        echo "<br>";  
    ?>
    <?php
        if (count($_SESSION['carrito'])!=0) { ?>
            <div id="banner2">
                <br><br>
                <img src="Recursos/HEXAGON GAMES.gif" id="img_banner2">
                <br><br>
            </div>
        <?php }
    ?>
    <?php   
    
    if( count($_SESSION['carrito'])!=0){
        $precio = $_POST['precio'];
        //Aqui va el banner
        //Se mandan a imprimir los datos del cliente
        $cliente = imprimirDatosCliente();
        echo "<br>";
        //Se mandan a imprimir los items de la compra
        $compra = imprimirListaCompra();
        echo"<br>";
        echo "<TABLE style='background-color: rgb(20, 20, 20)' class='bordes3' width=97% align=center CELLSPACING=0 CELLPADDING=7>"
                ."<TR align=center>"
                    ."<TD>"
                        ."<h3 style='color:white;'>TOTAL PAGADO: $".$precio.".00 MXN <br><br>Envío: $0.00 MXN</h3>"
                    ."<TD>"
                ."</TR>"
            ."</TABLE>"
            ."<br>";
        //Se vacía el carrito porque ya finalizó la compra
        actualizarStock();
        vaciarCarrito();

         //Sigue proceso para mandar el correo al administrador

        $receiver = "eduardo.davilac9@gmail.com,Hexagongames.gamers@gmail.com,casillas.vdl@gmail.com,luisbelar31@gmail.com";
        $subject = "NUEVA VENTA";
        $body = "¡Hola! Se realizó una nueva compra a nombre de {$cliente} comprando lo siguiente: \n{$compra}\nTotal de compra: \${$precio}";
        $sender = "From:Hexagon Games";
        if(mail($receiver, $subject, $body, $sender)){
            //echo "Email sent successfully to $receiver";
        }else{
            echo "Sorry, failed while sending mail!";
        }
    }
    else{
        echo "<h3 align=center style='color:white;'>UPS! no debería de estar aquí</h3>";
    }
    ?>
</body>
</html>


