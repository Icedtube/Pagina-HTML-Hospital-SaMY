<?php

include("../config/conexion.php");

$sql = "SELECT * FROM doctores";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Lista de Doctores</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{
    background:linear-gradient(135deg,#0d6efd,#6ea8fe);
    padding:40px;
}

.contenedor{
    width:95%;
    margin:auto;
    background:white;
    padding:30px;
    border-radius:15px;
    box-shadow:0 15px 35px rgba(0,0,0,.25);
}

h2{
    text-align:center;
    color:#0d6efd;
    margin-bottom:30px;
    font-size:34px;
}

.botones{
    margin-bottom:25px;
}

.boton{
    display:inline-block;
    background:#0d6efd;
    color:white;
    text-decoration:none;
    padding:10px 18px;
    border-radius:8px;
    margin-right:10px;
    transition:.3s;
}

.boton:hover{
    background:#0b5ed7;
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#0d6efd;
    color:white;
    padding:12px;
}

td{
    padding:12px;
    text-align:center;
    border-bottom:1px solid #ddd;
}

tr:nth-child(even){
    background:#f8f9fa;
}

tr:hover{
    background:#dbeafe;
}

.editar{
    color:#0d6efd;
    font-weight:bold;
    text-decoration:none;
}

.eliminar{
    color:red;
    font-weight:bold;
    text-decoration:none;
}

</style>

</head>

<body>

<div class="contenedor">

<h2> Lista de Doctores</h2>

<div class="botones">

<a class="boton" href="agregar.php">
 Agregar Doctor
</a>

<a class="boton" href="buscar.php">
 Buscar Doctor
</a>

<a class="boton" href="../index.php">
 Volver al menú
</a>

</div>

<table>

<tr>

<th>ID</th>
<th>Nombre</th>
<th>Apellido</th>
<th>Especialidad</th>
<th>Teléfono</th>
<th>Correo</th>
<th>Acciones</th>

</tr>

<?php while($fila = $resultado->fetch_assoc()){ ?>

<tr>

<td><?php echo $fila['id_doctor']; ?></td>

<td><?php echo $fila['nombre']; ?></td>

<td><?php echo $fila['apellido']; ?></td>

<td><?php echo $fila['especialidad']; ?></td>

<td><?php echo $fila['telefono']; ?></td>

<td><?php echo $fila['correo']; ?></td>

<td>

<a class="editar" href="editar.php?id=<?php echo $fila['id_doctor']; ?>">
Editar
</a>

|

<a class="eliminar" href="eliminar.php?id=<?php echo $fila['id_doctor']; ?>">
Eliminar
</a>

</td>

</tr>

<?php } ?>

</table>

<br><br>

<a class="boton" href="../index.php">
Volver al menú
</a>

</div>

</body>
</html>