<?php

require_once ("../../class/conexion.php");
$obj= new conectar();
$conn=$obj->conexion();



$id_proyecto = $_POST["id_proyecto"];
$id_profesor = $_POST["id_profesor"];
$id_equipo = $_POST["id_equipo"];
$id_lider = $_POST["nombre_lider"];


		
		// ASIGNAR PROYECTO A EQUIPO
		$sql2= "UPDATE equipo SET id_proyecto = $id_proyecto WHERE id_equipo = $id_equipo";
		$stmt = $conn->prepare($sql2);
		$stmt->execute();
		
		//DESIÑAR ESTUDIANTE COMO LIDER
		$sql3= "UPDATE estudiante SET tipo = 1 WHERE id_estudiante = $id_lider";
		$stmt3 = $conn->prepare($sql3);
		$stmt3->execute();

		// DESIÑAR USUARIO COMO LIDER
		
		$sql4 = "SELECT id_users FROM estudiante where id_estudiante=$id_lider";
		$result = $conn->query($sql4);

		while($fila = $result->fetch_assoc()) {

			$id_users = $fila["id_users"];
			echo $id_users;
			$sql5= "UPDATE users SET tipo = 2 WHERE id_users = $id_users";
			$stmt5 = $conn->prepare($sql5);
			$stmt5->execute();
	
		}
		