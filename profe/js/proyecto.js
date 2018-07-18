$(function() {
    cargar(1);
});

function cargar(page){
    var query=$("#buscar").val();
    var id_profesor=$("#id_profesor").val();
    var per_page=10;
    var parametros = {"page":page,'query':query,'id_profesor':id_profesor,'per_page':per_page};
    $("#cargar").fadeIn('slow');
    $.ajax({
        url:'ajax/crud_proyecto.php',
        data: parametros,
         beforeSend: function(objeto){
        $("#cargar").html("Cargando...");
      },
        success:function(data){
            $(".cargar").html(data).fadeIn('slow');
            $("#cargar").html("");
        }
    })
}


 