<?php

include("../config/conexion.php");

if(isset($_POST['guardar'])){

$id_cita=$_POST['id_cita'];
$medicamento=$_POST['medicamento'];
$dosis=$_POST['dosis'];
$indicaciones=$_POST['indicaciones'];
$fecha=$_POST['fecha'];

$sql="INSERT INTO recetas
(id_cita,medicamento,dosis,indicaciones,fecha)

VALUES
('$id_cita','$medicamento','$dosis','$indicaciones','$fecha')";

if($conn->query($sql)){

header("Location:listar.php");
exit();

}

}

$citas=$conn->query("

SELECT

c.id_cita,

p.nombre,
p.apellido,

d.nombre AS doctor,
d.apellido AS apellido_doctor,

c.fecha_cita

FROM citas c

INNER JOIN pacientes p
ON c.id_paciente=p.id_paciente

INNER JOIN doctores d
ON c.id_doctor=d.id_doctor

ORDER BY c.fecha_cita DESC

");

?>
<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<title>Agregar Receta</title>

<style>

body{

font-family:Arial;
background:#f4f4f4;
margin:20px;

}

.contenedor{

width:700px;
margin:auto;
background:white;
padding:30px;
border-radius:10px;
box-shadow:0 0 10px rgba(0,0,0,.2);

}

h2{

text-align:center;
color:#0d6efd;

}

label{

display:block;
margin-top:15px;
font-weight:bold;

}

select,
input,
textarea{

width:100%;
padding:10px;
margin-top:5px;
border:1px solid #ccc;
border-radius:5px;

}

button{

margin-top:20px;
width:100%;
padding:12px;
background:#0d6efd;
color:white;
border:none;
border-radius:5px;
cursor:pointer;

}

button:hover{

background:#0b5ed7;

}

a{

display:inline-block;
margin-top:20px;
background:#198754;
color:white;
padding:10px 15px;
border-radius:5px;
text-decoration:none;

}

</style>

</head>

<body>

<div class="contenedor">

<h2>Agregar Receta</h2>

<form method="POST">
    <label>Cita</label>

<select name="id_cita" required>

<option value="">Seleccione una cita</option>

<?php while($c=$citas->fetch_assoc()){ ?>

<option value="<?php echo $c['id_cita']; ?>">

<?php
echo "Cita #".$c['id_cita']." | ".
$c['nombre']." ".$c['apellido'].
" | Dr. ".$c['doctor']." ".$c['apellido_doctor'].
" | ".$c['fecha_cita'];
?>

</option>

<?php } ?>

</select>

<label>Medicamento</label>

<input
type="text"
name="medicamento"
required>

<label>Dosis</label>

<input
type="text"
name="dosis"
required>

<label>Indicaciones</label>

<textarea
name="indicaciones"
rows="4"
required></textarea>

<label>Fecha</label>

<input
type="date"
name="fecha"
value="<?php echo date('Y-m-d'); ?>"
required>

<button
type="submit"
name="guardar">

Guardar Receta

</button>

</form>

<br>

<a href="listar.php">

Volver

</a>

</div>

</body>

</html>