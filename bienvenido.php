<?php


session_start();

if(!isset($_SESSION['usuario'])){
    echo '
    <script>
      alert("Por Favor debes Iniciar Sesión");
      window.location = "ingresar.php";
    </script>
    ';
    //header("location: index.php");
    session_destroy();
    die();
}


?>

<!DOCTYPE html>
 <html>
 <head>
    <meta charset='utf-8'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
 </head>
 <body>
    <h1>Bienvenido a mi mundo</h1>
    <a href="cerrar_sesion.php">Cerrar sesion</a>
 </body>
 </html>