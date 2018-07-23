<?php 


require_once ("../../class/conexion.php");
$obj= new conectar();
$conn=$obj->conexion();

$id_users = $_POST["Nombre"];
$asunto = $_POST["asunto"];
$mensaje = $_POST["mensaje"];
$id_usuario = $_POST["id_usuario"];
$fecha = date("Y-m-d H:i:s");

// REGISTER MENSAJE
$sql = $conn->prepare("INSERT INTO mensaje(id_usuario_envio, id_usuario_recibo, asunto, mensaje, fecha) VALUES (?,?,?,?,?)");



$sql->bind_param("iisss", $id_usuario_envio, $id_usuario_recibo, $asunto, $mensaje, $fecha);


    $id_usuario_envio = $id_usuario;
    $id_usuario_recibo = $id_users;
    $asunto = $asunto; 
    $mensaje = $mensaje;
    $fecha = $fecha;

    $sql->execute();
   
    if ($sql) {
		
        $messages[] = "Los datos del alumno han sido guardados con éxito.";
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
    

