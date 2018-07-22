
				<?php
			
			$profe=$_SESSION['login_user']; 
				$profe=$_SESSION['login_user'];
				$id_usuario= $_SESSION['id_usuario']; 

			echo $id_usuario;
			?>
						
		<div id="conteneur">
			<div><input class="input_text" type="text" class="form-control" placeholder="Buscar"  id="q" onkeyup="load(1);" /></div>
			<div><button class="submit_button" id="add_student">Agregar Estudiante</button></div>
		</div>
		

		<div id="loader"></div>
		
		<div id="resultados"></div>
		<div class='outer_div'></div>
	
		<?php include('modals/add_estudiante.php'); ?>

	
		


<script src="js/script.js"></script>

