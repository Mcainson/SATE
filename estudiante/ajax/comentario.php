
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    


<?php

$id_actividad = $_POST['id_actividad'];
$id_estudiante = $_POST['id_estudiante'];
require_once ("../../class/conexion.php");
$obj= new conectar();
$conn=$obj->conexion();


//ACTIVIDAD EN FUNCCION DEL USUARIO CONECTADO
$sql = "SELECT * FROM comentario where id_actividad = $id_actividad and id_estudiante != $id_estudiante order by fecha Desc Limit 10";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

    ?>
    <table style="width:100%">
  <tr>
  
    <th width="25%">fecha / hora</th> 
    <th width="75%">comentario</th>
    
   
  </tr>

  <?php
    while($row = $result->fetch_assoc()) {
     
        ?>
              

  <tr>

    <td><?php echo $row["fecha"] ?> </td>
    <td><?php echo $row["comentario"] ?> </td>
   
  
  </tr>
  

       <?php
    }
   ?> </table>  <?php
}
else{


}

?>

</body>
</html>