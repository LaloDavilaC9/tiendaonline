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
                        header('Location: datosUsuarios.php');
                    }else{
                        $_SESSION['creacionExitosa']=false;
                        $_SESSION['primeraVez']=1;
                        header('Location: datosUsuarios.php');
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
                        header('Location: datosUsuarios.php');
                    }else{
                        $_SESSION['creacionExitosa']=false;
                        $_SESSION['primeraVez']=1;
                        header('Location: datosUsuarios.php');
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
                        header('Location: datosUsuarios.php');
                    }else{
                        $_SESSION['creacionExitosa']=false;
                        $_SESSION['primeraVez']=1;
                        header('Location: datosUsuarios.php');
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
                        header('Location: datosUsuarios.php');
                    }else{
                        $_SESSION['creacionExitosa']=false;
                        $_SESSION['primeraVez']=1;
                        header('Location: datosUsuarios.php');
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
                        header('Location: datosUsuarios.php');
                    }else{
                        $_SESSION['creacionExitosa']=false;
                        $_SESSION['primeraVez']=1;
                        header('Location: datosUsuarios.php');
                    }
                    break;
                case '7':
                    //Guardamos las variables mandadas del form anterior.
                    $imagen="null";
                    $estrellas = 5;
                    $nombreProd=$_POST['nombreProd'];
                    $descripcion=$_POST['descripcion'];
                    $stock=$_POST['stock'];
                    $precioUnitario=$_POST['precioUnitario'];
                    $categoria=$_POST['categoria'];
                    $imagen = guardarImagen();
                    
                    //Armamos y ejecutamos la query para insertar un nuevo producto.
                    $query = "INSERT INTO producto(nombre_Producto,descripcion_Producto,stock_Producto,precioUnitario_Producto,
                            imagen_Producto,estrellas_Producto,categoria_Producto)
                            VALUES ('$nombreProd','$descripcion','$stock','$precioUnitario','$imagen','$estrellas',' $categoria')";
                    
                    if(mysqli_query($conexion, $query)){
                        $_SESSION['creacionExitosa']=true;
                        $_SESSION['primeraVez']=1;
                        header('Location: datosUsuarios.php');
                    }else{
                        $_SESSION['creacionExitosa']=false;
                        $_SESSION['primeraVez']=1;
                        header('Location: principal.php');
                    }
                    break;
                case '8':
                    //Guardamos las variables mandadas del form anterior.
                    $idProd = $_POST['id'];
                    //Armamos y ejecutamos la query para insertar un nuevo usuario.
                    $query = "DELETE FROM resena where id_Producto='$idProd'";
                    if(mysqli_query($conexion, $query)){
                        $_SESSION['creacionExitosa']=true;
                        $_SESSION['primeraVez']=1;
                        $query = "DELETE FROM producto where id_Producto=$idProd";
                        mysqli_query($conexion, $query);
                        header('Location: datosUsuarios.php');
                    }else{
                        $_SESSION['creacionExitosa']=false;
                        $_SESSION['primeraVez']=1;
                        header('Location: principal.php');
                    }
                    break;
                case '9':
                    $idProd = $_POST['id'];
                    //Guardamos las variables mandadas del form anterior.
                    $imagen="none";
                    $estrellas = 5;
                    $nombreProd=$_POST['nombreProd'];
                    $descripcion=$_POST['descripcion'];
                    $stock=$_POST['stock'];
                    $precioUnitario=$_POST['precioUnitario'];
                    $categoria=$_POST['categoria'];
                    $imagen = guardarImagen();
                    //Encriptamos la contraseña.
                    //Armamos y ejecutamos la query para insertar un nuevo usuario.
                    $query = "UPDATE producto SET nombre_Producto='$nombreProd',descripcion_Producto='$descripcion',
                            stock_Producto='$stock',precioUnitario_Producto='$precioUnitario',imagen_Producto='$imagen',
                            estrellas_Producto='$estrellas',categoria_Producto='$categoria'
                            WHERE id_Producto='$idProd'";
                    if(mysqli_query($conexion, $query)){
                        $_SESSION['creacionExitosa']=true;
                        $_SESSION['primeraVez']=1;
                        header('Location: datosUsuarios.php');
                    }else{
                        $_SESSION['creacionExitosa']=false;
                        $_SESSION['primeraVez']=1;
                        header('Location: principal.php');
                    }
                    break;
                case '10':
                    $tituloAviso=$_POST['tituloAviso'];
                    $descripcionAviso=$_POST['descripcionAviso'];
                    $categoria = $_POST['categoria'];
                    $query = "UPDATE avisos SET tituloAviso='$tituloAviso',descripcionAviso='$descripcionAviso',generoAviso='$categoria' WHERE idavisos='1'";
                    if(mysqli_query($conexion, $query)){
                        $_SESSION['creacionExitosa']=true;
                        $_SESSION['primeraVez']=1;
                        header('Location: datosUsuarios.php');
                    }else{
                        $_SESSION['creacionExitosa']=false;
                        $_SESSION['primeraVez']=1;
                        header('Location: datosUsuarios.php');
                    }
                    break;
                }
                
                
                
                function guardarImagen(){
                    $target_dir = "Recursos/fotosProductos/"; //directorio en el que se subira
                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);//se añade el directorio y el nombre del archivo
                    $imagen = basename($_FILES["fileToUpload"]["name"]);
                    $uploadOk = 1;//se añade un valor determinado en 1
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    // Comprueba si el archivo de imagen es una imagen real o una imagen falsa
                    if(isset($_POST["submit"])) {//detecta el boton
                        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                        if($check !== false) {//si es falso es una imagen y si no lanza error
                            echo "Archivo es una imagen- " . $check["mime"] . ".";
                            $uploadOk = 1;
                        } else {
                            echo "El archivo no es una imagen";
                            $uploadOk = 0;
                        }
                    }
                    // Comprobar si el archivo ya existe
                    if (file_exists($target_file)) {
                        echo "El archivo ya existe";
                        $uploadOk = 0;//si existe lanza un valor en 0
                    }
                    // Comprueba el peso
                    if ($_FILES["fileToUpload"]["size"] > 500000) {
                        echo "Perdon pero el archivo es muy pesado";
                        $uploadOk = 0;
                    }
                    // Permitir ciertos formatos de archivo
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                        echo "Perdon solo, JPG, JPEG, PNG & GIF Estan soportados";
                        $uploadOk = 0;
                    }
                    //Comprueba si $ uploadOk se establece en 0 por un error
                    if ($uploadOk == 0) {
                        echo "Perdon, pero el archivo no se subio";
                    // si todo está bien, intenta subir el archivo
                    } else {
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                            echo "El archivo ". basename( $_FILES["fileToUpload"]["name"]). " Se subio correctamente";
                        } else {
                            echo "Error al cargar el archivo";
                        }
                    }
                    return $imagen;
                }
        ?>
</body>
</html>