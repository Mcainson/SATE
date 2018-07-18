

<?php


require_once ("../../class/conexion.php");
	$obj= new conectar();
    $conn=$obj->conexion();
    
    $id_eliminar = $_POST['id_eliminar'];
 

    // sql to delete a record
$sql = "DELETE FROM proyecto WHERE id_proyecto=$id_eliminar";


if ($conn->query($sql) === TRUE) {?>
    <div class="alert_success">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
    <strong>¡Bien hecho!</strong>
    <?php
    echo "Record deleted successfully";?>
    </div><?php
} else {
    echo "Error deleting record: " . $conn->error;
}


$sql2 = "DELETE FROM actividades WHERE id_proyecto=$id_eliminar";


if ($conn->query($sql2) === TRUE) {?>
    <div class="alert_success">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
    <strong>¡Bien hecho!</strong>
    <?php
    echo "Record deleted successfully";?>
    </div><?php
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();

?>