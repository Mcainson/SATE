<?php


require_once ("../../class/conexion.php");
$obj= new conectar();
$conn=$obj->conexion();

$id_proyecto = $_POST['id_proyecto'];

$id_actividad = $_POST['id_actividad'];
$id_estudiante = $_POST['Nombre'];
$id_lider = $_POST['id_lider'];

$comentario = $_POST['comentario'];



$sql = "UPDATE actividades SET estatus=1, id_estudiante=$id_estudiante WHERE id_actividades=$id_actividad";

if ($conn->query($sql) === TRUE) {
    echo "Actividad Asignada";
}
else {
    echo "Error updating record: " . $conn->error;
}


$stmt = $conn->prepare("INSERT INTO comentario (comentario, id_actividad, fecha, id_estudiante) VALUES (?, ?, ?,?)");
$stmt->bind_param("ssss", $comentario, $id_actividad, $fecha, $id_lider);

// set parameters and execute
$fecha = date('j-m-y');
$comentario = $comentario;
$id_actividad = $id_actividad;
$id_lider = $id_lider;
$stmt->execute();
$conn->close();

?>