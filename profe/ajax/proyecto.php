
<?php

require_once ("../../class/conexion.php");
$obj= new conectar();
$conn=$obj->conexion();



$id_equipo = $_POST["id_equipo"];


if(isset($_POST["id_equipo"]) && !empty($_POST["id_equipo"])){
	
	$query = $conn->query("SELECT * FROM estudiante WHERE id_equipo = ".$_POST['id_equipo']."");
	 //Count total number of rows
    $rowCount = $query->num_rows;
    
    //MOSTRAR LIDER
    if($rowCount > 0){
        echo '<option value="" name="lider">Selecciona lider</option>';
        while($row = $query->fetch_assoc()){ 
			$id_lider = $row['id_estudiante'];
            echo '<option value="'.$row['id_estudiante'].'">'.$row['Nombre'].'</option>';
		}
		
    }else{
        echo '<option value="">No hay estudiante en este equipo</option>';
	}
	

}





