<?php

include("../config/conexion.php");

$sql = "SELECT
c.id_cita,
p.nombre AS paciente,
d.nombre AS doctor,
h.numero AS habitacion,
c.fecha_cita,
c.motivo,
c.estado

FROM citas c

INNER JOIN pacientes p
ON c.id_paciente = p.id_paciente

INNER JOIN doctores d
ON c.id_doctor = d.id_doctor

INNER JOIN habitaciones h
ON c.id_habitacion = h.id_habitacion";

$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">
<title>Lista de Citas</title>

<style>

body{
    font-family:Arial;
    background:#f4f4f4;
    margin:20px;
}

h2{
    text-align:center;
    color:#0d6efd;
}

.botones{
    margin-bottom:20px;
}

.boton{
    background:#0d6efd;
    color:white;
    padding:10px 15px;
    text-decoration:none;
    border-radius:6px;
    margin-right:10px;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
}

th{
    background:#0d6efd;
    color:white;
    padding:10px;
}

td{
    padding:10px;
    border:1px solid #ddd;
    text-align:center;
}

.editar{
    color:blue;
    text-decoration:none;
}

.eliminar{
    color:red;
    text-decoration:none;
}

</style>

</head>

<body>

<h2>Lista de Citas</h2>

<div class="botones">

<a class="boton" href="agregar.php">Agregar Cita</a>

<a class="boton" href="buscar.php">Buscar Cita</a>

<a class="boton" href="../index.php">Volver al menú</a>

</div>

<table>

<tr>

<th>ID</th>
<th>Paciente</th>
<th>Doctor</th>
<th>Habitación</th>
<th>Fecha</th>
<th>Motivo</th>
<th>Estado</th>
<th>Acciones</th>

</tr>

<?php while($fila = $resultado->fetch_assoc()){ ?>

<tr>

<td><?php echo $fila['id_cita']; ?></td>

<td><?php echo $fila['paciente']; ?></td>

<td><?php echo $fila['doctor']; ?></td>

<td><?php echo $fila['habitacion']; ?></td>

<td><?php echo $fila['fecha_cita']; ?></td>

<td><?php echo $fila['motivo']; ?></td>

<td><?php echo $fila['estado']; ?></td>

<td>

<a class="editar" href="editar.php?id=<?php echo $fila['id_cita']; ?>">Editar</a>

|

<a class="eliminar" href="eliminar.php?id=<?php echo $fila['id_cita']; ?>">Eliminar</a>

</td>

</tr>

<?php } ?>

</table>

<br><br>

<a class="boton" href="../index.php">Volver al menú</a>

</body>
</html>