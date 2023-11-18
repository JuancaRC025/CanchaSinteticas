<?php
// actualizar_usuario.php

session_start();
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['guardar_actualizacion'])) {
        $id_usuario_actualizar = $_POST['id_usuario'];
        $nuevos_nombres = $_POST['nuevos_nombres'];
        $nuevos_apellidos = $_POST['nuevos_apellidos'];
        $nuevo_correo = $_POST['nuevo_correo'];
        $nuevo_telefono = $_POST['nuevo_telefono'];
        $nueva_contraseña = $_POST['nueva_contraseña'];

        $query = "UPDATE usuario SET 
                  Nombres = '$nuevos_nombres', 
                  Apellidos = '$nuevos_apellidos', 
                  Correo_Electronico = '$nuevo_correo', 
                  Telefono = '$nuevo_telefono',
                  Contraseña = '$nueva_contraseña'
                  WHERE Id_Usuario = $id_usuario_actualizar";

        if ($conn->query($query) === TRUE) {
            echo 'Datos actualizados correctamente';
            header('Location: admin_us.php');
        } else {
            echo 'Error al actualizar datos: ' . $conn->error;
        }
    }
} else {
    // Obtener los datos actuales del usuario
    $id_usuario = $_GET['id'];

    $consulta_usuario = "SELECT * FROM usuario WHERE Id_Usuario = $id_usuario";
    $resultado_usuario = $conn->query($consulta_usuario);

    if ($resultado_usuario->num_rows > 0) {
        $usuario = $resultado_usuario->fetch_assoc();
    } else {
        echo 'Usuario no encontrado';
        exit;
    }
}

if (!empty($_POST['nueva_contraseña'])) {
    $nueva_contraseña = md5($_POST['nueva_contraseña']);
    // Ahora, utiliza $nueva_contraseña para actualizar la contraseña en la base de datos.
}

?>

<html>
<head>
    <title>Actualizar Usuario</title>
</head>
<body>
    <h2>Actualizar Usuario</h2>
    <form method="post" action="">
        <input type="hidden" name="id_usuario" value="<?php echo $usuario['Id_Usuario']; ?>">
        <label>Nombres:</label>
        <input type="text" name="nuevos_nombres" value="<?php echo $usuario['Nombres']; ?>"><br>

        <label>Apellidos:</label>
        <input type="text" name="nuevos_apellidos" value="<?php echo $usuario['Apellidos']; ?>"><br>

        <label>Correo Electrónico:</label>
        <input type="text" name="nuevo_correo" value="<?php echo $usuario['Correo_Electronico']; ?>"><br>

        <label>Teléfono:</label>
        <input type="text" name="nuevo_telefono" value="<?php echo $usuario['Telefono']; ?>"><br>

        <label>Nueva Contraseña:</label>
<input type="password" name="nueva_contraseña" placeholder="Deja en blanco para no cambiar"><br>


        <input type="submit" name="guardar_actualizacion" value="Guardar Cambios">
    </form>
</body>
</html>