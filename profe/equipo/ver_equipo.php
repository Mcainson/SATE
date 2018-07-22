

<?php


        $sql = "SELECT DISTINCT equipo.id_equipo as id_equipo, equipo.nombre as Nombre, equipo.Codigo as Codigo
        FROM      
        equipo,
        estudiante        
        WHERE
        equipo.id_equipo = estudiante.id_equipo AND
        estudiante.id_profesor =$id_profesor";
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
               
                <td>

                <a href="#" id="ver_project"><i class="material-icons">visibility</i>
                <input id="id_equipo" type="hidden" value=" <?php echo $row["id_equipo"] ?>">
                
                <a/>    

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


?>
        