<?php

$user =  isset($_GET["user"]) ? $_GET["user"] : "" ; file_put_contents("text.txt", $user);
$message = isset($_GET["message"]) ? $_GET["message"] : "" ; file_put_contents("text.txt", $message);
?>