<?php
require_once ("../../class/conexion.php");
$obj= new conectar();
$conn=$obj->conexion();


$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // extensiones permitidas
$path = '../../actividades/'; // carpeta en la que se va a guardar las actividades


$img = $_FILES['fileToUpload']['name'];
$tmp = $_FILES['fileToUpload']['tmp_name'];

// enontrar la extension del archivo
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

$final_image = rand(1000,1000000).$img;

// check's valid format
if(in_array($ext, $valid_extensions))
{
$path = $path.strtolower($final_image);

if(move_uploaded_file($tmp,$path))
{
  

$id_actividad = $_POST['id_actividad'];
$comentario = $_POST['comentario'];
$id_estudiante = $_POST['id_estudiante'];

//insert form data in the database
$sql = "UPDATE actividades SET ruta='".$path."', estatus=2 WHERE id_actividades=$id_actividad";


$stmt = $conn->prepare("INSERT INTO comentario (comentario, id_actividad, fecha, id_estudiante) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sss", $comentario, $id_actividad, $fecha, $id_estudiante);

// set parameters and execute
$fecha = date('j-m-y');
$comentario = $comentario;
$id_actividad = $id_actividad;
$id_estudiante = $id_estudiante;
$stmt->execute();


var_dump($sql);
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

echo "El fichero es válido y se subió con éxito.\n";

$conn->close();
}
}
else
{
echo'invalid';
}

