
$(document).ready(function(){
    $('.encargado').on('change',function(){
        var cambiar= $(this).val();
        var actividad= $(this).parent.val();
        alert(actividad);
        
      
        if(cambiar){
            $.ajax({
                type:'POST',
                url:'ajax/operacion.php',
                data:{cambiar},

                
                success:function(html){
                  
                    $('#cambio').html(html);
                  
                  
                }
            }); 
        }
    });
    
    
});