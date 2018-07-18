<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    


<body>

<h1>Welcome 
 <?php 
session_start();

$login_session=$_SESSION['login_user'];
echo $login_session;?></h1>
<a href="logout.php"> Logout </a>
</body>
</html>
