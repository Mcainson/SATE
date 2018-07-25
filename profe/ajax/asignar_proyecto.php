<?php

require_once ("../../class/conexion.php");
$obj= new conectar();
$conn=$obj->conexion();

$id_proyecto = $_POST['id_proyecto'];
$id_profesor = $_POST['id_profesor'];
$stmt = "SELECT * FROM equipo WHERE id_proyecto =$id_proyecto";
$result = $conn->query($stmt);
$fila=mysqli_fetch_array($result,MYSQLI_ASSOC);
if ($result->num_rows == 0) {

?>

<div><button id="asign_random" type"button">ASIGNAR EQUIPO RANDOM
<input type="hidden" name="id_proyecto" id="id_proyecto" value="<?php echo $id_proyecto?>">
<input type="hidden" name="id_profesor" id="id_profesor" value="<?php echo $id_profesor?>">



</button> <div> </br>
<script>
 $("#asign_random" ).click(function() {
 
      id_proyecto='';
      id_proyecto = $(this).children('#id_proyecto').val();
      id_profesor='';
      id_profesor = $(this).children('#id_profesor').val();  
   

    $.ajax({
       type:'POST',
       url:'ajax/proyecto_random.php',
       data:{id_proyecto, id_profesor},                
       success:function(data){
           $('#resultados').html(data);
           setTimeout(function(){// wait for 5 secs(2)
              location.reload(); // then reload the page.(3)
         }, 1000); 
                         
       }
   });  

});
</script>
<fieldset>
<legend> ASIGN EQUIPO MANUAL </legend>


<?php
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
<form id="confirm"  method="POST">
<select  class="input_text" name="id_equipo" id="equipo" required>
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

</select>   </br>
<input type="hidden" name="id_proyecto" id="id_proyecto" value="<?php echo $id_proyecto?>">
<input type="hidden" name="id_profesor" id="id_profesor" value="<?php echo $id_profesor?>">
<button type="submit"> ACCEPTAR </button>
</form>
<div id="resultados"></div>

</fieldest>
    <?php }else{
        echo 'ya esta elegido un equipo para este proyecto';
    } ?>
<script src="js/ajax.js">  </script>