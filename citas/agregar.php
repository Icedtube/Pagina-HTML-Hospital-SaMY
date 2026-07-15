<?php


include("../config/conexion.php");

if(isset($_POST['guardar'])){

$id_paciente=$_POST['id_paciente'];
$id_doctor=$_POST['id_doctor'];
$id_habitacion=$_POST['id_habitacion'];
$fecha_cita=$_POST['fecha_cita'];
$motivo=$_POST['motivo'];
$estado=$_POST['estado'];

$sql="INSERT INTO citas(id_paciente,id_doctor,id_habitacion,fecha_cita,motivo,estado)

VALUES('$id_paciente','$id_doctor','$id_habitacion','$fecha_cita','$motivo','$estado')";

if($conn->query($sql)){
header("Location:listar.php");
exit();
}

}

$pacientes=$conn->query("SELECT id_paciente,nombre,apellido FROM pacientes");

$doctores=$conn->query("SELECT id_doctor,nombre,apellido FROM doctores");

$habitaciones=$conn->query("SELECT id_habitacion,numero FROM habitaciones WHERE estado='Disponible'");
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Agregar Cita</title>

<style>

body{
font-family:Arial;
background:#f4f4f4;
margin:20px;
}

.contenedor{

width:600px;
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
font-size:16px;

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

<h2>Agregar Cita</h2>

<form method="POST">

<label>Paciente</label>

<select name="id_paciente" required>

<option value="">Seleccione</option>

<?php while($p=$pacientes->fetch_assoc()){ ?>

<option value="<?php echo $p['id_paciente']; ?>">

<?php echo $p['nombre']." ".$p['apellido']; ?>

</option>

<?php } ?>

</select>

<label>Doctor</label>

<select name="id_doctor" required>

<option value="">Seleccione</option>

<?php while($d=$doctores->fetch_assoc()){ ?>

<option value="<?php echo $d['id_doctor']; ?>">

<?php echo $d['nombre']." ".$d['apellido']; ?>

</option>

<?php } ?>

</select>

<label>Habitación</label>

<select name="id_habitacion" required>

<option value="">Seleccione</option>

<?php while($h=$habitaciones->fetch_assoc()){ ?>

<option value="<?php echo $h['id_habitacion']; ?>">

Habitación <?php echo $h['numero']; ?>

</option>

<?php } ?>

</select>

<label>Fecha y hora</label>

<input
type="datetime-local"
name="fecha_cita"
required>

<label>Motivo</label>

<textarea
name="motivo"
rows="4"
required></textarea>

<label>Estado</label>

<select name="estado">

<option value="Programada">Programada</option>

<option value="Completada">Completada</option>

<option value="Cancelada">Cancelada</option>

</select>

<button
type="submit"
name="guardar">

Guardar Cita

</button>

</form>

<br>

<a href="listar.php">Volver</a>

</div>

</body>
</html>