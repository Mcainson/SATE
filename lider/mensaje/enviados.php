

<?php



$sql = "SELECT * FROM mensaje WHERE id_usuario_envio=$id_usuario";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    ?><table>
            <tr>
                <th>ID</th>
               
                <th>Asunto</th>
                <th>Fecha</th>
              
               
                <th>ACTION</th>
            
            </tr><?php
   
    while($row = $result->fetch_assoc()) {
        ?>

    <tr>
        <td> <?php echo $row["id_mensaje"] ?></td>
             
                <td><?php echo $row["asunto"] ?>
                </td>
               <td>  Fecha a añadir </td>
                <td>
               <a href="#"><i class="material-icons">mail</i><a/>
               <a href="#"><i class="material-icons">delete_forever</i><a/>
            
              
                
                </td>
            
    </tr>
                
                <?php
    }
    
    ?>
    </table>
    <?php
} else {
    echo "Todavia no has recibido ningun mensaje";
}
 $conn->close();
?>
        