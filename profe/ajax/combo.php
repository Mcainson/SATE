
<?php


require_once ("../../class/conexion.php");
$obj= new conectar();
$conn=$obj->conexion();

$id_editar = $_POST['id_editar'];

$sql = "SELECT * FROM proyecto WHERE id_proyecto= $id_editar";
$result = $conn->query($sql);
var_dump($sql); 

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        
        ?>
        <form name="update_proyecto" method="POST" id="update_proyecto">
        <input name="id_proyecto" type="text" value="<?php echo $row["id_proyecto"]; ?>" readonly require/>
        <input name="nombre" type="text" value="<?php echo $row["Nombre"]; ?>" require/> </br>
        <input name="descripcion" type="text" value="<?php echo $row["Descripcion"]; ?>" require/>
        <input name="fecha_entrega" type="date" value="<?php echo $row["fecha_entrega"]; ?>" require/></br>

        <button type="submit" value="Submit">Actualizar</button>
        </form>
        
        
        <?php
       
    }
    
   
 
} else {
    echo "";
}

$conn->close();

?>

<script src="js/update_proyecto.js"></script>