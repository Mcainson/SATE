<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div id="resultado"></div>
    
<?php
       
        // SELECCIONA PROYECTO DE ESTUDIANTE    
        $id_estudiante = $row["id_estudiante"];
        $query = $conn->query("SELECT DISTINCT proyecto.id_proyecto as id_proyecto, proyecto.Nombre as Nombre
        FROM 
        proyecto,        
        equipo,
        estudiante        
        WHERE                            
        equipo.id_proyecto = proyecto.id_proyecto AND
        equipo.id_equipo =estudiante.id_equipo AND
        estudiante.id_estudiante=$id_estudiante");
        var_dump($query);
        
        //Count total number of rows
        $rowCount = $query->num_rows;
        ?>
        <input type="hidden" id="id_estudiante" value="<?php echo $id_estudiante?>"/>
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
        var id_estudiante = $('#id_estudiante').val();
        alert(id_estudiante);
        if(id_proyecto){
            $.ajax({
                type:'POST',
                url:'ajax/actividad.php',
                data:{id_proyecto, id_estudiante},
                
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