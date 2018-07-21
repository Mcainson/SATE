<?php

require_once ("../../class/conexion.php");
$obj= new conectar();
$conn=$obj->conexion();

$id_mensaje = $_POST["id_mensaje"];

$sql = "SELECT mensaje FROM mensaje WHERE id_mensaje=$id_mensaje";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) { ?>
                  <p> <?php echo $row['mensaje'] ?> </p>
   <?php }
} else {
    echo "Este mensaje esta vacio";
}
?> 