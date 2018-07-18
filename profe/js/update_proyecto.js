
$("#update_proyecto").submit(function( event ) {
    var parametros = $(this).serialize();
   
    
      $.ajax({
              type: "POST",
              url: "ajax/update_proyecto.php",
              data: parametros,
               beforeSend: function(objeto){
                  $("#resultados").html("Enviando...");
                },
              success: function(datos){
                  
              $("#resultados").html(datos);
            
            }
      });
    event.preventDefault();
  });
