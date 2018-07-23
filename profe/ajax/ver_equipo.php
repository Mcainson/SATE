

<?php

require_once ("../../class/conexion.php");
$obj= new conectar();
$conn=$obj->conexion();

$id_equipo = $_POST['id_equipo'];
$query = "SELECT equipo.nombre as nombre FROM equipo WHERE id_equipo = $id_equipo";
$result = $conn->query($query);

$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

echo $row["nombre"];
?>
<h2>Integrantes del equipo</h2>
<?php

$sql = "SELECT * FROM estudiante WHERE id_equipo = $id_equipo";
$result = $conn->query($sql);

        if ($result->num_rows > 0) {
            ?><table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Estatus</th>

            
            
            </tr><?php

        while($row = $result->fetch_assoc()) {
            $estatus = $row["tipo"];
            if ($estatus == 0){

                $estatus = 'Miembro';
            }
            if ($estatus == 1){

                $estatus = 'Lider';
            }

        ?>

        <tr>
        <td> <?php echo $row["id_estudiante"] ?></td>
                <td><?php echo $row["Nombre"] ?></td>
                <td><?php echo $row["Apellidos"] ?></td>
                <td><?php echo $estatus ?></td>
            
            
                </tr>
                
                <?php
        }
            
        ?>
        </table>

        <?php 
        } else {
        echo "Todavia no hay actividades para este proyecto";
        }
   
   ?>

   <h2>Proyecto asignado</h2>
   <?php

        $stmt = "SELECT proyecto.nombre as nombre, proyecto.Descripcion
        from proyecto, equipo 
        WHERE equipo.id_proyecto = proyecto.id_proyecto AND
        equipo.id_equipo = $id_equipo ";

        $result = $conn->query($stmt);
        $fila=mysqli_fetch_array($result,MYSQLI_ASSOC);
        if ($result->num_rows > 0) {?>

       <h3>  <?php echo 'Nombre del proyecto' ?> </h3> <?php     
        echo $fila["nombre"]; ?></br> </br> 
        <h3>  <?php echo 'Descripcion dwl proyecto' ?> </h3> <?php 
        echo $fila["Descripcion"];

        }else
        echo 'Este equipo no tiene proyecto asignado';