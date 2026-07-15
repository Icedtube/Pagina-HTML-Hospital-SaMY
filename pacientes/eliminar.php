<?php
include("../config/conexion.php");

$id = $_GET['id'];

try{

    $sql = "DELETE FROM pacientes WHERE id_paciente='$id'";

    $conn->query($sql);

    header("Location:listar.php");
    exit();

}catch(mysqli_sql_exception $e){

    echo "<script>

    alert('No se puede eliminar este paciente porque tiene citas registradas.');

    window.location='listar.php';

    </script>";

}
?>