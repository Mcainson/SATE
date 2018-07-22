        <?php

        include('../../inc/config.php');

        //Get all country data
        $id_proyecto = $_POST['id_proyecto'];
        echo $id_proyecto;  ?>
        <form name="asign_actividad" method="POST" id="asign_actividad">
        <input name="id_proyecto" type="hidden" value="<?php echo $_POST['id_proyecto']; ?>">
        <input name="id_actividad" type="hidden" value="<?php echo $_POST['id_actividad']; ?>">
        <?php
        $query = $conn->query("SELECT
            estudiante.id_estudiante, estudiante.Nombre AS nombre_estudiante, equipo.id_equipo

        FROM 
            estudiante,equipo
        where 
            estudiante.id_equipo = equipo.id_equipo AND tipo=0 AND equipo.id_proyecto=$id_proyecto;");

        //Count total number of rows
        $rowCount = $query->num_rows;
        ?>

        <select class="input_text" name="Nombre" id="id_proyecto" required>
        <option value="">Selecciona encargado</option>
        <?php
        if($rowCount > 0){
        while($row = $query->fetch_assoc()){ 
        echo '<option value="'.$row['id_estudiante'].'">'.$row['nombre_estudiante'].'</option>';
        }
        }else{
        echo '<option value="">No hay mas proyecto</option>';
        }
        ?>
        </select> </br>



        <textarea class="input_text" name="comentario" rows="4" cols="50" placeholder="Escribe comentario" required></textarea></br>
        <input type="submit" class="submit_button2" value="Asignar">
        </form>
        <div id="resultados"></div>
        
        <script src="js/ajax.js">  </script>