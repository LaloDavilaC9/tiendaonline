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
    <title>Crear cuenta administrador</title>
    <script language="JavaScript">
        //Valide que se escriba la misma contraseña 2 veces.
        function valida(form) {
            var correcto=true;
            var formulario=document.form;
            var aux=0;
            for (var i=0; i<formulario.length; i++) {
                if(formulario[i].type =='text' || formulario[i].type =='password' ) {
                    if (formulario[i].value == null || formulario[i].value.length == 0 || /^\s*$/.test(formulario[i].value)){
                        document.getElementById('inicio').focus();
                        alert ('Por favor complete todos los campos del formulario');
                        correcto=false;
                        break;
                    }
                }
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
<body class="estandarTablaDesign">
    <div id="banner">
        <br><br>
        <img src="Recursos/imagenCrearCuentaAdmin.jpg" id="img_banner">
    </div>
    <div id="bodyLogin">
    <TABLE class="estandarTablaDesign" CELLSPACING=0 CELLPADDING=7>
            <TR>
                <TD width=100% align="center">
                    <TABlE>
                        <TR>
                            <TD width=100% align="center" class="formDesign" class="imagenLogin">
                                <div style="text-align: center;">
                                    <div tabindex="0" id="inicio"><H2>Crear cuenta administrador</H2></div>
                                    <HR><br><br></HR>
                                    <div>
                                        <!--Creamos el form que captura los datos de inicios sesion y los manda a-->
                                        <!--otra pagina que valida que sean correctos los datos.-->
                                        <form name="form" action="crearCuentaAdminBDD.php" method="post">
                                            <h3><IMG SRC="Recursos/iconos/usuario.png" ALT="IMAGEN NO DISPONIBLE"> Nombre de la cuenta: <input class="camposDesign" type="text" name="usuario" required><br><br></h3>
                                            <h3><IMG SRC="Recursos/iconos/contrasena.png" ALT="IMAGEN NO DISPONIBLE"> Contraseña: <input class="camposDesign" type="password" name="contrasenia" required><br><br></h3>
                                            <h3><IMG SRC="Recursos/iconos/confirmar.png" ALT="IMAGEN NO DISPONIBLE"> Confirmar contraseña: <input class="camposDesign" type="password" name="confContrasenia" required><br><br></h3>
                                            <br><br><hr><br><br>
                                            <input class="botonLoginDesign" type="button" value="Crear cuenta" onclick="valida(this.form);">
                                        </form>
                                    </div>
                                    <br><br><br>
                                    <!--Permitimos que se navegue por la pagina pero sin crear una sesion.-->
                                    <p>¿Quieres iniciar sesión? <a href="login.php">Da click aquí</a>
                                        <br><br><br><br><br>
                                    </p>
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
    <br><br><br><br><br><br>
</body>
</html>