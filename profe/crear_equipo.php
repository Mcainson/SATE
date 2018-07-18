<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Document</title>
</head>
<body>
   
    
<?php
        //Include database configuration file
   /*      include('../inc/config.php'); */
        
        //Get all country data
        $id_usuario= $_SESSION['id_usuario'];
        $query = $conn->query("SELECT * FROM estudiante where id_profesor=$id_usuario AND estatus=0");
        
        //Count total number of rows
        $rowCount = $query->num_rows;
        ?>
        <form>

            <input type="text" class="input_text" name="nombre" id="nombre" placeholder="Inserta nombre del equipo" required/> 
            <input type="text" class="input_text" name="codigo" id="codigo" placeholder="Inserta Codigo del equipo" required/>
          
      
            <?php
            if($rowCount > 0){
                ?>
	
        </br>
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
                while($row = $query->fetch_assoc()){ 

                            $id=$row['id_estudiante'];
							$nombre=$row['Nombre'];
							$apellidos=$row['Apellidos'];
							$correo=$row['correo'];
											
					
						?>	
						<tr class="">
							<td><?php echo $nombre;?></td>
							<td ><?php echo $apellidos;?></td>
							<td ><?php echo $correo;?></td>
						
							<td ><input type="checkbox" name="id_estudiante[]" class="crear_equipo" value="<?php echo $id ?>">
													
                    		</td>
						</tr>
                        <?php }?>
						
				</tbody>			
			</table>
            <?php






            }else{
                echo '<option value="">No hay mas proyecto</option>';
            }
            ?>
        <div id="resultado"></div>
     <button type="submit" name="crear_equipo" id="crear_equipo" >generar equipo</button>
        </form>

    <script>
$(document).ready(function(){
 
 $('#crear_equipo').click(function(){
  
  if(confirm("Seguro de crear este equipo?"))
  {
   var id = [];
   var codigo = $('#codigo').val();
   var nombre = $('#nombre').val();
   alert(codigo);
   $(':checkbox:checked').each(function(i){
    id[i] = $(this).val();
   });
   
   if(id.length < 4) //tell you if the array is empty
   {
    alert("Selecciona por lo menos 4 alumnos");
   }
   else
   {
    
    $.ajax({
        
     url:'ajax/crear_equipo.php',
     method:'POST',
     data:{id:id, nombre:nombre, codigo:codigo},
     success:function(datos)
     {
        alert(id);
        $("#resultados").html(datos);
     
     }
     
    });

     event.preventDefault();
   }
   
  }
  else
  {
   return false;
  }
 });
 
});
</script>

</body>
</html>