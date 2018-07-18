<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SATE | HOME </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/home.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<link rel="stylesheet" href="css/crud.css">
    
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

        $query = "SELECT * FROM profesor WHERE id_users='$id_usuario'";
        $result = $conn->query($query);

        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        ?>

       <span id="bienvenido"> <?php echo $row["Nombre"]; ?></span>
        



   

<div id="conteneur">
    <div class="element">
        <div ><img id="foto" src="prof.png"></div>
    </div>

    <div class="element">
        <div id="conteneur2">
            <div class="element2"><?php include("../inc/menu.php"); ?>
            </div>       

            <div class="element2">
                <span></span>
                <img id="logo" src="../login/logo.png">
                
            </div>
        </div>
    </div>  
        
</div>
  
 
    
</body>
    
</html>