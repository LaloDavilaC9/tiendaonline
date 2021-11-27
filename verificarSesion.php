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
            include ("sqlConn.php");
            $conexion = conectar();
            $usuario=$_POST['usuario'];
            $contrasena=$_POST['contrasenia'];
            $query = mysqli_query($conexion,"SELECT * FROM cliente WHERE nombre_Cliente = '$usuario'");
            $aux =mysqli_num_rows($query);
            $pass = mysqli_fetch_array($query);//Se valida que el usuario exista.
            if(($aux==1) && (password_verify($contrasena,$pass['password_Cliente']))){
                if($_POST){//Inicia la sesion.
                    if(@$_SESSION['autentif']!=true){
                        $_SESSION['autentif']=TRUE;
                        $_SESSION['user']=$usuario;//Guardamos en una variable se sesion el usuario que accedió.
                        $_SESSION['admin'] = 0;//Guardamos en una variable de sesion si es o no admin.
                        $_SESSION['idCliente'] = $pass['id_Cliente']; //Guardamos en una variable de sesión el ID del usuario
                    }
                }
                header('Location: principal.php');
            }else{
                $query = mysqli_query($conexion,"SELECT * FROM cuentas WHERE nombre_Cuenta = '$usuario'");
                $aux =mysqli_num_rows($query);
                $pass = mysqli_fetch_array($query);//Se valida que el usuario exista.
                if(($aux==1) && (password_verify($contrasena,$pass['password_Cuenta']))){
                    if($_POST){//Inicia la sesion.
                        if(@$_SESSION['autentif']!=true){
                            $_SESSION['autentif']=TRUE;
                            $_SESSION['user']=$usuario;//Guardamos en una variable se sesion el usuario que accedió.
                            $_SESSION['admin'] = 1;//Guardamos en una variable de sesion si es o no admin.
                        }
                    }
                    header('Location: principal.php');
                }else{
                    header('Location: login.php');
                }
            }
        ?>
</body>

</html>