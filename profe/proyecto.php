<!DOCTYPE html>
<html>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
 
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
    
    


    <script type="text/javascript">
$(document).ready(function(){
    $('#id_equipo').on('change',function(){
        var id_equipo = $(this).val();
        if(id_equipo){
            $.ajax({
                type:'POST',
                url:'ajax.php',
                data:'id_equipo='+id_equipo,
                
                success:function(html){
                    $('#nombre_lider').html(html);
                  
                  
                }
            }); 
        }else{
            $('#nombre_lider').html('<option value="">Selecciona equipo</option>');
         
        }
    });
    
    
});
</script>
      
    
<body>  
<fieldset>
    <legend>Datos del proyecto</legend>
    <form name="add_proyecto" id="add_proyecto">
        <?php  $tomorrow = date("Y-m-d", strtotime('tomorrow'));
            echo $tomorrow;        
        ?>
    <input type="hidden" id="id_profesor" name="id_profesor" value="<?php echo $row["id_profesor"];?>">
        <div><input class="input_text" type="text" id="nombre_proyecto" placeholder="Nombre del proyecto" name="nombre_proyecto" required/></div>
        <div><textarea rows="4" cols="50" class="input_text" id="descripcion_proyecto" name="descripcion_proyecto" placeholder="Describe el proyecto..." required></textarea></div>
        <div><label for="fecha_entrega">Fecha de Entrega</label><input type="date" id="fecha_entrega" min="<?php echo $tomorrow?>" name="fecha_entrega" required/></div>

       
    

        <?php
        //Include database configuration file
        include('../inc/config.php');
        
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
                            estudiante.id_profesor =$id_profesor AND
                            id_proyecto=0");
        
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
            <option value="">Asigna lider de proyecto</option>
        </select>   

    <legend>Actividades</legend>         
    
    


    
    <div class="input_fields_wrap">
    <button class="add_field_button ">Añadir màs Actividades</button>
    <div><input class="input_text" type="text" name="mytext[]"></div>
</div>
        
    <div><input type="submit"></div>
    </form>
    
</fieldset>

    <div id="resultados"></div>
        
          
<script>

$(document).ready(function () {
    resetForms();
});

function resetForms() {
    for (i = 0; i < document.forms.length; i++) {
        document.forms[i].reset();
    }
}

$("#add_proyecto").submit(function( event ) {
    if(confirm("Seguro de crear este proyecto?")){
var parametros = $(this).serialize();

$.ajax({
type: "POST",
url: "ajax.php",
data: parametros,
beforeSend: function(objeto){
$("#resultados").html("Enviando...");
},
success: function(datos){



$("#resultados").html(datos);
$('input[type="text"]').val('');
resetForms();


}
});
event.preventDefault();
} else{
    return false;
}
});

$(document).ready(function(){  

//Add/Remove Input Fields

var max_fields      = 5; //maximum input boxes allowed
var wrapper         = $(".input_fields_wrap"); //Fields wrapper
var add_button      = $(".add_field_button"); //Add button ID

var x = 1; //initlal text box count
$(add_button).click(function(e){ //on add input button click
e.preventDefault();

if(x < max_fields){ //max input box allowed
x++; //text box increment
$(wrapper).append('<div><input type="text" id="ff" class="input_text" name="mytext[]" value="" /><a href="#" class="remove_field">Borrar</a></div>'); //add input box
}
});

$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
e.preventDefault(); $(this).parent('div').remove(); x--;
})

});  
</script>
   

</body>
</html> 