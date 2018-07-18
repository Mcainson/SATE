<?php


require_once ("../../class/conexion.php");
$obj= new conectar();
$conn=$obj->conexion();

$id_proyecto = $_POST['id_proyecto'];

$id_actividad = $_POST['id_actividad'];
$id_estudiante = $_POST['Nombre'];
$comentario = $_POST['comentario'];



$sql = "UPDATE actividades SET estatus=1, id_estudiante=$id_estudiante WHERE id_actividades=$id_actividad";

if ($conn->query($sql) === TRUE) {
    echo "Actividad Asignada";
}
else {
    echo "Error updating record: " . $conn->error;
}


$stmt = $conn->prepare("INSERT INTO comentario (comentario, id_actividad, fecha) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $comentario, $id_actividad, $fecha);

// set parameters and execute
$fecha = date('j-m-y');
$comentario = $comentario;
$id_actividad = $id_actividad;
$stmt->execute();
$conn->close();