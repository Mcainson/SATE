
$( document ).ready(function() {
    console.log( "ready!" );
    // CALIFICAR PROYECTO
  $(document).on('click','.asignarAct',function () {   
    id_proyecto='';
    id_actividad='';
    id_proyecto = $(this).children('#id_proyecto').val();
    id_actividad = $(this).children('#id_actividad').val(); 

    $.ajax({
    type:'POST',
    url:'ajax/calificar.php',
    data:{id_actividad:id_actividad,id_proyecto:id_proyecto},                
    success:function(data){   
    $('#rezilta').html(data);
    $('#asignarActividades').css({'display':'block'});                 
          
        }
    }); 

      }); 
            $(document).on('click','.close',function () {

            $('#asignarActividades').css({'display':'none'});

     });


     // ASIGNAR EQUIPO A PROYECTO
     
   $("#confirm").submit(function( event ) {              
    var parametros = $(this).serialize();   
    alert(parametros);  
      $.ajax({
              type: "POST",
              url: 'ajax/proyecto2.php',
              data: parametros,
               beforeSend: function(objeto){
                  $("#resultados").html("Enviando...");
                },
              success: function(datos){
              $("#resultados").html(datos);
              $("#confirm")[0].reset();
            }
      });
    event.preventDefault();
  });
  

  // CALIFICAR ACTIVIDADES
  $("#calificacion").submit(function( event ) {
    var parametros = $(this).serialize();
    alert(parametros);
   
      $.ajax({
              type: "POST",
              url: "ajax/calificar2.php",
              data: parametros,
               beforeSend: function(objeto){
                  $("#rezilta").html("Enviando...");
                },
              success: function(datos){
                  alert('succes');
                  
              $("#rezilta").html(datos);
          
            }
      });
    event.preventDefault();
  });

  // DELETE ALUMNO
  $(".delete_alumno" ).click(function() {
	var id_eliminar= $(this).children().val();

	$.ajax({
              type: "POST",
              url: "ajax/accion.php",
              data: {id_eliminar},
               beforeSend: function(objeto){		
                  $("#resultados").html("Enviando...");
                },
              success: function(datos){
              $("#resultados").html(datos);
              load(1);
              
            }
      });


		});


  });            