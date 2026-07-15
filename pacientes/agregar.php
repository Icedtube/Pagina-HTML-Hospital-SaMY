<?php

include("../config/conexion.php");

if(isset($_POST['guardar'])){

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $sexo = $_POST['sexo'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $diagnostico = $_POST['diagnostico'];
    $fecha_ingreso = $_POST['fecha_ingreso'];

    $sql = "INSERT INTO pacientes
    (nombre,apellido,edad,sexo,telefono,direccion,diagnostico,fecha_ingreso)
    VALUES
    ('$nombre','$apellido','$edad','$sexo','$telefono','$direccion','$diagnostico','$fecha_ingreso')";

    if($conn->query($sql)){
        header("Location: listar.php");
        exit();
    }else{
        echo "Error al guardar.";
    }

}
?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">
<title>Agregar Paciente</title>

<style>

body{
    font-family:Arial;
    background:#f4f4f4;
}

form{

width:500px;
margin:30px auto;
background:white;
padding:20px;
border-radius:10px;

}

input,select{

width:100%;
padding:10px;
margin:8px 0;

}

button{

width:100%;
padding:10px;
background:#198754;
color:white;
border:none;

}

</style>

</head>

<body>

<form method="POST">

<h2>Registrar Paciente</h2>

<input type="text" name="nombre" placeholder="Nombre" required>

<input type="text" name="apellido" placeholder="Apellido" required>

<input type="number" name="edad" placeholder="Edad" required>

<select name="sexo">

<option>Masculino</option>

<option>Femenino</option>

</select>

<input type="text" name="telefono" placeholder="Teléfono">

<input type="text" name="direccion" placeholder="Dirección">

<input type="text" name="diagnostico" placeholder="Diagnóstico">

<input type="date" name="fecha_ingreso" required>

<button type="submit" name="guardar">

Guardar Paciente

</button>

</form>

</body>
</html>