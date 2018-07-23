$(function() {
  load(1);
});

function load(page){
  var query=$("#q").val();
  var per_page=10;
  var parametros = {"page":page,'query':query,'per_page':per_page};
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
      }
  })
}

$("#add_estudiante").submit(function( event ) {
  var parametros = $(this).serialize();  
    $.ajax({
            type: "POST",
            url: "ajax/guardar_estudiante.php",
            data: parametros, id_profe,
             beforeSend: function(objeto){
                $("#resultados").html("Enviando...");
              },
            success: function(datos){
                
            $("#resultados").html(datos);
            $("#add_estudiante")[0].reset();
            load(1);
            setTimeout(function(){// wait for 5 secs(2)
              location.reload(); // then reload the page.(3)
         }, 1000); 
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
