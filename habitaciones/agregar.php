<?php

include("../config/conexion.php");

if(isset($_POST['guardar'])){

    $numero = $_POST['numero'];
    $tipo = $_POST['tipo'];
    $estado = $_POST['estado'];

    $sql = "INSERT INTO habitaciones(numero,tipo,estado)
            VALUES('$numero','$tipo','$estado')";

    if($conn->query($sql)){
        header("Location: listar.php");
        exit();
    }else{
        echo "Error: ".$conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Agregar Habitación</title>

<style>

body{
    font-family:Arial, Helvetica, sans-serif;
    background:linear-gradient(135deg,#0d6efd,#6ea8fe);
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
}

.contenedor{
    width:450px;
    background:white;
    padding:30px;
    border-radius:15px;
    box-shadow:0 15px 35px rgba(0,0,0,.25);
}

h2{
    text-align:center;
    color:#0d6efd;
    margin-bottom:25px;
}

input,select{
    width:100%;
    padding:12px;
    margin-bottom:15px;
    border:1px solid #ccc;
    border-radius:8px;
    font-size:16px;
}

button{
    width:100%;
    padding:12px;
    background:#0d6efd;
    color:white;
    border:none;
    border-radius:8px;
    cursor:pointer;
    font-size:16px;
}

button:hover{
    background:#0b5ed7;
}

a{
    display:block;
    text-align:center;
    margin-top:20px;
    text-decoration:none;
    color:#0d6efd;
    font-weight:bold;
}

</style>

</head>

<body>

<div class="contenedor">

<h2>Agregar Habitación</h2>

<form method="POST">

<input
type="text"
name="numero"
placeholder="Número de habitación"
required>

<input
type="text"
name="tipo"
placeholder="Tipo de habitación"
required>

<select name="estado" required>

<option value="Disponible">Disponible</option>

<option value="Ocupada">Ocupada</option>

<option value="Mantenimiento">Mantenimiento</option>

</select>

<button type="submit" name="guardar">

Guardar Habitación

</button>

</form>

<a href="listar.php">Regresar</a>

</div>

</body>
</html>