<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <title>ACTIVIDAD</title>
</head>
<body>
    <div id="resultado"></div>
    
<?php
        //Include database configuration file
        include('../inc/config.php');

        $id_users = $_SESSION['id_usuario'];
        $query = "SELECT * FROM profesor WHERE id_users='$id_usuario'";
        $result = $conn->query($query);

        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        ?>
   
       <?php
           $id_profesor=$row["id_profesor"];
        //SELECCIONAR PROYECTOS
        $query = $conn->query("SELECT * from proyecto where id_profe= $id_profesor;");
        
        //Count total number of rows
        $rowCount = $query->num_rows;
        ?>
        <select class="input_text" name="Nombre" id="id_proyecto" >
            <option value="">Selecciona proyecto</option>
            <?php
            if($rowCount > 0){
                while($row = $query->fetch_assoc()){ 
                    echo '<option value="'.$row['id_proyecto'].'">'.$row['Nombre'].'</option>';
                }
            }else{
                echo '<option value="">No hay mas proyecto</option>';
            }
            ?>
        </select>

        <script type="text/javascript">
$(document).ready(function(){
    $('#id_proyecto').on('change',function(){
        var id_proyecto = $(this).val();
       
        if(id_proyecto){
            $.ajax({
                type:'POST',
                url:'ajax/actividad.php',
                data:'id_proyecto='+id_proyecto,
                
                                success:function(html){
                   
                    $('#resultado').html(html);
                  
                  
                }
            }); 
        }
    });
    
    
});
</script>

</body>
</html>