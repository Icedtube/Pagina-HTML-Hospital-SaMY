<?php

include("../config/conexion.php");

$resultado = null;

if(isset($_POST['buscar'])){

    $busqueda = $_POST['busqueda'];

    $sql = "SELECT 
                c.id_cita,
                p.nombre AS paciente_nombre,
                p.apellido AS paciente_apellido,
                d.nombre AS doctor,
                d.especialidad,
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
                ON c.id_habitacion = h.id_habitacion
            WHERE 
                c.id_cita LIKE '%$busqueda%'
                OR p.nombre LIKE '%$busqueda%'
                OR p.apellido LIKE '%$busqueda%'";

    $resultado = mysqli_query($conn,$sql);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Buscar Citas</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">


<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">
<h3 class="text-center">Buscar Citas</h3>
</div>


<div class="card-body">


<form method="POST" class="d-flex mb-4">

<input 
type="text" 
name="busqueda" 
class="form-control me-2"
placeholder="Buscar por ID o nombre del paciente"
required>

<button 
class="btn btn-primary"
name="buscar">
Buscar
</button>

</form>



<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>
<th>ID</th>
<th>Paciente</th>
<th>Doctor</th>
<th>Habitación</th>
<th>Fecha</th>
<th>Motivo</th>
<th>Estado</th>
</tr>

</thead>


<tbody>


<?php

if($resultado){

while($fila=mysqli_fetch_assoc($resultado)){

?>

<tr>

<td><?php echo $fila['id_cita']; ?></td>

<td>
<?php 
echo $fila['paciente_nombre']." ".$fila['paciente_apellido']; 
?>
</td>

<td>
<?php 
echo $fila['doctor']."<br>";
echo "<small>".$fila['especialidad']."</small>";
?>
</td>


<td>
<?php echo $fila['habitacion']; ?>
</td>


<td>
<?php echo $fila['fecha_cita']; ?>
</td>


<td>
<?php echo $fila['motivo']; ?>
</td>


<td>
<?php echo $fila['estado']; ?>
</td>


</tr>


<?php

}

}

?>


</tbody>


</table>


<a href="listar.php" class="btn btn-secondary">
Regresar
</a>


</div>

</div>

</div>


</body>
</html>