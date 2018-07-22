
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
        
            // Abrir el modal para leer los mensajes
        
             $(document).on('click','#asign_project',function () {
                id_proyecto='';
                
                id_proyecto = $(this).children('#id_proyecto').val();
                alert(id_proyecto);
                id_profesor='';
                id_profesor = $(this).children('#id_profesor').val();
                alert(id_profesor);
              
                
                    $.ajax({
                        type:'POST',
                        url:'ajax/asignar_proyecto.php',
                        data:{id_proyecto,id_profesor},
                        
                        success:function(data){
                            $('#result').html(data);
                            $('#editar').css({'display':'block'});
                        
                        
                        }
                    });
            
            });
                // FUNCTION CERRAR MODAL
                $(document).on('click','.close',function () {
            
                $('#editar').css({'display':'none'});
            
                });
     
         $(document).on('click','.editar_id',function (id_editar) {        
                       id_editar='';
                 id_editar = $(this).children('#id_editar').val();	
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

      $(document).on('change','#equipo',function () {
            var id_equipo = $(this).val();
            alert(id_equipo);
            if(id_equipo){
                $.ajax({
                    type:'POST',
                    url:'ajax/proyecto.php',
                    data:'id_equipo='+id_equipo,
                    
                    success:function(html){
                        $('#nombre_lider').html(html);
                      
                      
                    }
                }); 
            }else{
                $('#nombre_lider').html('<option value="">Selecciona equipo</option>');
             
            }
        
            });
          

    });