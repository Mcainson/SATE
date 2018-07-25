<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../profe/css/home.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<link rel="stylesheet" href="../profe/css/crud.css">
<link rel="stylesheet" href="../css/page.css">
<link rel="stylesheet" href="estilos/index.css">
  
</head>
<body>
    <?php
        include("../inc/config.php"); 
        session_start();
        if (empty($_SESSION['login_user'])){
            echo "<script language='javascript' type='text/javascript'> location.href='../login/login.php' </script>";
        }
        $profe=$_SESSION['login_user']; 
        $id_usuario= $_SESSION['id_usuario'];

        $query = "SELECT * FROM estudiante WHERE id_users='$id_usuario'";
        $result = $conn->query($query);

        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

        echo $row["id_estudiante"];
        



    ?>

<div id="conteneur">
    <div class="element"><div ><img id="foto" src="../profe/prof.png"></div></div>
    <div class="element"><div >
    <div id="conteneur2">
        <div class="element2"><?php include("../inc/menu_estudiante.php"); ?>
       

        <div class="tab element2">
        <button class="tablinks" onclick="openProyecto(event, 'Crud')">ACTIVIDADES</button>
       
        </div>

            <div id="Crud" class="tabcontent">
            <h3>EQUIPO</h3>
            <div><?php include('actividad.php'); ?></div>
            
           
            </div>

            


            
            </div>
    </div>
        
</div>
  

    <script>
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
</script>  
    
</body>
    
</html>