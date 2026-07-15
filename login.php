<?php
session_start();
include("config/conexion.php");

if(isset($_POST['ingresar'])){

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$password'";

    $resultado = $conn->query($sql);

    if($resultado->num_rows > 0){

        $fila = $resultado->fetch_assoc();

        $_SESSION['usuario'] = $fila['usuario'];
        $_SESSION['rol'] = $fila['rol'];

        header("Location: index.php");
        exit();

    }else{

        $mensaje = "Usuario o contraseña incorrectos";

    }

}
?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Login Hospital SaMY</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{

    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;

    background:linear-gradient(135deg,#0d6efd,#6ea8fe);

}

.login{

    width:420px;

    background:white;

    padding:35px;

    border-radius:18px;

    box-shadow:0 15px 35px rgba(0,0,0,.25);

}

h2{

    text-align:center;

    color:#0d6efd;

    margin-bottom:30px;

    font-size:38px;

}

label{

    font-weight:bold;

    display:block;

    margin-bottom:8px;

}

select,
input{

    width:100%;

    padding:12px;

    border:1px solid #ced4da;

    border-radius:8px;

    margin-bottom:18px;

    font-size:15px;

}

button{

    width:100%;

    padding:13px;

    background:#0d6efd;

    color:white;

    border:none;

    border-radius:8px;

    font-size:17px;

    cursor:pointer;

    transition:.3s;

}

button:hover{

    background:#0b5ed7;

}

.error{

    background:#f8d7da;

    color:#842029;

    padding:10px;

    border-radius:6px;

    margin-bottom:15px;

    text-align:center;

}

</style>

</head>

<body>

<div class="login">

<h2>🏥 Hospital SaMY</h2>

<?php

if(isset($mensaje)){

echo "<div class='error'>$mensaje</div>";

}

?>

<form method="POST">

<label>Usuario</label>

<select name="usuario" required>

<option value="">Seleccione un usuario</option>

<option value="admin">Administrador</option>

<option value="medico">Médico</option>

</select>

<label>Contraseña</label>

<input
type="password"
name="password"
placeholder="Ingrese su contraseña"
required>

<button
type="submit"
name="ingresar">

Iniciar sesión

</button>

</form>

</div>

</body>

</html>