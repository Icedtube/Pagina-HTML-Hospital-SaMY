<?php
include("../config/conexion.php");

if(!isset($_GET['id'])){
    die("No se recibió el ID de la receta.");
}

$id = $_GET['id'];

$sql = "SELECT

r.*,

p.nombre AS paciente,
p.apellido AS apellido_paciente,
p.edad,
p.sexo,

d.nombre AS doctor,
d.apellido AS apellido_doctor,

c.fecha_cita

FROM recetas r

INNER JOIN citas c
ON r.id_cita=c.id_cita

INNER JOIN pacientes p
ON c.id_paciente=p.id_paciente

INNER JOIN doctores d
ON c.id_doctor=d.id_doctor

WHERE r.id_receta='$id'";

$resultado = $conn->query($sql);

if(!$resultado){
    die("Error en la consulta: ".$conn->error);
}

if($resultado->num_rows==0){
    die("La receta no existe.");
}

$fila = $resultado->fetch_assoc();

?>

<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<title>Receta Médica</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
}

body{

font-family:Arial, Helvetica, sans-serif;
background:#ececec;

}

.fondo{

position:fixed;

top:0;
left:0;

width:100%;
height:100%;

background:url("../img/Samy.png") no-repeat center;

background-size:100% 100%;

z-index:-1;

}

.contenedor{

width:820px;
height:1080px;

margin:20px auto;

position:relative;

}

@media print{

button{

display:none;

}

body{

background:white;

-webkit-print-color-adjust:exact;
print-color-adjust:exact;

}

}

</style>

</head>
<body>

<div class="fondo"></div>

<div class="contenedor">

<div style="
position:absolute;
top:200px;
left:55px;
right:55px;
display:flex;
justify-content:space-between;
">

<div style="width:48%;">

<p style="font-size:18px;line-height:45px;">

<strong>Paciente:</strong>

<?php echo $fila['paciente']." ".$fila['apellido_paciente']; ?>

<br>

<strong>Edad:</strong>

<?php echo $fila['edad']; ?> años

<br>

<strong>Sexo:</strong>

<?php echo $fila['sexo']; ?>

</p>

</div>

<div style="width:42%;">

<p style="font-size:18px;line-height:45px;">

<strong>Doctor:</strong>

Dr. <?php echo $fila['doctor']." ".$fila['apellido_doctor']; ?>

<br>

<strong>Fecha:</strong>

<?php echo date("d/m/Y",strtotime($fila['fecha'])); ?>

</p>

</div>

</div>

<table style="
position:absolute;
top:420px;
left:55px;
width:710px;
border-collapse:collapse;
background:rgba(255,255,255,.35);
">

<tr style="background:#0d6efd;color:white;">

<th style="padding:12px;">Medicamento</th>

<th style="padding:12px;">Dosis</th>

<th style="padding:12px;">Indicaciones</th>

</tr>

<tr>

<td style="padding:15px;border:1px solid #ccc;vertical-align:top;">

<?php echo nl2br($fila['medicamento']); ?>

</td>

<td style="padding:15px;border:1px solid #ccc;vertical-align:top;">

<?php echo nl2br($fila['dosis']); ?>

</td>

<td style="padding:15px;border:1px solid #ccc;vertical-align:top;">

<?php echo nl2br($fila['indicaciones']); ?>

</td>

</tr>

</table>
<br><br>

<div style="
position:absolute;
bottom:150px;
left:55px;
right:55px;
display:flex;
justify-content:space-between;
">

<div style="
width:42%;
text-align:center;
font-size:18px;
">

<div style="border-top:2px solid black;margin-bottom:10px;"></div>

Firma del Médico

</div>

<div style="
width:42%;
text-align:center;
font-size:18px;
">

<div style="border-top:2px solid black;margin-bottom:10px;"></div>

Sello del Hospital

</div>

</div>

<div style="
position:absolute;
bottom:35px;
width:100%;
text-align:center;
">

<button
onclick="window.print();"
style="
padding:12px 25px;
background:#0d6efd;
color:white;
border:none;
border-radius:8px;
font-size:17px;
cursor:pointer;
">

🖨 Imprimir Receta

</button>

</div>
</div>

</body>

</html>