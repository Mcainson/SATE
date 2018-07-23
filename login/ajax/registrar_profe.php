<?php

require_once ("../../class/conexion.php");
	$obj= new conectar();
	$conn=$obj->conexion();

	$nombre = $_POST["nombre"];
	$apellidos = $_POST["apellidos"];
	$correo = $_POST["correo"];
	$contrasena = $_POST["contrasena"];


		// REGISTER USUARIO
	$sql = $conn->prepare("INSERT INTO users(usuario, contrasena, tipo) VALUE (?, ?,?);");
	$sql->bind_param("sss", $correo, $contrasena, $tipo);
	$correo = $correo;
	$contrasena = $contrasena;
	$tipo = 1;
	$sql->execute();
    $id_usuario = $conn->insert_id;
    echo $id_usuario;


	// REGISTER MAESTRO
	$sql2 = $conn->prepare("INSERT INTO profesor(Nombre, Apellidos, correo, id_users) VALUES (?,?,?,?)");
	


	$sql2->bind_param("ssss", $nombre, $apellidos, $correo, $id_usuario);

		$nombre = $nombre;
		$apellidos = $apellidos;
		$correo = $correo;
	
		$id_usuario = $id_usuario;
		$sql2->execute();
  
		

   
        if ($sql2) {
            $conn->close();
            $messages[] = "Los datos han sido guardados con éxito.";
        } else {
            $errors[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
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
