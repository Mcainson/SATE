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
        
        
        //SELECCIONA ESTUDIANTE QUE TODAVIA NO TIENE EQUIPO
        
        $query = $conn->query("SELECT * FROM estudiante where id_profesor=$id_profesor AND estatus=0");
        
        //Count total number of rows
        $rowCount = $query->num_rows;
        ?>
     </br>

        <form id="equ">
        </br>
            <fieldset>
            <legend>CREAR EQUIPO MANUAL</legend>
            <input type="text" class="input_text required" name="nombre" id="nombre" placeholder="Inserta nombre del equipo" required/> 
            <input type="text" class="input_text" name="codigo" id="codigo" placeholder="Inserta Codigo del equipo" required/>
            <input type="number" class="input_text" name="cantidad" id="cantidad" min="3" max="7" placeholder="cantidad de miembros del equipo" required/>
          
          
      
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
     </fieldset>
        </form>

        
        <?php include('modals/modal_random.php') ?>
        <div id="result"></div>

    <script>

        $(document).ready(function(){
        
        
        $('#crear_equipo').click(function(){
        
        if(confirm("Seguro de crear este equipo?"))
        {
        var id = [];
        var codigo = $('#codigo').val();
        var nombre = $('#nombre').val();
        var cantidad = $('#cantidad').val();
        
        $(':checkbox:checked').each(function(i){
            id[i] = $(this).val();
        });
        
        if(id.length != cantidad) //tell you if the array is empty
        {
            alert("Selecciona la cantidad de miembros necesitada");
        }
        else
        {
            
            $.ajax({
                
            url:'ajax/crear_equipo.php',
            method:'POST',
            data:{id:id, nombre:nombre, codigo:codigo},
            success:function(datos)
            {
                $("#resultados").html(datos);
                setTimeout(function(){// wait for 5 secs(2)
                    location.reload(); // then reload the page.(3)
                }, 1000); 

            
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

