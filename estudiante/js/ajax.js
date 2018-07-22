// A $( document ).ready() block.
$( document ).ready(function() {
    console.log( "euhhhhhhhhhh!" );

    $(document).on('click','.modalsubir',function () {
        alert('ok');
        id_actividad=''
        id_actividad = $(this).children('#id_actividad').val();
        

     $.ajax({
         type:'POST',
         url:'ajax/subir.php',
         data:{id_actividad:id_actividad},
         
         success:function(data){
             $('#result').html(data);
             $('#subir').css({'display':'block'});
           
           
         }
     });        
});

$(document).on('click','.modalcomentario',function () {

        id_actividad=''
        id_actividad = $(this).children('#id_actividad').val();
  

     $.ajax({
         type:'POST',
         url:'ajax/comentario.php',
         data:{id_actividad:id_actividad},
         
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