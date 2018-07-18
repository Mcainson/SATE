<?php


require_once ("../../class/conexion.php");
$obj= new conectar();
$conn=$obj->conexion();

$id_proyecto = $_POST['id_proyecto'];

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$fecha_entrega = $_POST['fecha_entrega'];


$sql = "UPDATE proyecto SET Nombre='$nombre', Descripcion='$descripcion', Fecha_entrega='$fecha_entrega' WHERE id_proyecto=$id_proyecto";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();