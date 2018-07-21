<?php
	

	require_once ("../../class/conexion.php");
	$obj= new conectar();
	$conn=$obj->conexion();
	

	$query = $_REQUEST['query'];
	$id_profesor = $_REQUEST['id_profesor'];

	echo $id_profesor;
	$tables="estudiante";
	$campos="*";
	$sWhere=" estudiante.nombre LIKE '%".$query."%'";
	$sWhere.=" AND estudiante.id_profesor = '".$id_profesor."'";
	
	   

	$count_query   = mysqli_query($conn,"SELECT count(*) AS numrows FROM $tables where $sWhere ");
	if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
	else {echo mysqli_error($conn);}

    

	$query = mysqli_query($conn,"SELECT $campos FROM  $tables where $sWhere");

	


		
	
	if ($numrows>0){
		
	?>
		
			<table id="tabla">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Apellidos </th>
						<th>Correo </th>
						<th>Action </th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
					
							$id=$row['id_estudiante'];
							$nombre=$row['Nombre'];
							$apellidos=$row['Apellidos'];
							$correo=$row['correo'];
											
							$finales++;
						?>	
						<tr class="">
							<td><?php echo $nombre;?></td>
							<td ><?php echo $apellidos;?></td>
							<td ><?php echo $correo;?></td>
						
							<td ><input type="checkbox" name="" value="">
							<a href="#"><i class="material-icons"  title="Editar" >&#xE254;</i>
							
							</a>
							<a href="#" class="delete_alumno" id="btn_delete">
							<input type="hidden" id="" value="<?php echo $id;?>"> 
							<i class="material-icons"  title="Eliminar">&#xE872;</i>
							
							</a>
															
                    		</td>
						</tr>
                        <?php }?>
								
                  
				</tbody>			
			</table>
	

	
	
	<?php	
		
}
?>          


<script>

	
	$(document).ready(function(){

	$(".delete_alumno" ).click(function() {
	var id_eliminar= $(this).children().val();

	$.ajax({
              type: "POST",
              url: "ajax/accion.php",
              data: {id_eliminar},
               beforeSend: function(objeto){
				confirm("Press a button!");
                  $("#resultados").html("Enviando...");
                },
              success: function(datos){
              $("#resultados").html(datos);
              load(1);
              
            }
      });


		});
	});
</script>