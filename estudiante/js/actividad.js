
$( document ).ready(function() {
    console.log( "ready!" );

    $('#id_proyecto').on('change',function(){
        var id_proyecto = $(this).val();
        var id_estudiante = $('#id_estudiante').val();
        if(id_proyecto){
            $.ajax({
                type:'POST',
                url:'ajax/actividad.php',
                data:{id_proyecto, id_estudiante},
                
                                success:function(html){
                   
                    $('#resultado').html(html);
                  
                  
                }
            }); 
        }
    });
});