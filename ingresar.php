<?php
include 'conexion.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Iniciar Sesion</title>
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
        <li class="nav-item"><a href="index.php
        ">Inicio</a></li>
        <li class="nav-item"><a href="canchas.php
        ">Canchas</a></li>
        <li class="nav-item"><a href="#">Soporte</a></li>
        <li class="nav-item dropdown">
            <a href="#">Registrar</a>
            <div class="dropdown-content">
                <a href="reg_usuario.php
                ">Usuario</a>
                <a href="Empresa.php">Empresa</a>
            </div>
        </li>
        <li class="nav-item"><a href="ingresar.php
        ">Ingresar</a></li>
    </ul>



    <div id="left">
        <img src="img/ingresa2.png" alt="">
        <a href="#">Crear cuenta</a>

        <div class="ingresoo">
            <nav>
                <div class="form-get_into">
                    <img src="img/perfil1.png" alt="login">
                    <p class="text">Bienvenido</p>
                    <form class="login-form">
                        <input type="text" placeholder="email">
                        <input type="password" placeholder="Contraseña">
                        <button>Iniciar Sesion</button>
                        <a href="olvide mi contraseña">olvide mi contraseña</a>

                    </form>
                </div>
            </nav>
        </div>
    </div>




</body>

</html>