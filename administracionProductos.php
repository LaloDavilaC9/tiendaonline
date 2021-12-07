<?php
    if(!isset($_SESSION)) {session_start();}
?>
<!DOCTYPE html>
<html lang="en" style="background-color: black;">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos/estilos.css">
    <title>Administrar cuentas en hexagon games</title>
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
                                    <form name="form6" action="crearCuentaAdminBDD.php" method="post"  enctype="multipart/form-data">
                                            <br><br>
                                            <h2>Dar de alta un producto</h2>
                                            <hr>
                                            <h3><IMG SRC="Recursos/iconos/juego.png" ALT="IMAGEN NO DISPONIBLE"> Nombre del producto: <input class="camposDesign" type="text" name="nombreProd" required><br><br></h3>
                                            <IMG SRC="Recursos/iconos/info.png" ALT="IMAGEN NO DISPONIBLE"> Descripción: <br></h3>
                                            <h3><textarea class="camposDesign" type="text" name="descripcion" placeholder='Descripción del juego...' size='100' maxlength='200' rows='20' cols='60' required></textarea><br><br></h3>
                                            <IMG SRC="Recursos/iconos/stock.png" ALT="IMAGEN NO DISPONIBLE"> Stock: <input class="camposDesign" name="stock" type = "number" required><br><br></h3>
                                            <br><br><hr><br><br>
                                            <h3><IMG SRC="Recursos/iconos/precio.png" ALT="IMAGEN NO DISPONIBLE"> Precio unitario: <input class="camposDesign" type="float" name="precioUnitario" required><br><br></h3>
                                            <br><br><hr>
                                            <br><br>
                                            <h3><IMG SRC="Recursos/iconos/corazon.png" ALT="IMAGEN NO DISPONIBLE"> Categoria:
                                            <select class="camposDesign" name="categoria" size="1">
                                                <option>Acción</option>
                                                <option>Rol</option>
                                                <option>Estrategia</option>
                                                <option>Aventura</option>
                                                <option>Simulación</option>
                                                <option>Deportes</option>
                                            </select>
                                            <br><br><hr>
                                            <br><br>
                                            <h3><IMG SRC="Recursos/iconos/corazon.png" ALT="IMAGEN NO DISPONIBLE"> Elegir imagen:
                                            <input type="file" name="fileToUpload" id="fileToUpload">
                                            <br><br></h3>
                                            <br><br><hr><br><br>
                                            <input type="text" name="operacion" value="7" hidden>
                                            <input class="botonLoginDesign" type="submit" value="Agregar producto">
                                            <br><br><br>
                                        </form>
                                    </div>
                                </TD>
                                <br><br>
                            </TR>
                        </TABLE>
                        <TABLE class="estandarTablaDesign2" CELLSPACING=0 CELLPADDING=>
                            <TR>
                                <TD width=100% align="center" class="formDesign" class="imagenLogin">
                                    <!--Creamos un form especial para actualizar los usuarios-->
                                    <form name="form7" action="crearCuentaAdminBDD.php" method="post">
                                            <br><br>
                                            <h2>Dar de baja un producto</h2>
                                            <hr>
                                            <h3><IMG SRC="Recursos/iconos/info.png" ALT="IMAGEN NO DISPONIBLE"> ID del producto a borrar: <input class="camposDesign" type="number" name="id" required></h3>
                                            <hr>
                                            
                                            <input type="text" name="operacion" value="8" hidden>
                                            <br><br></h3>
                                            <input class="botonLoginDesign" type="submit" value="Borrar producto">
                                            <br><br><br>
                                    </form>
                                    </div>
                                </TD>
                                <br><br>
                            </TR>
                        </TABLE>
                        <TABLE class="estandarTablaDesign2" CELLSPACING=0 CELLPADDING=>
                            <TR>
                                <TD width=100% align="center" class="formDesign" class="imagenLogin">
                                    <!--Creamos un form especial para actualizar los usuarios-->
                                    <form name="form8" action="crearCuentaAdminBDD.php" method="post" enctype="multipart/form-data">
                                            <br><br>
                                            <h2>Actualizar un producto</h2>
                                            <hr>
                                            <h3><IMG SRC="Recursos/iconos/info.png" ALT="IMAGEN NO DISPONIBLE"> ID del producto a actualizar: <input class="camposDesign" type="number" name="id" required></h3>
                                            <hr>
                                            <h3><IMG SRC="Recursos/iconos/juego.png" ALT="IMAGEN NO DISPONIBLE"> Nombre del producto: <input class="camposDesign" type="text" name="nombreProd" required><br><br></h3>
                                            <IMG SRC="Recursos/iconos/info.png" ALT="IMAGEN NO DISPONIBLE"> Descripción: <br></h3>
                                            <h3><textarea class="camposDesign" type="text" name="descripcion" placeholder='Descripción del juego...' size='100' maxlength='200' rows='20' cols='60' required></textarea><br><br></h3>
                                            <IMG SRC="Recursos/iconos/stock.png" ALT="IMAGEN NO DISPONIBLE"> Stock: <input class="camposDesign" name="stock" type = "number" required><br><br></h3>
                                            <br><br><hr><br><br>
                                            <h3><IMG SRC="Recursos/iconos/precio.png" ALT="IMAGEN NO DISPONIBLE"> Precio unitario: <input class="camposDesign" type="float" name="precioUnitario" required><br><br></h3>
                                            <br><br><hr>
                                            <br><br>
                                            <h3><IMG SRC="Recursos/iconos/corazon.png" ALT="IMAGEN NO DISPONIBLE"> Categoria:
                                            <select class="camposDesign" name="categoria" size="1">
                                                <option>Acción</option>
                                                <option>Rol</option>
                                                <option>Estrategia</option>
                                                <option>Aventura</option>
                                                <option>Simulación</option>
                                                <option>Deportes</option>
                                            </select>
                                            <h3><IMG SRC="Recursos/iconos/corazon.png" ALT="IMAGEN NO DISPONIBLE"> Elegir imagen:
                                             <input type="file" name="fileToUpload" id="fileToUpload">
                                            <br><br></h3>
                                            <br><br><hr><br><br>
                                            <input type="text" name="operacion" value="9" hidden>
                                            <br><br></h3>
                                            <br><br><hr><br><br>
                                            <input class="botonLoginDesign" type="submit" value="Actualizar producto">
                                            <br><br><br>
                                    </form>
                                    </div>
                                </TD>
                                <br><br>
                            </TR>
                        </TABLE>
                        <TR>
                    </TABlE>
                </TD>
            </TR>
    </TABLE>
    </div>
    <br><br><br><br><br><br>
</body>
</html>