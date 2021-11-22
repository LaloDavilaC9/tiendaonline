<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
    </head>
    <body>
        <?php
            //Creamos la conexion.
            include ("sqlConn.php");
            $conexion = conectar();
            //Guardamos las variables mandadas del form anterior.
            $usuario=$_POST['usuario'];
            $contrasenia=$_POST['contrasenia'];
            //Encriptamos la contraseña.
            $pass = password_hash($contrasenia,PASSWORD_DEFAULT);
            //Armamos y ejecutamos la query para insertar un nuevo usuario.
            $query = "INSERT INTO cuentas(nombre_Cuenta,password_Cuenta) VALUES ('$usuario','$pass')";
            if(mysqli_query($conexion, $query)){
                $_SESSION['creacionExitosa']=true;
                $_SESSION['primeraVez']=1;
                header('Location: login.php');
            }else{
                $_SESSION['creacionExitosa']=false;
                $_SESSION['primeraVez']=1;
                header('Location: login.php');
            }
        ?>
    </body>
</html>