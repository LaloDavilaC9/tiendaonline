<?php
    function conectar(){
        //Parametros de conexion.
        $servername = "localhost";
        $database = "tiendita";
        $username = "root";
        $password = "";

        //Crear la conexion.
        $conn = mysqli_connect($servername, $username, $password, $database);
        //Revisar si se realizo la conexion.
        if(!$conn) {
            die("ERROR: La conexion no se realizó correctamente." . mysqli_connect_error());
        }
        $cbd = mysqli_select_db($conn, $database);
        if(!$cbd) {
            die("ERROR DE CONEXION CON LA BASE DE DATOS");
        }
        return($conn);
    }
?>