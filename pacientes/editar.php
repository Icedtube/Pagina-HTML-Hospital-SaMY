<?php

include("../config/conexion.php");

$id = $_GET['id'];

if(isset($_POST['actualizar'])){

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $sexo = $_POST['sexo'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $diagnostico = $_POST['diagnostico'];
    $fecha_ingreso = $_POST['fecha_ingreso'];

    $sql = "UPDATE pacientes SET
    nombre='$nombre',
    apellido='$apellido',
    edad='$edad',
    sexo='$sexo',
    telefono='$telefono',
    direccion='$direccion',
    diagnostico='$diagnostico',
    fecha_ingreso='$fecha_ingreso'
    WHERE id_paciente=$id";

    if($conn->query($sql)){
        header("Location: listar.php");
        exit();
    }
}

$sql="SELECT * FROM pacientes WHERE id_paciente=$id";
$resultado=$conn->query($sql);
$fila=$resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Editar Paciente</title>

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
background:#0d6efd;
color:white;
border:none;

}

</style>

</head>

<body>

<form method="POST">

<h2>Editar Paciente</h2>

<input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>">

<input type="text" name="apellido" value="<?php echo $fila['apellido']; ?>">

<input type="number" name="edad" value="<?php echo $fila['edad']; ?>">

<select name="sexo">

<option <?php if($fila['sexo']=="Masculino") echo "selected"; ?>>Masculino</option>

<option <?php if($fila['sexo']=="Femenino") echo "selected"; ?>>Femenino</option>

</select>

<input type="text" name="telefono" value="<?php echo $fila['telefono']; ?>">

<input type="text" name="direccion" value="<?php echo $fila['direccion']; ?>">

<input type="text" name="diagnostico" value="<?php echo $fila['diagnostico']; ?>">

<input type="date" name="fecha_ingreso" value="<?php echo $fila['fecha_ingreso']; ?>">

<button type="submit" name="actualizar">

Actualizar Paciente

</button>

</form>

</body>
</html>