<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 50%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
</head>
<body>


<!-- Trigger/Open The Modal -->


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <form id="update_actividad" name="update_actividad">
        <label for="encargado">Elige el encargado de la actividad
            <?php
        include('../../inc/config.php');
        $query = $conn->query("SELECT * FROM estudiante");
        
        //Count total number of rows
        $rowCount = $query->num_rows;
        ?>
        <select name="id_encargado" id="id_encargado" >
            <option value="">Selecciona miembro</option>
            <?php
            if($rowCount > 0){
                while($row = $query->fetch_assoc()){ 
                    echo '<option value="'.$row['id_estudiante'].'">'.$row['Nombre'].'</option>';
                }
            }else{
                echo '<option value="">No hay mas equipo</option>';
            }
            ?>
        </select>
        </br>
        <textarea id="descripcion_act" name="descripcion_act" placeholder="describe la actividad"></textarea></br>
        <input type="submit"> <input type="reset"> 
    </form>
    
  </div>


</div>