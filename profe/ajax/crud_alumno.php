<?php
	

	require_once ("../../class/conexion.php");
	$obj= new conectar();
	$conn=$obj->conexion();
	

	$query = $_REQUEST['query'];
	$id_profesor = $_REQUEST['id_profesor'];
	$tables="estudiante";
	$campos="*";
	$sWhere=" estudiante.nombre LIKE '%".$query."%'";
	$sWhere.=" AND estudiante.id_profesor = '".$id_profesor."'";
	
	
	include 'pagination.php'; 
    

    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
   
    $per_page = intval($_REQUEST['per_page']); 
 
	$adjacents  = 4; 
	$offset = ($page - 1) * $per_page;

    

	$count_query   = mysqli_query($conn,"SELECT count(*) AS numrows FROM $tables where $sWhere ");
	if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
	else {echo mysqli_error($conn);}
    $total_pages = ceil($numrows/$per_page);
    

	$query = mysqli_query($conn,"SELECT $campos FROM  $tables where $sWhere LIMIT $offset,$per_page");

	


		
	
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
								
                      
                        
						<tr>
							<td colspan='6'> 
								<?php 
									$inicios=$offset+1;
									$finales+=$inicios -1;
									echo "Mostrando $inicios al $finales de $numrows registros";
									echo paginate( $page, $total_pages, $adjacents);
								?>
							</td>
						</tr>
				</tbody>			
			</table>
	

	
	
	<?php	
		
}
?>          
<script src="js/ajax.js">  </script>