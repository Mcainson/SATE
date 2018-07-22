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

$sql = "SELECT * FROM actividades WHERE id_proyecto= $id_proyecto";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    ?><table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Proyecto</th>
                <th>Encargado</th>
                <th>Calificacion</th>
                <th>ACTION</th>
            
            </tr><?php
   
    while($row = $result->fetch_assoc()) {
        ?>

    <tr>
        <td> <?php echo $row["id_actividades"] ?></td>
                <td><?php echo $row["Nombre"] ?></td>
                <td><?php echo $row["id_proyecto"] ?>
                </td>
                
                <td> <?php echo $row["estatus"] ?> </td>
                <td> <?php echo $row["calificacion"] ?> </td>
                <td>

                <?php if ($row["estatus"]==4){?>

               
               <a href="<?php echo 'sate/'.$row["ruta"] ?>"><i class="material-icons">archive</i><a/>

               <a href="#"><i class="material-icons">done</i></a>




               <a class="asignarAct" href="#" ><i class="material-icons">description</i>
               <input type="hidden" id="id_actividad" value="<?php echo $row["id_actividades"] ?>"/>
               <input type="hidden" id="id_proyecto" value="<?php echo $row["id_proyecto"] ?>"/>
               
               
               </a>
               <?php 
             
            }
            ?>  
                <input type="hidden" id="estatus" value="<?php echo $row["estatus"] ?>"/>
                               
                </td>
                <td>
            
                
                </td>
               
                </tr>
                
                <?php
    }
    include('../modals/actividad_modal.php');      
    ?>
    </table>

  
    <?php
} else {
    echo "Todavia no hay actividades para este proyecto";
}

$conn->close();

?>
        

            <script src="js/ajax.js">  </script>


  

</body>
</html>