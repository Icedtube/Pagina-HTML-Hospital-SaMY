<?php


include("../config/conexion.php");

$sql = "SELECT * FROM pacientes";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Lista de Pacientes</title>

<style>

body{
    font-family:Arial, Helvetica, sans-serif;
    background:#f4f4f4;
    margin:20px;
}

h2{
    text-align:center;
    color:#0d6efd;
    margin-bottom:20px;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
    box-shadow:0 5px 15px rgba(0,0,0,.15);
}

table th{
    background:#0d6efd;
    color:white;
    padding:12px;
}

table td{
    padding:10px;
    border:1px solid #ddd;
    text-align:center;
}

tr:nth-child(even){
    background:#f8f9fa;
}

tr:hover{
    background:#dbeafe;
}

a{
    text-decoration:none;
}

.boton{

    display:inline-block;
    background:#198754;
    color:white;
    padding:10px 18px;
    border-radius:8px;
    margin-right:10px;
    margin-bottom:15px;
    font-weight:bold;
    transition:.3s;

}

.boton:hover{

    background:#157347;
    transform:scale(1.05);

}

.editar{

    color:#0d6efd;
    font-weight:bold;

}

.eliminar{

    color:red;
    font-weight:bold;

}

.acciones{

    margin-bottom:20px;

}

</style>

</head>

<body>

<h2> Pacientes Registrados</h2>

<div class="acciones">

<a class="boton" href="agregar.php">
 Agregar Paciente
</a>

<a class="boton" href="buscar.php"> Buscar Paciente
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
<th>Edad</th>
<th>Sexo</th>
<th>Teléfono</th>
<th>Dirección</th>
<th>Diagnóstico</th>
<th>Fecha de Ingreso</th>
<th>Acciones</th>

</tr>

<?php while($fila = $resultado->fetch_assoc()){ ?>

<tr>

<td><?php echo $fila['id_paciente']; ?></td>
<td><?php echo $fila['nombre']; ?></td>
<td><?php echo $fila['apellido']; ?></td>
<td><?php echo $fila['edad']; ?></td>
<td><?php echo $fila['sexo']; ?></td>
<td><?php echo $fila['telefono']; ?></td>
<td><?php echo $fila['direccion']; ?></td>
<td><?php echo $fila['diagnostico']; ?></td>
<td><?php echo $fila['fecha_ingreso']; ?></td>

<td>

<a class="editar" href="editar.php?id=<?php echo $fila['id_paciente']; ?>">
Editar
</a>

|

<a class="eliminar" href="eliminar.php?id=<?php echo $fila['id_paciente']; ?>">
🗑 Eliminar
</a>

</td>

</tr>

<?php } ?>

</table>

<br><br>

<div style="text-align:center;">

<a class="boton" href="../index.php">
 Volver al menú
</a>

</div>

</body>
</html>