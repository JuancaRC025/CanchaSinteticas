<?php
session_start();

include 'conexion.php';

$correo_L = $_POST['correo_u'];
$Contraseña_L =$_POST['Contraseña_i'];
$Contraseña_L = hash('sha512', $Contraseña_L);

$validar_login = mysqli_query($conexion, "SELECT * FROM usuario WHERE Correo_Electronico='$correo_L' AND Contraseña='$Contraseña_L'");

if ($validar_login) {  // Comprueba si la consulta se ejecutó correctamente
    if (mysqli_num_rows($validar_login) > 0) {
        $_SESSION['usuario'] = $correo_L;
        header("location: bienvenido.php");
    } else {
        echo '
        <script>
        alert("Usuario No Existe, Por Favor Verifique Los Datos Introducidos");
        window.location = "./ingresar.php";  // Corrección: "window.location" en lugar de "windows.location"
        </script>';
        exit;
    }
} else {
    die("Error en la consulta: " . mysqli_error($conexion));  // Muestra un mensaje de error si la consulta falla
}
?>