            <?php


$query = "SELECT * FROM profesor WHERE id_users='$id_usuario'";
$result = $conn->query($query);

$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

?>

        <div id="conteneur">
            <div class=""><input class="input_text" type="text" class="form-control" placeholder="Buscar"  id="buscar" onkeyup="cargar(1);" /></div>
            <div><input type="hidden"  id="id_profesor" onkeyup="load(1);" value="<?php echo $row["id_profesor"]; ?>" /></div>
        </div>
        
        
        <div id="cargar"></div>
        
        
        <div class='cargar'></div>
   
    
        

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/proyecto.js"></script>

