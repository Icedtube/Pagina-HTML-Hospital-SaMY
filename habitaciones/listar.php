<?php

include("../config/conexion.php");

$sql = "SELECT * FROM habitaciones";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Lista de Habitaciones</title>

<style>

body{
    font-family:Arial, Helvetica, sans-serif;
    background:#f4f7fb;
    margin:0;
    padding:30px;
}

h2{
    text-align:center;
    color:#0d6efd;
    margin-bottom:30px;
}

.botones{
    display:flex;
    justify-content:space-between;
    margin-bottom:20px;
    flex-wrap:wrap;
}

.izquierda a,
.derecha a{
    text-decoration:none;
    color:white;
    padding:10px 18px;
    border-radius:6px;
    margin-right:10px;
    font-weight:bold;
}

.agregar{
    background:#198754;
}

.buscar{
    background:#0d6efd;
}

.menu{
    background:#6c757d;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
    box-shadow:0 0 10px rgba(0,0,0,.15);
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
    background:#e9f2ff;
}

.editar{
    color:#0d6efd;
    text-decoration:none;
    font-weight:bold;
}

.eliminar{
    color:red;
    text-decoration:none;
    font-weight:bold;
}

.abajo{
    text-align:center;
    margin-top:25px;
}

.abajo a{
    background:#6c757d;
    color:white;
    text-decoration:none;
    padding:10px 20px;
    border-radius:6px;
    font-weight:bold;
}

</style>

</head>

<body>

<h2>Habitaciones Registradas</h2>

<div class="botones">

<div class="izquierda">
<a class="agregar" href="agregar.php">Agregar Habitación</a>
<a class="buscar" href="buscar.php">Buscar Habitación</a>
</div>

<div class="derecha">
<a class="menu" href="../index.php">Volver al menú</a>
</div>

</div>

<table>

<tr>

<th>ID</th>
<th>Número</th>
<th>Tipo</th>
<th>Estado</th>
<th>Acciones</th>

</tr>

<?php while($fila = $resultado->fetch_assoc()){ ?>

<tr>

<td><?php echo $fila['id_habitacion']; ?></td>

<td><?php echo $fila['numero']; ?></td>

<td><?php echo $fila['tipo']; ?></td>

<td><?php echo $fila['estado']; ?></td>

<td>

<a class="editar" href="editar.php?id=<?php echo $fila['id_habitacion']; ?>">
Editar
</a>

|

<a class="eliminar" href="eliminar.php?id=<?php echo $fila['id_habitacion']; ?>">
Eliminar
</a>

</td>

</tr>

<?php } ?>

</table>

<div class="abajo">
<a href="../index.php">Volver al menú</a>
</div>

</body>
</html>