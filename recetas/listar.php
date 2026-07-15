<?php

include("../config/conexion.php");

$sql = "SELECT
r.id_receta,
r.medicamento,
r.dosis,
r.indicaciones,
r.fecha,

p.nombre AS paciente,
p.apellido AS apellido_paciente,

d.nombre AS doctor,
d.apellido AS apellido_doctor

FROM recetas r

INNER JOIN citas c
ON r.id_cita = c.id_cita

INNER JOIN pacientes p
ON c.id_paciente = p.id_paciente

INNER JOIN doctores d
ON c.id_doctor = d.id_doctor

ORDER BY r.id_receta DESC";

$resultado = $conn->query($sql);

if(!$resultado){
    die("Error en la consulta: ".$conn->error);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Lista de Recetas</title>

<style>

body{
    font-family:Arial;
    background:#f4f4f4;
    margin:20px;
}

h2{
    text-align:center;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
}

table th{
    background:#0d6efd;
    color:white;
    padding:10px;
}

table td{
    padding:10px;
    border:1px solid #ddd;
    text-align:center;
}

a{
    text-decoration:none;
}

.boton{
    background:#198754;
    color:white;
    padding:10px 15px;
    border-radius:5px;
}

.editar{
    color:blue;
}

.eliminar{
    color:red;
}

</style>

</head>

<body>

<h2>Recetas Registradas</h2>

<br>

<a class="boton" href="agregar.php">
Agregar Receta
</a>

<a class="boton" href="buscar.php">
Buscar Receta
</a>

<a class="boton" href="../index.php">
Volver al menú
</a>

<br><br>

<table>

<tr>

<th>ID</th>
<th>Paciente</th>
<th>Doctor</th>
<th>Medicamento</th>
<th>Dosis</th>
<th>Indicaciones</th>
<th>Fecha</th>
<th>Acciones</th>

</tr>
<?php while($fila = $resultado->fetch_assoc()){ ?>

<tr>

<td><?php echo $fila['id_receta']; ?></td>

<td>
<?php echo $fila['paciente']." ".$fila['apellido_paciente']; ?>
</td>

<td>
<?php echo $fila['doctor']." ".$fila['apellido_doctor']; ?>
</td>

<td><?php echo $fila['medicamento']; ?></td>

<td><?php echo $fila['dosis']; ?></td>

<td><?php echo $fila['indicaciones']; ?></td>

<td><?php echo $fila['fecha']; ?></td>

<td>

<a class="editar"
href="editar.php?id=<?php echo $fila['id_receta']; ?>">
Editar
</a>

|

<a class="eliminar"
href="eliminar.php?id=<?php echo $fila['id_receta']; ?>">
Eliminar
</a>

|

<a
href="imprimir.php?id=<?php echo $fila['id_receta']; ?>"
target="_blank">

Imprimir

</a>

</td>

</tr>

<?php } ?>

</table>

<br><br>

<a class="boton" href="../index.php">
Volver al menú
</a>

</body>
</html>