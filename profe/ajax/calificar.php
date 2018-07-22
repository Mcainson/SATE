<?php


include('../../inc/config.php');

$id_actividad = $_POST['id_actividad'];
$id_proyecto = $_POST['id_proyecto'];

echo $id_actividad;

?>

<form id="calificacion" method="POST" name="calificacion">

<select class="input_text" name="calificar">
<option value="">Selecciona calificion</option>
<option value="1">No apropado</option>
  <option value="7">07</option>
  <option value="8">08</option>
  <option value="9">09</option>
  <option value="10">10</option>
</select></br></br>
<input type="hidden" id="id_actividad" name="id_actividad" value="<?php echo $id_actividad ?>">
<input type="hidden" id="id_proyecto" name="id_proyecto" value="<?php echo $id_proyecto ?>">

<textarea class="input_text" id="comentario" name="comentario"></textarea></br>
<button class="submit_button2" type="submit"> Calificar </button>

</form>

<div id="resultados"></div>
<script src="js/ajax.js">  </script>