<?php
include 'conexion.php';
session_start();


// Verifica si el Id_empresa está definido en la sesión
$empresa_id = isset($_SESSION['id_empresa']) ? $_SESSION['id_empresa'] : null;

if (!$empresa_id) {
    // Manejo del caso en que $_SESSION['id_empresa'] no esté definido o sea nulo
    echo '<script>
        setTimeout(function() {
            window.location.href = "ingresar.php";
        }, 1000); // Redirigir después de 10 segundos
    </script>';
    exit();  // Agregado para evitar que el resto del código se ejecute
}

// Realiza la consulta para obtener la información del usuario usando $empresa_id
$info_empresa_sql = "SELECT Representante_Legal, Razon_Social, Telefono, Correo_Electronico, Direccion FROM empresa WHERE Id_empresa = $empresa_id";

$resultado_info = mysqli_query($conn, $info_empresa_sql);

if ($resultado_info) {
    $fila_info = mysqli_fetch_assoc($resultado_info);
    $representa_empresa = $fila_info['Representante_Legal'];
    $nombre_empresa = $fila_info['Razon_Social'];
    $Telefono_empresa= $fila_info['Telefono'];
    $correo_empresa= $fila_info['Correo_Electronico'];
    $Direccion_empresa= $fila_info['Direccion'];
} else {
    // Manejo del error (puedes personalizar según tus necesidades)
    die("Error en la consulta: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

        <li class="nav-item dropdown">
            <a href="#">Registrar</a>
            <div class="dropdown-content">
                <a href="reg_usuario.php">Usuario</a>
                <a href="reg_empresa.php">Empresa</a>
            </div>
        </li>
        <li class="nav-item"><a href="Ingresar.php">Ingresar</a></li>

        <li><a href="cerrar_sesion.php" class="cerrar-sesion">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </li>
    </ul>
    <h1>¡Bienvenido, Administrador!</h1>

    <p>Representante: <?php echo $representa_empresa; ?></p>
    <p>Nombre de la empresa: <?php echo $nombre_empresa; ?></p>
    <p>Telefono: <?php echo $Telefono_empresa; ?></p>
    <p>Correo Electrónico: <?php echo $correo_empresa; ?></p>
    <p>Direccion: <?php echo $Direccion_empresa; ?></p>

    <h2>Opciones de Perfil</h2>
    <ul>
        <li><a href="editar_perfil.html">Editar Perfil</a></li>
        <li><a href="admin_us.php">Administrar Usuarios</a></li>
        <li><a href="cerrar_sesion.php">Cerrar sesión</a></li>
    </ul>
</body>

</html>
