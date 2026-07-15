<?php

include("../config/conexion.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Buscar Paciente</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{

    background:linear-gradient(135deg,#0d6efd,#6ea8fe);
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:flex-start;
    padding:40px;

}

.contenedor{

    width:900px;
    background:white;
    padding:30px;
    border-radius:15px;
    box-shadow:0 15px 35px rgba(0,0,0,.25);

}

h2{

    text-align:center;
    color:#0d6efd;
    margin-bottom:25px;
    font-size:34px;

}

form{

    display:flex;
    gap:10px;
    margin-bottom:30px;

}

input{

    flex:1;
    padding:12px;
    border:1px solid #ccc;
    border-radius:8px;
    font-size:16px;

}

button{

    background:#0d6efd;
    color:white;
    border:none;
    padding:12px 25px;
    border-radius:8px;
    cursor:pointer;
    font-size:16px;
    transition:.3s;

}

button:hover{

    background:#0b5ed7;

}

table{

    width:100%;
    border-collapse:collapse;

}

th{

    background:#0d6efd;
    color:white;
    padding:12px;

}

td{

    padding:12px;
    border-bottom:1px solid #ddd;
    text-align:center;

}

tr:nth-child(even){

    background:#f8f9fa;

}

tr:hover{

    background:#dbeafe;

}

.sinResultados{

    text-align:center;
    color:red;
    font-size:18px;
    margin-top:20px;

}

</style>

</head>

<body>

<div class="contenedor">

<h2>🔍 Buscar Paciente</h2>

<form method="GET">

<input
type="text"
name="buscar"
placeholder="Escriba el nombre o apellido del paciente"
required>
<button type="button" onclick="window.location.href='listar.php'">
Regresar
</button>

<button type="button" onclick="window.location.href='buscar.php'">
Limpiar
</button>

<button type="submit">

Buscar

</button>

</form>

<?php

if(isset($_GET['buscar'])){

$buscar=$_GET['buscar'];

$sql="SELECT * FROM pacientes
WHERE nombre LIKE '%$buscar%'
OR apellido LIKE '%$buscar%'";

$resultado=$conn->query($sql);

if($resultado->num_rows>0){

echo "<table>";

echo "<tr>

<th>ID</th>

<th>Nombre</th>

<th>Apellido</th>

<th>Edad</th>

<th>Sexo</th>

<th>Teléfono</th>

<th>Diagnóstico</th>

</tr>";

while($fila=$resultado->fetch_assoc()){

echo "<tr>";

echo "<td>".$fila['id_paciente']."</td>";

echo "<td>".$fila['nombre']."</td>";

echo "<td>".$fila['apellido']."</td>";

echo "<td>".$fila['edad']."</td>";

echo "<td>".$fila['sexo']."</td>";

echo "<td>".$fila['telefono']."</td>";

echo "<td>".$fila['diagnostico']."</td>";

echo "</tr>";

}

echo "</table>";

}else{

echo "<p class='sinResultados'>No se encontraron pacientes.</p>";

}

}

?>

</div>

</body>

</html>