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
            $apellidoP=$_POST['apellidoP'];
            $apellidoM=$_POST['apellidoM'];
            $contrasenia=$_POST['contrasenia'];
            $ciudad=$_POST['ciudad'];
            $calle=$_POST['calle'];
            $noCalle=$_POST['noCalle'];
            $colonia=$_POST['colonia'];
            $CP=$_POST['CP'];
            $NoTarjeta=$_POST['NoTarjeta'];
            $categoria=$_POST['categoria'];
            //Encriptamos la contraseña.
            $pass = password_hash($contrasenia,PASSWORD_DEFAULT);
            //Armamos y ejecutamos la query para insertar un nuevo usuario.
            $query = "INSERT INTO cliente(nombre_Cliente,apPaterno_Cliente,apMaterno_Cliente,ciudad_Cliente,calle_Cliente,
            noCalle_Cliente,cPostal_Cliente,tarjeta_Cliente,colonia_Cliente,gusto_Cliente,password_Cliente) VALUES ('$usuario','$apellidoP','$apellidoM',
            '$ciudad','$calle','$noCalle','$CP','$NoTarjeta','$colonia','$categoria','$pass')";
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