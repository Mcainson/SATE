<?php

$id_actividad = $_POST['id_actividad']

?>


 <form id="form" method="post" enctype="multipart/form-data">
                <input id="uploadImage" type="file" accept="image/*" name="fileToUpload" /><br>
             
                <input class="input_text" type="hidden" name="id_actividad" value="<?php echo $id_actividad ?>"/><br>
                <textarea class="input_text" name="comentario"></textarea><br>
              
            
                <input class="submit_button2" type="submit" value="Upload"/>

               
                </form>
                <div id="err"></div>

<script>
$(document).ready(function (e) {

    var estatus = $('#estatus').val();
    alert(estatus);
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
</script>

 <!-- <script src="js/ajax.js"></script> -->