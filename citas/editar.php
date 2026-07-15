<?php

include("../config/conexion.php");

$id=$_GET['id'];

$sql="SELECT * FROM citas WHERE id_cita='$id'";
$resultado=$conn->query($sql);

if($resultado->num_rows==0){
die("La cita no existe");
}

$fila=$resultado->fetch_assoc();

if(isset($_POST['actualizar'])){

$id_paciente=$_POST['id_paciente'];
$id_doctor=$_POST['id_doctor'];
$id_habitacion=$_POST['id_habitacion'];
$fecha_cita=$_POST['fecha_cita'];
$motivo=$_POST['motivo'];
$estado=$_POST['estado'];

$habitacion_anterior=$fila['id_habitacion'];

if($habitacion_anterior!=$id_habitacion){

$conn->query("UPDATE habitaciones
SET estado='Disponible'
WHERE id_habitacion='$habitacion_anterior'");

$conn->query("UPDATE habitaciones
SET estado='Ocupada'
WHERE id_habitacion='$id_habitacion'");

}

$sql="UPDATE citas SET

id_paciente='$id_paciente',
id_doctor='$id_doctor',
id_habitacion='$id_habitacion',
fecha_cita='$fecha_cita',
motivo='$motivo',
estado='$estado'

WHERE id_cita='$id'";

if($conn->query($sql)){

header("Location:listar.php");
exit();

}

}

$pacientes=$conn->query("SELECT * FROM pacientes");

$doctores=$conn->query("SELECT * FROM doctores");

$habitaciones=$conn->query("SELECT * FROM habitaciones");

?>

<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<title>Editar Cita</title>

<style>

body{

font-family:Arial;
background:#f4f4f4;
margin:20px;

}

.contenedor{

width:650px;
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
text-decoration:none;
background:#198754;
color:white;
padding:10px 15px;
border-radius:5px;

}

</style>

</head>

<body>

<div class="contenedor">

<h2>Editar Cita</h2>

<form method="POST">
    <label>Paciente</label>

<select name="id_paciente" required>

<?php while($p=$pacientes->fetch_assoc()){ ?>

<option
value="<?php echo $p['id_paciente']; ?>"

<?php
if($fila['id_paciente']==$p['id_paciente']){
echo "selected";
}
?>

>

<?php echo $p['nombre']." ".$p['apellido']; ?>

</option>

<?php } ?>

</select>

<label>Doctor</label>

<select name="id_doctor" required>

<?php while($d=$doctores->fetch_assoc()){ ?>

<option
value="<?php echo $d['id_doctor']; ?>"

<?php
if($fila['id_doctor']==$d['id_doctor']){
echo "selected";
}
?>

>

<?php echo $d['nombre']." ".$d['apellido']; ?>

</option>

<?php } ?>

</select>

<label>Habitación</label>

<select name="id_habitacion" required>

<?php while($h=$habitaciones->fetch_assoc()){ ?>

<option
value="<?php echo $h['id_habitacion']; ?>"

<?php
if($fila['id_habitacion']==$h['id_habitacion']){
echo "selected";
}
?>

>

Habitación
<?php echo $h['numero']; ?>

-
<?php echo $h['estado']; ?>

</option>

<?php } ?>

</select>

<label>Fecha y hora</label>

<input

type="datetime-local"

name="fecha_cita"

value="<?php echo date('Y-m-d\TH:i',strtotime($fila['fecha_cita'])); ?>"

required>

<label>Motivo</label>

<textarea

name="motivo"

rows="4"

required><?php echo $fila['motivo']; ?></textarea>

<label>Estado</label>

<select name="estado">

<option value="Programada"

<?php
if($fila['estado']=="Programada"){
echo "selected";
}
?>

>

Programada

</option>

<option value="Completada"

<?php
if($fila['estado']=="Completada"){
echo "selected";
}
?>

>

Completada

</option>

<option value="Cancelada"

<?php
if($fila['estado']=="Cancelada"){
echo "selected";
}
?>

>

Cancelada

</option>

</select>
<button
type="submit"
name="actualizar">

Actualizar Cita

</button>

</form>

<br>

<a href="listar.php">

Volver

</a>

</div>

</body>

</html>