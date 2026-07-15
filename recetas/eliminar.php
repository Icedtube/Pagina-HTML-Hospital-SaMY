<?php

include("../config/conexion.php");

if(isset($_GET['id'])){

$id=$_GET['id'];

$sql="DELETE FROM recetas WHERE id_receta='$id'";

if($conn->query($sql)){

header("Location:listar.php");
exit();

}else{

echo "Error al eliminar la receta.";

}

}else{

header("Location:listar.php");
exit();

}
?>