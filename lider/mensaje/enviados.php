

<?php



$sql = "SELECT * FROM mensaje WHERE id_usuario_envio=$id_usuario order by fecha DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    ?><table>
            <tr>
                <th>ID</th>
               
                <th>Asunto</th>
                <th>Fecha</th>
              
               
        
            
            </tr><?php
   
    while($row = $result->fetch_assoc()) {
        ?>

    <tr>
        <td> <?php echo $row["id_mensaje"] ?></td>
             
                <td><?php echo $row["asunto"] ?>
                </td>
               <td><?php echo $row["fecha"] ?></td>
              
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
        