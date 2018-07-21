<?php
require_once ("../../class/conexion.php");
$obj= new conectar();
$conn=$obj->conexion();


$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // extensiones permitidas
$path = '../../proyectos/'; // carpeta en la que se va a guardar las actividades


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
  

$id_proyecto = $_POST['id_proyecto'];

//INSERTAR LA RUTA DEL ARCHIVO EN LA TABLA PROYECTO
$sql = "UPDATE proyecto SET ruta='".$path."' WHERE id_proyecto=$id_proyecto";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}



echo $path;

echo "Actividad final subida con exito.\n";

$conn->close();
}
}
else
{
echo'invalid';
}

