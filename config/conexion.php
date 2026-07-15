<?php

$host = "localhost";
$usuario = "root";
$contrasena = "root";
$base_datos = "hospital_bd";

$conn = new mysqli($host, $usuario, $contrasena, $base_datos);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Configurar caracteres UTF-8
$conn->set_charset("utf8");

?>