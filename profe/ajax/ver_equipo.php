

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
                <td><?php echo $row["Codigo"] ?></td>
               
                <td><a href="www.google.com"><i class="material-icons">archive</i><a/>   
                <a href="https://www.w3schools.com">Visit W3Schools</a>             
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
        