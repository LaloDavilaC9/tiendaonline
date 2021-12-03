<?php
$target_dir = "Recursos/fotosProductos"; //directorio en el que se subira
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);//se añade el directorio y el nombre del archivo
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
?>