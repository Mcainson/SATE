$(function() {
    cargar(1);
});

function cargar(){
   
  
    $("#equipo").fadeIn('slow');
    $.ajax({
        url:'ajax/ver_equipo.php',
      
         beforeSend: function(objeto){
      
      },
        success:function(data){
            $(".equipo").html(data).fadeIn('slow');
          
            cargar(1);
        }
    })
}


 