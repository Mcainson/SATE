<?php
//Include database configuration file
include('../inc/config.php');

if(isset($_POST["id_equipo"]) && !empty($_POST["id_equipo"])){

   
	$query = $conn->query("SELECT * FROM estudiante WHERE id_equipo = ".$_POST['id_equipo']."");
	
	
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //MOSTRAR LIDER
    if($rowCount > 0){
        echo '<option value="" name="lider">Selecciona lider</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['id_estudiante'].'">'.$row['Nombre'].'</option>';
		}
		
    }else{
        echo '<option value="">No hay estudiante en este equipo</option>';
    }
}


?>

<?php
	if (empty($_POST['nombre_proyecto'])){

		
	} elseif (!empty($_POST['nombre_proyecto'])){

		$id_profesor = $_POST['id_profesor'];
		echo $id_profesor;

		require_once ("../class/conexion.php");
		$obj= new conectar();
		$conn=$obj->conexion();

		$proyecto = $_POST["nombre_proyecto"];
		$descripcion = $_POST["descripcion_proyecto"];
		$id_equipo = $_POST["Nombre"];
		$id_lider = $_POST["nombre_lider"];
		$fecha_entrega = $_POST["fecha_entrega"];

		$sql = $conn->prepare("INSERT INTO proyecto(Nombre, Descripcion, fecha_entrega, id_profe) VALUE (?, ?, ?,?);");
		$sql->bind_param("ssss", $nombre, $descripcion, $fecha_entrega, $id_profesor);
		$nombre = $proyecto;
		$id_profesor = $id_profesor;
		$fecha_entrega = $fecha_entrega;
		$descripcion = $descripcion;
		var_dump($sql);
		$sql->execute();
		$id_proyecto = $conn->insert_id;

		
	

		foreach($_POST["mytext"] as $key => $actividad){
			echo $actividad;
			$stmt1= "INSERT INTO actividades(Nombre, id_proyecto) VALUES ('$actividad', $id_proyecto); ";
			$stmt2 = $conn->prepare($stmt1);
			var_dump($stmt2);
			$stmt2->execute();
		}
		
		
		

		$sql2= "UPDATE equipo SET id_proyecto = $id_proyecto WHERE id_equipo = $id_equipo";
		$stmt = $conn->prepare($sql2);
		$stmt->execute();
		var_dump($stmt);

		//ASIGNA ESTUDIANTE COMO LIDER
		$sql3= "UPDATE estudiante SET tipo = 1 WHERE id_estudiante = $id_lider";
		$stmt3 = $conn->prepare($sql3);
		$stmt3->execute();
		var_dump($stmt);



		// ASIGNA USUARIO COMO LIDER
		
		$sql4 = "SELECT id_users FROM estudiante where id_estudiante=$id_lider";
		$result = $conn->query($sql4);
		
		var_dump($sql4);	
		while($row = $result->fetch_assoc()) {

			$id_users = $row["id_users"];
			echo $id_users;
			$sql5= "UPDATE users SET tipo = 2 WHERE id_users = $id_users";
			$stmt5 = $conn->prepare($sql5);
			$stmt5->execute();
			var_dump($stmt5);
		}
		



		
		
	
	
		mysqli_close($conn); 
	
	}

	?>
  
