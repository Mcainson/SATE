$( document ).ready(function() {
    console.log( "ready!" );

 $(document).on('click','.openmodal',function (id_editar) {              
    id_actividad=''
    id_proyecto='';
    id_proyecto = $(this).children('#modal_open').val();
    id_actividad = $(this).children('#actividad').val();
 $.ajax({
     type:'POST',
     url:'ajax/combo.php',
     data:{id_proyecto:id_proyecto, id_actividad:id_actividad},
     
     success:function(data){
         $('#result').html(data);
         $('#editar').css({'display':'block'});
       
       
     }
 }); 
        
});

$(document).on('click','.close',function () {

$('#editar').css({'display':'none'});

});

 $(document).on('click','.aprobado',function (id_editar) {
         id_actividad='';               
         id_actividad = $(this).children('#id_actividad').val();
             $.ajax({
             type:'POST',
             url:'ajax/aprobacion.php',
             data:{id_actividad:id_actividad},                        
             success:function(data){
                 $('#aprobado').html(data);
                 $('#aprobar').css({'display':'block'});
             }
         }); 
 
 });

    //Modal comentario

   $(document).on('click','.comentario',function (id_editar) {
         id_actividad='';               
         id_actividad = $(this).children('#id_actividad').val();
         id_estudiante = $(this).children('#id_estudiante').val();
             $.ajax({
             type:'POST',
             url:'ajax/comentario.php',
             data:{id_actividad:id_actividad, id_estudiante:id_estudiante},                        
             success:function(data){
                 $('#aprobado').html(data);
                 $('#aprobar').css({'display':'block'});
             }
         }); 
 
 });

$(document).on('click','.close',function () {
$('#aprobar').css({'display':'none'});

});


$(document).ready(function (e) {

$("#form").on('submit',(function(e) {
var parametros = $(this).serialize();

e.preventDefault();
$.ajax({
url: "ajax/upload.php",
type: "POST",
data:  new FormData(this),parametros,
contentType: false,
cache: false,
processData:false,

success: function(data){
$("#err").html("");
$("#err").html(data);
$('#upload').hide();

},
error: function(e){


}          
});
}));


});

// APROBAR UN ACTIVIDAD
$("#aprobacion").submit(function( event ) {
    var parametros = $(this).serialize();
    alert(parametros);
   
      $.ajax({
              type: "POST",
              url: "ajax/aprobar_actividad.php",
              data: parametros,
               beforeSend: function(objeto){
                  $("#aprobado").html("Enviando...");
                },
              success: function(datos){
                  alert('succes');
                  
              $("#aprobado").html(datos);
          
            }
      });
    event.preventDefault();
  });

  // ASIGNAR ACTIVIDAD

  
  $("#asign_actividad").submit(function( event ) {
    var parametros = $(this).serialize();
    // A CAMBIAR ESTA MADRE
    var id_profe = 1;

    $.ajax({
    type: "POST",
    url: "ajax/asignar_actividad.php",
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

        $('#id_proyecto').on('change',function(){
            var id_proyecto = $(this).val();
            var id_estudiante = $('#id_estudiante').val();
            alert(id_estudiante);
            if(id_proyecto){
                $.ajax({
                    type:'POST',
                    url:'ajax/actividad.php',
                    data: {id_proyecto, id_estudiante},
                    
                                    success:function(html){
                       
                        $('#resultado').html(html);
                      
                      
                    }
                }); 
            }
            
        
    });















});