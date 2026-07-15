<?php

include("../config/conexion.php");

$buscar = "";
$resultado = null;

if(isset($_POST['buscar'])){

    $buscar = $_POST['buscar'];

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

    WHERE p.nombre LIKE '%$buscar%'
       OR p.apellido LIKE '%$buscar%'

    ORDER BY r.id_receta DESC";

    $resultado = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Buscar Receta</title>

<style>

body{
    font-family:Arial;
    background:#f4f4f4;
    margin:20px;
}

.contenedor{
    width:95%;
    margin:auto;
}

h2{
    text-align:center;
    color:#0d6efd;
}

input{
    width:350px;
    padding:10px;
    border:1px solid #ccc;
    border-radius:5px;
}

button{
    padding:10px 20px;
    background:#0d6efd;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
}

button:hover{
    background:#0b5ed7;
}

.boton{
    background:#198754;
    color:white;
    padding:10px 15px;
    border-radius:5px;
    text-decoration:none;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:20px;
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

</style>

</head>

<body>

<div class="contenedor">

<h2>Buscar Receta</h2>

<form method="POST">

<input
type="text"
name="buscar"
placeholder="Nombre o apellido del paciente"
value="<?php echo $buscar; ?>"
required>

<button
type="submit"
name="buscar">

Buscar

</button>

<a class="boton" href="listar.php">

Volver

</a>

</form>

<?php if(isset($_POST['buscar'])){ ?>

<table>

<tr>

<th>ID</th>
<th>Paciente</th>
<th>Doctor</th>
<th>Medicamento</th>
<th>Dosis</th>
<th>Indicaciones</th>
<th>Fecha</th>

</tr>

<?php

if($resultado->num_rows>0){

while($fila=$resultado->fetch_assoc()){

?>

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

</tr>

<?php

}

}else{

?>

<tr>

<td colspan="7">

No se encontraron recetas.

</td>

</tr>

<?php

}

?>

</table>

<?php } ?>

</div>

</body>

</html>