<!DOCTYPE html>
<html lang="en" style="background-color: black;">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos/estilos.css">
    <title>Crear avisos en hexagon games</title>
    <script language="JavaScript">
        //Valide que se escriba la misma contraseña 2 veces.
    </script>
</head>
<body style="background-color: black;">
    <?php
        include ("metodos.php");
        encabezado();
    ?>
    <br><br><br><br><br><br><br>
    <div id="banner">
        <br><br>
        <img src="Recursos/imagenCrearCuentaAdmin.jpg" id="img_banner">
    </div>
    <div id="bodyLogin">
    <TABLE width=50% class="estandarTablaDesign2" CELLSPACING=0 CELLPADDING=7>
            <TR>
                <TD width=100% align="center">
                        <TABLE class="estandarTablaDesign2" CELLSPACING=0 CELLPADDING=>
                            <TR>
                                <TD width=100% align="center" class="formDesign" class="imagenLogin">
                                    <!--Creamos un form especial para actualizar los usuarios-->
                                    <form name="form10" action="crearCuentaAdminBDD.php" method="post">
                                            <br><br>
                                            <h2>Generar un aviso</h2>
                                            <hr>
                                            <h3><IMG SRC="Recursos/iconos/aviso.png" ALT="IMAGEN NO DISPONIBLE"> Titulo del aviso: <input class="camposDesign" size='50' maxlength='50' type="text" name="tituloAviso" required><br><br></h3>
                                            <IMG SRC="Recursos/iconos/info.png" ALT="IMAGEN NO DISPONIBLE"> Descripción: <br></h3>
                                            <h3><textarea class="camposDesign" type="text" name="descripcionAviso" placeholder='Escribe aquí...' size='100' maxlength='250' rows='10' cols='60' required></textarea><br><br></h3>
                                            <h3><IMG SRC="Recursos/iconos/corazon.png" ALT="IMAGEN NO DISPONIBLE"> Dirigido a:
                                            <select class="camposDesign" name="categoria" size="1">
                                                <option>Acción</option>
                                                <option>Rol</option>
                                                <option>Estrategia</option>
                                                <option>Aventura</option>
                                                <option>Simulación</option>
                                                <option>Deportes</option>
                                            </select>
                                            <input type="text" name="operacion" value="10" hidden>
                                            <br><br></h3>
                                            <br><br><hr><br><br>
                                            <input class="botonLoginDesign" type="submit" value="Agregar aviso">
                                            <br><br><br>
                                        </form>
                                    </div>
                                </TD>
                                <br><br>
                            </TR>
                        </TABLE>
                    </TABlE>
                </TD>
            </TR>
    </TABLE>
    </div>
    <br><br><br><br><br><br>
</body>
</html>