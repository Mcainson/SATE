<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="login.css"/>
  <script src="../js/jquery-3.3.1.min.js"></script>

</head>
<body>
<div id="conteneur">
<form method="post">
    <div class="element"><img  alt="" src="logo.png"></div>
    <div class="element"><input name="username" type="text" id="username" placeholder="usuario" required></div>
    <div class="element"><input name="password" type="password" id="password" placeholder="contraseña" required></div>
    <div class="element"><p>¿Olvidaste tu contraseña?</p></div>
    <div class="element"><p><button id="myBtn">Nueva cuenta?</button></p></div>
    <div class="element"><input type="submit" name="submit" value="Login"></div>

   

</form>
      <div id="resultados"> </div>
</div>
                

 <?php include('modal.php');?>

<?php
if (isset($_POST['submit']))
	{
    if (empty($_POST['username']) || empty($_POST['password'])) {
      $error = "Insertar el campo vacio";	  }
include("../inc/config.php");


session_start();

$usuario=$_POST['username'];
$contrasena=$_POST['password'];

$_SESSION['login_user']=$username;

$sql  = "SELECT id_users, usuario, tipo FROM users WHERE usuario='$usuario' and contrasena='$contrasena'";

$result = $conn->query($sql);

 if ($result->num_rows > 0)
{
  while($row = $result->fetch_assoc()) {
    $_SESSION['id_usuario']=$row["id_users"];
  if ($row["tipo"]==1){
    echo "<script language='javascript' type='text/javascript'> location.href='../profe/index.php' </script>";
  }

  if ($row["tipo"]==2){
    echo "<script language='javascript' type='text/javascript'> location.href='../lider/home.php' </script>";
  }

  if ($row["tipo"]==3){
    echo "<script language='javascript' type='text/javascript'> location.href='../estudiante/index.php' </script>";
  }
}


  }
  else{

   

    echo "<script language='javascript' type='text/javascript'> alert('datos incorrectas'); </script>";
  }



}

?>

<script src="login.js"></script>
</body>
</html>
