
				<?php
			

					$profe=$_SESSION['login_user'];
					$id_usuario= $_SESSION['id_usuario']; 

					$query = "SELECT * FROM profesor WHERE id_users='$id_usuario'";
					$result = $conn->query($query);
			
					$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
					?>
			
				   <span id="bienvenido"> <?php echo $row["Nombre"]; ?></span>

			
							
			<div id="conteneur">
				<div><input class="input_text" type="text" class="form-control" placeholder="Buscar"  id="q" onkeyup="load(1);" /></div>
				<div><input type="hidden"  id="id_profesor" onkeyup="load(1);" value="<?php echo $row["id_profesor"]; ?>" /></div>
				<div><button class="submit_button" id="add_student">Agregar Estudiante</button></div>
			</div>
			

			<div id="loader"></div>
			
			<div id="resultados"></div>
			<div class='outer_div'></div>
		
			<?php include('modals/add_estudiante.php'); ?>

		
            
	
	
	<script src="js/script.js"></script>
	<?php include('modals/add_estudiante.php'); ?>
