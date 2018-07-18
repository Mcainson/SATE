<?php


require_once ("../../class/conexion.php");
$obj= new conectar();
$conn=$obj->conexion();

$id_actividad = $_POST['id_actividad'];
$comentario = $_POST['comentario'];
$aprobar = $_POST['aprobar'];



if ($aprobar=1){
$sql = "UPDATE actividades SET estatus=3 WHERE id_actividades=$id_actividad";

if ($conn->query($sql) === TRUE) {
    echo "Actividad Asignada";
}
else {
    echo "Error updating record: " . $conn->error;
}

}

if ($aprobar=2){
    $sql = "UPDATE actividades SET estatus=4 WHERE id_actividades=$id_actividad";
    if ($conn->query($sql) === TRUE) {
        echo "Actividad Asignada";
    }
    else {
        echo "Error updating record: " . $conn->error;
    }
    

}






$stmt = $conn->prepare("INSERT INTO comentario (comentario, id_actividad, fecha) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $comentario, $id_actividad, $fecha);

// set parameters and execute
$fecha = date('j-m-y');
$comentario = $comentario;
$id_actividad = $id_actividad;
$stmt->execute();
$conn->close();