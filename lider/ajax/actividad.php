<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <script src="js/accion.js"></script>
    <title>Document</title>
</head>
<body>
    <div id="cambio"></div>
    

<?php

require_once ("../../class/conexion.php");
$obj= new conectar();
$conn=$obj->conexion();

$id_proyecto = $_POST['id_proyecto'];


$query = "SELECT Descripcion FROM proyecto WHERE id_proyecto='$id_proyecto'";
$rezilta = $conn->query($query);

$fila=mysqli_fetch_array($rezilta,MYSQLI_ASSOC);
?>

    <textarea rows="4" cols="80" disabled><?php echo $fila['Descripcion']?></textarea>
    <form id="form" method="post" enctype="multipart/form-data">
                <input id="uploadImage" type="file" accept="image/*" name="fileToUpload" /><br>  
                <input type="hidden" name="id_proyecto" value="<?php echo $id_proyecto ?>">

                <input class="submit_button2" type="submit" value="subir proyecto"/>

               
                </form>
                <div id="err"></div>


<?php


$sql = "SELECT * FROM actividades where id_proyecto='$id_proyecto'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
?><table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Proyecto</th>
        <th>Calificacion</th>                
        <th>ACTION</th>
    </tr><?php
   
    while($row = $result->fetch_assoc()) {
        ?>

    <tr>
        <td> <?php echo $row["id_actividades"] ?></td>
        <td><?php echo $row["Nombre"] ?></td>
        <td><?php echo $row["id_proyecto"] ?></td>
        <td><?php echo $row["calificacion"] ?></td>
        <td>
            
            <?php
                if ($row["estatus"]==5){?>                    
                    <a href="<?php echo 'sate/'.$row["ruta"] ?>" download><i class="material-icons">archive</i><a/>                  

            <?php
                }
                if ($row["estatus"]==1 && $row["id_estudiante"]==0) {?>
                    <a class="openmodal" href="#"><i class="material-icons">description</i>
                        <input type="hidden" id="modal_open" value="<?php echo $row["id_proyecto"] ;?>">
                        <input type="hidden" id="actividad" value="<?php echo $row["id_actividades"] ;?>">
                    </a>             
               
            <?php
                 include('../modal/modal_actividad.php');   }
                if ($row["estatus"]==2){?>    
                   <a class="aprobado" href="#"><i class="material-icons">done</i>                   
                        <input type="hidden" id="id_actividad" value="<?php echo $row["id_actividades"] ;?>">
                   </a>
                   <a href="<?php echo 'sate/'.$row["ruta"] ?>" download><i class="material-icons">archive</i><a/>
            <?php 
                  include('../modal/modal_aprobacion.php');   
                }
                   
            ?>
                     <!-- Button para ver comentario de las actividades -->
                     <a class="comentario" href="#"><i class="material-icons">insert_comment</i>                   
                        <input type="hidden" id="id_actividad" value="<?php echo $row["id_actividades"] ;?>">
                   
                   </a>  
                   <?php  include('../modal/modal_aprobacion.php');   ?>   
        </td>
    </tr>

                
                <?php
                
              
    }
    
    ?>
    </table>
    <?php
} else {
    echo "0 results";
}

$conn->close();
?>

    <script>
     $(document).on('click','.openmodal',function (id_editar) {              
               id_actividad=''
               id_proyecto='';
               id_proyecto = $(this).children('#modal_open').val();
               id_actividad = $(this).children('#actividad').val();
		    $.ajax({
                type:'POST',
                url:'ajax/combo.php',
                data:{id_proyecto:id_proyecto, id_actividad:id_actividad},
                
                success:function(data){
                    $('#result').html(data);
					$('#editar').css({'display':'block'});
                  
                  
                }
            }); 
                   
     });

    $(document).on('click','.close',function () {

        $('#editar').css({'display':'none'});
  
     });

            $(document).on('click','.aprobado',function (id_editar) {
                    id_actividad='';               
                    id_actividad = $(this).children('#id_actividad').val();
                        $.ajax({
                        type:'POST',
                        url:'ajax/aprobacion.php',
                        data:{id_actividad:id_actividad},                        
                        success:function(data){
                            $('#aprobado').html(data);
                            $('#aprobar').css({'display':'block'});
                        }
                    }); 
            
            });

              $(document).on('click','.comentario',function (id_editar) {
                    id_actividad='';               
                    id_actividad = $(this).children('#id_actividad').val();
                        $.ajax({
                        type:'POST',
                        url:'ajax/comentario.php',
                        data:{id_actividad:id_actividad},                        
                        success:function(data){
                            $('#aprobado').html(data);
                            $('#aprobar').css({'display':'block'});
                        }
                    }); 
            
            });

        $(document).on('click','.close',function () {
        $('#aprobar').css({'display':'none'});
        
        });

   
$(document).ready(function (e) {

 $("#form").on('submit',(function(e) {
    var parametros = $(this).serialize();
   
  e.preventDefault();
  $.ajax({
        url: "ajax/upload.php",
        type: "POST",
        data:  new FormData(this),parametros,
        contentType: false,
        cache: false,
        processData:false,
          
   success: function(data){
    $("#err").html("");
    $("#err").html(data);
    $('#upload').hide();
   
      },
     error: function(e){


    }          
    });
 }));




});
</script>



</body>
</html>