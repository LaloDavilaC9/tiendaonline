<!DOCTYPE html>
<?php
    //session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos/estilos.css">
    <title>Crear cuenta</title>
</head>
<body class="estandarTablaDesign2">
    <?php
        include ("metodos.php");
        encabezado();
        echo"<br><br><br><br><br><br><br><br>";
        $usuario = $_SESSION['user'];
        $admin = $_SESSION['admin'];
        include ("sqlConn.php");
        $conexion = conectar();
        if(!$conexion){
            echo "ERROR";
        }
        else{
            if ($admin == 0) {
                $sql = "SELECT * FROM cliente WHERE nombre_Cliente ='$usuario'";
                $result = $conexion->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()){
                        $nombre = $row['nombre_Cliente'];
                        $apPaterno = $row['apPaterno_Cliente'];
                        $apMaterno = $row['apMaterno_Cliente'];
                        $ciudad = $row['ciudad_Cliente'];
                        $calle = $row['calle_Cliente'];
                        $noCalle = $row['noCalle_Cliente'];
                        $cPostal = $row['cPostal_Cliente'];
                        $tarjeta = $row['tarjeta_Cliente'];
                        $colonia = $row['colonia_Cliente'];
                        $gusto = $row['gusto_Cliente'];
                        echo "<div id='bodyLogin'>"
                        ."<TABLE class='estandarTablaDesign2' CELLSPACING=0 CELLPADDING=7>"
                                ."<TR>"
                                    ."<TD width=100% align='center'>"
                                        ."<TABlE>"
                                            ."<TR>"
                                                ."<TD width=100% align='center' class='formDesign' class='imagenLogin'>"
                                                    ."<div style='text-align: center;'>"
                                                        ."<div tabindex='0' id='inicio'><H2>Datos del usuario</H2></div>"
                                                        ."<HR><br><br></HR>"
                                                        ."<div>"
                                                            ."<!--Creamos el form que captura los datos de inicios sesion y los manda a-->"
                                                            ."<!--otra pagina que valida que sean correctos los datos.-->"
                                                            ."<form name='form' action='crearCuentaBDD.php' method='post'>"
                                                                ."<h3><IMG SRC='Recursos/iconos/usuario.png' ALT='IMAGEN NO DISPONIBLE'> Nombre: <input value='$nombre' disabled class='camposDesign' type='text' name='usuario' required><br><br></h3>"
                                                                ."<h3><IMG SRC='Recursos/iconos/info.png' ALT='IMAGEN NO DISPONIBLE'> Apellido paterno: <input value='$apPaterno' disabled class='camposDesign' type='text' name='apellidoP' required>&nbsp&nbsp&nbsp"
                                                                ."<IMG SRC='Recursos/iconos/info.png' ALT='IMAGEN NO DISPONIBLE'> Apellido materno: <input value='$apMaterno' disabled class='camposDesign' type='text' name='apellidoM' required><br><br></h3>"
                                                                ."<br><br><hr><br><br>"
                                                                ."<h3><IMG SRC='Recursos/iconos/lugar.png' ALT='IMAGEN NO DISPONIBLE'> Ciudad: <input value='$ciudad' disabled class='camposDesign' type='text' name='ciudad' required><br><br></h3>"
                                                                ."<h3><IMG SRC='Recursos/iconos/calle.png' ALT='IMAGEN NO DISPONIBLE'> Calle: <input value='$calle' disabled class='camposDesign' type='text' name='calle' required><br><br></h3>"
                                                                ."<h3><IMG SRC='Recursos/iconos/numero.png' ALT='IMAGEN NO DISPONIBLE'> No. Calle: <input value='$noCalle' disabled class='camposDesign' type='number' name='noCalle' required><br><br></h3>"
                                                                ."<h3><IMG SRC='Recursos/iconos/colonia.png' ALT='IMAGEN NO DISPONIBLE'> Colonia: <input value='$colonia' disabled class='camposDesign' type='text' name='colonia' required><br><br></h3>"
                                                                ."<h3><IMG SRC='Recursos/iconos/codigoPostal.png' ALT='IMAGEN NO DISPONIBLE'> Codigo postal: <input value='$cPostal' disabled class='camposDesign' type='number' name='CP' required><br><br></h3>"
                                                                ."<br><br><hr>"
                                                                ."<br><br>"
                                                                ."<h3><IMG SRC='Recursos/iconos/tarjeta.png' ALT='IMAGEN NO DISPONIBLE'> Numero de tarjeta: <input value='$tarjeta' disabled class='camposDesign' type='number' name='NoTarjeta' required><br><br></h3>"
                                                                ."<br><br><hr><br><br>"
                                                                ."<h3><IMG SRC='Recursos/iconos/corazon.png' ALT='IMAGEN NO DISPONIBLE'> Categoria favorita:"
                                                                ."<input value='$gusto' disabled class='camposDesign' type='text' name='categoria' required><br><br></h3>"
                                                                ."<br><br></h3>"
                                                                ."<br><br><hr><br><br>"
                                                            ."</form>"
                                                        ."</div>"
                                                    ."</div>"
                                                ."</TD>"
                                                ."<TD>"
                                                    ."&nbsp&nbsp"
                                                ."</TD>"
                                            ."</TR>"
                                        ."</TABlE>"
                                    ."</TD>"
                                ."</TR>"
                        ."</TABLE>"
                        ."</div>";
                    }
                }else{
                    echo "0 resultados";
                }
            }else{
                $sql = "SELECT * FROM cuentas WHERE nombre_Cuenta ='$usuario'";
                $result = $conexion->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()){
                        $IdAdmin = $row['id_Cuenta'];
                        $nombre = $row['nombre_Cuenta'];
                        echo "<div id='bodyLogin'>"
                        ."<TABLE class='estandarTablaDesign2' CELLSPACING=0 CELLPADDING=7>"
                                ."<TR>"
                                    ."<TD width=100% align='center'>"
                                        ."<TABlE>"
                                            ."<TR>"
                                                ."<TD width=100% align='center' class='formDesign' class='imagenLogin'>"
                                                    ."<div style='text-align: center;'>"
                                                        ."<div tabindex='0' id='inicio'><H2>Crear cuenta</H2></div>"
                                                        ."<HR><br><br></HR>"
                                                        ."<div>"
                                                            ."<!--Creamos el form que captura los datos de inicios sesion y los manda a-->"
                                                            ."<!--otra pagina que valida que sean correctos los datos.-->"
                                                            ."<form name='form' action='crearCuentaAdmin.php' method='post'>"
                                                                ."<h3><IMG SRC='Recursos/iconos/info.png' ALT='IMAGEN NO DISPONIBLE'> ID Cuenta de administrador: <input value='$IdAdmin' disabled class='camposDesign' type='text' name='usuario' required><br><br></h3>"
                                                                ."<h3><IMG SRC='Recursos/iconos/usuario.png' ALT='IMAGEN NO DISPONIBLE'> Nombre de cuenta administrador: <input value='$nombre' disabled class='camposDesign' type='text' name='apellidoP' required>&nbsp&nbsp&nbsp"
                                                                ."<br><br><hr><br><br>"
                                                                ."<input class='botonLoginDesign' type='submit' value='Crear una cuenta administrador'>"
                                                            ."</form>"
                                                        ."</div>"
                                                    ."</div>"
                                                ."</TD>"
                                                ."<TD>"
                                                    ."&nbsp&nbsp"
                                                ."</TD>"
                                            ."</TR>"
                                        ."</TABlE>"
                                    ."</TD>"
                                ."</TR>"
                        ."</TABLE>"
                        ."</div>";
                    }
                }else{
                    echo "0 resultados";
                }
            }
        }
        //mysqli_stmt_close($stmt);
        mysqli_close($conexion);
    ?>
</body>
</html>