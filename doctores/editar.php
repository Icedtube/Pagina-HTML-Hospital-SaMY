<?php

include("../config/conexion.php");

$id = $_GET['id'];

$sql = "SELECT * FROM doctores WHERE id_doctor='$id'";
$resultado = $conn->query($sql);
$fila = $resultado->fetch_assoc();

if(isset($_POST['actualizar'])){

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $especialidad = $_POST['especialidad'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $sql = "UPDATE doctores SET
            nombre='$nombre',
            apellido='$apellido',
            especialidad='$especialidad',
            telefono='$telefono',
            correo='$correo'
            WHERE id_doctor='$id'";

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

<title>Editar Doctor</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{

    background:linear-gradient(135deg,#0d6efd,#6ea8fe);
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;

}

.contenedor{

    width:500px;
    background:white;
    padding:35px;
    border-radius:15px;
    box-shadow:0 15px 35px rgba(0,0,0,.25);

}

h2{

    text-align:center;
    color:#0d6efd;
    margin-bottom:25px;

}

input{

    width:100%;
    padding:12px;
    margin-bottom:15px;
    border:1px solid #ccc;
    border-radius:8px;
    font-size:15px;

}

.botones{

    display:flex;
    justify-content:space-between;

}

button,
a{

    width:48%;
    padding:12px;
    border:none;
    border-radius:8px;
    text-decoration:none;
    text-align:center;
    font-size:16px;

}

button{

    background:#198754;
    color:white;
    cursor:pointer;

}

button:hover{

    background:#157347;

}

a{

    background:#6c757d;
    color:white;

}

a:hover{

    background:#565e64;

}

</style>

</head>

<body>

<div class="contenedor">

<h2>Editar Doctor</h2>

<form method="POST">

<input
type="text"
name="nombre"
value="<?php echo $fila['nombre']; ?>"
required>

<input
type="text"
name="apellido"
value="<?php echo $fila['apellido']; ?>"
required>

<input
type="text"
name="especialidad"
value="<?php echo $fila['especialidad']; ?>"
required>

<input
type="text"
name="telefono"
value="<?php echo $fila['telefono']; ?>"
required>

<input
type="email"
name="correo"
value="<?php echo $fila['correo']; ?>"
required>

<div class="botones">

<button
type="submit"
name="actualizar">

Actualizar

</button>

<a href="listar.php">

Regresar

</a>

</div>

</form>

</div>

</body>

</html>