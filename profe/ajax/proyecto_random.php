<?php


require_once ("../../class/conexion.php");
$obj= new conectar();
$conn=$obj->conexion();

$id_proyecto = $_POST["id_proyecto"];
$id_profesor = $_POST["id_profesor"];

// SELECT EQUIPO RANDOM AL QUE SE VA ASIGNAR EL PROYECTO
 $sql = "SELECT DISTINCT equipo.id_equipo as id_equipo, equipo.Nombre
        FROM equipo, profesor, estudiante
        WHERE
        equipo.id_proyecto =0 AND
        estudiante.id_profesor =$id_profesor ORDER BY RAND() limit 1";

        $result = $conn->query($sql);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $id_equipo = $row["id_equipo"];

        // ASIGNA EL PROYECTO AL EQUIPO
$query = "UPDATE equipo SET id_proyecto=$id_proyecto WHERE id_equipo=$id_equipo";

if ($conn->query($query) === TRUE) {
    echo "Calificacion acceptada";
}
else {
    echo "Error updating record: " . $conn->error;
}

    // DESIÑAR DE MANERA RANDOM UN ESTUDIANTE COMO LIDER
$stmt ="SELECT * FROM estudiante WHERE id_equipo = $id_equipo ORDER BY RAND() limit 1";
$result = $conn->query($stmt);
$fila=mysqli_fetch_array($result,MYSQLI_ASSOC);
$id_estudiante = $fila["id_estudiante"];
$id_users = $fila["id_users"];


$query1 = "UPDATE estudiante SET tipo=1 WHERE id_users=$id_users";

if ($conn->query($query1) === TRUE) {
    echo "Calificacion acceptada";
}
else {
    echo "Error updating record: " . $conn->error;
}

$query2 = "UPDATE users SET tipo=2 WHERE id_users=$id_users";

if ($conn->query($query2) === TRUE) {
    echo "Calificacion acceptada";
}
else {
    echo "Error updating record: " . $conn->error;
}