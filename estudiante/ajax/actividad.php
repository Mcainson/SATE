<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <title>Document</title>
</head>
<body>
    <div id="cambio"></div>
    

<?php

require_once ("../../class/conexion.php");
$obj= new conectar();
$conn=$obj->conexion();

$id_proyecto = $_POST["id_proyecto"];
echo $id_proyecto;

$id_estudiante = $_POST['id_estudiante'];
//ACTIVIDAD EN FUNCCION DEL USUARIO CONECTADO
$sql = "SELECT * FROM actividades WHERE id_proyecto= $id_proyecto and id_estudiante=$id_estudiante";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    ?><table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Proyecto</th>
                <th>Estatus</th>
                <th>Calificacion</th>
                <th>ACTION</th>
            
            </tr><?php
   
    while($row = $result->fetch_assoc()) {
                if ($row["estatus"]==1){
                    $estatus = 'pendiente';
                }

                if ($row["estatus"]==0){
                    $estatus = 'Actividad non definida';
                }

                if ($row["estatus"]==2){
                    $estatus = 'Actividad subida';
                }
                if ($row["estatus"]==3){
                    $estatus = 'A refaire';
                }

                if ($row["estatus"]==4){
                    $estatus = 'En correccion ...';
                }

                if ($row["estatus"]==5){
                    $estatus = 'Actividad terminada';
                }

            


        ?>

    <tr>
        <td> <?php echo $row["id_actividades"] ?></td>
                <td><?php echo $row["Nombre"] ?></td>
                <td><?php echo $row["id_proyecto"] ?>
                </td>
                
                <td> <?php echo $estatus ?> </td>
                <td> <?php echo $row["calificacion"] ?> </td>
                <td>
          

                <?php
                 if ($row["estatus"]==1 || $row["estatus"]==3){
                    ?>
                

               <a class="modalsubir" href="#"><i class="material-icons">attachment</i>
               <input type="hidden" id="id_actividad" value="<?php echo $row["id_actividades"] ?>"/>
               
               <a/>
               <?php }?>
                
                <input type="hidden" id="estatus" value="<?php echo $row["estatus"] ?>"/>
                               
              
                <a class="modalcomentario" href="#"><i class="material-icons">insert_comment</i>
                <input type="hidden" id="id_actividad" value="<?php echo $row["id_actividades"] ?>"/>
                </a>      
                </td>
               
                </tr>
                
                <?php

                include('../modal/modal_subir.php');
    }
    
    ?>
    </table>
    <?php
} else {
    echo "Todavia no hay actividades para este proyecto";
}

$conn->close();
?>

<script src="js/ajax.js"></script>
</body>
</html>