<?php
include("../config/conexion.php");

$id = $_GET['id'];

try{

    $sql = "DELETE FROM habitaciones WHERE id_habitacion='$id'";

    $conn->query($sql);

    header("Location:listar.php");
    exit();

}catch(mysqli_sql_exception $e){

    echo "<script>

    alert('No se puede eliminar esta habitación porque está asignada a una cita.');

    window.location='listar.php';

    </script>";

}
?>