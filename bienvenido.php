<?php
session_start();
include 'conexion.php';

// Verifica si el Id_Usuario está definido en la sesión
$usuario_id = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : null;

if ($usuario_id) {
    // Realiza la consulta para obtener la información del usuario usando $usuario_id
    $info_usuario_sql = "SELECT Nombres, Apellidos, Correo_Electronico, Telefono FROM usuario WHERE Id_Usuario = $usuario_id";
    
    $resultado_info = mysqli_query($conn, $info_usuario_sql);

    if ($resultado_info) {
        $fila_info = mysqli_fetch_assoc($resultado_info);
        $nombre_usuario = $fila_info['Nombres'] . ' ' . $fila_info['Apellidos'];
        $correod_usuario = $fila_info['Correo_Electronico'];
        $telefonod_u = $fila_info['Telefono'];
    } else {
        // Manejo del error (puedes personalizar según tus necesidades)
        die("Error en la consulta: " . mysqli_error($conn));
    }
} else {
    // Manejo del caso en que $_SESSION['id_usuario'] no esté definido o sea nulo
    header("Location: ingresar.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<style>
    body {
        background-image: url('./img/fondo.avif');
        /* Reemplaza 'ruta_de_la_imagen.jpg' con la ruta de tu imagen de fondo */
    }
</style>
<body>

<ul class="navbar">
    <li class="nav-item"><a href="index.php">Inicio</a></li>
    <li class="nav-item"><a href="canchas.php">Canchas</a></li>
    <li class="nav-item">
  <a href="https://api.whatsapp.com/send?phone=3027500507&text=Tengo%20problemas%20de%20acceso%20o%20requiero%20información.%20¿Me%20pueden%20ayudar%3F" target="_blank">Soporte</a>
</li>

  

    <li><a href="cerrar_sesion.php" class="cerrar-sesion">
        <i class="fas fa-sign-out-alt"></i>
    </a></li>

</ul>

<h1>¡Bienvenido, campeón!</h1>

<p>Nombre: <?php echo $nombre_usuario; ?></p>
<p>Correo Electrónico: <?php echo $correod_usuario ; ?></p> 
<p>Telefono: <?php echo $telefonod_u ; ?></p>

<h2>Opciones de Perfil</h2>
<ul>
    <li><a href="editar_perfil.html">Editar Perfil</a></li>
    <li><a href="cambiar_contraseña.html">Cambiar Contraseña</a></li>
    <li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
</ul>

</body>
</html>
