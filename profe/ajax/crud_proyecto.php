

<?php
	

	require_once ("../../class/conexion.php");
	$obj= new conectar();
	$conn=$obj->conexion();
	

	$query = $_REQUEST['query'];
	$id_profesor = $_REQUEST['id_profesor'];
	$tables="proyecto";
	$campos="*";
	$sWhere=" proyecto.Nombre LIKE '%".$query."%'";
	$sWhere.=" AND proyecto.id_profe = '".$id_profesor."'";
	
	
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
		<div class="">
			<table id="tabla">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Descripcion </th>
						<th>Fecha Entrega </th>
						<th>Action </th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
					
							$id=$row['id_proyecto'];
							$nombre=$row['Nombre'];
							$fecha_entrega=$row['fecha_entrega'];
							$descripcion=$row['Descripcion'];
											
							$finales++;
						?>	
						<tr class="">
							<td><?php echo $nombre;?></td>
							<td ><?php echo $descripcion;?></td>
							<td ><?php echo $fecha_entrega;?></td>
						
							<td>
							<a class="editar_id" href="#"><i class="material-icons"  title="Editar">&#xE254;</i>
							<input type="hidden" id="id_editar" value="<?php echo $id;?>"> 
							</a>
							<a href="#" class="delete_proyecto" id="btn_delete">
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
		</div>	

	
	
	<?php	
		
}

include('../modals/editarproyecto_modal.php');
?>          


<script>

	
	$(document).ready(function(){



$(".delete_proyecto" ).click(function() {
    alert('se borra');
var id_eliminar= $(this).children().val();

$.ajax({
          type: "POST",
          url: "ajax/delete.php",
          data: {id_eliminar},
           beforeSend: function(objeto){
         
              $("#cargar").html("Enviando...");
            },
          success: function(datos){
          $("#cargar").html(datos);
          cargar(1);
          
        }
  });


    });
});

 $(document).on('click','.editar_id',function (id_editar) {
               alert('ok');
			   id_editar='';
         id_editar = $(this).children('#id_editar').val();
		 alert(id_editar);

		    $.ajax({
                type:'POST',
                url:'ajax/combo.php',
                data:{id_editar},
                
                success:function(data){
                    $('#result').html(data);
					$('#editar').css({'display':'block'});
                  
                  
                }
            }); 
            
	
      
	   
       
   });

      $(document).on('click','.close',function () {

$('#editar').css({'display':'none'});
  
});

</script>