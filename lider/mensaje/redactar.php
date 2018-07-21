
<fieldset>
    <?php echo $id_estudiante;?>
    <legend>Datos del proyecto</legend>
    
       <?php
        // SELECCIONA EL ID del equipo DEL USUARIO CONECTADO
        $query1 = "SELECT id_equipo FROM estudiante WHERE id_users='$id_usuario'";
        $result = $conn->query($query1);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $id_equipo =  $row["id_equipo"];
 
        // SELECCIONA EL ID DE USUARIO DEL PROFESOR DEL LIDER
        $query = "SELECT users.id_users as id_users, profesor.nombre as profe
        FROM
        users,
        estudiante,
        profesor        
        WHERE
        
        profesor.id_profesor = estudiante.id_profesor AND
        profesor.id_users = users.id_users AND
        estudiante.id_estudiante = $id_estudiante
        ;";
        $result2 = $conn->query($query);
        var_dump($result2);
        $row1=mysqli_fetch_array($result2,MYSQLI_ASSOC);
        $IdUsuarioMaes =  $row1["id_users"];
    
        //SELECCIONA LOS ESTUDIANTES DEL MISMO GRUPO QUEEL LIDER
        $sql = $conn->query("SELECT
        users.id_users, estudiante.id_estudiante as id_estudiante, estudiante.Nombre AS nombre_estudiante
 
     FROM 
         estudiante,equipo, users
     where 
         estudiante.id_equipo = equipo.id_equipo AND estudiante.tipo=0 AND estudiante.id_equipo=$id_equipo AND estudiante.id_users = users.id_users;");

        //Count total number of rows
        $rowCount = $sql->num_rows;
        ?>
        <form name="enviarmensaje" id="enviarmensaje" >
    <input type="hidden" name="id_usuario" value="<?php echo $id_usuario ?>">
            <select  class="input_text" name="Nombre" id="id_equipo" required>
            <option> Selecciona persona</option>
                <optgroup label="Elige el profesor">
                    <option value="<?php echo $IdUsuarioMaes ?>">Maestro</option>                    
                </optgroup>

                <optgroup label="Miembro de tu equipo">
        <?php
                if($rowCount > 0){
                    while($row = $sql->fetch_assoc()){ 
                        echo '<option value="'.$row['id_estudiante'].'">'.$row['nombre_estudiante'].'</option>';
                    }
                }else{
                    echo '<option value="">No hay mas equipo</option>';
                }
        ?>    </optgroup>
        </select>
               <br>
            <input type="text" name="asunto" placeholder="Asunto"><br>
            <textarea name="mensaje" rows="4" cols="50"></textarea>
            <div><input type="submit"></div> 
      </form>
 
</fieldset>
<div id="enviarmensaje"></div>
        <script>
$("#enviarmensaje").submit(function( event ) {
    var parametros = $(this).serialize();
    alert(parametros);
        var id = $("#Nombre").val();
    
      $.ajax({
              type: "POST",
              url: "ajax/enviarmensaje.php",
              data: parametros,
               beforeSend: function(objeto){
                  $("#enviarmensaje").html("Enviando...");
                },
              success: function(datos){
                  
              $("#enviarmensaje").html(datos);
        
        
            
            }
      });
    event.preventDefault();
  });
  </script>