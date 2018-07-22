<?php




$id_actividad = $_POST['id_actividad'];

?>

<form name="aprobacion" method="POST" id="aprobacion">
<input type="radio" name="aprobar" value="1" required> Acceptar<br>
<input type="radio" name="aprobar" value="2"> No acceptar<br>
<input type="hidden" name="id_actividad" value="<?php echo $id_actividad ?>" required>
<textarea class="input_text" name="comentario" placeholder"escribe su comentario"></textarea><br>
<input class="submit_button2" type="submit" class="" value="aprobar">

</form>
<div id="resultados"></div>

        <script src="js/ajax.js">  </script>