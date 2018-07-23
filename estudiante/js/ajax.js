// A $( document ).ready() block.
$( document ).ready(function() {
    console.log( "euhhhhhhhhhh!" );

    $(document).on('click','.modalsubir',function () {
      
        id_actividad='';
        id_actividad = $(this).children('#id_actividad').val();
        id_estudiante='';
        id_estudiante = $(this).children('#id_estudiante').val();        

     $.ajax({
         type:'POST',
         url:'ajax/subir.php',
         data:{id_actividad:id_actividad, id_estudiante:id_estudiante},
         
         success:function(data){
             $('#result').html(data);
             $('#subir').css({'display':'block'});
           
           
         }
     });        
});

$(document).on('click','.modalcomentario',function () {

        id_actividad=''
        id_actividad = $(this).children('#id_actividad').val();
        id_estudiante=''
        id_estudiante = $(this).children('#id_estudiante').val();
  

     $.ajax({
         type:'POST',
         url:'ajax/comentario.php',
         data:{id_actividad:id_actividad, id_estudiante:id_estudiante},
         
         success:function(data){
             $('#result').html(data);
             $('#subir').css({'display':'block'});
           
           
         }
     });        
});




$(document).on('click','.close',function () {

$('#subir').css({'display':'none'});

});



});