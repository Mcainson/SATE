

// SCRIPTS PARA CREAR TABS
function openProyecto(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}


$(document).ready(function(){
    console.log('lap load');
    // SELECCIONAR ESTUDIANTE EN FUNCCION DEL EQUIPO AL QUE PERTENECE

  // CAPTURAR DATOS DEL FORMULARIO PARA ENVIAR MENSAJE
    
 

  // Abrir el modal para leer los mensajes

  $(document).on('click','#abrir_mensaje',function () {
    id_mensaje='';
    id_mensaje = $(this).children('#id_mensaje').val();

        $.ajax({
            type:'POST',
            url:'ajax/leermensaje.php',
            data:{id_mensaje},
            
            success:function(data){
                $('#result').html(data);
                $('#mensaje').css({'display':'block'});
            
            
            }
        });

});
    // FUNCTION CERRAR MODAL
    $(document).on('click','.close',function () {

    $('#mensaje').css({'display':'none'});

    });









    
});