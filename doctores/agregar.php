<?php
include("../config/conexion.php");

if(isset($_POST['guardar'])){

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $especialidad = $_POST['especialidad'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $sql = "INSERT INTO doctores(nombre,apellido,especialidad,telefono,correo)
            VALUES('$nombre','$apellido','$especialidad','$telefono','$correo')";

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

<title>Registrar Doctor</title>

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
    text-align:center;
    padding:12px;
    border:none;
    border-radius:8px;
    text-decoration:none;
    font-size:16px;
    cursor:pointer;

}

button{

    background:#198754;
    color:white;

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

<h2>👨‍⚕️ Registrar Doctor</h2>

<form method="POST">

<input
type="text"
name="nombre"
placeholder="Nombre"
required>

<input
type="text"
name="apellido"
placeholder="Apellido"
required>

<input
type="text"
name="especialidad"
placeholder="Especialidad"
required>

<input
type="text"
name="telefono"
placeholder="Teléfono"
required>

<input
type="email"
name="correo"
placeholder="Correo electrónico"
required>

<div class="botones">

<button
type="submit"
name="guardar">

Guardar

</button>

<a href="listar.php">

Regresar

</a>

</div>

</form>

</div>

</body>
</html>