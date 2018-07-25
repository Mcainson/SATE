
<fieldset>
 
    <legend>Datos del proyecto</legend>
    <form name="enviarmensaje" id="enviarmensaje">
    <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
       <?php

            // SELECCIONA EL ID del equipo DEL USUARIO CONECTADO
            $query1 = "SELECT id_equipo FROM estudiante WHERE id_users='$id_usuario'";
            $result = $conn->query($query1);
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            $id_equipo =  $row["id_equipo"];

         

             // SELECCIONA EL LIDER DEL equipo DEL USUARIO CONECTADO

        $sql = $conn->query("SELECT
        users.id_users, estudiante.id_estudiante as id_estudiante, estudiante.Nombre AS nombre_estudiante 
         FROM 
         estudiante,equipo, users
        where 
         estudiante.id_equipo = equipo.id_equipo AND estudiante.tipo=1 AND estudiante.id_equipo=$id_equipo AND
        estudiante.id_users = users.id_users;");

        
        //Count total number of rows
        $rowCount = $sql->num_rows;
        ?>
            <select  class="input_text" name="Nombre" id="id_lider" required>
            <option value="">Selecciona el lider</option>
        <?php
                if($rowCount > 0){
                    while($row = $sql->fetch_assoc()){ 
                        echo '<option value="'.$row['id_users'].'">'.$row['nombre_estudiante'].'</option>';
                    }
                }else{
                    echo '<option value="">No hay mas equipo</option>';
                }
        ?>
            </select>        
              <br>
            <input type="text" name="asunto" placeholder="Asunto"><br>
            <textarea name="mensaje" rows="4" cols="50"></textarea>
            <div><input type="submit"></div>
    </form>
 
</fieldset>
<div id="enviarmensaje"></div>
        
   