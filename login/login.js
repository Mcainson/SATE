// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

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


function close_modal(){
  
        modal.style.display = "none";
    }

$("#registrar_profe").submit(function( event ) {
    var parametros = $(this).serialize();
   
      $.ajax({
              type: "POST",
              url: "ajax/registrar_profe.php",
              data: parametros,
               beforeSend: function(objeto){
                  $("#resultados").html("Enviando...");
                },
              success: function(datos){

                  
              $("#resultados").html(datos);
              $('form :input').val('');
                    close_modal();
            }
      });
    event.preventDefault();
  });
