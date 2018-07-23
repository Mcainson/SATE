<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/page.css">
<link rel="stylesheet" href="css/modals.css">
<style>

</style>
</head>
<body>



<!-- Trigger/Open The Modal -->


<!-- The Modal -->
    <div id="modal_student" class="modal">

    <!-- Modal content -->
    <?php 
        $id_usuario = $_SESSION['id_usuario'];
        $query = "SELECT * FROM profesor WHERE id_users='$id_usuario'";
        $result = $conn->query($query);

        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

        $id_profesor = $row["id_profesor"];



    ?>
    <div class="modal-content">
        <span class="close">&times;</span>

        <form name="add_estudiante" method="POST" id="add_estudiante"> 
            <div id="input_group">
            
                <div> <input class="input_text" type="text" id="" name="nombre" placeholder="Nombre del estudiante" required><br>
                    <input class="input_text" type="text" id="apellidos" name="apellidos" placeholder="Apellidos del estudiante" required><br>
                    <input class="input_text" type="email" id="correo" name="correo" placeholder="Correo del estudiante" required><br>
                    <input class="input_text" type="password" id="contrasena" name="contrasena" placeholder="Inserta contrasena" required><br>
                    <input class="input_text" type="hidden" id="id_profe" name="id_profe" value="  <?php   echo $id_profesor; ?>"><br>
                  
                
                </div>

                <input type="button" onClick="close_modal()"; class="btn btn-default" data-dismiss="modal" value="Cancelar">
                <input type="submit" class="btn btn-success" value="Guardar datos">

            </div>
        </form>
        </div>
    </div>


</script>
</body>
</html>
