<?php
// Inicia la sesión (asegúrate de hacerlo al principio del archivo)
session_start();

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario']) && !isset($_SESSION['id_empresa'])) {
    // No hay sesión iniciada
    echo "No hay una sesión iniciada.";
} else {
    // Verifica si es un usuario individual
    if (isset($_SESSION['id_usuario'])) {
        // Redirige a la página de bienvenida para usuarios
        header("Location: bienvenido.php");
        exit();
    } elseif (isset($_SESSION['id_empresa'])) {
        // Redirige a la página de bienvenida para empresas
        header("Location: bienvenido_e.php");
        exit();
    }
}
?>
