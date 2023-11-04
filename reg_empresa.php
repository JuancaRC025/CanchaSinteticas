<?php
include 'conexion.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Registrar Empresa</title>
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
                <a href="reg_usuario.php">Usuario</a>
                <a href="reg_empresa.php">Empresa</a>
            </div>
        </li>
        <li class="nav-item"><a href="ingresar.php">Ingresar</a></li>
    </ul>

    <h1>Registra tu Empresa</h1>

    <form action="registro_emp.php" method="post">

    <label for="nit">NIT:</label>
        <input type="text" id="nit" name="nit" placeholder="Nit" required>
    
        <label for="razon_social">Razón Social:</label>
        <input type="text" id="razon_social" name="razon_social" placeholder="Escriba el nombre de la Razon social" required >

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" placeholder="Digite su direccion" required>

        <label for="representante_legal">Representante Legal:</label>
        <input type="text" id="representante_legal" name="representante_legal" placeholder="Nombre del Representante legal" required>

        <label for="telefono">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" placeholder="Número de teléfono" required oninput="this.value = this.value.replace(/[^0-9]/g, '')">

        <label for="correo_empresa">Correo Electrónico:</label>
        <input type="email" id="correo_empresa" name="correo_empresa" placeholder="Correo Electronico" required>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required placeholder="************">
        <button id="toggle-password">Mostrar Contraseña</button>

        <script>
            const passwordField = document.getElementById("contrasena");
            const toggleButton = document.getElementById("toggle-password");

            toggleButton.addEventListener("click", function () {
                if (passwordField.type === "password") {
                    passwordField.type = "text";
                    toggleButton.textContent = "Ocultar Contraseña";
                } else {
                    passwordField.type = "password";
                    toggleButton.textContent = "Mostrar Contraseña";
                }
            });
        </script>
        <br>
        <button type="submit">Registrar Empresa</button>
    </form>



</body>

</html>