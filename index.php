<?php
include 'conexion.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>PlayGroundPro</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <script src='main.js'></script>
</head>
<style>
    body {
        background-image: url('./img/fondo.avif');
        /* Reemplaza 'ruta_de_la_imagen.jpg' con la ruta de tu imagen de fondo */
    }
</style>

<body>


    <div class="header">
        <div class="logo">
            <img src="img/logo_solo.png" alt="Logo de tu sitio web">
        </div>
        <div class="titles">
            <h1 id="i1">PLAYGROUND PRO</h1>
            <h2 id="i2">"Encuentra, reserva y disfruta de canchas sintéticas al alcance de tu mano"</h2>
        </div>
    </div> 
  
    <ul class="navbar">
        <li class="nav-item"><a href="index.php">Inicio</a></li>
        <li class="nav-item"><a href="canchas.php">Canchas</a></li>
        <li class="nav-item"><a href="#">Soporte</a></li>
        <li class="nav-item dropdown">
            <a href="#">Registrar</a>
            <div class="dropdown-content">
                <a href="reg_usuario.php
    ">Usuario</a>
                <a href="reg_empresa.php
    ">Empresa</a>
            </div>
        </li>
        <li class="nav-item"><a href="ingresar.php">Ingresar</a></li>
    </ul>
    <br>
    <br>
    <br>
    <div class="options">
        <a href="ingresar.php" class="option">
            <img src="img/usuario.png" alt="Iniciar Sesión">
            <p>Iniciar Sesión</p>
        </a>
        <a href="formulario_selecciona_ubicacion.php" class="option">
            <img src="img/mapa.png" alt="Selecciona tu Ubicación">
            <p>Selecciona tu Ubicación</p>
        </a>
        <a href="canchas.php" class="option">
            <img src="img/calendario.png" alt="Reserva tu Cancha">
            <p>Reserva tu Cancha</p>
        </a>
    </div>

</body>

</html>