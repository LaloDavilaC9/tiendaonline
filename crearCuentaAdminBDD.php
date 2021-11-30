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
            $operacion = $_POST['operacion'];
            switch ($operacion) {
                case '1': //Agregamos un usuario administrador
                    //Guardamos las variables mandadas del form anterior.
                    $usuario=$_POST['usuario'];
                    $contrasenia=$_POST['contrasenia'];
                    $email = $_POST['correo'];
                    //Encriptamos la contraseña.
                    $pass = password_hash($contrasenia,PASSWORD_DEFAULT);
                    //Armamos y ejecutamos la query para insertar un nuevo usuario.
                    $query = "INSERT INTO cuentas(nombre_Cuenta,password_Cuenta,email_Cuenta) VALUES ('$usuario','$pass','$email')";
                    if(mysqli_query($conexion, $query)){
                        $_SESSION['creacionExitosa']=true;
                        $_SESSION['primeraVez']=1;
                        header('Location: login.php');
                    }else{
                        $_SESSION['creacionExitosa']=false;
                        $_SESSION['primeraVez']=1;
                        header('Location: login.php');
                    }
                    break;
                case '2': //Borramos al usuario administrador
                    //Guardamos las variables mandadas del form anterior.
                    $iduser = $_POST['iduser'];
                    //Armamos y ejecutamos la query para insertar un nuevo usuario.
                    $query = "DELETE FROM cuentas where id_Cuenta='$iduser'";
                    if(mysqli_query($conexion, $query)){
                        $_SESSION['creacionExitosa']=true;
                        $_SESSION['primeraVez']=1;
                        header('Location: login.php');
                    }else{
                        $_SESSION['creacionExitosa']=false;
                        $_SESSION['primeraVez']=1;
                        header('Location: login.php');
                    }
                    break;
                case '3': // Actualizamos datos del usuario administrador
                    $iduser = $_POST['id'];
                    //Guardamos las variables mandadas del form anterior.
                    $usuario=$_POST['usuario'];
                    $contrasenia=$_POST['contrasenia'];
                    $email = $_POST['correo'];
                    //Encriptamos la contraseña.
                    $pass = password_hash($contrasenia,PASSWORD_DEFAULT);
                    //Armamos y ejecutamos la query para insertar un nuevo usuario.
                    $query = "UPDATE cuentas SET nombre_Cuenta='$usuario',password_Cuenta='$pass',email_Cuenta='$email' WHERE id_Cuenta='$iduser'";
                    if(mysqli_query($conexion, $query)){
                        $_SESSION['creacionExitosa']=true;
                        $_SESSION['primeraVez']=1;
                        header('Location: login.php');
                    }else{
                        $_SESSION['creacionExitosa']=false;
                        $_SESSION['primeraVez']=1;
                        header('Location: login.php');
                    }
                    break;
                case '4': //Agregamos cliente
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
                    $fechaNacimiento=$_POST['nacimiento'];
                    $email = $_POST['correo'];
                    $telef = $_POST['telef'];
                    //Encriptamos la contraseña.
                    $pass = password_hash($contrasenia,PASSWORD_DEFAULT);
                    //Armamos y ejecutamos la query para insertar un nuevo usuario.
                    $query = "INSERT INTO cliente(nombre_Cliente,apPaterno_Cliente,apMaterno_Cliente,ciudad_Cliente,calle_Cliente,
                            noCalle_Cliente,cPostal_Cliente,tarjeta_Cliente,colonia_Cliente,gusto_Cliente,password_Cliente,email_Cliente,telefono_Cliente,fechaNacimiento_Cliente)
                            VALUES ('$usuario','$apellidoP','$apellidoM','$ciudad','$calle','$noCalle','$CP','$NoTarjeta','$colonia','$categoria','$pass','$email','$telef','$fechaNacimiento')";
                    if(mysqli_query($conexion, $query)){
                        $_SESSION['creacionExitosa']=true;
                        $_SESSION['primeraVez']=1;
                        header('Location: login.php');
                    }else{
                        $_SESSION['creacionExitosa']=false;
                        $_SESSION['primeraVez']=1;
                        header('Location: login.php');
                    }
                    break;
                case '5': //Borramos a un cliente
                    //Guardamos las variables mandadas del form anterior.
                    $iduser = $_POST['iduser'];
                    //Armamos y ejecutamos la query para insertar un nuevo usuario.
                    $query = "DELETE FROM cliente where id_Cliente='$iduser'";
                    if(mysqli_query($conexion, $query)){
                        $_SESSION['creacionExitosa']=true;
                        $_SESSION['primeraVez']=1;
                        header('Location: login.php');
                    }else{
                        $_SESSION['creacionExitosa']=false;
                        $_SESSION['primeraVez']=1;
                        header('Location: login.php');
                    }
                    break;
                case '6': //Actualizar datos del cliente
                    //Guardamos las variables mandadas del form anterior.
                    $iduser = $_POST['id'];
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
                    $fechaNacimiento=$_POST['nacimiento'];
                    $email = $_POST['correo'];
                    $telef = $_POST['telef'];
                    //Encriptamos la contraseña.
                    $pass = password_hash($contrasenia,PASSWORD_DEFAULT);
                    //Armamos y ejecutamos la query para insertar un nuevo usuario.
                    $query = "UPDATE cliente SET nombre_Cliente='$usuario',apPaterno_Cliente='$apellidoP',apMaterno_Cliente='$apellidoM',
                        ciudad_Cliente='$ciudad',calle_Cliente='$calle',noCalle_Cliente='$noCalle',cPostal_Cliente='$CP',
                        tarjeta_Cliente='$NoTarjeta',colonia_Cliente='$colonia',gusto_Cliente='$categoria',password_Cliente='$pass',
                        email_Cliente='$email',telefono_Cliente='$telef',fechaNacimiento_Cliente='$fechaNacimiento' WHERE id_Cliente='$iduser'";
                    if(mysqli_query($conexion, $query)){
                        $_SESSION['creacionExitosa']=true;
                        $_SESSION['primeraVez']=1;
                        header('Location: login.php');
                    }else{
                        $_SESSION['creacionExitosa']=false;
                        $_SESSION['primeraVez']=1;
                        header('Location: login.php');
                    }
                    break;
                case '7':
                    
                    break;
                case '8':
                    
                    break;
                case '9':
                    
                    break;
                    default:
                    # code...
                    break;
            }
        ?>
</body>

</html>