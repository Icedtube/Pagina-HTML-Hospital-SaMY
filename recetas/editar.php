<?php

include("../config/conexion.php");

$id=$_GET['id'];

if(isset($_POST['actualizar'])){

$id_cita=$_POST['id_cita'];
$medicamento=$_POST['medicamento'];
$dosis=$_POST['dosis'];
$indicaciones=$_POST['indicaciones'];
$fecha=$_POST['fecha'];

$sql="UPDATE recetas SET

id_cita='$id_cita',
medicamento='$medicamento',
dosis='$dosis',
indicaciones='$indicaciones',
fecha='$fecha'

WHERE id_receta='$id'";

if($conn->query($sql)){

header("Location:listar.php");
exit();

}

}

$receta=$conn->query("SELECT * FROM recetas WHERE id_receta='$id'");
$datos=$receta->fetch_assoc();

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

<title>Editar Receta</title>

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

<h2>Editar Receta</h2>

<form method="POST">
    <label>Cita</label>

<select name="id_cita" required>

<?php while($c=$citas->fetch_assoc()){ ?>

<option
value="<?php echo $c['id_cita']; ?>"

<?php
if($datos['id_cita']==$c['id_cita']){
echo "selected";
}
?>

>

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
value="<?php echo $datos['medicamento']; ?>"
required>

<label>Dosis</label>

<input
type="text"
name="dosis"
value="<?php echo $datos['dosis']; ?>"
required>

<label>Indicaciones</label>

<textarea
name="indicaciones"
rows="4"
required><?php echo $datos['indicaciones']; ?></textarea>

<label>Fecha</label>

<input
type="date"
name="fecha"
value="<?php echo $datos['fecha']; ?>"
required>

<button
type="submit"
name="actualizar">

Actualizar Receta

</button>

</form>

<br>

<a href="listar.php">

Volver

</a>

</div>

</body>

</html>