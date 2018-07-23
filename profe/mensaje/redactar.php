
<fieldset>
 
    <legend>Datos del proyecto</legend>
    <form name="enviarmensaje" id="enviarmensaje">
    <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
       <?php
        //SELECCIONAR EQUIPO
        $sql = "SELECT * FROM profesor WHERE id_users='$id_usuario'";
        $result = $conn->query($sql);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $id_profesor= $row["id_profesor"];
        $query = $conn->query("SELECT DISTINCT equipo.id_equipo as id_equipo, equipo.nombre as Nombre
                            FROM      
                            equipo,
                            estudiante        
                            WHERE
                            equipo.id_equipo = estudiante.id_equipo AND
                            estudiante.id_profesor =$id_profesor");
        
        //Count total number of rows
        $rowCount = $query->num_rows;
        ?>
            <select  class="input_text" name="Nombre" id="id_equipo" required>
            <option value="">Selecciona equipo</option>
        <?php
                if($rowCount > 0){
                    while($row = $query->fetch_assoc()){ 
                        echo '<option value="'.$row['id_equipo'].'">'.$row['Nombre'].'</option>';
                    }
                }else{
                    echo '<option value="">No hay mas equipo</option>';
                }
        ?>
            </select>        
            <select class="input_text" name="nombre_lider" id="nombre_lider" required>
            <option value="">Selecciona miembro</option>
            </select>   <br>
            <input type="text" name="asunto" placeholder="Asunto"><br>
            <textarea name="mensaje" rows="4" cols="50"></textarea>
            <div><input type="submit"></div>
    </form>
 
</fieldset>
<div id="enviarmensaje"></div>
        
   