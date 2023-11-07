<?php
include 'conexion.php';
session_start();

if (isset($_SESSION["id_usuario"])) {
    header("Location: index.php");
}

if (!empty($_POST)) {
    $correo = $_POST['correo_u'];
    $password = md5($_POST['Contraseña_i']);

    // Prepara la consulta
    $sql = "SELECT * FROM Usuario WHERE Correo_Electronico = '$correo' AND Contraseña = '$password'";

    // Ejecuta la consulta
    $result = $conn->query($sql);

    if (!$result) {
        die("Error al ejecutar la consulta: " . $conn->error);
    }

    $rows = $result->num_rows;
    if ($rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['id_usuario'] = $row['Id_Usuario'];
            //  $tipoUsuario = $row['id_tipo_usuario'];
        }

        // switch ($tipoUsuario) {
        //     case 1:
        //         header("Location: Administrador.php");
        //         break;
        //     case 2:
        //         header("Location: Cliente.php");
        //         break;
        // }
        echo '<script>
    alert("Ingreso Exitoso");
    setTimeout(function() {
        window.location.href = "index.php";
    }, 1000); // Redirigir después de 1 segundo
</script>';
    } else {
        echo '<script>
    alert("Datos incorrectos, Por favor Verifique sus Datos");
    window.location.href = "ingresar.php";
</script>';
    }

    // Cierra la conexión
    $conn->close();
}
?>