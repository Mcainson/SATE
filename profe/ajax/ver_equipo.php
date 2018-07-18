

<?php

require_once ("../../class/conexion.php");
$obj= new conectar();
$conn=$obj->conexion();




$sql = "SELECT * FROM equipo";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    ?><table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Codigo</th>
              
               
                <th>ACTION</th>
            
            </tr><?php
   
    while($row = $result->fetch_assoc()) {
        ?>

    <tr>
        <td> <?php echo $row["id_equipo"] ?></td>
                <td><?php echo $row["Nombre"] ?></td>
                <td><?php echo $row["Codigo"] ?>
                </td>
               
                <td>
               <a href="#"><i class="material-icons">archive</i><a/>
               <button id="asignarAct" ><i class="material-icons">description</i></button>
              
                <label class="switch">
                <input type="checkbox" >
                    <span class="slider round"></span>
                </label>
                <input type="hidden" id="estatus" value=""/>
                               
                </td>
            
                </tr>
                
                <?php
    }
    
    ?>
    </table>
    <?php
} else {
    echo "Todavia no hay actividades para este proyecto";
}

$conn->close();
?>
        