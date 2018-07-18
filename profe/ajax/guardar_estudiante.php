<?php
	if (empty($_POST['nombre'])){
		$errors[] = "Ingresa el nombre del alumno.";
	} elseif (!empty($_POST['nombre'])){

	require_once ("../../class/conexion.php");
	$obj= new conectar();
	$conn=$obj->conexion();

	$nombre = $_POST["nombre"];
	$apellidos = $_POST["apellidos"];
	$correo = $_POST["correo"];
	$contrasena = $_POST["contrasena"];
	$id_profe = $_POST["id_profe"];

		// REGISTER USUARIO
	$sql = $conn->prepare("INSERT INTO users(usuario, contrasena, tipo) VALUE (?, ?,?);");
	$sql->bind_param("sss", $correo, $contrasena, $tipo);
	$correo = $correo;
	$contrasena = $contrasena;
	$tipo = 3;
	var_dump($sql);
	$sql->execute();
	$id_usuario = $conn->insert_id;


	// REGISTER ESTUDIANTE
	$sql2 = $conn->prepare("INSERT INTO estudiante(Nombre, Apellidos, correo, id_users, id_profesor) VALUES (?,?,?,?,?)");
	var_dump($sql2);


	$sql2->bind_param("sssss", $firstname, $lastname, $email, $id_usuario, $id_profe);

		$firstname = $nombre;
		$lastname = $apellidos;
		$email = $correo;
		$id_profe = $id_profe;
		$id_usuario = $id_usuario;
		$sql2->execute();
  
		












   
    if ($sql2) {
		$conn->close();
        $messages[] = "Los datos del alumno han sido guardados con éxito.";
    } else {
        $errors[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
    }
		
	} else 
	{
		$errors[] = "desconocido.";
	}
if (isset($errors)){
			
			?>
			<div class="alert_danger">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert_success">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

			
		
?>