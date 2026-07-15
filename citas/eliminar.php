<?php
include("../config/conexion.php");

if(isset($_GET['id'])){

    $id = $_GET['id'];

    // Obtener la habitación de la cita
    $consulta = $conn->query("SELECT id_habitacion FROM citas WHERE id_cita='$id'");

    if($consulta->num_rows > 0){

        $fila = $consulta->fetch_assoc();
        $id_habitacion = $fila['id_habitacion'];

        // Liberar la habitación
        $conn->query("UPDATE habitaciones
                      SET estado='Disponible'
                      WHERE id_habitacion='$id_habitacion'");
    }

    // Eliminar receta relacionada (si existe)
    $conn->query("DELETE FROM recetas WHERE id_cita='$id'");

    // Eliminar la cita
    if($conn->query("DELETE FROM citas WHERE id_cita='$id'")){

        header("Location:listar.php");
        exit();

    }else{

        echo "<script>
        alert('No se pudo eliminar la cita.');
        window.location='listar.php';
        </script>";

    }

}else{

    header("Location:listar.php");
    exit();

}
?>