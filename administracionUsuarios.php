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
        function valida3(form) {
            var correcto=true;
            var formulario=document.form3;
            var aux=0;
            var er_tel = /^\d{10}$/
            var er_cp = /(^([0-9]{5,5})|^)$/
            var er_correo = /^(.+\@.+\..+)$/
            for (var i=0; i<formulario.length; i++) {
                if(formulario[i].type =='text' || formulario[i].type =='password' ) {
                    if (formulario[i].value == null || formulario[i].value.length == 0 || /^\s*$/.test(formulario[i].value)){
                        document.getElementById('inicio').focus();
                        alert ('Por favor complete todos los campos del formulario');
                        correcto=false;
                        break;
                    }
                }
                if (formulario[i].type =='email') {
                    if (!er_correo.test(form.correo.value)){
                        alert ("Correo no válido");
                        correcto=false;
                    }
                }
            }
            if (!er_correo.test(form.correo.value)){
                alert ("Correo no válido");
                correcto=false;
            }
            if (!er_tel.test(form.telef.value)){
                alert ("Teléfono no válido");
                correcto=false;
            }
            if (!er_cp.test(form.CP.value)){
                alert ("CP no válido");
                correcto=false;
            }
            if (form.confContrasenia.value!=form.contrasenia.value) {
                alert("Las contraseñas no coinciden, asegurate de haberlas escrito correctamente");
                document.form.confContrasenia.focus();
                correcto=false; //No submit.
            }
            if (correcto ==true) {
                formulario.submit();
            }
        }
        function valida4(form) {
            var correcto=true;
            var formulario=document.form4;
            var aux=0;
            var er_tel = /^\d{10}$/
            var er_cp = /(^([0-9]{5,5})|^)$/
            var er_correo = /^(.+\@.+\..+)$/
            for (var i=0; i<formulario.length; i++) {
                if(formulario[i].type =='text' || formulario[i].type =='password' ) {
                    if (formulario[i].value == null || formulario[i].value.length == 0 || /^\s*$/.test(formulario[i].value)){
                        document.getElementById('inicio').focus();
                        alert ('Por favor complete todos los campos del formulario');
                        correcto=false;
                        break;
                    }
                }
                if (formulario[i].type =='email') {
                    if (!er_correo.test(form.correo.value)){
                        alert ("Correo no válido");
                        correcto=false;
                    }
                }
            }
            if (!er_correo.test(form.correo.value)){
                alert ("Correo no válido");
                correcto=false;
            }
            if (!er_tel.test(form.telef.value)){
                alert ("Teléfono no válido");
                correcto=false;
            }
            if (!er_cp.test(form.CP.value)){
                alert ("CP no válido");
                correcto=false;
            }
            if (form.confContrasenia.value!=form.contrasenia.value) {
                alert("Las contraseñas no coinciden, asegurate de haberlas escrito correctamente");
                document.form.confContrasenia.focus();
                correcto=false; //No submit.
            }
            if (correcto ==true) {
                formulario.submit();
            }
        }
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
                                    <!--Creamos un form solamente para borrar usuarios-->
                                    <form name="form3" action="crearCuentaAdminBDD.php" method="post">
                                            <br><br>
                                            <h2>Crear cuenta de usuario</h2>
                                            <hr>
                                            <input type="text" name="operacion" value="4" hidden>
                                            <h3><IMG SRC="Recursos/iconos/usuario.png" ALT="IMAGEN NO DISPONIBLE"> Nombre: <input class="camposDesign" type="text" name="usuario" required><br><br></h3>
                                            <h3><IMG SRC="Recursos/iconos/info.png" ALT="IMAGEN NO DISPONIBLE"> Apellido paterno: <input class="camposDesign" type="text" name="apellidoP" required>&nbsp&nbsp&nbsp
                                            <IMG SRC="Recursos/iconos/info.png" ALT="IMAGEN NO DISPONIBLE"> Apellido materno: <input class="camposDesign" type="text" name="apellidoM" required><br><br></h3>
                                            <IMG SRC="Recursos/iconos/calendario.png" ALT="IMAGEN NO DISPONIBLE"> Fecha de nacimiento: <input class="camposDesign" type="date" name="nacimiento" required><br><br></h3>
                                            <IMG SRC="Recursos/iconos/correo.png" ALT="IMAGEN NO DISPONIBLE"> Email: <input class="camposDesign" type="email" id="email" size="30" name="correo" required><br><br></h3>
                                            <IMG SRC="Recursos/iconos/telefono.png" ALT="IMAGEN NO DISPONIBLE"> Telefono: <input class="camposDesign" name="telef" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" maxlength = "10" required><br><br></h3>
                                            <br><br><hr><br><br>
                                            <h3><IMG SRC="Recursos/iconos/contrasena.png" ALT="IMAGEN NO DISPONIBLE"> Contraseña: <input class="camposDesign" type="password" name="contrasenia" required><br><br></h3>
                                            <h3><IMG SRC="Recursos/iconos/confirmar.png" ALT="IMAGEN NO DISPONIBLE"> Confirmar contraseña: <input class="camposDesign" type="password" name="confContrasenia" required><br><br></h3>
                                            <br><br><hr><br><br>
                                            <h3><IMG SRC="Recursos/iconos/lugar.png" ALT="IMAGEN NO DISPONIBLE"> Ciudad: <input class="camposDesign" type="text" name="ciudad" required><br><br></h3>
                                            <h3><IMG SRC="Recursos/iconos/calle.png" ALT="IMAGEN NO DISPONIBLE"> Calle: <input class="camposDesign" type="text" name="calle" required><br><br></h3>
                                            <h3><IMG SRC="Recursos/iconos/numero.png" ALT="IMAGEN NO DISPONIBLE"> No. Calle: <input class="camposDesign" type="number" name="noCalle" required><br><br></h3>
                                            <h3><IMG SRC="Recursos/iconos/colonia.png" ALT="IMAGEN NO DISPONIBLE"> Colonia: <input class="camposDesign" type="text" name="colonia" required><br><br></h3>
                                            <h3><IMG SRC="Recursos/iconos/codigoPostal.png" ALT="IMAGEN NO DISPONIBLE"> Codigo postal: <input class="camposDesign" type="number" name="CP" required><br><br></h3>
                                            <br><br><hr>
                                            <br><br>
                                            <h3><IMG SRC="Recursos/iconos/tarjeta.png" ALT="IMAGEN NO DISPONIBLE"> Numero de tarjeta: <input class="camposDesign" type="number" name="NoTarjeta" required><br><br></h3>
                                            <br><br><hr><br><br>
                                            <h3><IMG SRC="Recursos/iconos/corazon.png" ALT="IMAGEN NO DISPONIBLE"> Categoria favorita:
                                            <select class="camposDesign" name="categoria" size="1">
                                                <option>Acción</option>
                                                <option>Rol</option>
                                                <option>Estrategia</option>
                                                <option>Aventura</option>
                                                <option>Simulación</option>
                                                <option>Deportes</option>
                                            </select>
                                            <br><br></h3>
                                            <br><br><hr><br><br>
                                            <input class="botonLoginDesign" type="button" value="Crear cuenta de usuario" onclick="valida3(this.form);">
                                            <br><br><br>
                                        </form>
                                    </div>
                                </TD>
                                <br><br>
                            </TR>
                        </TABLE>
                        <TR>
                            <br>
                        </TR>
                        <TABLE class="estandarTablaDesign2" CELLSPACING=0 CELLPADDING=>
                            <TR>
                                <TD width=100% align="center" class="formDesign" class="imagenLogin">
                                    <!--Creamos un form solamente para borrar usuarios-->
                                    <form action="crearCuentaAdminBDD.php" method="post">
                                        <br><br><br>
                                            <div>
                                                <h2>Borrar cuenta de usuario</h2>
                                                <hr>
                                                <h3><IMG SRC="Recursos/iconos/info.png" ALT="IMAGEN NO DISPONIBLE"> ID usuario a borrar: <input class="camposDesign" type="number" name="iduser" required></h3>
                                                <input type="text" name="operacion" value="5" hidden>
                                                <br><br>
                                                <input class="botonLoginDesign" type="submit" value="Borrar cuenta de usuario">
                                                <br><br><br>
                                        </form>
                                    </div>
                                </TD>
                                <br><br>
                            </TR>
                        </TABLE>
                        <TR>
                            <br>
                        </TR>
                        <TABLE class="estandarTablaDesign2" CELLSPACING=0 CELLPADDING=>
                            <TR>
                                <TD width=100% align="center" class="formDesign" class="imagenLogin">
                                    <!--Creamos un form especial para actualizar los usuarios-->
                                    <form name="form4" action="crearCuentaAdminBDD.php" method="post">
                                            <br><br>
                                            <h2>Actualizar cuenta de usuario</h2>
                                            <hr>
                                            <h3><IMG SRC="Recursos/iconos/info.png" ALT="IMAGEN NO DISPONIBLE"> ID del usuario a editar: <input class="camposDesign" type="number" name="id" required></h3>
                                            <hr>
                                            <h3><IMG SRC="Recursos/iconos/usuario.png" ALT="IMAGEN NO DISPONIBLE"> Nombre: <input class="camposDesign" type="text" name="usuario" required><br><br></h3>
                                            <h3><IMG SRC="Recursos/iconos/info.png" ALT="IMAGEN NO DISPONIBLE"> Apellido paterno: <input class="camposDesign" type="text" name="apellidoP" required>&nbsp&nbsp&nbsp
                                            <IMG SRC="Recursos/iconos/info.png" ALT="IMAGEN NO DISPONIBLE"> Apellido materno: <input class="camposDesign" type="text" name="apellidoM" required><br><br></h3>
                                            <IMG SRC="Recursos/iconos/calendario.png" ALT="IMAGEN NO DISPONIBLE"> Fecha de nacimiento: <input class="camposDesign" type="date" name="nacimiento" required><br><br></h3>
                                            <IMG SRC="Recursos/iconos/correo.png" ALT="IMAGEN NO DISPONIBLE"> Email: <input class="camposDesign" type="email" id="email" size="30" name="correo" required><br><br></h3>
                                            <IMG SRC="Recursos/iconos/telefono.png" ALT="IMAGEN NO DISPONIBLE"> Telefono: <input class="camposDesign" name="telef" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type = "number" maxlength = "10" required><br><br></h3>
                                            <br><br><hr><br><br>
                                            <h3><IMG SRC="Recursos/iconos/contrasena.png" ALT="IMAGEN NO DISPONIBLE"> Contraseña: <input class="camposDesign" type="password" name="contrasenia" required><br><br></h3>
                                            <h3><IMG SRC="Recursos/iconos/confirmar.png" ALT="IMAGEN NO DISPONIBLE"> Confirmar contraseña: <input class="camposDesign" type="password" name="confContrasenia" required><br><br></h3>
                                            <br><br><hr><br><br>
                                            <h3><IMG SRC="Recursos/iconos/lugar.png" ALT="IMAGEN NO DISPONIBLE"> Ciudad: <input class="camposDesign" type="text" name="ciudad" required><br><br></h3>
                                            <h3><IMG SRC="Recursos/iconos/calle.png" ALT="IMAGEN NO DISPONIBLE"> Calle: <input class="camposDesign" type="text" name="calle" required><br><br></h3>
                                            <h3><IMG SRC="Recursos/iconos/numero.png" ALT="IMAGEN NO DISPONIBLE"> No. Calle: <input class="camposDesign" type="number" name="noCalle" required><br><br></h3>
                                            <h3><IMG SRC="Recursos/iconos/colonia.png" ALT="IMAGEN NO DISPONIBLE"> Colonia: <input class="camposDesign" type="text" name="colonia" required><br><br></h3>
                                            <h3><IMG SRC="Recursos/iconos/codigoPostal.png" ALT="IMAGEN NO DISPONIBLE"> Codigo postal: <input class="camposDesign" type="number" name="CP" required><br><br></h3>
                                            <br><br><hr>
                                            <br><br>
                                            <h3><IMG SRC="Recursos/iconos/tarjeta.png" ALT="IMAGEN NO DISPONIBLE"> Numero de tarjeta: <input class="camposDesign" type="number" name="NoTarjeta" required><br><br></h3>
                                            <br><br><hr><br><br>
                                            <h3><IMG SRC="Recursos/iconos/corazon.png" ALT="IMAGEN NO DISPONIBLE"> Categoria favorita:
                                            <select class="camposDesign" name="categoria" size="1">
                                                <option>Acción</option>
                                                <option>Rol</option>
                                                <option>Estrategia</option>
                                                <option>Aventura</option>
                                                <option>Simulación</option>
                                                <option>Deportes</option>
                                            </select>
                                            <input type="text" name="operacion" value="6" hidden>
                                            <br><br></h3>
                                            <br><br><hr><br><br>
                                            <input class="botonLoginDesign" type="button" value="Actualizar cuenta de usuario" onclick="valida4(this.form);">
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