<!DOCTYPE html>
<?php
    session_start();
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
        $admin = $_SESSION['admin']; //Si es 0 no es admin.
        if ($admin !=0) { ?>
            <div id="bodyLogin">
            <TABLE class="estandarTablaDesign2" CELLSPACING=0 CELLPADDING=7>
                    <TR>
                        <TD width=100% align="center">
                            <TABlE>
                                <TR>
                                    <TD width=100% align="center" class="formDesign" class="imagenLogin">
                                        <div style="text-align: center;">
                                            <div tabindex="0" id="inicio"><H2>Crear cuenta <?php $admin ?> </H2></div>
                                            <HR><br><br></HR>
                                            <div>
                                                <!--Creamos el form que captura los datos de inicios sesion y los manda a-->
                                                <!--otra pagina que valida que sean correctos los datos.-->
                                                <form name="form" action="crearCuentaBDD.php" method="post">
                                                    <h3><IMG SRC="Recursos/iconos/usuario.png" ALT="IMAGEN NO DISPONIBLE"> Nombre: <input value="" disabled class="camposDesign" type="text" name="usuario" required><br><br></h3>
                                                    <h3><IMG SRC="Recursos/iconos/info.png" ALT="IMAGEN NO DISPONIBLE"> Apellido paterno: <input value="" disabled class="camposDesign" type="text" name="apellidoP" required>&nbsp&nbsp&nbsp
                                                    <IMG SRC="Recursos/iconos/info.png" ALT="IMAGEN NO DISPONIBLE"> Apellido materno: <input value="" disabled class="camposDesign" type="text" name="apellidoM" required><br><br></h3>
                                                    <br><br><hr><br><br>
                                                    <h3><IMG SRC="Recursos/iconos/lugar.png" ALT="IMAGEN NO DISPONIBLE"> Ciudad: <input value="" disabled class="camposDesign" type="text" name="ciudad" required><br><br></h3>
                                                    <h3><IMG SRC="Recursos/iconos/calle.png" ALT="IMAGEN NO DISPONIBLE"> Calle: <input value="" disabled class="camposDesign" type="text" name="calle" required><br><br></h3>
                                                    <h3><IMG SRC="Recursos/iconos/numero.png" ALT="IMAGEN NO DISPONIBLE"> No. Calle: <input value="" disabled class="camposDesign" type="number" name="noCalle" required><br><br></h3>
                                                    <h3><IMG SRC="Recursos/iconos/colonia.png" ALT="IMAGEN NO DISPONIBLE"> Colonia: <input value="" disabled class="camposDesign" type="text" name="colonia" required><br><br></h3>
                                                    <h3><IMG SRC="Recursos/iconos/codigoPostal.png" ALT="IMAGEN NO DISPONIBLE"> Codigo postal: <input value="" disabled class="camposDesign" type="number" name="CP" required><br><br></h3>
                                                    <br><br><hr>
                                                    <br><br>
                                                    <h3><IMG SRC="Recursos/iconos/tarjeta.png" ALT="IMAGEN NO DISPONIBLE"> Numero de tarjeta: <input value="" disabled class="camposDesign" type="number" name="NoTarjeta" required><br><br></h3>
                                                    <br><br><hr><br><br>
                                                    <h3><IMG SRC="Recursos/iconos/corazon.png" ALT="IMAGEN NO DISPONIBLE"> Categoria favorita:
                                                    <input value="" disabled class="camposDesign" type="number" name="categoria" required><br><br></h3>
                                                    <br><br></h3>
                                                    <br><br><hr><br><br>
                                                </form>
                                            </div>
                                        </div>
                                    </TD>
                                    <TD>
                                        &nbsp&nbsp
                                    </TD>
                                </TR>
                            </TABlE>
                        </TD>
                    </TR>
            </TABLE>
            </div>
        <?php }else{ ?>
                <div id="bodyLogin">
                <TABLE class="estandarTablaDesign2" CELLSPACING=0 CELLPADDING=7>
                        <TR>
                            <TD width=100% align="center">
                                <TABlE>
                                    <TR>
                                        <TD width=100% align="center" class="formDesign" class="imagenLogin">
                                            <div style="text-align: center;">
                                                <div tabindex="0" id="inicio"><H2>Crear cuenta <?php $admin ?></H2></div>
                                                <HR><br><br></HR>
                                                <div>
                                                    <!--Creamos el form que captura los datos de inicios sesion y los manda a-->
                                                    <!--otra pagina que valida que sean correctos los datos.-->
                                                    <form name="form" action="crearCuentaBDD.php" method="post">
                                                        <h3><IMG SRC="Recursos/iconos/info.png" ALT="IMAGEN NO DISPONIBLE"> ID Cuenta de administrador: <input value="" disabled class="camposDesign" type="text" name="usuario" required><br><br></h3>
                                                        <h3><IMG SRC="Recursos/iconos/usuario.png" ALT="IMAGEN NO DISPONIBLE"> Nombre de cuenta administrador: <input value="" disabled class="camposDesign" type="text" name="apellidoP" required>&nbsp&nbsp&nbsp
                                                        <br><br><hr><br><br>
                                                    </form>
                                                </div>
                                            </div>
                                        </TD>
                                        <TD>
                                            &nbsp&nbsp
                                        </TD>
                                    </TR>
                                </TABlE>
                            </TD>
                        </TR>
                </TABLE>
                </div>
        <?php }
    ?>
    <br><br><br><br><br><br>
</body>
</html>