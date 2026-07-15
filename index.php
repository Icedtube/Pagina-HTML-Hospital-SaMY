<?php
include("config/permisos.php");
session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">

<title>Hospital SaMY</title>

<style>

body{
font-family:Arial;
background:#f5f5f5;
margin:0;
}

header{

background:#0d6efd;
color:white;
padding:20px;

}

nav{

background:#343a40;
padding:15px;

}

nav a{

color:white;
text-decoration:none;
margin-right:20px;
font-weight:bold;

}

.contenido{

padding:30px;

}

</style>

</head>

<body>

<header>

<h2>Hospital SaMY Bienvenido</h2>

Bienvenido sr:
<b><?php echo $_SESSION['usuario']; ?></b>

</header>

<nav>

<a href="index.php">Inicio</a>

<a href="pacientes/listar.php">Pacientes</a>

<a href="doctores/listar.php">Doctores</a>

<a href="habitaciones/listar.php">Habitaciones</a>

<a href="citas/listar.php">Citas</a>

<a href="recetas/listar.php">Recetas</a>



<a href="logout.php">Cerrar sesión</a>

</nav>

<div class="contenido">

<h1>Bienvenido al Sistema Hospitalario</h1>

<p>

Que es lo que desea hacer hoy?

</p>

</div>

</body>
</html>