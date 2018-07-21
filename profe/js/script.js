
$(function() {
  load(1);
});

function load(){
    var query=$("#q").val();
    var id_profesor=$("#id_profesor").val();
  
    var parametros = {'query':query,'id_profesor':id_profesor};
    $("#loader").fadeIn('slow');
    $.ajax({
        url:'ajax/crud_alumno.php',
        data: parametros,
         beforeSend: function(objeto){
        $("#loader").html("Cargando...");
      },
        success:function(data){
            $(".outer_div").html(data).fadeIn('slow');
            $("#loader").html("");
            load(1);
        }
    })
}

$("#add_estudiante").submit(function( event ) {
    var parametros = $(this).serialize();
    var id_profe = 1;
    
      $.ajax({
              type: "POST",
              url: "ajax/guardar_estudiante.php",
              data: parametros, id_profe,
               beforeSend: function(objeto){
                  $("#resultados").html("Enviando...");
                },
              success: function(datos){

                  
              $("#resultados").html(datos);
     
        
            
              close_modal();
            }
      });
    event.preventDefault();
  });

  
	
	$(document).ready(function(){

        $(".delete_alumno" ).click(function() {
        var id_eliminar= $(this).children().val();
    
        $.ajax({
                  type: "POST",
                  url: "ajax/accion.php",
                  data: {id_eliminar},
                   beforeSend: function(objeto){
                    confirm("Press a button!");
                      $("#cargar").html("Enviando...");
                    },
                  success: function(datos){
                  $("#cargar").html(datos);
                  cargar(1);
              
                  
                }
          });
    
    
            });
        });

  

// Get the modal
var modal = document.getElementById('modal_student');

function close_modal(){
    modal.style.display = "none";    
}

// Get the button that opens the modal
var btn = document.getElementById("add_student");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == modal) {
    modal.style.display = "none";
}
}
