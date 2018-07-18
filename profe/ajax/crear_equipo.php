<?php

        require_once ("../../class/conexion.php");
		$obj= new conectar();
		$conn=$obj->conexion();

        $nombre = $_POST["nombre"];
        $codigo = $_POST["codigo"];

        $sql = $conn->prepare("INSERT INTO equipo(Nombre, codigo) VALUE (?, ?);");
		$sql->bind_param("ss", $nombre, $codigo);
		$nombre = $nombre;
        $codigo = $codigo;
        
		var_dump($sql);
		$sql->execute();
        $id_equipo = $conn->insert_id;
        

foreach($_POST["id"] as $key => $id){
    echo $id;
    $sql2= "UPDATE estudiante SET id_equipo = $id_equipo WHERE id_estudiante = $id";
		$stmt = $conn->prepare($sql2);
		$stmt->execute();
		var_dump($stmt);

		$sql3= "UPDATE estudiante SET estatus = 1 WHERE id_estudiante = $id";
		$stmt3 = $conn->prepare($sql3);
		$stmt3->execute();
		var_dump($stmt);
	
		
}

mysqli_close($conn);