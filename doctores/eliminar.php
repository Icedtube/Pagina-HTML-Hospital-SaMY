<?php
include("../config/conexion.php");

$id = $_GET['id'];

try{

    $sql = "DELETE FROM doctores WHERE id_doctor='$id'";

    $conn->query($sql);

    header("Location:listar.php");
    exit();

}catch(mysqli_sql_exception $e){

    echo "<script>

    alert('No se puede eliminar este doctor porque tiene citas registradas.');

    window.location='listar.php';

    </script>";

}
?>